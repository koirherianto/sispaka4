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

                
                
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection
