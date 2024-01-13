<?php

namespace App\Http\Controllers\ForwardChaining;

use App\Http\Requests\ForwardChaining\CreateFcGoalRequest;
use App\Http\Requests\ForwardChaining\UpdateFcGoalRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\FcGoalRepository;
use Illuminate\Http\Request;
use App\Models\Project;
use Response;
use Flash;
use Auth;
use DB;

class FcGoalController extends AppBaseController
{
    /** @var FcGoalRepository $fcGoalRepository*/
    private $fcGoalRepository;

    public function __construct(FcGoalRepository $fcGoalRepo)
    {
        $this->middleware('permission:fcGoal.index', ['only' => ['index','show']]);
        $this->middleware('permission:fcGoal.create', ['only' => ['create','store']]);
        $this->middleware('permission:fcGoal.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:fcGoal.destroy', ['only' => ['destroy']]);
        $this->fcGoalRepository = $fcGoalRepo;
    }

    /**
     * Display a listing of the FcGoal.
     */
    public function index(Request $request)
    {
        $currentProject = Project::find(Auth::user()->session_project);
        $fcGoals = $currentProject->forwardChaining->fcGoals()->orderBy('created_at', 'desc')?->paginate(10);

        return view('forward_chainings.fc_goals.index', compact('fcGoals', 'currentProject'));
    }
    
    /**
     * Show the form for creating a new FcGoal.
     */
    public function create()
    {
        $isCreatePage = true;
        $currentProject = Project::find(Auth::user()->session_project);

        return view('forward_chainings.fc_goals.create', compact('isCreatePage', 'currentProject'));
    }

    /**
     * Store a newly created FcGoal in storage.
     */
    public function store(CreateFcGoalRequest $request)
    {
        $input = $request->all();
        $currentProject = Project::find(Auth::user()->session_project);

        $input['forward_chaining_id'] = $currentProject->forwardChaining->id;

        $fcGoal = $this->fcGoalRepository->create($input);

        Flash::success('Goal saved successfully.');
        return redirect(route('fcGoals.index'));
    }

    /**
     * Display the specified FcGoal.
     */
    public function show($id)
    {
        $fcGoal = $this->fcGoalRepository->find($id);
        
        if (empty($fcGoal)) {
            Flash::error('Forward Chaining Goal not found');
            return redirect(route('fcGoals.index'));
        }

        return view('forward_chainings.fc_goals.show')->with('fcGoal', $fcGoal);
    }

    /**
     * Show the form for editing the specified FcGoal.
     */
    public function edit($id)
    {
        $fcGoal = $this->fcGoalRepository->find($id);

        if (empty($fcGoal)) {
            Flash::error('Forward Chaining Goal not found');
            return redirect(route('fcGoals.index'));
        }

        return view('forward_chainings.fc_goals.edit')->with('fcGoal', $fcGoal);
    }

    /**
     * Update the specified FcGoal in storage.
     */
    public function update($id, UpdateFcGoalRequest $request)
    {
        $fcGoal = $this->fcGoalRepository->find($id);

        if (empty($fcGoal)) {
            Flash::error('Forward Chaining Goal not found');
            return redirect(route('fcGoals.index'));
        }

        $input = $request->all();
        unset($input['forward_chaining_id']);

        $fcGoal = $this->fcGoalRepository->update($input, $id);

        Flash::success('Goal updated successfully.');
        return redirect(route('fcGoals.index'));
    }

    /**
     * Remove the specified FcGoal from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fcGoal = $this->fcGoalRepository->find($id);

        if (empty($fcGoal)) {
            Flash::error('Forward Chaining Goal not found');
            return redirect(route('fcGoals.index'));
        }

        // Delete relasi rule
        DB::transaction(function () use ($fcGoal, $id) {
            // $fcGoal->fcRules()->delete();
            $this->fcGoalRepository->delete($id);
        }, 3);

        Flash::success('Goal deleted successfully.');
        return redirect(route('fcGoals.index'));
    }
}
