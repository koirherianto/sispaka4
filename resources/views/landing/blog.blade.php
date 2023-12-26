@extends('landing.layout.app')

@section('title', $project->title)
@section('description', $project->seo_description)
@section('keyword', $project->seo_keyword)

@section('content')
<style>
    h1 {
        font-size: 50px; /* Sesuaikan ukuran teks sesuai kebutuhan untuk layar PC */
    }
    @media (max-width: 767px) {
        h1 {
            font-size: 30px; /* Sesuaikan ukuran teks sesuai kebutuhan untuk perangkat seluler */
        }
    }
</style>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="">{{ $project->title }}</h1>

                @if($project->hasMedia('thumbnail'))
                    <img src="{{ $project->getFirstMediaUrl('thumbnail') }}" alt="{{ $project->title }}" style="max-width: 70%">
                @endif

                {!! Form::open(['route' => 'bc.selectEvidences']) !!}
                <div class="row mt-3">
                    <input type="hidden" name="slug" value="{{ $project->slug }}">
                    <div class="form-group col-md-9">
                        {!! Form::label('bc_goal_id', 'Try Expert System:') !!}
                        {!! Form::select('bc_goal_id', $goals, null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="form-group col-md-3">
                        {!! Form::label('next', '.') !!}
                        {!! Form::submit('Next', ['class' => 'btn btn-success btn-block']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                
                {!! $project->content !!}
            </div>
            <div class="col-md-2">
                @include('adminlte-templates::common.errors')
                @include('flash::message')
            </div>
        </div>
    </div>
</div>
@endsection
