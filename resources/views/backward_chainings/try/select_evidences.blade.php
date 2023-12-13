@extends('layouts.master')

@section('title')
    Backward Chaining Experiment - Select Evidence
@endsection

@section('page-title')
    Backward Chaining Experiment - Select Evidence
@endsection

@section('body')
    <body>
@endsection

@section('content')
    @include('adminlte-templates::common.errors')

    <div class="card p-4">
        <h1>Choises Evidence - {{ $selectedGoal->name }}</h1>
        
        <form method="post" action="{{ route('bcTry.selectGoals') }}" class="mt-3">
            @csrf
            <input type="hidden" name="bc_goal_id" value="{{ $selectedGoal->id }}">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Evidence Name</th>
                        <th>Evidence Code Name</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evidences as $evidence)
                        <tr>
                            <td>{{ $evidence->name }}</td>
                            <td>{{ $evidence->code_name }}</td>
                            <td>
                                {!! Form::checkbox('selected_evidences[]', $evidence->id, false, ['id' => 'evidence'.$evidence->id, 'class' => 'form-check-input']) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('bcTry.selectGoals') }}" class="btn btn-default"> Back </a>
            </div>
        </form>
            
    </div>
@endsection

@section('scripts')
@endsection
