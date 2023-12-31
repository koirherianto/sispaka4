<?php

namespace App\Http\Controllers\BackwardChaining;

use App\Http\Requests\BackwardChaining\CreateBackwardChainingRequest;
use App\Http\Requests\BackwardChaining\UpdateBackwardChainingRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BackwardChainingRepository;
use Illuminate\Http\Request;
use Flash;

class BackwardChainingController extends AppBaseController
{
    /** @var BackwardChainingRepository $backwardChainingRepository*/
    private $backwardChainingRepository;

    public function __construct(BackwardChainingRepository $backwardChainingRepo)
    {
        $this->middleware('permission:backwardChaining.index', ['only' => ['index','show']]);
        $this->middleware('permission:backwardChaining.create', ['only' => ['create','store']]);
        $this->middleware('permission:backwardChaining.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:backwardChaining.destroy', ['only' => ['destroy']]);
        $this->backwardChainingRepository = $backwardChainingRepo;
    }

    /**
     * Display a listing of the BackwardChaining.
     */
    public function index(Request $request)
    {
        $backwardChainings = $this->backwardChainingRepository->paginate(10);

        return view('backward_chainings.backward_chainings.index')->with('backwardChainings', $backwardChainings);
    }

    /**
     * Show the form for creating a new BackwardChaining.
     */
    public function create()
    {
        return view('backward_chainings.backward_chainings.create');
    }

    /**
     * Store a newly created BackwardChaining in storage.
     */
    public function store(CreateBackwardChainingRequest $request)
    {
        $input = $request->all();

        $backwardChaining = $this->backwardChainingRepository->create($input);

        Flash::success('Backward Chaining saved successfully.');
        return redirect(route('backwardChainings.index'));
    }

    /**
     * Display the specified BackwardChaining.
     */
    public function show($id)
    {
        $backwardChaining = $this->backwardChainingRepository->find($id);
        
        if (empty($backwardChaining)) {
            Flash::error('Backward Chaining not found');
            return redirect(route('backwardChainings.index'));
        }

        return view('backward_chainings.backward_chainings.show')->with('backwardChaining', $backwardChaining);
    }

    /**
     * Show the form for editing the specified BackwardChaining.
     */
    public function edit($id)
    {
        $backwardChaining = $this->backwardChainingRepository->find($id);

        if (empty($backwardChaining)) {
            Flash::error('Backward Chaining not found');
            return redirect(route('backwardChainings.index'));
        }

        return view('backward_chainings.backward_chainings.edit')->with('backwardChaining', $backwardChaining);
    }

    /**
     * Update the specified BackwardChaining in storage.
     */
    public function update($id, UpdateBackwardChainingRequest $request)
    {
        $backwardChaining = $this->backwardChainingRepository->find($id);

        if (empty($backwardChaining)) {
            Flash::error('Backward Chaining not found');
            return redirect(route('backwardChainings.index'));
        }

        $backwardChaining = $this->backwardChainingRepository->update($request->all(), $id);

        Flash::success('Backward Chaining updated successfully.');
        return redirect(route('backwardChainings.index'));
    }

    /**
     * Remove the specified BackwardChaining from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $backwardChaining = $this->backwardChainingRepository->find($id);

        if (empty($backwardChaining)) {
            Flash::error('Backward Chaining not found');
            return redirect(route('backwardChainings.index'));
        }

        $this->backwardChainingRepository->delete($id);

        Flash::success('Backward Chaining deleted successfully.');
        return redirect(route('backwardChainings.index'));
    }
}
