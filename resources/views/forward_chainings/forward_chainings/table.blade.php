<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-2">
            <h5 class="card-title">
                Forward Chainings 
            </h5>
        <div class="ms-auto">
            <div class="dropdown">
                @can('forwardChaining.index')
                <a href="{{ route('forwardChainings.create') }}" class="btn btn-primary float-right"> Tambah Data </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
            <thead>
            <tr>
                <th>Project Id</th>
                <th>Project Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
            @foreach($forwardChainings as $forwardChaining)
                <tr>
                    <td>{{ $forwardChaining->project_id }}</td>
                    <td>{{ $forwardChaining->project->title}}</td>
                    <td>{{ $forwardChaining->project->created_at}}</td>
                    <td>{{ $forwardChaining->project->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $forwardChainings])
        </div>
    </div>
</div>
