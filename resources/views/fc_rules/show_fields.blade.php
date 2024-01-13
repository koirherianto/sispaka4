<!-- Fc Goal Id Field -->
<div class="col-sm-12">
    {!! Form::label('fc_goal_id', 'Fc Goal Id:') !!}
    <p>{{ $fcRule->fc_goal_id }}</p>
</div>

<!-- Fc Evidence Id Field -->
<div class="col-sm-12">
    {!! Form::label('fc_evidence_id', 'Fc Evidence Id:') !!}
    <p>{{ $fcRule->fc_evidence_id }}</p>
</div>

<!-- Fc Rule Code Id Field -->
<div class="col-sm-12">
    {!! Form::label('fc_rule_code_id', 'Fc Rule Code Id:') !!}
    <p>{{ $fcRule->fc_rule_code_id }}</p>
</div>

<!-- Optional Question Field -->
<div class="col-sm-12">
    {!! Form::label('optional_question', 'Optional Question:') !!}
    <p>{{ $fcRule->optional_question }}</p>
</div>

