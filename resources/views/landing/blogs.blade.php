@extends('landing.layout.app')

@section('title', 'Sispaka - Expert System Platform')

@section('content')
<br>    
<br>    

    <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
        <form class="form" action="{{ route('blogs') }}">
            <div class="input-group ">
                <input type="text" class="form-control" name="search" placeholder="Search Expert System" value="{{ $keySearch }}">
                <span class="input-group-btn">
                    <button class="btn" type="submit"><i class="arrow_right"></i></button>
                </span>
            </div>
        </form>
    </div>
    
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
                <div class="post-link"><a href="{{ route('blog', $project->slug) }}">Try Expert System</a></div>
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
