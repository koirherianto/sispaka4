<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Bc Rule Codes 
            </h5>
        <div class="ms-auto">
            <div class="dropdown">
                @can('bcRuleCode.index')
                <a href="{{ route('bcRuleCodes.create') }}" class="btn btn-primary float-right"> Tambah Data </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
            <thead>
            <tr>
                <th>Backward Chaining Id</th>
                <th>Code Name</th>
                <th>Project Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                {{-- <th colspan="3">Action</th> --}}
                </tr>
            </thead>
            <tbody>
            @foreach($bcRuleCodes as $bcRuleCode)
                <tr>
                    <td>{{ $bcRuleCode->backward_chaining_id }}</td>
                    <td>{{ $bcRuleCode->code_name }}</td>
                    <td>{{ $bcRuleCode->backwardChaining->project->title }}</td>
                    <td>{{ $bcRuleCode->created_at }}</td>
                    <td>{{ $bcRuleCode->updated_at }}</td>
                    {{-- <td>
                        <div class="dropdown">
                            <a class="text-muted dropdown-toggle font-size-18" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('bcRuleCodes.edit', [$bcRuleCode->id]) }}">Edit</a>
                                <a class="dropdown-item" href="{{ route('bcRuleCodes.show', [$bcRuleCode->id]) }}">Detail</a>
                                {!! Form::open(['route' => ['bcRuleCodes.destroy', $bcRuleCode->id], 'method' => 'delete']) !!}
                                {!! Form::button('Delete', ['type' => 'submit', 'class' => 'dropdown-item', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $bcRuleCodes])
        </div>
    </div>
</div>
