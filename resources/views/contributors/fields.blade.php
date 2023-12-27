<input type="hidden" name="project_id" value="-">
<input type="hidden" name="user_id" value="-">

<!-- Name Field -->
<div class="form-group col-sm-12 mb-2">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 45, 'maxlength' => 45]) !!}
    @error('name') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Contribution Field -->
<div class="form-group col-sm-12 mb-2">
    {!! Form::label('contribution', 'Contribution:') !!}
    {!! Form::text('contribution', null, ['class' => 'form-control', 'required', 'maxlength' => 45, 'maxlength' => 45]) !!}
    @error('contribution') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Email Field -->
<div class="form-group col-sm-12 mb-2">
    {!! Form::label('email', 'Email: (Optional - If the contributor has an account, they can access the project as well)') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => 45]) !!}
    @error('email') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Link Field -->
<div class="form-group col-sm-12 mb-2">
    {!! Form::label('link', 'Link: (optional) (You can provide a link to social media or any other relevant information)') !!}
    {!! Form::text('link', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
    @error('link') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>
