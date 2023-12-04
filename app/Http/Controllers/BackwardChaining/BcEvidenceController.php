<?php

namespace App\Http\Controllers\BackwardChaining;

use App\Http\Requests\CreateBcEvidenceRequest;
use App\Http\Requests\UpdateBcEvidenceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BcEvidenceRepository;
use Illuminate\Http\Request;
use Flash;

class BcEvidenceController extends AppBaseController
{
    /** @var BcEvidenceRepository $bcEvidenceRepository*/
    private $bcEvidenceRepository;

    public function __construct(BcEvidenceRepository $bcEvidenceRepo)
    {
        $this->middleware('permission:bcEvidence.index', ['only' => ['index','show']]);
        $this->middleware('permission:bcEvidence.create', ['only' => ['create','store']]);
        $this->middleware('permission:bcEvidence.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bcEvidence.destroy', ['only' => ['destroy']]);
        $this->bcEvidenceRepository = $bcEvidenceRepo;
    }


    public function index(Request $request)
    {
        if (Auth::user()->hasRole('super-admin')) {
            $bcEvidences = $this->bcEvidenceRepository->orderBy('created_at', 'desc')->paginate(10);
            foreach ($bcEvidences->items() as $bcEvidence) {
                $usersMaker = $bcEvidence->backwardChaining->project->users;
                $usersMaker = $usersMaker->implode('name', ', ');
                $bcEvidence->usersMaker = $usersMaker;
            }
        }

        $bcEvidences = $this->bcEvidenceRepository->paginate(10);

        return view('bc_evidences.index')->with('bcEvidences', $bcEvidences);
    }

    /**
     * Show the form for creating a new BcEvidence.
     */
    public function create()
    {
        return view('bc_evidences.create');
    }

    /**
     * Store a newly created BcEvidence in storage.
     */
    public function store(CreateBcEvidenceRequest $request)
    {
        $input = $request->all();

        $bcEvidence = $this->bcEvidenceRepository->create($input);

        Flash::success('Bc Evidence saved successfully.');
        return redirect(route('bcEvidences.index'));
    }

    /**
     * Display the specified BcEvidence.
     */
    public function show($id)
    {
        $bcEvidence = $this->bcEvidenceRepository->find($id);
        
        if (empty($bcEvidence)) {
            Flash::error('Bc Evidence not found');
            return redirect(route('bcEvidences.index'));
        }

        return view('bc_evidences.show')->with('bcEvidence', $bcEvidence);
    }

    /**
     * Show the form for editing the specified BcEvidence.
     */
    public function edit($id)
    {
        $bcEvidence = $this->bcEvidenceRepository->find($id);

        if (empty($bcEvidence)) {
            Flash::error('Bc Evidence not found');
            return redirect(route('bcEvidences.index'));
        }

        return view('bc_evidences.edit')->with('bcEvidence', $bcEvidence);
    }

    /**
     * Update the specified BcEvidence in storage.
     */
    public function update($id, UpdateBcEvidenceRequest $request)
    {
        $bcEvidence = $this->bcEvidenceRepository->find($id);

        if (empty($bcEvidence)) {
            Flash::error('Bc Evidence not found');
            return redirect(route('bcEvidences.index'));
        }

        $bcEvidence = $this->bcEvidenceRepository->update($request->all(), $id);

        Flash::success('Bc Evidence updated successfully.');
        return redirect(route('bcEvidences.index'));
    }

    /**
     * Remove the specified BcEvidence from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bcEvidence = $this->bcEvidenceRepository->find($id);

        if (empty($bcEvidence)) {
            Flash::error('Bc Evidence not found');
            return redirect(route('bcEvidences.index'));
        }

        $this->bcEvidenceRepository->delete($id);

        Flash::success('Bc Evidence deleted successfully.');
        return redirect(route('bcEvidences.index'));
    }
}
