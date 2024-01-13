<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Goals / Results | {{ $currentProject->title }}
            </h5>
        <div class="ms-auto">
            <div class="dropdown">
                @can('fcGoal.index')
                <a href="{{ route('fcGoals.create') }}" class="btn btn-primary float-right"> Add Goal </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
            <thead>
            <tr>
                <th>Name</th>
                <th>Code Name</th>
                <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($fcGoals as $fcGoal)
                <tr>
                    <td>{{ $fcGoal->name }}</td>
                    <td>{{ $fcGoal->code_name }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['fcGoals.destroy', $fcGoal->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            @can('fcGoal.index')
                            <a href="{{ route('fcGoals.show', [$fcGoal->id]) }}" class='btn btn-primary btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @endcan
                            @can('fcGoal.edit')
                            <a href="{{ route('fcGoals.edit', [$fcGoal->id]) }}" class='btn btn-warning btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan
                            @can('fcGoal.destroy')
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            @endcan
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $fcGoals])
        </div>
    </div>
</div>
