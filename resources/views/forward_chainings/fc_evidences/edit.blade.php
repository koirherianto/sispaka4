@extends('layouts.master')

@section('title')
    Edit Forward Chaining Evidence / Facts
@endsection

@section('page-title')
    Edit Forward Chaining Evidence / Facts
@endsection

@section('body')
    <body>
@endsection

@section('content')

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($fcEvidence, ['route' => ['fcEvidences.update', $fcEvidence->id], 'method' => 'patch']) !!}

        <div class="card-body">
            <div class="row">
                @include('forward_chainings.fc_evidences.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('fcEvidences.index') }}" class="btn btn-default"> Cancel </a>
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
        
