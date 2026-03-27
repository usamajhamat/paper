@extends('admin.layout.master')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <form class="card" id="classForm" method="post" action="{{route('class-save')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add Classes Form</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Course</label>
                                <select class="form-control custom-select" name="course">
                                    <option value="">--Select--</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Class Name</label>
                                <input type="text" class="form-control" name="class"  placeholder="Name" value="{{old('class')}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Class In Number</label>
                                <input type="text" class="form-control" name="num" id="num"  placeholder="Number" value="{{old('class')}}">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save Class</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title ">Classes List</h3>
                    <div class="card-options">
                        <div class="form-group">
                            <label class="form-label"></label>
                            <div class="row gutters-xs">
                                <div class="col">
                                    <select class="form-control select2 custom-select" id="boards" data-placeholder="Choose one">
                                        <option label="Choose Course"></option>
                                        @foreach($courses as $course)
                                            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="col-auto">
                                    <button class="btn btn-primary searchBtn" type="button"><i class="fe fe-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="boardData">
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->

        </div>

    </div>


    <div class="modal fade" id="classModal" tabindex="-1" role="dialog" aria-labelledby="classModal" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="classModal">Edit Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="editForm" method="post" action="{{route('class-update')}}" enctype="multipart/form-data">
                        @csrf

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="editClassBtn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({

            });


            $(document).on('submit', '#classForm', function (e) {
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
                           // $('#courses').html(data.courses);

                        }else if (data.status==false)
                        {
                            notification('error',data.msg);
                            $('#name').html('');
                            $('#num').html('');
                        }
                    },
                    error: function (reject) {
                        if( reject.status === 422 ) {
                            var errors = $.parseJSON(reject.responseText);
                            $.each(errors, function (key, val) {
                                console.log(val);
                                if(val.class!=null)
                                {
                                    notification('error',val.class);
                                }else if (val.course!=null)
                                {
                                    notification('error',val.course);
                                }

                            });
                        }
                    }
                });
            });

            $(document).on('click', '.searchBtn', function (e) {
                e.preventDefault();
                var url='{{route('classes-by-course','')}}'+'/'+$('#boards').val();
                $.ajax({
                    type:'GET',
                    url:url,
                    success:function(data){

                        if(data.status==true)
                        {
                            $('#boardData').html(data.classes);
                        }
                    }
                });
            });

            $(document).on('click', '.remove', function (e) {
                e.preventDefault();
                var url=$(this).attr('href');
                confirmBox(url);
            });

            $(document).on('click', '.edit', function (e) {
                e.preventDefault();
                $.ajax({
                    type:'GET',
                    url:$(this).attr('href'),
                    success:function(data){
                        $('#editForm').html(data.class);
                        $('#classModal').modal('show');

                    }
                });
            });

            $(document).on('click', '#editClassBtn', function (e) {
                e.preventDefault();
                if($('#editForm').valid())
                {
                    $.ajax({
                        type:'POST',
                        url:$('#editForm').attr('action'),
                        data:$('#editForm').serialize(),
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            if(data.status==true)
                            {
                                notification('success',data.msg);
                                $('#classModal').modal('hide');
                                $('#boardData').html(data.classes);

                            }else if (data.status==false)
                            {
                                notification('error',data.msg);
                                $('#classModal').modal('hide');
                                $('#boardData').html(data.classes);
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

                }
            });


        })

        function remove(url) {
            $.ajax({
                type:'GET',
                url:url,
                success:function(data){
                    if(data.status==true)
                    {
                        notification('success',data.msg);
                        $('#boardData').html(data.classes);

                    }else if (data.status==false)
                    {
                        notification('error',data.msg);
                        $('#boardData').html(data.classes);
                    }
                }
            });

        }
    </script>
@endpush
@push('script')
    <script>
        $(document).ready(function () {

            $('#classForm').validate({
                rules: {
                    course: {
                        required: true,
                    },
                    class: {
                        required: true,
                    },
                    num: {
                        required: true,
                    },
                },
                messages: {
                    course: "course name is required",
                    class: "class name is required",
                    num: "class in number is required",
                }
            });



        });
        $(document.body).on('click', '#editClassBtn', function(){
            $('#editForm').validate({
                rules: {
                    course: {
                        required: true,
                    },
                    class: {
                        required: true,
                    },
                    num: {
                        required: true,
                    }
                },
                messages: {
                    course: "course name is required",
                    class: "class name is required",
                    num: "class in number is required",

                }
            });
        });
    </script>
@endpush