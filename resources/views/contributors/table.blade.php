<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Contributors 
            </h5>
        <div class="ms-auto">
            <div class="dropdown">
                @can('contributor.index')
                @endcan
                @can('contributor.index')
                <a href="{{ route('contributors.refresh') }}" class="btn btn-info float-right"> Refresh Account</a>
                <a href="{{ route('contributors.create') }}" class="btn btn-primary float-right"> Add Contributor </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
            <thead>
            <tr>
                <th>Have Account?</th>
                <th>Name</th>
                <th>Contribution</th>
                <th>Email</th>
                <th>Link</th>
                <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($contributors as $contributor)
                <tr>
                    <td>{{ $contributor->user_id ? 'Yes' : 'No' }}</td>
                    <td>{{ $contributor->name }}</td>
                    <td>{{ $contributor->contribution }}</td>
                    <td>{{ $contributor->email }}</td>
                    <td>{{ $contributor->link }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['contributors.destroy', $contributor->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            @can('contributor.index')
                            <a href="{{ route('contributors.show', [$contributor->id]) }}" class='btn btn-primary btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @endcan
                            @can('contributor.edit')
                            <a href="{{ route('contributors.edit', [$contributor->id]) }}" class='btn btn-warning btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan
                            @can('contributor.destroy')
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
            @include('adminlte-templates::common.paginate', ['records' => $contributors])
        </div>
    </div>
</div>
