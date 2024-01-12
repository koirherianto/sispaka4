<?php

namespace App\Http\Controllers\ForwardChaining;

use App\Http\Requests\ForwardChaining\CreateForwardChainingRequest;
use App\Http\Requests\ForwardChaining\UpdateForwardChainingRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ForwardChainingRepository;
use Illuminate\Http\Request;
use Flash;

class ForwardChainingController extends AppBaseController
{
    /** @var ForwardChainingRepository $forwardChainingRepository*/
    private $forwardChainingRepository;

    public function __construct(ForwardChainingRepository $forwardChainingRepo)
    {
        $this->middleware('permission:forwardChaining.index', ['only' => ['index','show']]);
        $this->middleware('permission:forwardChaining.create', ['only' => ['create','store']]);
        $this->middleware('permission:forwardChaining.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:forwardChaining.destroy', ['only' => ['destroy']]);
        $this->forwardChainingRepository = $forwardChainingRepo;
    }

    /**
     * Display a listing of the ForwardChaining.
     */
    public function index(Request $request)
    {
        $forwardChainings = $this->forwardChainingRepository->paginate(10);

        return view('forward_chainings.forward_chainings.index')->with('forwardChainings', $forwardChainings);
    }

    /**
     * Show the form for creating a new ForwardChaining.
     */
    public function create()
    {
        return view('forward_chainings.forward_chainings.create');
    }

    /**
     * Store a newly created ForwardChaining in storage.
     */
    public function store(CreateForwardChainingRequest $request)
    {
        $input = $request->all();

        $forwardChaining = $this->forwardChainingRepository->create($input);

        Flash::success('Forward Chaining saved successfully.');
        return redirect(route('forwardChainings.index'));
    }

    /**
     * Display the specified ForwardChaining.
     */
    public function show($id)
    {
        $forwardChaining = $this->forwardChainingRepository->find($id);
        
        if (empty($forwardChaining)) {
            Flash::error('Forward Chaining not found');
            return redirect(route('forwardChainings.index'));
        }

        return view('forward_chainings.forward_chainings.show')->with('forwardChaining', $forwardChaining);
    }

    /**
     * Show the form for editing the specified ForwardChaining.
     */
    public function edit($id)
    {
        $forwardChaining = $this->forwardChainingRepository->find($id);

        if (empty($forwardChaining)) {
            Flash::error('Forward Chaining not found');
            return redirect(route('forwardChainings.index'));
        }

        return view('forward_chainings.forward_chainings.edit')->with('forwardChaining', $forwardChaining);
    }

    /**
     * Update the specified ForwardChaining in storage.
     */
    public function update($id, UpdateForwardChainingRequest $request)
    {
        $forwardChaining = $this->forwardChainingRepository->find($id);

        if (empty($forwardChaining)) {
            Flash::error('Forward Chaining not found');
            return redirect(route('forwardChainings.index'));
        }

        $forwardChaining = $this->forwardChainingRepository->update($request->all(), $id);

        Flash::success('Forward Chaining updated successfully.');
        return redirect(route('forwardChainings.index'));
    }

    /**
     * Remove the specified ForwardChaining from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $forwardChaining = $this->forwardChainingRepository->find($id);

        if (empty($forwardChaining)) {
            Flash::error('Forward Chaining not found');
            return redirect(route('forwardChainings.index'));
        }

        $this->forwardChainingRepository->delete($id);

        Flash::success('Forward Chaining deleted successfully.');
        return redirect(route('forwardChainings.index'));
    }
}
