@extends('client.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-search"></i> Search Past Paper</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        {{--<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>--}}
                    </div>
                </div>
                <div class="card-body">
                    <form  id="searchForm" method="post" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="board">Boards</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="board" id="board">
                                            <option value="">--Select--</option>
                                            @foreach($boards as $board)
                                                <option value="{{$board->board_id}}">{{$board->board_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="class">Class</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="class" id="class">
                                            <option value="">--Select--</option>
                                            @foreach($classes as $class)
                                                <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="subject">Subject</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="subject" id="subject">
                                            <option value="">--Select--</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>

                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="submit" id="btnSearch" class="btn btn-primary"><i class="fe fe-search mr-2"></i>Search Paper</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="paperData">

    </div>
    <div class="row">
    <div id="printable1" class="print">
        <img src="" class="img">
    </div>

@endsection

@push('script')
    <script>
        $(function() {
            $('.print').click(function() {
                $('#printable').printThis();
            });
            $(document).on('click','.print1',function(e) {
                e.preventDefault();
                var paper=$(this).attr('href');
                var img='<img src="'+paper+'">';
                // $('.img').attr('src',paper);
                $(img).printThis();
            });
        });
        $(document).ready(function () {
            $('#searchForm').validate({
                rules: {
                    board: {
                        required: true,
                    },
                    class: {
                        required: true,
                    },
                    subject: {
                        required: true
                    }
                },
                messages: {
                    board: "board name is required",
                    class: "class name is required",
                    subject: "subject name is required"
                },
                errorPlacement: function(error, element) {
                    $(element).parents('.form-group').append(error)
                }
            });

            $(document).on('click', '#btnSearch', function (e) {
                e.preventDefault();
                //$('searchForm').submit()
                var url="{{route('client-past-search')}}";
                var data=$('#searchForm').serialize();
                $.ajax({
                    type:'POST',
                    url:url,
                    data:data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        $('#dt').show();
                        $('#paperData').html(data.papers)
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
                        $('#editForm').html(data.subject);
                        $('#chapterModal').modal('show');

                    }
                });
            });
            $(document).on('click', '.detail', function (e) {
                e.preventDefault();
                $.ajax({
                    type:'GET',
                    url:$(this).attr('href'),
                    success:function(data){
                        $("#paper-ing").attr("src",data.paper);
                        $('#paperModal').modal('show')
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
                        $('#paperData').html(data.papers)
                    }
                }
            });
        }
    </script>

@endpush