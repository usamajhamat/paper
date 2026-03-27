@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form class="card" id="chapterForm" method="post" action="{{route('chapter-save')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add Chapter</h3>
                    <div class="card-options">
                        <a href="{{route('chapter-list')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-list"></i> Chapter List</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="course">Course</label>
                                <select class="form-control custom-select" name="course" id="course">
                                    <option value="">--Select--</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="classes">Class</label>
                                <select class="form-control custom-select" id="classes" name="class">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="subjects">Subjects</label>
                                <select class="form-control custom-select" id="subjects" name="subject">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Chapter Name</label>
                                <input type="text" id="chapter" class="form-control" name="chapter"  placeholder="Chapter Name" value="{{old('subject')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Chapter Number</label>
                                <input type="number" id="num" class="form-control" name="number"  placeholder="Chapter Number" value="{{old('subject')}}">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save Subject</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({

            });

            $(document).on('submit', '#chapterForm', function (e) {
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
                            $('#chapter').val('');
                            $('#num').val('');

                        }else if (data.status==false)
                        {
                            notification('error',data.msg);
                            // $('#courses').html(data.courses);
                        }
                    },
                    error: function (reject) {
                        if( reject.status === 422 ) {
                            var errors = $.parseJSON(reject.responseText);
                            $.each(errors, function (key, val) {
                                if(val.class!=null)
                                {
                                    notification('error',val.class);
                                }else if (val.course!=null)
                                {
                                    notification('error',val.course);
                                }
                                else if (val.subject!=null)
                                {
                                    notification('error',val.subject);
                                }
                                else if (val.chapter!=null)
                                {
                                    notification('error',val.chapter);
                                }
                                // else if (val.number!=null)
                                // {
                                //     notification('error',val.number);
                                // }

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
                $.ajax({
                    type:'GET',
                    url:$(this).attr('href'),
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
            });


        })
    </script>
@endpush

@push('script')
    <script>
        $(document).ready(function () {

            $('#chapterForm').validate({

                rules: {
                    course: {
                        required: true,
                    },
                    class: {
                        required: true,
                    },
                    subject: {
                        required: true,
                    },
                    chapter: {
                        required: true,
                    },
                    // number: {
                    //     required: true,
                    // },
                },

                messages: {
                    course: "course name is required",
                    class: "class name is required",
                    subject: "subject name is required",
                    chapter: "chapter name is required",
                    // number: "chapter number is required",
                }
            });



        });
        $(document.body).on('click', '#editClassBtn', function(){
            $('#editForm').validate(
                {

                    rules: {
                        course: {
                            required: true,
                        },
                        class: {
                            required: true,
                        },
                        subject: {
                            required: true,
                        },
                        chapter: {
                            required: true,
                        },
                        // number: {
                        //     required: true,
                        // },
                    },

                    messages: {
                        course: "course name is required",
                        class: "class name is required",
                        subject: "subject name is required",
                        chapter: "chapter name is required",
                        // number: "chapter number is required",
                    }
                }
            );
        });
    </script>
@endpush