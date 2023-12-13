<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBcRuleCodeRequest;
use App\Http\Requests\UpdateBcRuleCodeRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BcRuleCodeRepository;
use Illuminate\Http\Request;
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
        $bcRuleCodes = $this->bcRuleCodeRepository->paginate(10);

        return view('bc_rule_codes.index')->with('bcRuleCodes', $bcRuleCodes);
    }

    /**
     * Show the form for creating a new BcRuleCode.
     */
    public function create()
    {
        return view('bc_rule_codes.create');
    }

    /**
     * Store a newly created BcRuleCode in storage.
     */
    public function store(CreateBcRuleCodeRequest $request)
    {
        $input = $request->all();

        $bcRuleCode = $this->bcRuleCodeRepository->create($input);

        Flash::success('Bc Rule Code saved successfully.');
        return redirect(route('bcRuleCodes.index'));
    }

    /**
     * Display the specified BcRuleCode.
     */
    public function show($id)
    {
        $bcRuleCode = $this->bcRuleCodeRepository->find($id);
        
        if (empty($bcRuleCode)) {
            Flash::error('Bc Rule Code not found');
            return redirect(route('bcRuleCodes.index'));
        }

        return view('bc_rule_codes.show')->with('bcRuleCode', $bcRuleCode);
    }

    /**
     * Show the form for editing the specified BcRuleCode.
     */
    public function edit($id)
    {
        $bcRuleCode = $this->bcRuleCodeRepository->find($id);

        if (empty($bcRuleCode)) {
            Flash::error('Bc Rule Code not found');
            return redirect(route('bcRuleCodes.index'));
        }

        return view('bc_rule_codes.edit')->with('bcRuleCode', $bcRuleCode);
    }

    /**
     * Update the specified BcRuleCode in storage.
     */
    public function update($id, UpdateBcRuleCodeRequest $request)
    {
        $bcRuleCode = $this->bcRuleCodeRepository->find($id);

        if (empty($bcRuleCode)) {
            Flash::error('Bc Rule Code not found');
            return redirect(route('bcRuleCodes.index'));
        }

        $bcRuleCode = $this->bcRuleCodeRepository->update($request->all(), $id);

        Flash::success('Bc Rule Code updated successfully.');
        return redirect(route('bcRuleCodes.index'));
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
            Flash::error('Bc Rule Code not found');
            return redirect(route('bcRuleCodes.index'));
        }

        $this->bcRuleCodeRepository->delete($id);

        Flash::success('Bc Rule Code deleted successfully.');
        return redirect(route('bcRuleCodes.index'));
    }
}
