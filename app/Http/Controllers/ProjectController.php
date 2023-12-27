<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use App\Models\BackwardChaining\BackwardChaining;
use App\Models\Contributor;
use App\Models\Project;
use App\Models\Method;
use App\Models\User;
use Response;
use Flash;
use Auth;
use DB;

class ProjectController extends AppBaseController
{
    /** @var ProjectRepository $projectRepository*/
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->middleware('permission:project.index', ['only' => ['index','show']]);
        $this->middleware('permission:project.create', ['only' => ['create','store']]);
        $this->middleware('permission:project.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:project.destroy', ['only' => ['destroy']]);
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('super-admin')) {
            $projects = $this->projectRepository->paginate(20);
        }
        
        if ($user->hasRole('user')) {
            $projects = $user->projects()->paginate(20);
        }

         // Pastikan hanya menggunakan with jika $projects tidak null
        if ($projects) {
            $projects->load('contributors');
        }

        return view('projects.index', compact('projects','user'));
    }

    /**
     * Show the form for creating a new Project.
     */
    public function create()
    {
        $isCreatedPage = true;
        $methods = Method::all();
        $users = User::pluck('name', 'id');

        // return $users;
        return view('projects.create', compact('methods', 'users','isCreatedPage'));
    }

    /**
     * Store a newly created Project in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();
        $input['status_publish'] = 'no'; // defaultnya jangan publish
        $input['slug'] = Project::createUniqueSlug($input['title']); //buat slug

        $user = Auth::user();
        if ($user->hasRole('user')) {
            $input['user_id'] = $user->id;
        }

        DB::transaction(function () use ($input, $user) {
            $project = $this->projectRepository->create($input);
            $project->methods()->sync($input['method_id']);
            $project->users()->sync([$user->id]);

            Contributor::create([
                'project_id' => $project->id,
                'user_id' => $user->id,
                'name' => $user->name,
                'contribution' => 'Project Owner',
                'email' => $user->email,
                'link' => null
            ]);

            $method = Method::find($input['method_id']);

            if ($method->slug === 'backward-chaining') {
                BackwardChaining::create([
                    'project_id' => $project->id
                ]);
            }
            
        }, 3);

        Flash::success('Project saved successfully.');
        return redirect(route('projects.index'));
    }


    public function show($id)
    {
        $project = $this->projectRepository->find($id);
        
        if (empty($project)) {
            Flash::error('Project not found');
            return redirect(route('projects.index'));
        }

        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     */
    public function edit($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');
            return redirect(route('projects.index'));
        }

        $isCreatedPage = false;
        $methods = Method::all();
        $users = User::pluck('name', 'id');

        return view('projects.edit', compact('project', 'methods', 'users' ,'isCreatedPage'));
    }

    /**
     * Update the specified Project in storage.
     */
    public function update($id, UpdateProjectRequest $request)
    {
        
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');
            return redirect(route('projects.index'));
        }

        $input = $request->all();
        unset($input['slug']); // slug tidak boleh diupdate
        unset($input['method_id']); // method tidak boleh diupdate
        unset($input['user_id']); // user tidak boleh diupdate
        unset($input['status_publish']); // status_publish tidak boleh diupdate
        
        // save thumnail using spatie media library
        if ($request->hasFile('thumbnail')) {
            // project hanya memiliki 1 thumbnail
            $project->clearMediaCollection('thumbnail');
            $project->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }

        // jurnal
        if ($request->hasFile('jurnal')) {
            // project hanya memiliki 1 jurnal
            $project->clearMediaCollection('jurnal');
            $project->addMediaFromRequest('jurnal')->toMediaCollection('jurnal');
        }
        
        $project = $this->projectRepository->update($input, $id);

        Flash::success('Project updated successfully.');
        return redirect(route('projects.edit', $id));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');
            return redirect(route('projects.index'));
        }

        DB::transaction(function () use ($project, $id) {
            // hapus session_project pada user yang memiliki id project ini
            User::where('session_project', $id)->update(['session_project' => null]);

            //hapus rules dari arah bc evidence
            $project->backwardChaining->bcEvidences->each(function ($evidence) {
                $evidence->bcRules()->delete();
            });

            //hapus rules dari arah bc goal
            $project->backwardChaining->bcGoals->each(function ($goal) {
                $goal->bcRules()->delete();
            });
            
            $project->backwardChaining->bcRuleCodes()->delete();
            $project->backwardChaining->bcEvidences()->delete();
            $project->backwardChaining->bcGoals()->delete();
            $project->backwardChaining->delete();

            // Detach methods and users
            $project->methods()->detach();
            $project->users()->detach();

            // delete contributors
            $project->contributors()->delete();

            // Delete thumbnail & jurnal
            $project->clearMediaCollection('jurnal');
            $project->clearMediaCollection('thumbnail');

            $this->projectRepository->delete($id);

        }, 3);

        Flash::success('Project deleted successfully.');
        return redirect(route('projects.index'));
    }

    public function publish() {
        // current project
        $project = Project::find(Auth::user()->session_project);
        $backwardChaining = $project->backwardChaining;
    
        // minimal lengths
        $minContentLength = 100;
        $minGoalLength = 2;
        $minEvidenceLength = 2;
        $minBcRuleLength = 2;
        $minRuleCodeLength = 2;
    
        $errorMessages = [];
    
        // check project content length
        if (strlen($project->content) < $minContentLength) {
            $errorMessages[] = 'Project content must be at least ' . $minContentLength . ' characters.';
        }
    
        // check backward chaining elements
        if (count($backwardChaining->bcGoals) < $minGoalLength) {
            $errorMessages[] = 'Project goal must have at least ' . $minGoalLength . ' items.';
        }
    
        if (count($backwardChaining->bcEvidences) < $minEvidenceLength) {
            $errorMessages[] = 'Project evidence must have at least ' . $minEvidenceLength . ' items.';
        }
    
        $bcRuleCodes = $backwardChaining->bcRuleCodes;

        if (count($bcRuleCodes) < $minEvidenceLength) {
            $errorMessages[] = 'Project rule code must have at least ' . $minEvidenceLength . ' items.';
        }
    
        foreach ($bcRuleCodes as $bcRuleCode) {
            if (count($bcRuleCode->bcRules) < $minBcRuleLength) {
                $errorMessages[] = 'Project rule code ' . $bcRuleCode->code_name . ' must have at least ' . $minBcRuleLength . ' items.';
            }
        }
    
        // check if project is already published
        if ($project->isPublished()) {
            $errorMessages[] = 'Project is already published.';
        }
    
        // if there are error messages, redirect with the messages
        if (!empty($errorMessages)) {
            Flash::error(implode('<br>', $errorMessages));
            return redirect(route('projects.edit', $project->id));
        }

        // if there are no error messages, publish the project
        $project->status_publish = 'yes';
        $project->save();
    
        Flash::success('Project published successfully.');
        return redirect(route('projects.edit', $project->id));
    }
    
    // unpublish project
    public function unpublish() {
        $project = Project::find(Auth::user()->session_project);
        $project->status_publish = 'no';
        $project->save();
    
        Flash::success('Project unpublished successfully.');
        return redirect(route('projects.edit', $project->id));
    }

    function changeProject($id) {
        
        $user = Auth::user();
        $user->session_project = $id;
        $user->save();

        $project = Project::find($id);
        Flash::success('Project changed to '.$project->title.' successfully.');
        return redirect(route('projects.index'));
    }

    // fungsi untuk unmanage project
    public function unmanageProject($id) {
        $user = Auth::user();
        $user->session_project = null;
        $user->save();

        $project = Project::find($id);
        Flash::success('Project' .$project->title.' unmanaged successfully.');
        return redirect(route('projects.index'));
    }

    private function statusPublishEnum($enum) : String {
        
        if ($enum === 'no') {
            return 'Not Publish';
        }
        if ($enum === 'yes') {
            return 'Publish';
        }

        if ($enum === 'proses') {
            return 'Proses';
        }

        return '';
    }
}
