<!-- Bc Goal Id Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('bc_goal_id', 'Goal') !!}
    {!! Form::select('bc_goal_id', $bcGoals, null, ['class' => 'form-control', 'required']) !!}
    @error('bc_goal_id') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Bc Evidence Id Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('bc_evidence_id', 'Evidence / Fact') !!}
    {!! Form::select('bc_evidence_id', $bcEvidences, null, ['class' => 'form-control', 'required']) !!}
    @error('bc_evidence_id') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- bc_rule_code_id Id Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('bc_rule_code_id', 'Rule Code') !!}
    {!! Form::select('bc_rule_code_id', $bcRuleCodes, null, ['class' => 'form-control', 'required']) !!}
    @error('bc_rule_code_id') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Code Name Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('optional_question', 'Optional Question:') !!}
    {!! Form::text('optional_question', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
    @error('optional_question') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>