@extends('admin.layout.master')

@section('content')



    <div class="row">

        <div class="col-md-12 col-lg-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title ">Customers List</h3>

                    <div class="card-options">

                        <a href="{{route('customer-add')}}" id="add__new__list" type="button" class="btn btn-sm btn-success mr-5"><i class="fa fa-list"></i> Add Customer</a>
                        {{-- <a onclick="window.print();" class="">Print Paper</a> --}}

                        <a href="{{ route('print_customer') }}" id="add__new__list" type="button" class="btn btn-sm btn-success ml-3"><i class="fa fa-list"></i> Print</a>
                        {{-- {{$customers}} --}}
                    </div>
                    

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table id="example" class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap w-100">

                            <thead class="bg-light">

                            <tr>



                                <th scope="col">ID</th>

                                <th>Customer Name</th>

                                <th width="45%">School Name</th>

                                <th>Status </th>

                                <th>Action</th>

                            </tr>

                            </thead>

                            <tbody>

                            @foreach($customers as $customer)

                                <tr>

                                    <th scope="row">{{$customer->id}}</th>

                                    <td>{{$customer->name}}</td>

                                    <td>{{$customer->school_name}}</td>

                                    <td>

                                        <div class="material-switch">

                                            @if($customer->status==1)

                                                <input id="someSwitchOptionSuccess{{$customer->id}}" name="someSwitchOption001" class="userStatus" type="checkbox" value="{{$customer->id}}" checked/>

                                                <label for="someSwitchOptionSuccess{{$customer->id}}" class="label-success"></label>

                                            @else

                                                <input id="someSwitchOptionSuccess{{$customer->id}}" name="someSwitchOption001" class="userStatus" value="{{$customer->id}}" type="checkbox"/>

                                                <label for="someSwitchOptionSuccess{{$customer->id}}" class="label-success"></label>

                                            @endif

                                        </div>

                                    </td>



                                    <td>

                                        <a class="btn btn-sm btn-primary" href="{{route('customer-edit',$customer->id)}}"><i class="fa fa-edit"></i> Edit</a>

                                        <a class="btn btn-sm btn-info" href="{{route('customer-profile',$customer->id)}}"><i class="fa fa-info-circle"></i> Details</a>

                                        <a class="btn btn-sm btn-danger " href="#" id="customerdelete" data-id="{{$customer->id}}"><i class="fa fa-trash"></i> Delete</a>

                                    </td>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

                <!-- table-wrapper -->

            </div>

            <!-- section-wrapper -->



        </div>

    </div>



    <div id="userModal" class="modal fade">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content ">

                <div class="modal-header pd-x-20">

                    <h6 class="modal-title">Edit User</h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body pd-20">

                    <form  method="post" action="{{route('admin-update')}}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" class="id">

                        <input type="hidden" name="oldPhoto" class="ph">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="form-label">Name</label>

                                    <input type="text" class="form-control name" name="name"  placeholder="Name">

                                    @error('name')

                                    <div class="text text-danger">{{ $message }}</div>

                                    @enderror

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="form-label">Gender</label>

                                    <select class="form-control custom-select gender" name="gender">



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

                                    <input type="text" class="form-control phone" name="phone"  placeholder="Phone#" >

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="form-label">Role</label>

                                    <select class="form-control custom-select role" name="role">

                                        <option value="">--Select--</option>

                                        {{--@foreach($roles as $role)--}}

                                        {{--<option value="{{$role->role_id}}">{{$role->role_name}}</option>--}}

                                        {{--@endforeach--}}

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

                                    <select class="form-control custom-select status" name="status">

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

                                    <input type="text" class="form-control email" name="email"  placeholder="Email" value="{{old('email')}}">

                                    @error('email')

                                    <div class="text text-danger">{{ $message }}</div>

                                    @enderror

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="form-label">Password</label>

                                    <input type="password" name="password" class="form-control password"  placeholder="Password" value="{{old('password')}}">

                                    @error('password')

                                    <div class="text text-danger">{{ $message }}</div>

                                    @enderror

                                </div>

                            </div>



                        </div>

                        <div class="card-footer text-right">

                            <button type="submit" class="btn btn-primary">Update User</button>

                        </div>

                    </form>





                </div><!-- modal-body -->

            </div>

        </div><!-- modal-dialog -->

    </div><!-- modal -->



@endsection



@push('script')

    <script>

        $(document).ready(function () {

            $('#userTable').DataTable({



            });



            $(document).on('click','.edit',function (e) {

                e.preventDefault();

                var url=$(this).attr('href');

                $.get(url,function (data) {

                    $('.id').val(data.user.id);

                    $('.ph').val(data.user.photo);

                    $('.name').val(data.user.name);

                    $('.email').val(data.user.email);

                    $('.phone').val(data.user.phone);

                    $('.password').val(data.user.password);

                    var gender='';

                    var status='';

                    var roles='';

                    if(data.user.gender=='Male')

                    {

                        gender +='<option value="Male" selected>Male</option>' +

                            '<option value="Female">Female</option>'

                    }else{

                        gender +='<option value="Male">Male</option>' +

                            '<option value="Female" selected>Female</option>'

                    }

                    if(data.user.status==1)

                    {

                        status +='<option value="1" selected>Active</option>' +

                            '<option value="0">Disabled</option>'

                    }else{

                        status +='<option value="1">Active</option>' +

                            '<option value="0" selected>Disabled</option>'

                    }



                    $.each(data.roles,function (i,v) {

                        if(data.user.role==v.role_id)

                        {

                            roles +='<option value="'+v.role_id+'" selected>'+v.role_name+'</option>';

                        }else{

                            roles +='<option value="'+v.role_id+'">'+v.role_name+'</option>';

                        }

                    });

                    $('.gender').html(gender);

                    $('.status').html(status);

                    $('.role').html(roles);



                });

                $('#userModal').modal('show')

            })



            $(document).on('click','.userStatus',function (e) {

                var isChecked = this.checked;

                var id=$(this).val();

                var status=isChecked==true?1:0;

                var url='{{route('customer-status',['',''])}}'+'/'+id+'/'+status;

                $.get(url,function (data) {

                    if(data.status ==true)

                    {

                        notification("success",data.message)

                    }else{

                        notification('error',data.message)

                    }

                });

            })



        })

    </script>

@endpush