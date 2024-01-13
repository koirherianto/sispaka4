@extends('layouts.master')

@section('page-title')
    Forward Chaining Rule Codes
@endsection

@section('title')
    Forward Chaining Rule Codes
@endsection

@section('css')
@endsection

@section('body')
    <body>
@endsection

@section('content')
    @include('flash::message')
    @include('forward_chainings.fc_rule_groups.table')
@endsection

@section('scripts')
    
    {{-- apexcharts --}}
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    {{-- dashboard-sales.init.js --}}
    <script src="{{ URL::asset('build/js/pages/dashboard-sales.init.js') }}"></script>
    {{-- App js --}}
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
@endsection

