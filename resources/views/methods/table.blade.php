<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Methods 
            </h5>
        <div class="ms-auto">
            <div class="dropdown">
                @can('method.index')
                <a href="{{ route('methods.create') }}" class="btn btn-primary float-right"> Add Data </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
            <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($methods as $method)
                <tr>
                    <td>{{ $method->name }}</td>
                    <td>{{ $method->slug }}</td>
                    <td>{{ $method->description }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['methods.destroy', $method->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            @can('method.index')
                            <a href="{{ route('methods.show', [$method->id]) }}" class='btn btn-primary btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @endcan
                            @can('method.edit')
                            <a href="{{ route('methods.edit', [$method->id]) }}" class='btn btn-warning btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan
                            @can('method.destroy')
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
                                <a class="dropdown-item" href="{{ route('methods.edit', [$method->id]) }}">Edit</a>
                                <a class="dropdown-item" href="{{ route('methods.show', [$method->id]) }}">Detail</a>
                                {!! Form::open(['route' => ['methods.destroy', $method->id], 'method' => 'delete']) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $methods])
        </div>
    </div>
</div>
