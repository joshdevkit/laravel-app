@extends('templates.admin.header')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Update User's Data</h1>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 mb-2">
                    <hr class="border-2 border-primary">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>User Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input  type="text" name="fullname" id="fullname"
                                    class="form-control @error('fullname') is-invalid @enderror"
                                    value="{{ $userdata->fullname }}">
                                @error('fullname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="usertype">User Role</label>
                                <select  name="usertype" id="usertype"
                                    class="form-control @error('usertype') is-invalid @enderror">
                                    <option value="">Select Role</option>
                                    <option value="1" {{ $userdata->type == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $userdata->type == '2' ? 'selected' : '' }}>Manager</option>
                                    <option value="3" {{ $userdata->type == '3' ? 'selected' : '' }}>Member</option>
                                    <option value="0" {{ $userdata->type == '0' ? 'selected' : '' }}>Owner</option>
                                </select>
                                @error('usertype')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="avatar">New Password</label>
                                <div class="custom-file">
                                    <input  type="password" name="new_password" id="avatar" class="form-control @error('new_password') is-invalid @enderror">
                                </div>
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="avatar">Confirm New Password</label>
                                <div class="custom-file">
                                    <input type="password" name="password_confirm" id="avatar" class="form-control @error('password_confirm') is-invalid @enderror">
                                </div>
                                @error('password_confirm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input readonly type="email" name="email" id="email"
                                    class="form-control"
                                    value="{{ $userdata->email }}">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <div class="custom-file">
                                    <input  type="file" name="new_avatar" id="avatar"
                                        class="custom-file-input @error('avatar') is-invalid @enderror" accept="image/*">
                                    <label class="custom-file-label" for="avatar">Choose file</label>
                                </div>
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <img id="avatar-preview"
                                    src="{{ asset('storage/avatars/' . basename($userdata->avatar)) }}"
                                    alt="Avatar Preview" class="img-fluid rounded-circle"
                                    style="height: 15vh; width: 15vh; border: 1px solid #dee2e6 !important">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer justify-content-end">
                        <input type="hidden" name="userId" value="{{ $userdata->id }}">
                        <input type="hidden" name="oldImage" value="{{ $userdata->avatar }}">
                        <a class="btn btn-secondary float-right ml-2" href="{{ route('admin.dashboard') }}">Discard</a>
                        <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('avatar').addEventListener('change', function(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.getElementById('avatar-preview');
                img.src = reader.result;
            };

            reader.readAsDataURL(input.files[0]);
        });
    </script>
@endsection
