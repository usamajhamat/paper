@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-5 col-md-12">
            <div class="card ">
                <div class="card-body">
                    <div class="inner-all">
                        <ul class="list-unstyled">
                            <li class="text-center border-bottom-0">
                                <img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="{{url('images').'/'.$user->photo}}" alt="User Image">
                            </li>
                            <li class="text-center">
                                <h4 class="text-capitalize mt-3 mb-0">{{$user->name}} </h4>
                                <p class="text-muted text-capitalize">{{$user->role_name}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-7 col-md-12">

            <div class="row">
                <div class="col-md-12">
                    <form class="card" method="post" action="{{route('admin-account-update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="oldPhoto" value="{{$user->photo}}">
                        <div class="card-header">
                            <h3 class="card-title">Account Setting Form</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email"  placeholder="Email" value="{{$user->email}}">
                                        @error('email')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"  placeholder="Password" value="{{$user->password}}">
                                        @error('password')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  name="photo">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update Setting</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection