@extends('admin.layout.master')
@section('content')
    <div class="row row-deck">
        <div class="col-lg-12">
            <form class="card" id="userForm" method="post" action="{{route('admin-save')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add User Form</h3>
                    <div class="card-options">
                        <a href="{{route('admin-list')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-list"></i>Users List</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Name" value="{{old('name')}}">
                                @error('name')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select class="form-control custom-select" name="gender">
                                    <option value="">--Select--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone"  placeholder="Phone#" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Role</label>
                                <select class="form-control custom-select" name="role">
                                    <option value="">--Select--</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->role_id}}">{{$role->role_name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Photo</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input"  name="photo">
                                  <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Account Status</label>
                                <select class="form-control custom-select" name="status">
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="username"  placeholder="Email or username" value="{{old('email')}}">
                                @error('username')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"  placeholder="Password" value="{{old('password')}}">
                                @error('password')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save User</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {

            $('#userForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                    role: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    }
                },
                messages: {
                    name: "user name is required",
                    gender: "gender is required",
                    username: "email or username is required",
                    password: "password is required",
                    role: "user role is required",
                }

            });

        });
    </script>
@endpush