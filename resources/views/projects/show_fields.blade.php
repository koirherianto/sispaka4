<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $project->title }}</p>
</div>

<!-- Status Publish Field -->
<div class="col-sm-12">
    {!! Form::label('status_publish', 'Status Publish:') !!}
    <p>{{ $project->status_publish }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $project->slug }}</p>
</div>

<!-- Seo Keyword Field -->
<div class="col-sm-12">
    {!! Form::label('seo_keyword', 'Seo Keyword:') !!}
    <p>{{ $project->seo_keyword }}</p>
</div>

<!-- Seo Description Field -->
<div class="col-sm-12">
    {!! Form::label('seo_description', 'Seo Description:') !!}
    <p>{{ $project->seo_description }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $project->content }}</p>
</div>

