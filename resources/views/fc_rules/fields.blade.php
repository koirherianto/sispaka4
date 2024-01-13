<!-- Fc Goal Id Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('fc_goal_id', 'Fc Goal Id:') !!}
    {!! Form::number('fc_goal_id', null, ['class' => 'form-control', 'required']) !!}
    @error('fc_goal_id') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Fc Evidence Id Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('fc_evidence_id', 'Fc Evidence Id:') !!}
    {!! Form::number('fc_evidence_id', null, ['class' => 'form-control', 'required']) !!}
    @error('fc_evidence_id') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Fc Rule Code Id Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('fc_rule_code_id', 'Fc Rule Code Id:') !!}
    {!! Form::number('fc_rule_code_id', null, ['class' => 'form-control', 'required']) !!}
    @error('fc_rule_code_id') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Optional Question Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('optional_question', 'Optional Question:') !!}
    {!! Form::text('optional_question', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
    @error('optional_question') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>