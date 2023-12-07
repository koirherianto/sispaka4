<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Bc Rules
            </h5>
            <div class="ms-auto">
                <div class="dropdown">
                    @can('bcRule.index')
                        <a href="{{ route('bcRules.create') }}" class="btn btn-primary float-right"> Tambah Data </a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="data-table"
                        class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
                        <thead>
                            <tr>
                                {{-- <th>Goal Code</th> --}}
                                <th>Goal</th>
                                {{-- <th>Evidence Code</th> --}}
                                <th>Evidence</th>
                                <th>Code Rule</th>
                                <th colspan="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bcRules as $bcRule)
                                <tr>
                                    {{-- <td>{{ $bcRule->bcGoal->code_name }}</td> --}}
                                    <td>{{ $bcRule->bcGoal->name }}</td>
                                    {{-- <td>{{ $bcRule->bcEvidence->code_name }}</td> --}}
                                    <td>{{ $bcRule->bcEvidence->name }}</td>
                                    <td>{{ $bcRule->code_name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="text-muted dropdown-toggle font-size-18" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"
                                                    href="{{ route('bcRules.edit', [$bcRule->id]) }}">Edit</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('bcRules.show', [$bcRule->id]) }}">Detail</a>
                                                {!! Form::open(['route' => ['bcRules.destroy', $bcRule->id], 'method' => 'delete']) !!}
                                                {!! Form::button('Delete', [
                                                    'type' => 'submit',
                                                    'class' => 'dropdown-item',
                                                    'onclick' => "return confirm('Are you sure?')",
                                                ]) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> {{-- col --}}
            {{-- <div class="col-sm-4">
                <table class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
                    <thead>
                        <tr>
                            <th scope="col">Code Goal</th>
                            <th scope="col">Code Evidence</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataRelasi as $relasi)
                        <tr>
                            <td>{{ $relasi['goalCodes'] }}</td>
                            <td>{{ $relasi['evidenceCodes'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
        </div> {{-- end row --}}

    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $bcRules])
        </div>
    </div>
</div>
