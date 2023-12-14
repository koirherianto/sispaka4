<!-- Backward Chaining Id Field -->
<div class="col-sm-12">
    {!! Form::label('backward_chaining_id', 'Backward Chaining Id:') !!}
    <p>{{ $bcRuleCode->backward_chaining_id }}</p>
</div>

{{-- project name --}}
<div class="col-sm-12">
    {!! Form::label('project_name', 'Project Name:') !!}
    <p>{{ $bcRuleCode->backwardChaining->project->title }}</p>
</div>

<!-- Code Name Field -->
<div class="col-sm-12">
    {!! Form::label('code_name', 'Code Name:') !!}
    <p>{{ $bcRuleCode->code_name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bcRuleCode->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bcRuleCode->updated_at }}</p>
</div>

