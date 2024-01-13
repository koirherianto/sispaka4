<?php

namespace App\Http\Controllers\ForwardChaining;

use App\Http\Requests\ForwardChaining\CreateFcRuleGroupRequest;
use App\Http\Requests\ForwardChaining\UpdateFcRuleGroupRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\FcRuleGroupRepository;
use Illuminate\Http\Request;
use App\Models\Project;
use DB;
use Auth;
use Flash;

class FcRuleGroupController extends AppBaseController
{
    /** @var FcRuleGroupRepository $fcRuleGroupRepository*/
    private $fcRuleGroupRepository;

    public function __construct(FcRuleGroupRepository $fcRuleGroupRepo)
    {
        $this->middleware('permission:fcRuleGroup.index', ['only' => ['index','show']]);
        $this->middleware('permission:fcRuleGroup.create', ['only' => ['create','store']]);
        $this->middleware('permission:fcRuleGroup.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:fcRuleGroup.destroy', ['only' => ['destroy']]);
        $this->fcRuleGroupRepository = $fcRuleGroupRepo;
    }

    /**
     * Display a listing of the FcRuleGroup.
     */
    public function index(Request $request)
    {
        $currentProject = Project::find(Auth::user()->session_project);
        $fcRuleGroups = $currentProject->forwardChaining->fcRuleGroups()->paginate(10);

        return view('forward_chainings.fc_rule_groups.index')->with('fcRuleGroups', $fcRuleGroups);
    }

    /**
     * Show the form for creating a new FcRuleGroup.
     */
    public function create()
    {
        return view('forward_chainings.fc_rule_groups.create');
    }

    /**
     * Store a newly created FcRuleGroup in storage.
     */
    public function store(CreateFcRuleGroupRequest $request)
    {
        $input = $request->all();

        $currentProject = Project::find(Auth::user()->session_project);
        $input['forward_chaining_id'] =  $currentProject->forwardChaining->id;

        $fcRuleGroup = $this->fcRuleGroupRepository->create($input);

        Flash::success('Forward Chaining Rule Group saved successfully.');
        return redirect(route('fcRuleGroups.index'));
    }

    /**
     * Display the specified FcRuleGroup.
     */
    public function show($id)
    {
        $fcRuleGroup = $this->fcRuleGroupRepository->find($id);
        
        if (empty($fcRuleGroup)) {
            Flash::error('Forward Chaining Rule Group not found');
            return redirect(route('fcRuleGroups.index'));
        }

        return view('forward_chainings.fc_rule_groups.show')->with('fcRuleGroup', $fcRuleGroup);
    }

    /**
     * Show the form for editing the specified FcRuleGroup.
     */
    public function edit($id)
    {
        $fcRuleGroup = $this->fcRuleGroupRepository->find($id);

        if (empty($fcRuleGroup)) {
            Flash::error('Forward Chaining Rule Group not found');
            return redirect(route('fcRuleGroups.index'));
        }

        return view('forward_chainings.fc_rule_groups.edit')->with('fcRuleGroup', $fcRuleGroup);
    }

    /**
     * Update the specified FcRuleGroup in storage.
     */
    public function update($id, UpdateFcRuleGroupRequest $request)
    {
        $fcRuleGroup = $this->fcRuleGroupRepository->find($id);

        if (empty($fcRuleGroup)) {
            Flash::error('Forward Chaining Rule Group not found');
            return redirect(route('fcRuleGroups.index'));
        }

        $input = $request->all();
        $currentProject = Project::find(Auth::user()->session_project);
        $input['forward_chaining_id'] =  $currentProject->forwardChaining->id;

        $fcRuleGroup = $this->fcRuleGroupRepository->update($input, $id);

        Flash::success('Forward Chaining Rule Group updated successfully.');
        return redirect(route('fcRuleGroups.index'));
    }

    /**
     * Remove the specified FcRuleGroup from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fcRuleGroup = $this->fcRuleGroupRepository->find($id);

        if (empty($fcRuleGroup)) {
            Flash::error('Forward Chaining Rule Group not found');
            return redirect(route('fcRuleGroups.index'));
        }

        
        DB::transaction(function () use ($fcRuleGroup, $id) {
            // $fcRuleGroup->fcRules()->delete();
            $this->fcRuleGroupRepository->delete($id);
        }, 3);

        Flash::success('Forward Chaining Rule Group deleted successfully.');
        return redirect(route('fcRuleGroups.index'));
    }
}
