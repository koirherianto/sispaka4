
<div class="col-sm-12">
    {!! Form::label('backward_chaining_id', 'Title') !!}
    <p>{{ $bcGoal->backwardChaining->project->title }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $bcGoal->name }}</p>
</div>

<!-- Code Name Field -->
<div class="col-sm-12">
    {!! Form::label('code_name', 'Code Name:') !!}
    <p>{{ $bcGoal->code_name }}</p>
</div>

<!-- Reason Field -->
<div class="col-sm-12">
    {!! Form::label('reason', 'Reason:') !!}
    <p>{{ $bcGoal->reason }}</p>
</div>

<!-- Solution Field -->
<div class="col-sm-12">
    {!! Form::label('solution', 'Solution:') !!}
    <p>{{ $bcGoal->solution }}</p>
</div>

