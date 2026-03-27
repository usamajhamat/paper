@extends('admin.layout.master')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <form class="card" id="searchForm" method="post" action="{{route('topic-search')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Search</h3>
                    <div class="card-options">
                        <a href="{{route('topic-add')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-plus"></i> Add Topic</a>
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
                                <select class="form-control custom-select" id="chapters" name="chapter">

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
                    <h3 class="card-title ">Topics List</h3>
                    <div class="card-options">
                    </div>
                </div>
                <div class="card-body" id="topicData">
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->

        </div>

    </div>


    <div class="modal fade" id="topicModal" tabindex="-1" role="dialog" aria-labelledby="topicModal" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="topicModal">Edit Topic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="editForm" method="post" action="{{route('topic-update')}}" enctype="multipart/form-data">
                        @csrf

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="editTopicBtn" class="btn btn-primary">Save changes</button>
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
                        $('#dt').show();
                        $('#topicData').html(data.topics)
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
                var url='{{route('topic-search','')}}'+'/'+$('#boards').val();
                $.ajax({
                    type:'GET',
                    url:url,
                    success:function(data){

                        if(data.status==true)
                        {
                            $('#topicData').html(data.classes);
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
                        console.log(data);
                        $('#editForm').html(data.topic);
                        $('#topicModal').modal('show');

                    }
                });
            });

            $(document).on('click', '#editTopicBtn', function (e) {
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
                            $('#topicModal').modal('hide');
                            $('#topicData').html(data.topics);

                        }else if (data.status==false)
                        {
                            notification('error',data.msg);
                            $('#topicModal').modal('hide');
                            $('#topicData').html(data.topics);
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
                                else if (val.topic!=null)
                                {
                                    notification('error',val.topic);
                                }
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
                    console.log(data)
                    if(data.status==true)
                    {
                        notification('success',data.msg);
                        $('#topicData').html(data.topics);

                    }else if (data.status==false)
                    {
                        notification('error',data.msg);
                        $('#topicData').html(data.topics);
                    }
                }
            });

        }
    </script>
@endpush