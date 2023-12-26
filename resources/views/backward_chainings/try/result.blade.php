@extends('layouts.master')

@section('title')
    Backward Chaining Experiment - Result
@endsection

@section('page-title')
    Backward Chaining Experiment - Result
@endsection

@section('body')
    <body>
    <!-- Isi bagian body jika diperlukan -->
    </body>
@endsection

@section('content')
    @include('adminlte-templates::common.errors')

    <div class="card p-4">
        <h1>Result {{ $result['current_goal']->name ?? '' }} - {{ $result['current_goal']->code_name ?? '' }}</h1>
        <div class="alert alert-info">
            @if ($result['is_matched'])
                Pengguna memiliki penyakit ini. Penyakit ini memiliki {{ count($result['matched_rules']) + count($result['unmatched_goals']) }} gejala, Dari {{ $selectedEvidencesCount }} gejala yang dipilih, {{ count($result['matched_rules']) }} gejala cocok dengan aturan yang ada. Proses pencocokan dilakukan berdasarkan aturan-aturan berikut:
            @else
                Pengguna tidak memiliki penyakit ini. Penyakit ini memiliki {{ count($result['matched_rules']) + count($result['unmatched_goals']) }} gejala, Dari {{ $selectedEvidencesCount }} gejala yang dipilih, {{ count($result['matched_rules']) }} gejala cocok dengan aturan yang ada. Pencocokan aturan-aturan yang tidak terpenuhi adalah sebagai berikut:
            @endif
        </div>
        

        @if ($result['is_matched'])
            <div class="alert alert-success">
                <h3>Aturan / Rule yang Cocok</h3>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Goal Code</th>
                            <th>Rule Code</th>
                            <th>Evidence Name</th>
                            <th>Evidence Code Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result['matched_rules'] as $rule)
                            <tr>
                                <td>{{ $result['current_goal']->code_name }}</td>
                                <td>{{ $rule['bc_rule_code']->code_name }}</td>
                                <td>{{ $rule['bc_evidence']->name }}</td>
                                <td>{{ $rule['bc_evidence']->code_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-danger">
                <h3>Aturan / Rule yang Tidak Cocok</h3>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Rule Code</th>
                            <th>Evidence Name</th>
                            <th>Evidence Code Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result['unmatched_goals'] as $goal)
                            <tr>
                                <td>{{ $goal['bc_rule_code']->code_name }}</td>
                                <td>{{ $goal['bc_evidence']->name }}</td>
                                <td>{{ $goal['bc_evidence']->code_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="alert alert-success">    

                <h3>Aturan / Rule yang Cocok</h3>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Evidence Name</th>
                            <th>Evidence Code Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result['matched_rules'] as $rule)
                            <tr>
                                <td>{{ $rule['bc_evidence']->name }}</td>
                                <td>{{ $rule['bc_evidence']->code_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="form-group mt-3">
            <a href="{{ route('bcTry.selectGoals') }}" class="btn btn-dark">Kembali</a>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Isi bagian scripts jika diperlukan -->
@endsection
