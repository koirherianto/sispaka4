<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBcRuleRequest;
use App\Http\Requests\UpdateBcRuleRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BcRuleRepository;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\BcRule;
use App\Models\BackwardChaining\BcGoal;
use App\Models\BackwardChaining\BcEvidence;
use Auth;
use Flash;

class BcRuleController extends AppBaseController
{
    /** @var BcRuleRepository $bcRuleRepository*/
    private $bcRuleRepository;

    public function __construct(BcRuleRepository $bcRuleRepo)
    {
        $this->middleware('permission:bcRule.index', ['only' => ['index','show']]);
        $this->middleware('permission:bcRule.create', ['only' => ['create','store']]);
        $this->middleware('permission:bcRule.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bcRule.destroy', ['only' => ['destroy']]);
        $this->bcRuleRepository = $bcRuleRepo;
    }

    public function index(Request $request)
    {
        $currentProject = Project::find(Auth::user()->session_project);
        $backwardChaining = $currentProject->backwardChaining;
        
        // Mendapatkan aturan backward chaining yang terkait dengan proyek
        $bcRules = BcRule::with('bcGoal', 'bcEvidence')
            ->where(function ($query) use ($backwardChaining) {
                // Saring berdasarkan relasi bcGoal
                $query->whereHas('bcGoal', function ($goalQuery) use ($backwardChaining) {
                    $goalQuery->whereIn('id', $backwardChaining->bcGoals->pluck('id'));
                });

                // Saring berdasarkan relasi bcEvidence
                $query->whereHas('bcEvidence', function ($evidenceQuery) use ($backwardChaining) {
                    $evidenceQuery->whereIn('id', $backwardChaining->bcEvidences->pluck('id'));
                });
            })
            ->paginate(10);

        $dataRelasi =  $this->getDataRelasi();

        return view('bc_rules.index', compact('bcRules', 'dataRelasi'));
    }

    private function getDataRelasi() : array {
        $currentProject = Project::find(Auth::user()->session_project);
        $backwardChaining = $currentProject->backwardChaining;

        $bcGoals = BcGoal::where('backward_chaining_id',$backwardChaining->id)->get();
        $dataRelasi = [];
        
        foreach ($bcGoals as $bcGoal) {
            $bcEvidenceCodes = '';
            foreach ($bcGoal->bcRules as $bcRules) {
                    $bcEvidenceCodes .= $bcRules->bcEvidence->code_name . ', ';
            }
            
            $dataRelasi[] = [
                'evidenceCodes' => $bcEvidenceCodes,    
                'goalCodes' => $bcGoal->code_name
            ];
        }

        return $dataRelasi;
    }

    public function create()
    {
        $currentProject = Project::find(Auth::user()->session_project);
        $backwardChaining = $currentProject->backwardChaining;
        $bcGoals = $backwardChaining->bcGoals->pluck('name', 'id');
        $bcEvidences = $backwardChaining->bcEvidences->pluck('name', 'id');

        return view('bc_rules.create', compact('bcGoals', 'bcEvidences'));
    }

    /**
     * Store a newly created BcRule in storage.
     */
    public function store(CreateBcRuleRequest $request)
    {
        $input = $request->all();

        // cek apakah di bc rule ada memiliki relasi dengan bc goal dan bc evidence yang sama
        $isSameExist = BcRule::where('bc_goal_id', $input['bc_goal_id'])->where('bc_evidence_id', $input['bc_evidence_id']);
        if ($isSameExist->count() > 0) {
            Flash::error('Rule already exist.');
            return redirect(route('bcRules.index'));
        }

        $bcRule = $this->bcRuleRepository->create($input);

        Flash::success('Bc Rule saved successfully.');
        return redirect(route('bcRules.index'));
    }

    /**
     * Display the specified BcRule.
     */
    public function show($id)
    {
        $bcRule = $this->bcRuleRepository->find($id);
        
        if (empty($bcRule)) {
            Flash::error('Bc Rule not found');
            return redirect(route('bcRules.index'));
        }

        return view('bc_rules.show')->with('bcRule', $bcRule);
    }

    /**
     * Show the form for editing the specified BcRule.
     */
    public function edit($id)
    {
        $bcRule = $this->bcRuleRepository->find($id);

        if (empty($bcRule)) {
            Flash::error('Bc Rule not found');
            return redirect(route('bcRules.index'));
        }

        $currentProject = Project::find(Auth::user()->session_project);
        $backwardChaining = $currentProject->backwardChaining;
        $bcGoals = $backwardChaining->bcGoals->pluck('name', 'id');
        $bcEvidences = $backwardChaining->bcEvidences->pluck('name', 'id');

        return view('bc_rules.edit', compact('bcRule', 'bcGoals', 'bcEvidences'));
    }

    /**
     * Update the specified BcRule in storage.
     */
    public function update($id, UpdateBcRuleRequest $request)
    {
        $bcRule = $this->bcRuleRepository->find($id);

        if (empty($bcRule)) {
            Flash::error('Bc Rule not found');
            return redirect(route('bcRules.index'));
        }

        $input = $request->all();

        // Check if there's a duplicate rule with the same bc_goal_id and bc_evidence_id after update
        $duplicateRule = BcRule::where('bc_goal_id', $input['bc_goal_id'])
            ->where('bc_evidence_id', $input['bc_evidence_id'])
            ->where('id', '!=', $id)
            ->first();

        if ($duplicateRule) {
            Flash::error('Rule with the same goal and evidence already exists.');
            return redirect(route('bcRules.index'));
        }

        $bcRule = $this->bcRuleRepository->update($input, $id);

        Flash::success('Bc Rule updated successfully.');
        return redirect(route('bcRules.index'));
    }

    /**
     * Remove the specified BcRule from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bcRule = $this->bcRuleRepository->find($id);

        if (empty($bcRule)) {
            Flash::error('Bc Rule not found');
            return redirect(route('bcRules.index'));
        }

        $this->bcRuleRepository->delete($id);

        Flash::success('Bc Rule deleted successfully.');
        return redirect(route('bcRules.index'));
    }
}
