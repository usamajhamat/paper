@extends('admin.layout.master')
@section('content')


    <div class="row">
        <div class="col-lg-4">
            <form class="card" id="courseForm" method="post" action="{{route('course-save')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add Course Form</h3>
                    {{--<div class="card-options">--}}
                        {{--<a href="{{route('admin-list')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-list"></i>Users List</a>--}}
                    {{--</div>--}}
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Name" value="{{old('name')}}">
                                @error('name')
                                 <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Descriptive Name</label>
                                <input type="text" class="form-control" name="short" id="short1"  placeholder="Short Name" value="{{old('short')}}">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save Course</button>
                </div>
            </form>
        </div>

        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title ">Courses List</h3>
                    <div class="card-options">
                        {{--<a href="{{route('customer-add')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-list"></i> Add Customer</a>--}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                            <thead class="bg-light">
                            <tr>

                                {{--<th scope="col">ID</th>--}}
                                <th width="80%">Course Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="courses">
                            @foreach($courses as $course)
                                <tr>
                                    {{--<th scope="row">{{$course->course_id}}</th>--}}
                                    @if($course->descriptive_name!=null)
                                        <td>{{$course->course_name}} (<small>{{$course->descriptive_name}}</small>)</td>
                                        @else
                                        <td>{{$course->course_name}}</td>
                                    @endif


                                    <td>
                                        <a class="btn btn-sm btn-info edit" href="{{route('course-edit',$course->course_id)}}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger remove" href="{{route('course-remove',$course->course_id)}}"><i class="fa fa-trash"></i> Delete</a>
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

    <div id="courseModal" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Edit Course</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form  method="post" action="{{route('course-update')}}" id="editForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="c_name" name="name"  placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Descriptive Name</label>
                                    <input type="text" class="form-control" name="short" id="short"  placeholder="Short Name" value="{{old('short')}}">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update Course</button>
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

            $(document).on('submit', '#courseForm', function (e) {
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:$(this).attr('action'),
                    data:$(this).serialize(),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        if(data.status==true)
                        {
                            notification('success',data.msg)
                            $('#courses').html(data.courses);
                            $('#name').val('');
                            $('#short1').val('');

                        }else if (data.status==false)
                        {
                            notification('error',data.msg);
                            $('#courses').html(data.courses);
                        }
                    },
                    error: function (reject) {
                    if( reject.status === 422 ) {
                        var errors = $.parseJSON(reject.responseText);
                        $.each(errors, function (key, val) {
                            notification('error',val.name)
                        });
                    }
                }
                });
            });

            $(document).on('click', '.remove', function (e) {
                e.preventDefault();
               var url=$(this).attr('href');
                confirmBox(url)
            });

            $(document).on('click', '.edit', function (e) {
                e.preventDefault();
                $.ajax({
                    type:'GET',
                    url:$(this).attr('href'),
                    success:function(data){
                        $('#id').val(data.course.course_id);
                        $('#c_name').val(data.course.course_name);
                        $('#short').val(data.course.descriptive_name);
                        $('#courseModal').modal('show');
                    }
                });
            });

            $(document).on('submit', '#editForm', function (e) {
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:$(this).attr('action'),
                    data:$(this).serialize(),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        if(data.status==true)
                        {
                            notification('success',data.msg);
                            $('#courseModal').modal('hide');
                            $('#courses').html(data.courses);

                        }else if (data.status==false)
                        {
                            notification('error',data.msg);
                            $('#courseModal').modal('hide');
                            $('#courses').html(data.courses);
                        }
                    },
                    error: function (reject) {
                        if( reject.status === 422 ) {
                            var errors = $.parseJSON(reject.responseText);
                            $.each(errors, function (key, val) {
                                notification('error',val.name)
                            });
                        }
                    }
                });
            });


        });
        function remove(url) {
            $.ajax({
                type:'GET',
                url:url,
                success:function(data){
                    if(data.status==true)
                    {
                        notification('success',data.msg);
                        $('#courses').html(data.courses);

                    }else if (data.status==false)
                    {
                        notification('error',data.msg);
                        $('#courses').html(data.courses);
                    }
                }
            });
        }
    </script>
@endpush

@push('script')
    <script>
        $(document).ready(function () {

            $('#courseForm').validate({
                rules: {
                    name: {
                        required: true,
                    }
                },
                messages: {
                    name: "course name is required",
                }
            });

            $('#editForm').validate({
                rules: {
                    name: {
                        required: true,
                    }
                },
                messages: {
                    name: "course name is required",
                }
            });

        });
    </script>
@endpush