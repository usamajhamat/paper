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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Detail</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap w-100">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{$user->gender}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>{{$user->role_name}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection