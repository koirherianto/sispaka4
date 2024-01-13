<!-- Forward Chaining Id Field -->
<div class="col-sm-12">
    {!! Form::label('forward_chaining_id', 'Forward Chaining Id:') !!}
    <p>{{ $fcRuleGroup->forward_chaining_id }}</p>
</div>

{{-- project name --}}
<div class="col-sm-12">
    {!! Form::label('project_name', 'Project Name:') !!}
    <p>{{ $fcRuleGroup->forwardChaining->project->title }}</p>
</div>

<!-- Code Name Field -->
<div class="col-sm-12">
    {!! Form::label('code_name', 'Code Name:') !!}
    <p>{{ $fcRuleGroup->code_name }}</p>
</div>

{{-- created at --}}
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fcRuleGroup->created_at }}</p>
</div>

{{-- updated at --}}
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fcRuleGroup->updated_at }}</p>
</div>

