@extends('layouts.master')

@section('title')
    Backward Chaining Experiment - Select Goal / Result
@endsection

@section('page-title')
    Backward Chaining Experiment - Select Goal / Result
@endsection

@section('body')
    <body>
@endsection

    @section('content')
        @include('adminlte-templates::common.errors')
        @include('flash::message')

        <div class="card p-4">
            <h1>Select a Goal / Result</h1>
            
            {!! Form::open(['route' => 'bcTry.selectEvidences']) !!}

            <div class="form-group col-sm-6 mt-3">
                {!! Form::label('bc_goal_id', 'Goal / Result:') !!}
                {!! Form::select('bc_goal_id', $goals, null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="card-footer">
                {!! Form::submit('Next', ['class' => 'btn btn-dark']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    @endsection

@section('scripts')
@endsection
