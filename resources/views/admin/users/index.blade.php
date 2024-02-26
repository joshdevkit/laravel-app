@extends('templates.admin.header')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-sm-12 col-md-12 mt-2">
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header">
                    <h4>
                        All Users
                        <a href="{{ route('admin.create') }}" class="btn btn-primary float-right"><i
                                class="fas fa-user-plus"></i> Create New
                            User</a>
                    </h4>
                </div>
                <div  class="card-body">
                    <table id="example1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($users as $row)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <img style="height: 50px; width: 50px; border: 1px solid black;"
                                            class="rounded-circle"
                                            src="{{ asset($row->avatar) }}" alt="">
                                    </td>
                                    <td>{{ $row->fullname }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        @switch($row->type)
                                            @case(0)
                                                <span class="bg-owner">Owner</span>
                                            @break

                                            @case(2)
                                                <span class="bg-manager">Manager</span>
                                            @break

                                            @case(3)
                                                <span class="bg-member">Member</span>
                                            @break

                                            @default
                                                {{ $row->type }}
                                        @endswitch
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="/admin/users/view-data/{{ $row->id }}">View</a>
                                                <a class="dropdown-item"
                                                    href="/admin/users/edit-data/{{ $row->id }}">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
