<input type="hidden" name="status_publish" value="-">
<input type="hidden" name="slug" value="-">

@if ($isCreatedPage && auth()->user()->hasRole('super-admin'))
    <div class="form-group col-sm-6">
        {!! Form::label('user_id', 'User:') !!}
        {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'required']) !!}
    </div>
@else
    <input type="hidden" name="user_id" value="-">
@endrole


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

@if ($isCreatedPage)
    <!-- Method hanya saat create, tidak bisa diubah -->
    <div class="form-group col-sm-6">
        {!! Form::label('method_id', 'Method: (it cannot be changed later)') !!}
        {!! Form::select('method_id', $methods->pluck('name', 'id'), null, [
            'class' => 'form-control',
            'id' => 'method_id',
            'placeholder' => 'Select a Method',
        ]) !!}
        @error('method_id') 
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror 
    </div>
@endif

@if(!$isCreatedPage)

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

    {{-- input thumnail --}}
    <div class="form-group col-sm-6 mb-2">
        @if(isset($project) && $project->hasMedia('thumbnail'))
        {!! Form::label('thumbnail', 'Thumbnail Blog (Isi Untuk Memperbarui Thumbnail):') !!}
        @else
        {!! Form::label('thumbnail', 'Thumbnail Blog:') !!}
        @endif
        <div style="display: flex; align-items: center;">
            {!! Form::file('thumbnail', ['class' => 'form-control', 'id' => 'formFile']) !!}
            @if(isset($project) && $project->hasMedia('thumbnail'))
                <img src="{{ $project->getFirstMediaUrl('thumbnail') }}" alt="Thumbnail Preview" style="max-width: 100px; max-height: 100px; margin-left: 10px;">
            @endif
        </div>
        @error('thumbnail') 
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <!-- Content Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-2">
        {!! Form::label('content', 'Content: (Write your blog in here!)') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control', 'maxlength' => 65535, 'id' => 'editor']) !!}
        @error('content') 
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror 
    </div>

@endif