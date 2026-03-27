@extends('admin.layout.master')
@section('content')
    <div class="row row-deck">
        <div class="col-lg-12">
            <form class="card" id="customerForm" method="post" action="{{route('customer-update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$customer->id}}">
                <input type="hidden" name="oldPhoto" value="{{$customer->photo}}">
                <input type="hidden" name="oldLogo" value="{{$customer->logo}}">
                <div class="card-header">
                    <h3 class="card-title">Edit Customer Form</h3>
                    <div class="card-options">
                        <a href="{{route('customer-list')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-list"></i> Customer List</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Name" value="{{$customer->name}}">
                                @error('name')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone"  placeholder="Phone#" value="{{$customer->phone}}">
                                @error('phone')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">School Name</label>
                                <input type="text" class="form-control" name="school"  placeholder="School name" value="{{$customer->school_name}}">
                                @error('school')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address"  placeholder="Address" value="{{$customer->address}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Joining Date</label>
                                <input type="date" class="form-control fc-datepicker" name="join"  placeholder="MM/DD/YYYY" value="{{$customer->created_at}}">
                                @error('school')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Expiry Date</label>
                                <input type="date" class="form-control fc-datepicker" name="expire"  placeholder="MM/DD/YYYY" value="{{$customer->expired_at}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Sale Price</label>
                                <input type="number" class="form-control" name="price"  placeholder="price" value="{{$customer->price}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Account Status</label>
                                <select class="form-control custom-select" name="status">
                                    @if($customer->status==1)
                                        <option value="1" selected>Enabled</option>
                                        <option value="0">Disabled</option>
                                        @else
                                        <option value="1">Enabled</option>
                                        <option value="0" selected>Disabled</option>
                                    @endif

                                </select>
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
                                <label class="form-label">Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="logo">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username"  placeholder="username" value="{{$customer->email}}">
                                @error('username')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"  placeholder="Password" value="{{$customer->password}}">
                                @error('password')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Update Customer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('script')
    <script>
        $(document).ready(function () {

            $('#customerForm').validate({
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
                    phone: {
                        required: true,
                    }
                },
                messages: {
                    name: "user name is required",
                    username: "username is required",
                    phone: "phone number is required",
                    password: "password is required",
                }

            });

        });
    </script>
@endpush