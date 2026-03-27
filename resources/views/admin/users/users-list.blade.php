
@extends('admin.layout.master')
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title ">Users List</h3>
                    <div class="card-options">
                        <a href="{{route('admin-add')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-plus"></i> Add a new User</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap w-100">
                            <thead class="bg-light">
                            <tr>

                                <th scope="col">ID</th>
                                <th>User Name</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->role_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <div class="material-switch">
                                            @if($user->status==1)
                                                <input id="someSwitchOptionSuccess{{$user->id}}" name="someSwitchOption001" class="userStatus" type="checkbox" value="{{$user->id}}" checked/>
                                                <label for="someSwitchOptionSuccess{{$user->id}}" class="label-success"></label>
                                            @else
                                                <input id="someSwitchOptionSuccess{{$user->id}}" name="someSwitchOption001" class="userStatus" value="{{$user->id}}" type="checkbox"/>
                                                <label for="someSwitchOptionSuccess{{$user->id}}" class="label-success"></label>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        <a class="btn btn-sm btn-primary edit" href="{{route('admin-edit',$user->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-info" href="{{route('admin-profile',$user->id)}}"><i class="fa fa-info-circle"></i> Details</a>
                                        <a class="btn btn-sm btn-danger remove" href="{{route('admin-remove',$user->id)}}"><i class="fa fa-trash"></i> Delete</a>
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
                    <form  method="post" id="userForm1" action="{{route('admin-update')}}" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control email1" name="username"  placeholder="Email/username" value="{{old('email')}}">
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
                   $('.email1').val(data.user.email);
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
                var url='{{route('admin-status',['',''])}}'+'/'+id+'/'+status;
                $.get(url,function (data) {
                    if(data.status ==true)
                    {
                        notification("success",data.message)
                    }else{
                        notification('error',data.message)
                    }
                });
            });

            $(document).on('click','.remove',function (e) {
                e.preventDefault();
                var url=$(this).attr('href');
                $.confirm({
                    icon: 'fa fa-warning text-danger',
                    title: 'warning Message!',
                    content: 'Pleas make sure otherwise will lost data',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        Yes: function () {
                            location.href =url;
                        },
                        No: function () {
                                $.alert('Canceled!');
                        }
                    }
                });

            })


        })
    </script>
@endpush

@push('script')
    <script>
        $(document).ready(function () {

            $('#userForm1').validate({
                rules: {
                    name: {
                        required: true
                    },
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    role: {
                        required: true
                    },
                    gender: {
                        required: true
                    }
                },
                messages: {
                    name: "user name is required",
                    gender: "gender is required",
                    username: "username is required",
                    password: "password is required",
                    role: "user role is required",
                }

            });

        });
    </script>
@endpush