@extends('layouts.master')

@section('title')
        Edit Fc Rule
    @endsection

@section('page-title')
    
    Edit Fc Rule
@endsection

@section('body')
    <body>
@endsection

@section('content')

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($fcRule, ['route' => ['fcRules.update', $fcRule->id], 'method' => 'patch']) !!}

        <div class="card-body">
            <div class="row">
                @include('fc_rules.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('fcRules.index') }}" class="btn btn-default"> Cancel </a>
        </div>

        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    
    {{-- apexcharts --}}
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    {{-- dashboard-sales.init.js --}}
    <script src="{{ URL::asset('build/js/pages/dashboard-sales.init.js') }}"></script>
    {{-- App js --}}
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
@endsection
        
