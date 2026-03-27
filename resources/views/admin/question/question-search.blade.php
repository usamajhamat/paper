@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form class="card" id="questionForm" method="post" action="{{route('question-search')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Search Question</h3>
                    <div class="card-options">
                        {{--<a href="{{route('topic-list')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-list"></i> Topics List</a>--}}
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">
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

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="classes">Class</label>
                                <select class="form-control custom-select" id="classes" name="class">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="subjects">Subjects</label>
                                <select class="form-control custom-select" id="subjects" name="subject">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="chapters">Chapter</label>
                                <select class="form-control custom-select chapter" id="chapters" name="chapter">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="topics">Topics</label>
                                <select class="form-control custom-select" id="topics" name="topic">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="types">Question Type</label>
                                <select class="form-control custom-select" id="types" name="q_type">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="priorities">Question Priority</label>
                                <select class="form-control custom-select" id="priorities" name="priority">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="mediums">Medium</label>
                                <select class="form-control custom-select" id="mediums" name="medium">
                                    <option value="">select</option>
                                    <option value="0">All</option>
                                    @foreach($mediums as $medium)
                                        <option value="{{$medium->medium_id}}">{{$medium->medium_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Search Question</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row" style="display: none" id="rh">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title ">Questions List</h3>
                    <div class="card-options">
                    </div>
                </div>
                <div class="card-body" id="questions">
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="questionModal">Edit Question</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('question-update')}}" id="eQForm" method="post">
                        @csrf

                    </form>
                </div>
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    {{--<button type="submit" id="quBtn" class="btn btn-primary">Save Changes</button>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

@endsection
@push('style')
    @include('editor.my-editor');
@endpush

@push('script')

    <script>
        $(document).ready(function() {
            $("#questionModal").on("hidden.bs.modal", function() {
                $(this).find('form').trigger('reset');
            });
        });
        // $('#questionModal').on('hide.bs.modal', function () {
        //     //tinyMCE.editors=[];
        //     $(this).find('form').trigger('reset');
        //     tinymce.remove('.te');
        //     tinymce.remove('.eng');
        //
        // });
        $(document).ready(function () {

            $('#userTable').DataTable({

            });


            $(document).on('submit', '#questionForm', function (e) {
                e.preventDefault();
                var data=$(this).serialize();
                var url=$(this).attr('action');
                $.ajax({
                    type:'Post',
                    url:url,
                    data:data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        $('#questions').html(data);
                        $('#rh').show();
                        //console.log(data)
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

                        $('#eQForm').html(data.data);
                        $('#questionModal').modal('show');

                    }
                });
            });

            $(document).on('submit', '#eQForm', function (e) {
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:$(this).attr('action'),
                    data:$(this).serialize(),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        //$('#eQForm').html(data.data);
                         console.log(data)
                        $('#questionModal').modal('hide');
                       $('#questions').html(data);
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

            $(document).on('change', '#chapters', function (e) {
                e.preventDefault();
                var url = '{{route('chapter-priority','')}}' + '/' +$(this).val();
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (data) {
                        var option = '<option value="">Select</option>';
                        option += '<option value="0">All</option>';

                        $.each(data.types, function (key, val) {
                            option += "<option value='" + val.priority_id + "'>" + val.priority_name + "</option>";
                        });
                        $('#priorities').html(option);

                    }
                });
            });



        });
        function remove(url) {
            $.ajax({
                type:'GET',
                url:url,
                success:function(data){
                    $('#questions').html(data);
                   // $('#rh').show();
                }
            });
        }

    </script>
@endpush

@push('script')
    <script>
        $(document).ready(function () {

            $('#questionForm').validate({
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

                    q_type: {
                        required: true,
                    },
                    chapter: {
                        required: true,
                    },
                    priority: {
                        required: true,
                    },
                    medium: {
                        required: true,
                    }
                },
                messages: {
                    course: "course name is required",
                    class: "class name is required",
                    subject: "subject name is required",
                    // topic: "topic name is required",
                    chapter: "chapter name is required",
                    q_type: "question type is required",
                    priority: "question priority is required",
                    medium: "question medium is required"
                }
            });

        });
    </script>
@endpush