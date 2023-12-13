<!-- Backward Chaining Id Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('backward_chaining_id', 'Backward Chaining Id:') !!}
    {!! Form::number('backward_chaining_id', null, ['class' => 'form-control', 'required']) !!}
    @error('backward_chaining_id') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>

<!-- Code Name Field -->
<div class="form-group col-sm-6 mb-2">
    {!! Form::label('code_name', 'Code Name:') !!}
    {!! Form::text('code_name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
    @error('code_name') 
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
</div>