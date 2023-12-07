@extends('layouts.master')

@section('title')
    Edit Project
@endsection

@section('page-title')
    Edit Project
@endsection

@section('body')
    <body>
@endsection

@section('content')

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'patch']) !!}

        <div class="card-body">
            <div class="row">
                @include('projects.fields')
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <div>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('projects.index') }}" class="btn btn-default"> Cancel </a>
            </div>
            <div>
                <!-- Tambahkan tombol baru di sini -->
                @can('project.destroy')
                {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                    {!! Form::button('Delete Project', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
                @endcan
            </div>
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
        
