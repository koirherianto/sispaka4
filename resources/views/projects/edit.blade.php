@extends('layouts.master')

@section('title')
    Edit Project
@endsection

@section('page-title')
    Edit Project
@endsection

@section('body')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <body>
@endsection

@section('content')

    @include('adminlte-templates::common.errors')
    @include('flash::message')

    <div class="card">

        {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'patch','files' => true]) !!}

        <div class="card-body">
            <div class="row">
                @include('projects.fields')
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <div>
                @if (!$project->isPublished())
                    <a href="{{ route('projects.publish') }}" class="btn btn-dark"> Publish </a> 
                @else
                    <a href="{{ route('projects.unpublish') }}" class="btn btn-dark"> Unpublish </a>
                @endif
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
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


    </div>
@endsection

@section('scripts')
    
    {{-- apexcharts --}}
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    {{-- dashboard-sales.init.js --}}
    <script src="{{ URL::asset('build/js/pages/dashboard-sales.init.js') }}"></script>
    {{-- App js --}}
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        // ... tambahkan opsi heading lainnya sesuai kebutuhan Anda
                    ]
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    
    
    
@endsection
        
