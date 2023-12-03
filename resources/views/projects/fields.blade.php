<!-- Title Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 100]) !!}
    @error('title') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status_publish', 'Status Publish') !!}
    {!! Form::select(
        'status_publish',
        ['no' => 'No', 'proses' => 'Proses','yes' => 'Yes'],
        $project->status_publish ?? null,
        ['class' => 'form-control'],
    ) !!}
    @error('status_publish') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'required', 'maxlength' => 130]) !!}
    @error('slug') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Seo Keyword Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('seo_keyword', 'Seo Keyword:') !!}
    {!! Form::text('seo_keyword', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
    @error('seo_keyword') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Seo Description Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('seo_description', 'Seo Description:') !!}
    {!! Form::text('seo_description', null, ['class' => 'form-control', 'maxlength' => 160]) !!}
    @error('seo_description') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12 mb-2">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'maxlength' => 65535]) !!}
    @error('content') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>