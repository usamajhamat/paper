@extends('admin.layout.master')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <form class="card" id="searchForm" method="post" action="{{route('subject-search')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Search</h3>
                    <div class="card-options">
                        <a href="{{route('subject-add')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-plus"></i> Add Subject</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="classes">Class</label>
                                <select class="form-control custom-select" id="classes" name="class">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary"> Search</button>
                </div>
            </form>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card" style="display:none;" id="dt">
                <div class="card-header">
                    <h3 class="card-title ">Subject List</h3>
                    <div class="card-options">
                    </div>
                </div>
                <div class="card-body" id="subjectData">
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->

        </div>

    </div>


    <div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="subjectModal" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="classModal">Edit Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="editForm" method="post" action="{{route('subject-update')}}" enctype="multipart/form-data">
                        @csrf

                    </form>
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

            $(document).on('submit', '#searchForm', function (e) {
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:$(this).attr('action'),
                    data:$(this).serialize(),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        $('#dt').show()
                        $('#subjectData').html(data.subjects)
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
                        $('#editForm').html(data.subject);
                        $('#subjectModal').modal('show');

                    }
                });
            });

            $(document).on('submit', '#editForm', function (e) {
                e.preventDefault();
                if($('#editForm').valid())
                {
                    var form= $('#editForm')[0];
                    var data = new FormData(form);
                    $.ajax({
                        type:'POST',
                        enctype: 'multipart/form-data',
                        url:$('#editForm').attr('action'),
                        dataType: "JSON",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 800000,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            console.log(data)
                            if(data.status==true)
                            {
                                notification('success',data.msg);
                                $('#subjectModal').modal('hide');
                                $('#subjectData').html(data.subjects);

                            }else if (data.status==false)
                            {
                                notification('error',data.msg);
                                $('#subjectModal').modal('hide');
                                $('#subjectData').html(data.subjects);
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


        });
        function remove(url) {
            $.ajax({
                type:'GET',
                url:url,
                success:function(data){
                    if(data.status==true)
                    {
                        notification('success',data.msg);
                        $('#subjectData').html(data.subjects);

                    }else if (data.status==false)
                    {
                        notification('error',data.msg);
                        $('#subjectData').html(data.subjects);
                    }
                }
            });
        }
    </script>
@endpush

@push('script')
    <script>
        $(document.body).on('click', '#editSubjectBtn', function(){
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
                    },

                    messages: {
                        course: "course name is required",
                        class: "class name is required",
                        subject: "subject name is required",
                    }
                }
            );
        });
    </script>
@endpush