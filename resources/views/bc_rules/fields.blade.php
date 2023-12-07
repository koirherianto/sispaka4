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

<!-- Code Name Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('code_name', 'Code Name:') !!}
    {!! Form::text('code_name', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
    @error('code_name') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>