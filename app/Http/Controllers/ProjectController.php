<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
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
            $projects = $this->projectRepository->paginate(10);
        }
        
        if ($user->hasRole('user')) {
            $projects = $user->projects()->paginate(10);
        }

        $projects = $this->projectRepository->paginate(10);

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
    public function store(Request $request)
    {
        $input = $request->all();
        $input['status_publish'] = 'no'; // defaultnya jangan publish
        $input['slug'] = Project::createUniqueSlug($input['title']); //buat slug

        $user = Auth::user();
        if ($user->hasRole('user')) {
            $input['user_id'] = $user->id;
        }

        DB::transaction(function () use ($input) {
            $project = $this->projectRepository->create($input);
            $project->methods()->sync($input['method_id']);
            $project->users()->sync([Auth::user()->id]);
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

        return view('projects.edit', compact('project', 'methods', 'isCreatedPage'));
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

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');
        return redirect(route('projects.index'));
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
            $project->methods()->detach();
            $project->users()->detach();
            $this->projectRepository->delete($id);

        }, 3);

        Flash::success('Project deleted successfully.');
        return redirect(route('projects.index'));
    }

    function changeProject($id) {
        $user = Auth::user();
        $user->session_project = $id;
        $user->save();
        $project = Project::find($id);
        Flash::success('Project changed to '.$project->title.' successfully.');
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
