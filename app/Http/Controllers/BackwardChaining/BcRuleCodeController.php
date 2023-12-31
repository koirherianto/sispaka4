<?php

namespace App\Http\Controllers\BackwardChaining;

use App\Http\Requests\BackwardChaining\CreateBcRuleCodeRequest;
use App\Http\Requests\BackwardChaining\UpdateBcRuleCodeRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BcRuleCodeRepository;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\BackwardChaining\BcRuleCode;
use DB;
use Auth;
use Flash;

class BcRuleCodeController extends AppBaseController
{
    /** @var BcRuleCodeRepository $bcRuleCodeRepository*/
    private $bcRuleCodeRepository;

    public function __construct(BcRuleCodeRepository $bcRuleCodeRepo)
    {
        $this->middleware('permission:bcRuleCode.index', ['only' => ['index','show']]);
        $this->middleware('permission:bcRuleCode.create', ['only' => ['create','store']]);
        $this->middleware('permission:bcRuleCode.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bcRuleCode.destroy', ['only' => ['destroy']]);
        $this->bcRuleCodeRepository = $bcRuleCodeRepo;
    }

    /**
     * Display a listing of the BcRuleCode.
     */
    public function index(Request $request)
    {

        $currentProject = Project::find(Auth::user()->session_project);
        $bcRuleCodes = $currentProject->backwardChaining->bcRuleCodes()->paginate(10);

        return view('backward_chainings.bc_rule_codes.index')->with('bcRuleCodes', $bcRuleCodes);
    }

    /**
     * Show the form for creating a new BcRuleCode.
     */
    public function create()
    {
        return view('backward_chainings.bc_rule_codes.create');
    }

    /**
     * Store a newly created BcRuleCode in storage.
     */
    public function store(CreateBcRuleCodeRequest $request)
    {
        $input = $request->all();

        $currentProject = Project::find(Auth::user()->session_project);
        $input['backward_chaining_id'] =  $currentProject->backwardChaining->id;

        $bcRuleCode = $this->bcRuleCodeRepository->create($input);

        Flash::success('Rule Code saved successfully.');
        return redirect(route('bcRules.index'));
    }

    /**
     * Display the specified BcRuleCode.
     */
    public function show($id)
    {
        $bcRuleCode = $this->bcRuleCodeRepository->find($id);
        
        if (empty($bcRuleCode)) {
            Flash::error('Rule Code not found');
            return redirect(route('bcRuleCodes.index'));
        }

        return view('backward_chainings.bc_rule_codes.show')->with('bcRuleCode', $bcRuleCode);
    }

    /**
     * Show the form for editing the specified BcRuleCode.
     */
    public function edit($id)
    {
        $bcRuleCode = $this->bcRuleCodeRepository->find($id);

        if (empty($bcRuleCode)) {
            Flash::error('Rule Code not found');
            return redirect(route('bcRuleCodes.index'));
        }

        return view('backward_chainings.bc_rule_codes.edit')->with('bcRuleCode', $bcRuleCode);
    }

    /**
     * Update the specified BcRuleCode in storage.
     */
    public function update($id, UpdateBcRuleCodeRequest $request)
    {
        $bcRuleCode = $this->bcRuleCodeRepository->find($id);

        if (empty($bcRuleCode)) {
            Flash::error('Rule Code not found');
            return redirect(route('bcRuleCodes.index'));
        }

        $input = $request->all();
        $currentProject = Project::find(Auth::user()->session_project);
        $input['backward_chaining_id'] =  $currentProject->backwardChaining->id;

        $bcRuleCode = $this->bcRuleCodeRepository->update($input, $id);

        Flash::success('Rule Code updated successfully.');
        return redirect(route('bcRules.index'));
        // return redirect(route('bcRuleCodes.index'));
    }

    /**
     * Remove the specified BcRuleCode from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bcRuleCode = $this->bcRuleCodeRepository->find($id);

        if (empty($bcRuleCode)) {
            Flash::error('Rule Code not found');
            return redirect(route('bcRuleCodes.index'));
        }

        DB::transaction(function () use ($bcRuleCode, $id) {
            $bcRuleCode->bcRules()->delete();
            $this->bcRuleCodeRepository->delete($id);
        }, 3);

        Flash::success('Rule Code deleted successfully.');
        return redirect(route('bcRules.index'));
        // return redirect(route('bcRuleCodes.index'));
    }
}
