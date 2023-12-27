<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Have Account?') !!}
    <p>{{ $contributor->user_id ? 'Yes' : 'No' }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $contributor->name }}</p>
</div>

<!-- Contribution Field -->
<div class="col-sm-12">
    {!! Form::label('contribution', 'Contribution:') !!}
    <p>{{ $contributor->contribution }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $contributor->email }}</p>
</div>

<!-- Link Field -->
<div class="col-sm-12">
    {!! Form::label('link', 'Link:') !!}
    <p>{{ $contributor->link }}</p>
</div>

