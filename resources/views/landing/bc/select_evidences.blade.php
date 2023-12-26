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
                <div class="card p-4">
                    <h1>Choises Evidence - {{ $selectedGoal->name }}</h1>
                    
                    <form method="post" action="{{ route('bc.result') }}" class="mt-3">
                        @csrf
                        <input type="hidden" name="selected_rules" value="{{ $selectedRules }}">
                        <input type="hidden" name="bc_goal_id" value="{{ $selectedGoal->id }}">
                        <input type="hidden" name="slug" value="{{ $project->slug }}">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Evidence Name</th>
                                    {{-- <th>Evidence Code Name</th> --}}
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evidences as $evidence)
                                    <tr>
                                        <td>{{ $evidence->name }}</td>
                                        {{-- <td>{{ $evidence->code_name }}</td> --}}
                                        <td>
                                            {!! Form::checkbox('selected_evidences[]', $evidence->id, false, ['id' => 'evidence'.$evidence->id, 'class' => 'form-check-input']) !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                        <div class="form-group">
                            {!! Form::open(['route' => ['blog', 'slug' => $project->slug], 'method' => 'post']) !!}
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                            <a href="{{ route('blog', ['slug' => $project->slug]) }}" class="btn btn-info"> Back </a>
                        </div>
                        
                    </form>
                        
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection
