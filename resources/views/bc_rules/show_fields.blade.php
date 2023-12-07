<!-- Code Name Field -->
<div class="col-sm-12">
    {!! Form::label('code_name', 'Code Rule:') !!}
    <p>{{ $bcRule->code_name }}</p>
</div>

<!-- Bc Goal Id Field -->
<div class="col-sm-12">
    {!! Form::label('bc_goal_id', 'Goal') !!}
    <p>{{ $bcRule->bcGoal->code_name }} - {{ $bcRule->bcGoal->name }}</p>
</div>

<!-- Bc Evidence Id Field -->
<div class="col-sm-12">
    {!! Form::label('bc_evidence_id', 'Evidence') !!}
    <p>{{ $bcRule->bcEvidence->code_name }} - {{ $bcRule->bcEvidence->name }}</p>
</div>


