<!-- Forward Chaining Id Field -->
<div class="col-sm-12">
    {!! Form::label('forward_chaining_id', 'Title:') !!}
    <p>{{ $fcGoal->forwardChaining->project->title }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $fcGoal->name }}</p>
</div>

<!-- Code Name Field -->
<div class="col-sm-12">
    {!! Form::label('code_name', 'Code Name:') !!}
    <p>{{ $fcGoal->code_name }}</p>
</div>

<!-- Reason Field -->
<div class="col-sm-12">
    {!! Form::label('reason', 'Reason:') !!}
    <p>{{ $fcGoal->reason }}</p>
</div>

<!-- Solution Field -->
<div class="col-sm-12">
    {!! Form::label('solution', 'Solution:') !!}
    <p>{{ $fcGoal->solution }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fcGoal->created_at }}</p>
</div>

<!-- Updated At Field -->

<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fcGoal->updated_at }}</p>
</div>
