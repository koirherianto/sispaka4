@extends('layouts.master')

@section('title')
        Create Forward Chainings
    @endsection

@section('page-title')
    
    Create Forward Chainings
    @endsection

@section('body')
    <body>
@endsection

@section('content')

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'forwardChainings.store']) !!}

        <div class="card-body">

            <div class="row">
                @include('forward_chainings.forward_chainings.fields')
            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('forwardChainings.index') }}" class="btn btn-default"> Cancel </a>
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
    