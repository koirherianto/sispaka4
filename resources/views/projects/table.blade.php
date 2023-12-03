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
        <div class="row">
            @if (count($projects) == 0)
                <div class="col-md-12">
                    <div class="alert alert-info" style="text-align: center;">
                        <p>You don't have a project yet</p>
                        <a href="{{ route('projects.create') }}">
                            <p class="btn btn-light">Create a Project.</p>
                        </a>
                    </div>
                </div>
            @endif
            @foreach ($projects as $project)
                <div class="col-xl-5 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a class="text-muted dropdown-toggle font-size-16" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true">
                                    <i class="bx bx-dots-horizontal text-muted font-size-20"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Remove</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt=""
                                        class="avatar-md rounded-circle img-thumbnail">
                                </div>
                                <div class="flex-1 ms-3">
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">{{ $project->title }}</a>
                                    </h5>
                                    <span class="badge badge-soft-danger mb-0">UI/UX Designer</span>
                                </div>
                            </div>

                            <p class="text-muted mt-3 mb-0">Curabitur non magna lobortis tempus gravida ornare libero
                                sed diam
                                sed fringilla est.</p>

                            <div class="mt-3 pt-1">
                                <p class="mb-0"><i
                                        class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary"></i>
                                    012 6587 1236</p>
                                <p class="mb-0 mt-2"><i
                                        class="mdi mdi-email font-size-15 align-middle pe-2 text-primary"></i>
                                    DarleneSmith@spy.com</p>
                                <p class="mb-0 mt-2"><i
                                        class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-primary"></i>
                                    57 Guildry Street GAMRIE</p>
                            </div>

                            <div class="d-flex gap-2 pt-4">
                                <button type="button" class="btn btn-soft-primary btn-sm w-50"><i
                                        class="bx bx-user me-1"></i> Profile</button>
                                <button type="button" class="btn btn-primary btn-sm w-50"><i
                                        class="bx bx-message-square-dots me-1"></i> Contact</button>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            @endforeach
        </div>

        <div class="card-footer clearfix">
            <div class="float-right">
                @include('adminlte-templates::common.paginate', ['records' => $projects])
            </div>
        </div>
    </div>


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