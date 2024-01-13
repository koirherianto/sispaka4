<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFcRuleRequest;
use App\Http\Requests\UpdateFcRuleRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\FcRuleRepository;
use Illuminate\Http\Request;
use Flash;

class FcRuleController extends AppBaseController
{
    /** @var FcRuleRepository $fcRuleRepository*/
    private $fcRuleRepository;

    public function __construct(FcRuleRepository $fcRuleRepo)
    {
        $this->middleware('permission:fcRule.index', ['only' => ['index','show']]);
        $this->middleware('permission:fcRule.create', ['only' => ['create','store']]);
        $this->middleware('permission:fcRule.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:fcRule.destroy', ['only' => ['destroy']]);
        $this->fcRuleRepository = $fcRuleRepo;
    }

    /**
     * Display a listing of the FcRule.
     */
    public function index(Request $request)
    {
        $fcRules = $this->fcRuleRepository->paginate(10);

        return view('fc_rules.index')->with('fcRules', $fcRules);
    }

    /**
     * Show the form for creating a new FcRule.
     */
    public function create()
    {
        return view('fc_rules.create');
    }

    /**
     * Store a newly created FcRule in storage.
     */
    public function store(CreateFcRuleRequest $request)
    {
        $input = $request->all();

        $fcRule = $this->fcRuleRepository->create($input);

        Flash::success('Fc Rule saved successfully.');
        return redirect(route('fcRules.index'));
    }

    /**
     * Display the specified FcRule.
     */
    public function show($id)
    {
        $fcRule = $this->fcRuleRepository->find($id);
        
        if (empty($fcRule)) {
            Flash::error('Fc Rule not found');
            return redirect(route('fcRules.index'));
        }

        return view('fc_rules.show')->with('fcRule', $fcRule);
    }

    /**
     * Show the form for editing the specified FcRule.
     */
    public function edit($id)
    {
        $fcRule = $this->fcRuleRepository->find($id);

        if (empty($fcRule)) {
            Flash::error('Fc Rule not found');
            return redirect(route('fcRules.index'));
        }

        return view('fc_rules.edit')->with('fcRule', $fcRule);
    }

    /**
     * Update the specified FcRule in storage.
     */
    public function update($id, UpdateFcRuleRequest $request)
    {
        $fcRule = $this->fcRuleRepository->find($id);

        if (empty($fcRule)) {
            Flash::error('Fc Rule not found');
            return redirect(route('fcRules.index'));
        }

        $fcRule = $this->fcRuleRepository->update($request->all(), $id);

        Flash::success('Fc Rule updated successfully.');
        return redirect(route('fcRules.index'));
    }

    /**
     * Remove the specified FcRule from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fcRule = $this->fcRuleRepository->find($id);

        if (empty($fcRule)) {
            Flash::error('Fc Rule not found');
            return redirect(route('fcRules.index'));
        }

        $this->fcRuleRepository->delete($id);

        Flash::success('Fc Rule deleted successfully.');
        return redirect(route('fcRules.index'));
    }
}
