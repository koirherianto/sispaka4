<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\BackwardChaining\BackwardChaining;
use App\Models\BackwardChaining\BcEvidence;
use App\Models\BackwardChaining\BcGoal;
use App\Models\BackwardChaining\BcRule;
use App\Models\BackwardChaining\BcRuleCode;
use Auth;
use Flash;
use App\Http\Controllers\BackwardChaining\BackwardChaningTryController;

class LandingController extends Controller
{
    function index() {
        $projects = Project::inRandomOrder()->take(6)->get();

        return view('landing.index', compact('projects'));
    }
    
    function blogs() {
        $projects = Project::inRandomOrder()->get();

        return view('landing.blogs', compact('projects'));
    }

    function blog($slug) {

        $project = Project::where('slug', $slug)->first();
        $goals = $project->backwardChaining->bcGoals()->orderBy('created_at', 'desc')->pluck('name', 'id');    

        return view('landing.blog', compact('project', 'goals'));
    }

    public function selectEvidences(Request $request)   
    {   
        $currentProject = Project::where('slug', $request->slug)->first();
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

        return view('landing.bc.select_evidences', compact('evidences', 'selectedGoal', 'selectedRules'))->with('project', $currentProject);
    }

    public function result(Request $request)
    {
        $currentProject = Project::where('slug', $request->slug)->first();
        $selectedRules = json_decode($request->selected_rules, true);
        $selectedEvidences = $request->selected_evidences;
        // jika tidak ada evidence yang di pilih
        if (empty($selectedEvidences)) {
            Flash::error('Please select at least one evidence');
            return redirect()->route('blog', $currentProject->slug);
        }        

        $selectedEvidencesCount = count($selectedEvidences);
 
        $backwardChaningTryController = new BackwardChaningTryController();
        // Lakukan backward chaining
        $result = $backwardChaningTryController->backwardChaining($selectedRules, $selectedEvidences);

        // Tampilkan atau gunakan hasil sesuai kebutuhan
        return view('landing.bc.result', compact('result','selectedEvidencesCount'))->with('project', $currentProject);
    }
}
