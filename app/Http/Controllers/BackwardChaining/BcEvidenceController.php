<?php

namespace App\Http\Controllers\BackwardChaining;

use App\Http\Requests\CreateBcEvidenceRequest;
use App\Http\Requests\UpdateBcEvidenceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BcEvidenceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Response;
use App\Models\Project;
use App\Models\BcEvidence;

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
        $user = Auth::user();
        $sessionProject = $user->session_project;
        $project = Project::find($sessionProject);

        $bcEvidences = $project->backwardChaining->bcEvidences()?->orderBy('created_at', 'desc')?->paginate(10);

        return view('bc_evidences.index')->with('bcEvidences', $bcEvidences);
    }

    public function create()
    {
        return view('bc_evidences.create');
    }

    public function store(CreateBcEvidenceRequest $request)
    {
        $input = $request->all();

        

        $bcEvidence = $this->bcEvidenceRepository->create($input);

        Flash::success('Bc Evidence saved successfully.');
        return redirect(route('bcEvidences.index'));
    }

    public function show($id)
    {
        $bcEvidence = $this->bcEvidenceRepository->find($id);
        
        if (empty($bcEvidence)) {
            Flash::error('Bc Evidence not found');
            return redirect(route('bcEvidences.index'));
        }

        return view('bc_evidences.show')->with('bcEvidence', $bcEvidence);
    }

    public function edit($id)
    {
        $bcEvidence = $this->bcEvidenceRepository->find($id);

        if (empty($bcEvidence)) {
            Flash::error('Bc Evidence not found');
            return redirect(route('bcEvidences.index'));
        }

        return view('bc_evidences.edit')->with('bcEvidence', $bcEvidence);
    }

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
