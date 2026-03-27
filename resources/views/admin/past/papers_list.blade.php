@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form class="card" id="searchForm" method="post" action="{{route('past-search')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Search Past Paper</h3>
                    <div class="card-options">
                        <a href="{{route('past-add')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-plus"></i> Add Paper</a>
                    </div>
                </div>
                <div class="card-body">
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
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Search Paper</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card" style="display:none;" id="dt">
                <div class="card-header">
                    <h3 class="card-title ">Papers List</h3>
                    <div class="card-options">
                    </div>
                </div>
                <div class="card-body" id="paperData">
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->

        </div>

    </div>

    <div class="modal fade" id="paperModal" tabindex="-1" role="dialog" aria-labelledby="paperModal" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h5 class="modal-title" id="classModal">Past Paper</h5>--}}
                    <button class="print">
                        <span aria-hidden="true"><i class="fa fa-print"></i></span>
                    </button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="printable">
                    <img src="" id="paper-ing">
                </div>
            </div>
        </div>
    </div>

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

            $(document).on('submit', '#searchForm', function (e) {
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:$(this).attr('action'),
                    data:$(this).serialize(),
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