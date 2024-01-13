<?php

namespace App\Http\Controllers\ForwardChaining;

use App\Http\Requests\ForwardChaining\CreateFcEvidenceRequest;
use App\Http\Requests\ForwardChaining\UpdateFcEvidenceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\FcEvidenceRepository;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Response;
use Flash;
use DB;


class FcEvidenceController extends AppBaseController
{
    /** @var FcEvidenceRepository $fcEvidenceRepository*/
    private $fcEvidenceRepository;

    public function __construct(FcEvidenceRepository $fcEvidenceRepo)
    {
        $this->middleware('permission:fcEvidence.index', ['only' => ['index','show']]);
        $this->middleware('permission:fcEvidence.create', ['only' => ['create','store']]);
        $this->middleware('permission:fcEvidence.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:fcEvidence.destroy', ['only' => ['destroy']]);
        $this->fcEvidenceRepository = $fcEvidenceRepo;
    }

    /**
     * Display a listing of the FcEvidence.
     */
    public function index(Request $request)
    {
        $currentProject = Project::find(Auth::user()->session_project);

        $fcEvidences = $currentProject->forwardChaining->fcEvidences()?->orderBy('created_at', 'desc')?->paginate(10);

        return view('forward_chainings.fc_evidences.index', compact('fcEvidences', 'currentProject'));
    }

    /**
     * Show the form for creating a new FcEvidence.
     */
    public function create()
    {
        $isCreatePage = true;
        $currentProject = Project::find(Auth::user()->session_project);

        return view('forward_chainings.fc_evidences.create', compact('isCreatePage', 'currentProject'));
    }

    /**
     * Store a newly created FcEvidence in storage.
     */
    public function store(CreateFcEvidenceRequest $request)
    {
        $input = $request->all();
        $currentProject = Project::find(Auth::user()->session_project);

        $input['forward_chaining_id'] = $currentProject->forwardChaining->id;

        $fcEvidence = $this->fcEvidenceRepository->create($input);

        Flash::success('Forward Chaining Evidence saved successfully.');
        return redirect(route('fcEvidences.index'));
    }

    /**
     * Display the specified FcEvidence.
     */
    public function show($id)
    {
        $fcEvidence = $this->fcEvidenceRepository->find($id);
        
        if (empty($fcEvidence)) {
            Flash::error('Forward Chaining Evidence not found');
            return redirect(route('fcEvidences.index'));
        }

        return view('forward_chainings.fc_evidences.show')->with('fcEvidence', $fcEvidence);
    }

    /**
     * Show the form for editing the specified FcEvidence.
     */
    public function edit($id)
    {
        $fcEvidence = $this->fcEvidenceRepository->find($id);

        if (empty($fcEvidence)) {
            Flash::error('Forward Chaining Evidence not found');
            return redirect(route('fcEvidences.index'));
        }

        return view('forward_chainings.fc_evidences.edit')->with('fcEvidence', $fcEvidence);
    }

    /**
     * Update the specified FcEvidence in storage.
     */
    public function update($id, UpdateFcEvidenceRequest $request)
    {
        $fcEvidence = $this->fcEvidenceRepository->find($id);

        if (empty($fcEvidence)) {
            Flash::error('Forward Chaining Evidence not found');
            return redirect(route('fcEvidences.index'));
        }

        $input = $request->all();
        unset($input['forward_chaining_id']);

        $fcEvidence = $this->fcEvidenceRepository->update($input, $id);

        Flash::success('Forward Chaining Evidence updated successfully.');
        return redirect(route('fcEvidences.index'));
    }

    /**
     * Remove the specified FcEvidence from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fcEvidence = $this->fcEvidenceRepository->find($id);

        if (empty($fcEvidence)) {
            Flash::error('Forward Chaining Evidence not found');
            return redirect(route('fcEvidences.index'));
        }

        DB::transaction(function () use($fcEvidence,$id) {
            // $fcEvidence->fcRules()->delete();
            $this->fcEvidenceRepository->delete($id);
        },3);

        Flash::success('Forward Chaining Evidence deleted successfully.');
        return redirect(route('fcEvidences.index'));
    }
}
