@extends('templates.admin.header')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Home</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-3">
        <div class="card">
            <div class="card-body">
                Welcome!  {{ $user = auth()->user()->fullname  }}
            </div>
        </div>
        <div class="row mt-3 py-3">
            <div class="col-m-d-8 col-lg-8 col-sm-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h5>Project Progress</h5>
                    </div>
                    <div class="card-body">
                        <table class="table m-0 table-hover table-sm">
                            <colgroup>
                              <col width="5%">
                              <col width="30%">
                              <col width="35%">
                              <col width="15%">
                              <col width="15%">
                            </colgroup>
                            <thead>
                              <th>#</th>
                              <th>Project</th>
                              <th>Progress</th>
                              <th>Status</th>
                              <th></th>
                            </thead>
                            <tbody>
                                @foreach ($projects as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->project_name }}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar {{ $row->totalPercentage >= 1 && $row->totalPercentage <= 10 ? 'bg-danger' : ($row->totalPercentage >= 11 && $row->totalPercentage <= 20 ? 'bg-warning' : ($row->totalPercentage >= 21 && $row->totalPercentage <= 40 ? 'bg-info' : 'bg-success')) }}" role="progressbar" style="width: {{ $row->totalPercentage }}%;" aria-valuenow="{{ $row->totalPercentage }}" aria-valuemin="0" aria-valuemax="100">{{ $row->totalPercentage }}%</div>
                                        </div>
                                    </td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <a href="/admin/projects/view-details/{{ $row->id }}" class="btn btn-sm btn-primary"><i class="fas fa-folder"></i> View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12">
                        <div class="small-box bg-light shadow-sm border">
                            <div class="inner">
                                <h3>{{ $totalProjects }}</h3>
                                <p>Total Projects</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12">
                        <div class="small-box bg-light shadow-sm border">
                            <div class="inner">
                                <h3>1</h3>
                                <p>Total Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
