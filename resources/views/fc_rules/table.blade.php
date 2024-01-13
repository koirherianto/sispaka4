<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Fc Rules 
            </h5>
        <div class="ms-auto">
            <div class="dropdown">
                @can('fcRule.index')
                <a href="{{ route('fcRules.create') }}" class="btn btn-primary float-right"> Tambah Data </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
            <thead>
            <tr>
                <th>Fc Goal Id</th>
                <th>Fc Evidence Id</th>
                <th>Fc Rule Code Id</th>
                <th>Optional Question</th>
                <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($fcRules as $fcRule)
                <tr>
                    <td>{{ $fcRule->fc_goal_id }}</td>
                    <td>{{ $fcRule->fc_evidence_id }}</td>
                    <td>{{ $fcRule->fc_rule_code_id }}</td>
                    <td>{{ $fcRule->optional_question }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['fcRules.destroy', $fcRule->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            @can('fcRule.index')
                            <a href="{{ route('fcRules.show', [$fcRule->id]) }}" class='btn btn-primary btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @endcan
                            @can('fcRule.edit')
                            <a href="{{ route('fcRules.edit', [$fcRule->id]) }}" class='btn btn-warning btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan
                            @can('fcRule.destroy')
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            @endcan
                        </div>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="text-muted dropdown-toggle font-size-18" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('fcRules.edit', [$fcRule->id]) }}">Edit</a>
                                <a class="dropdown-item" href="{{ route('fcRules.show', [$fcRule->id]) }}">Detail</a>
                                {!! Form::open(['route' => ['fcRules.destroy', $fcRule->id], 'method' => 'delete']) !!}
                                {!! Form::button('Delete', ['type' => 'submit', 'class' => 'dropdown-item', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $fcRules])
        </div>
    </div>
</div>
