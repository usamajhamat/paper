@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-5 col-md-12">
            <div class="card ">
                <div class="card-body">
                    <div class="inner-all">
                        <ul class="list-unstyled">
                            <li class="text-center border-bottom-0">
                                <img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="{{url('images').'/'.$customer->photo}}" alt="User Image">
                            </li>
                            <li class="text-center">
                                <h4 class="text-capitalize mt-3 mb-0">{{$customer->name}} </h4>
                                <p class="text-muted text-capitalize">Customer</p>
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
                            <h3 class="card-title">Customer Detail</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap w-100">
                                    <tr>
                                        <th>Customer ID</th>
                                        <td>{{$customer->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$customer->name}}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$customer->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>{{$customer->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Purchased Price</th>
                                        <td>{{$customer->price}}</td>
                                    </tr>
                                    <tr>
                                        <th>School Name</th>
                                        <td>{{$customer->school_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$customer->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Added Date</th>
                                        <td>{{\Carbon\Carbon::parse($customer->created_at)->format('d M Y')}}</td>
                                    </tr>
                                    <tr>
                                        <th>Expiry Date</th>
                                        @if($customer->expired_at!=null)
                                          <td>{{\Carbon\Carbon::parse($customer->expired_at)->format('d M Y')}}</td>
                                            @else
                                            <td>Not specified</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if($customer->status==1)
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">Disabled</span>
                                            @endif
                                        </td>
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