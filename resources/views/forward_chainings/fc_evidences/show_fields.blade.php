<!-- Forward Chaining Id Field -->
<div class="col-sm-12">
    {!! Form::label('forward_chaining_id', 'Title:') !!}
    <p>{{ $fcEvidence->forwardChaining->project->title }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $fcEvidence->name }}</p>
</div>

<!-- Code Name Field -->
<div class="col-sm-12">
    {!! Form::label('code_name', 'Code Name:') !!}
    <p>{{ $fcEvidence->code_name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fcEvidence->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fcEvidence->updated_at }}</p>
</div>

