<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBcGoalRequest;
use App\Http\Requests\UpdateBcGoalRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BcGoalRepository;
use Illuminate\Http\Request;
use App\Models\Project;
use Response;
use Flash;
use Auth;


class BcGoalController extends AppBaseController
{
    private $bcGoalRepository;

    public function __construct(BcGoalRepository $bcGoalRepo)
    {
        $this->middleware('permission:bcGoal.index', ['only' => ['index','show']]);
        $this->middleware('permission:bcGoal.create', ['only' => ['create','store']]);
        $this->middleware('permission:bcGoal.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bcGoal.destroy', ['only' => ['destroy']]);
        $this->bcGoalRepository = $bcGoalRepo;
    }

    public function index(Request $request)
    {
        $currentProject = Project::find(Auth::user()->session_project);
        $bcGoals = $currentProject->backwardChaining->bcGoals()->orderBy('created_at', 'desc')?->paginate(10);

        return view('bc_goals.index')->with('bcGoals', $bcGoals);
    }

    public function create()
    {
        $isCreatePage = true;
        $currentProject = Project::find(Auth::user()->session_project);

        return view('bc_goals.create', compact('isCreatePage', 'currentProject'));
    }

    public function store(CreateBcGoalRequest $request)
    {
        $input = $request->all();
        $sessionProject = Auth::user()->session_project;
        $currentProject = Project::find($sessionProject);

        $input['backward_chaining_id'] = $currentProject->backwardChaining->id;

        $bcGoal = $this->bcGoalRepository->create($input);

        Flash::success('Backward Chaining Goal saved successfully.');
        return redirect(route('bcGoals.index'));
    }

    public function show($id)
    {
        $bcGoal = $this->bcGoalRepository->find($id);
        
        if (empty($bcGoal)) {
            Flash::error('Backward Chaining Goal not found');
            return redirect(route('bcGoals.index'));
        }

        return view('bc_goals.show')->with('bcGoal', $bcGoal);
    }

    public function edit($id)
    {
        $bcGoal = $this->bcGoalRepository->find($id);

        if (empty($bcGoal)) {
            Flash::error('Backward Chaining Goal not found');
            return redirect(route('bcGoals.index'));
        }

        return view('bc_goals.edit')->with('bcGoal', $bcGoal);
    }

    public function update($id, UpdateBcGoalRequest $request)
    {
        $bcGoal = $this->bcGoalRepository->find($id);

        if (empty($bcGoal)) {
            Flash::error('Backward Chaining Goal not found');
            return redirect(route('bcGoals.index'));
        }

        $input = $request->all();
        unset($input['backward_chaining_id']);

        $bcGoal = $this->bcGoalRepository->update($input, $id);

        Flash::success('Backward Chaining Goal updated successfully.');
        return redirect(route('bcGoals.index'));
    }

    public function destroy($id)
    {
        $bcGoal = $this->bcGoalRepository->find($id);

        if (empty($bcGoal)) {
            Flash::error('Backward Chaining Goal not found');
            return redirect(route('bcGoals.index'));
        }

        $this->bcGoalRepository->delete($id);

        Flash::success('Backward Chaining Goal deleted successfully.');
        return redirect(route('bcGoals.index'));
    }
}
