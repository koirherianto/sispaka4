<?php

namespace App\Http\Controllers\BackwardChaining;

use App\Http\Controllers\AppBaseController;
use App\Models\BackwardChaining\BcEvidence;
use App\Models\BackwardChaining\BcRuleCode;
use App\Models\BackwardChaining\BcRule;
use App\Models\BackwardChaining\BcGoal;
use Illuminate\Http\Request;
use App\Models\Project;
use Flash;
use Auth;

class BackwardChaningTryController extends AppBaseController
{
    public function __construct()
    {
        // $this->middleware('permission:bcGoal.index', ['only' => ['index','show']]);
        // $this->middleware('permission:bcGoal.create', ['only' => ['create','store']]);
        // $this->middleware('permission:bcGoal.edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:bcGoal.destroy', ['only' => ['destroy']]);
    }

    // pilih penyakit
    public function selectGoals()
    {
        $currentProject = Project::find(Auth::user()->session_project);
        $goals = $currentProject->backwardChaining->bcGoals()->orderBy('created_at', 'desc')->pluck('name', 'id');
        return view('backward_chainings.try.select_goals', compact('goals'));
    }

    // terima penyakit
    // pilih gejalanya
    public function selectEvidences(Request $request)   
    {   
        $currentProject = Project::find(Auth::user()->session_project);
        // ini ada rule yang harus di penuhi, jika bukan penyakit ini yang keluar
        $selectedRuleModel = BcRule::where('bc_goal_id', $request->bc_goal_id)->get();
        $selectedRules = [];

        foreach ($selectedRuleModel as $selectedRule) {
            $selectedRules[] = [
                'rule_id' => $selectedRule->id,
                'bc_goal_id' => $selectedRule->bc_goal_id,
                'bc_evidence_id' => $selectedRule->bc_evidence_id,
                'bc_rule_code_id' => $selectedRule->bc_rule_code_id,
            ];
        }
        $selectedRules = json_encode($selectedRules);

        // ini adalah goal yang di pilih dari halaman sebelumnya
        $selectedGoal = BcGoal::find($request->bc_goal_id);
        // seluruh evidence yang ada di project, sesuai dengan project yang sedang di kerjakan
        $evidences = $currentProject->backwardChaining->bcEvidences()->orderBy('created_at', 'desc')->get();

        return view('backward_chainings.try.select_evidences', compact('evidences', 'selectedGoal', 'selectedRules'));
    }

    public function result(Request $request)
    {
        $selectedRules = json_decode($request->selected_rules, true);
        $selectedEvidences = $request->selected_evidences;
        // jika tidak ada evidence yang di pilih
        if (empty($selectedEvidences)) {
            Flash::error('Please select at least one evidence');
            return redirect(route('bcTry.selectGoals'));
        }
        $selectedEvidencesCount = count($selectedEvidences);


        // Lakukan backward chaining
        $result = $this->backwardChaining($selectedRules, $selectedEvidences);

        // Tampilkan atau gunakan hasil sesuai kebutuhan
        return view('backward_chainings.try.result', compact('result','selectedEvidencesCount'));
    }

    // Algoritma backward chaining
    public function backwardChaining($selectedRules, $selectedEvidences)
    {
        $matchedRules = [];
        $unmatchedGoals = [];

        foreach ($selectedRules as $rule) {
            // Periksa apakah bukti dipilih
            if (in_array($rule['bc_evidence_id'], $selectedEvidences)) {
                $matchedRules[] = $rule;
                $selectedEvidences = array_merge($selectedEvidences, [$rule['bc_goal_id']]);
            } else {
                $unmatchedGoals[] = $rule;
            }
        }

        // load data
        foreach ($matchedRules as $key => $matchedRule) {
            $matchedRules[$key]['bc_evidence'] = BcEvidence::find($matchedRule['bc_evidence_id']);
            $matchedRules[$key]['bc_rule_code'] = BcRuleCode::find($matchedRule['bc_rule_code_id']);
        }

        // load data
        foreach ($unmatchedGoals as $key => $unmatchedGoal) {
            $unmatchedGoals[$key]['bc_evidence'] = BcEvidence::find($unmatchedGoal['bc_evidence_id']);
            $unmatchedGoals[$key]['bc_rule_code'] = BcRuleCode::find($unmatchedGoal['bc_rule_code_id']);
        }

        $currentGoal = null;

        // jika ada yang sama
        if (!empty($matchedRules) && isset($matchedRules[0]['bc_goal_id'])) {
            $currentGoal = BcGoal::find($matchedRules[0]['bc_goal_id']);
        }else{ //jika tidak ada yang sama
            return [
                'result' => 'Pengguna tidak memiliki penyakit', 'unmatched_goals' => $unmatchedGoals,
                'unmatched_goals' => $unmatchedGoals,
                'matched_rules' => $matchedRules,
                'current_goal' => $currentGoal,
                'is_matched' => false,
            ];
        }

        // Periksa apakah masih ada tujuan yang tidak cocok
        if (empty($unmatchedGoals)) {
            return [
                'result' => 'Pengguna memiliki penyakit', 'matched_rules' => $matchedRules,
                'unmatched_goals' => $unmatchedGoals,
                'matched_rules' => $matchedRules,
                'current_goal' => $currentGoal,
                'is_matched' => true
            ];
        } else {
            return [
                'result' => 'Pengguna tidak memiliki penyakit', 'unmatched_goals' => $unmatchedGoals,
                'unmatched_goals' => $unmatchedGoals,
                'matched_rules' => $matchedRules,
                'current_goal' => $currentGoal,
                'is_matched' => false
            ];
        }
    }
}
