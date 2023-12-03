<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Projects 
            </h5>
        <div class="ms-auto">
            <div class="dropdown">
                @can('project.index')
                <a href="{{ route('projects.create') }}" class="btn btn-primary float-right"> Tambah Data </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
            <thead>
            <tr>
                <th>Title</th>
                <th>Status Publish</th>
                <th>Slug</th>
                <th>Seo Keyword</th>
                <th>Seo Description</th>
                <th>Content</th>
                <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->status_publish }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->seo_keyword }}</td>
                    <td>{{ $project->seo_description }}</td>
                    <td>{{ $project->content }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            @can('project.index')
                            <a href="{{ route('projects.show', [$project->id]) }}" class='btn btn-primary btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @endcan
                            @can('project.edit')
                            <a href="{{ route('projects.edit', [$project->id]) }}" class='btn btn-warning btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan
                            @can('project.destroy')
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
                                <a class="dropdown-item" href="{{ route('projects.edit', [$project->id]) }}">Edit</a>
                                <a class="dropdown-item" href="{{ route('projects.show', [$project->id]) }}">Detail</a>
                                {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $projects])
        </div>
    </div>
</div>