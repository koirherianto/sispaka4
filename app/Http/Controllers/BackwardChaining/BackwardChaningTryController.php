<?php

namespace App\Http\Controllers\BackwardChaining;

use App\Http\Controllers\AppBaseController;
use App\Models\BackwardChaining\BcRule;
use App\Models\BackwardChaining\BcGoal;
use Illuminate\Http\Request;
use App\Models\Project;
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

    public function selectGoals()
    {
        $currentProject = Project::find(Auth::user()->session_project);
        $goals = $currentProject->backwardChaining->bcGoals()->orderBy('created_at', 'desc')->pluck('name', 'id');
        return view('backward_chainings.try.select_goals', compact('goals'));
    }

    public function selectEvidences(Request $request)
    {   
        $currentProject = Project::find(Auth::user()->session_project);
        // ini ada rule yang harus di penuhi, jika bukan penyakit ini yang keluar
        $rules = BcRule::where('bc_goal_id', $request->bc_goal_id)->get();
        // ini adalah goal yang di pilih dari halaman sebelumnya
        $selectedGoal = BcGoal::find($request->bc_goal_id);
        // seluruh evidence yang ada di project, sesuai dengan project yang sedang di kerjakan
        $evidences = $currentProject->backwardChaining->bcEvidences()->orderBy('created_at', 'desc')->get();

        return view('backward_chainings.try.select_evidences', compact('evidences', 'selectedGoal', 'rules'));
    }
}
