<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Goals | {{ $currentProject->title }}
            </h5>
        <div class="ms-auto">
            <div class="dropdown">
                @can('bcGoal.index')
                <a href="{{ route('bcGoals.create') }}" class="btn btn-primary float-right"> Add Goal</a>
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
                <th>Reason</th>
                <th>Solution</th>
                <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($bcGoals as $bcGoal)
                <tr>
                    <td>{{ $bcGoal->name }}</td>
                    <td>{{ $bcGoal->code_name }}</td>
                    <td>{{ $bcGoal->reason }}</td>
                    <td>{{ $bcGoal->solution }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['bcGoals.destroy', $bcGoal->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            @can('bcGoal.index')
                            <a href="{{ route('bcGoals.show', [$bcGoal->id]) }}" class='btn btn-primary btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @endcan
                            @can('bcGoal.edit')
                            <a href="{{ route('bcGoals.edit', [$bcGoal->id]) }}" class='btn btn-warning btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan
                            @can('bcGoal.destroy')
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
            @include('adminlte-templates::common.paginate', ['records' => $bcGoals])
        </div>
    </div>
</div>