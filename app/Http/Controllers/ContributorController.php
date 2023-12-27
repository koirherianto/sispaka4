<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContributorRequest;
use App\Http\Requests\UpdateContributorRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ContributorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use Flash;

class ContributorController extends AppBaseController
{
    /** @var ContributorRepository $contributorRepository*/
    private $contributorRepository;

    public function __construct(ContributorRepository $contributorRepo)
    {
        $this->middleware('permission:contributor.index', ['only' => ['index','show']]);
        $this->middleware('permission:contributor.create', ['only' => ['create','store']]);
        $this->middleware('permission:contributor.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:contributor.destroy', ['only' => ['destroy']]);
        $this->contributorRepository = $contributorRepo;
    }

    /**
     * Display a listing of the Contributor.
     */
    public function index(Request $request)
    {
        $currentProject = Project::find(Auth::user()->session_project);
        $contributors = $currentProject->contributors()->orderBy('created_at', 'desc')->paginate(10);

        return view('contributors.index')->with('contributors', $contributors);
    }

    /**
     * Show the form for creating a new Contributor.
     */
    public function create()
    {
        return view('contributors.create');
    }

    /**
     * Store a newly created Contributor in storage.
     */
    public function store(CreateContributorRequest $request)
    {
        $currentProject = Project::find(Auth::user()->session_project);
        $input = $request->all();

        // check duplicate
        $contributor = $currentProject->contributors()->where('email', $input['email'])->first();
        if ($contributor !== null) {
            Flash::error('Contributor already exists');
            return redirect(route('contributors.index'));
        }
        
        $input['project_id'] = $currentProject->id;
        $input['user_id'] = null;
        
        if ($input['email'] !== null) {
            $user = User::where('email', $input['email'])->first();
        
            if ($user !== null) {
                $input['user_id'] = $user->id;
                $input['name'] = $user->name;
            }
        }

        $contributor = $this->contributorRepository->create($input);

        if ($user !== null) {
            Flash::success('Contributor has been added to the project');
        }else{
            Flash::success('Contributor saved successfully.');
        }

        return redirect(route('contributors.index'));
    }

    /**
     * Display the specified Contributor.
     */
    public function show($id)
    {
        $contributor = $this->contributorRepository->find($id);
        
        if (empty($contributor)) {
            Flash::error('Contributor not found');
            return redirect(route('contributors.index'));
        }

        return view('contributors.show')->with('contributor', $contributor);
    }

    /**
     * Show the form for editing the specified Contributor.
     */
    public function edit($id)
    {
        $contributor = $this->contributorRepository->find($id);

        if (empty($contributor)) {
            Flash::error('Contributor not found');
            return redirect(route('contributors.index'));
        }

        return view('contributors.edit')->with('contributor', $contributor);
    }

    /**
     * Update the specified Contributor in storage.
     */
    public function update($id, UpdateContributorRequest $request)
    {
        $contributor = $this->contributorRepository->find($id);

        if (empty($contributor)) {
            Flash::error('Contributor not found');
            return redirect(route('contributors.index'));
        }

        $input = $request->all();

        unset($input['user_id']);
        unset($input['project_id']);

        if ($input['email'] !== null) {
            $user = User::where('email', $input['email'])->first();
        
            if ($user !== null) {
                $input['user_id'] = $user->id;
            }
        }

        $contributor = $this->contributorRepository->update($input, $id);

        Flash::success('Contributor updated successfully.');
        return redirect(route('contributors.index'));
    }

    /**
     * Remove the specified Contributor from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contributor = $this->contributorRepository->find($id);

        if (empty($contributor)) {
            Flash::error('Contributor not found');
            return redirect(route('contributors.index'));
        }

        $this->contributorRepository->delete($id);

        Flash::success('Contributor deleted successfully.');
        return redirect(route('contributors.index'));
    }

    public function refresh() {
        $currentProject = Project::find(Auth::user()->session_project);
        // refresh email apakah dia sudah terdaftar di user
        $contributors = $currentProject->contributors()->get();
        foreach ($contributors as $contributor) {
            if ($contributor->email !== null) {
                $user = User::where('email', $contributor->email)->first();
                if ($user !== null) {
                    $contributor->user_id = $user->id;
                    $contributor->name = $user->name;
                    $contributor->save();
                }
            }
        }

        Flash::success('Contributors refreshed successfully.');
        return redirect(route('contributors.index'));
    }
}
