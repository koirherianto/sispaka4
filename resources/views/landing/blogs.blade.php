@extends('landing.layout.app')

@section('title', 'Sispaka - Expert System Platform')

@section('content')
    @php $counter = 0; @endphp
    @foreach ($projects as $project)
        @if ($counter % 3 == 0)
            <div class="row">
        @endif
        <div class="col-sm-6 col-md-4">
            <div class="post-box blue-bg" style="background-image: url('{{ $project->getFirstMediaUrl('thumbnail') }}'); background-size: cover; background-position: center;">
                <div class="post-img"></div>
                <span class="badge badge-danger">{{ $project->methods[0]->name }}</span>
                <div class="post-title">{{ $project->title }}</div>
                <div class="post-link"><a href="#">Try Expert System</a></div>
            </div>
        </div>
        @php $counter++; @endphp
        @if ($counter % 3 == 0)
            </div>
        @endif
    @endforeach
    @if ($counter % 3 != 0)
        </div>
    @endif
@endsection
