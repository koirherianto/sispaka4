<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBcGoalRequest;
use App\Http\Requests\UpdateBcGoalRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BcGoalRepository;
use Illuminate\Http\Request;
use Flash;

class BcGoalController extends AppBaseController
{
    /** @var BcGoalRepository $bcGoalRepository*/
    private $bcGoalRepository;

    public function __construct(BcGoalRepository $bcGoalRepo)
    {
        $this->middleware('permission:bcGoal.index', ['only' => ['index','show']]);
        $this->middleware('permission:bcGoal.create', ['only' => ['create','store']]);
        $this->middleware('permission:bcGoal.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bcGoal.destroy', ['only' => ['destroy']]);
        $this->bcGoalRepository = $bcGoalRepo;
    }

    /**
     * Display a listing of the BcGoal.
     */
    public function index(Request $request)
    {
        $bcGoals = $this->bcGoalRepository->paginate(10);

        return view('bc_goals.index')->with('bcGoals', $bcGoals);
    }

    /**
     * Show the form for creating a new BcGoal.
     */
    public function create()
    {
        return view('bc_goals.create');
    }

    /**
     * Store a newly created BcGoal in storage.
     */
    public function store(CreateBcGoalRequest $request)
    {
        $input = $request->all();

        $bcGoal = $this->bcGoalRepository->create($input);

        Flash::success('Bc Goal saved successfully.');
        return redirect(route('bcGoals.index'));
    }

    /**
     * Display the specified BcGoal.
     */
    public function show($id)
    {
        $bcGoal = $this->bcGoalRepository->find($id);
        
        if (empty($bcGoal)) {
            Flash::error('Bc Goal not found');
            return redirect(route('bcGoals.index'));
        }

        return view('bc_goals.show')->with('bcGoal', $bcGoal);
    }

    /**
     * Show the form for editing the specified BcGoal.
     */
    public function edit($id)
    {
        $bcGoal = $this->bcGoalRepository->find($id);

        if (empty($bcGoal)) {
            Flash::error('Bc Goal not found');
            return redirect(route('bcGoals.index'));
        }

        return view('bc_goals.edit')->with('bcGoal', $bcGoal);
    }

    /**
     * Update the specified BcGoal in storage.
     */
    public function update($id, UpdateBcGoalRequest $request)
    {
        $bcGoal = $this->bcGoalRepository->find($id);

        if (empty($bcGoal)) {
            Flash::error('Bc Goal not found');
            return redirect(route('bcGoals.index'));
        }

        $bcGoal = $this->bcGoalRepository->update($request->all(), $id);

        Flash::success('Bc Goal updated successfully.');
        return redirect(route('bcGoals.index'));
    }

    /**
     * Remove the specified BcGoal from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bcGoal = $this->bcGoalRepository->find($id);

        if (empty($bcGoal)) {
            Flash::error('Bc Goal not found');
            return redirect(route('bcGoals.index'));
        }

        $this->bcGoalRepository->delete($id);

        Flash::success('Bc Goal deleted successfully.');
        return redirect(route('bcGoals.index'));
    }
}
