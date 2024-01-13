<input type="hidden" name="forward_chaining_id" value="-">

<!-- Name Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 200]) !!}
    @error('name') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Code Name Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('code_name', 'Code Name:') !!}
    {!! Form::text('code_name', null, ['class' => 'form-control', 'required', 'maxlength' => 100]) !!}
    @error('code_name') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Reason Field -->
<div class="form-group col-sm-12 col-lg-12 mb-2">
    {!! Form::label('reason', 'Reason:') !!}
    {!! Form::textarea('reason', null, ['class' => 'form-control', 'maxlength' => 65535]) !!}
    @error('reason') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Solution Field -->
<div class="form-group col-sm-12 col-lg-12 mb-2">
    {!! Form::label('solution', 'Solution:') !!}
    {!! Form::textarea('solution', null, ['class' => 'form-control', 'maxlength' => 65535]) !!}
    @error('solution') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>