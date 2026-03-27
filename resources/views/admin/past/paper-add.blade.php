@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form class="card" id="paperForm" method="post" action="{{route('past-save')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add Past Paper</h3>
                    <div class="card-options">
                        <a href="{{route('past-list')}}" id="add__new__list" type="button" class="btn btn-sm btn-success "><i class="fa fa-list"></i> Papers List</a>
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
                                    <span class="input-group-append">
                                        <button class="btn btn-primary extrabtn" data-url="{{route('board-save')}}" name="Board" type="button" data-toggle="modal" data-target="#extraModal">+</button>
                                    </span>
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
                                    <span class="input-group-append">
                                        <button class="btn btn-primary extrabtn" data-url="{{route('board-class-save')}}" name="Class" type="button" data-toggle="modal" data-target="#extraModal">+</button>
                                    </span>
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
                                    <span class="input-group-append">
                                        <button class="btn btn-primary extrabtn" data-url="{{route('board-subject-save')}}" name="Sujbect" type="button" data-toggle="modal" data-target="#extraModal">+</button>
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="type">Paper Type</label>
                                <div class="input-group">
                                    <select class="form-control custom-select" name="type" id="type">
                                        <option value="">--Select--</option>
                                        @foreach($types as $type)
                                          <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-append">
                                        <button class="btn btn-primary extrabtn" data-url="{{route('type-save')}}" name="Type" type="button" data-toggle="modal" data-target="#extraModal">+</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="shift">Shift</label>
                                <div class="input-group">
                                    <select class="form-control custom-select" name="shift" id="shift">
                                        <option value="">--Select--</option>
                                        @foreach($shifts as $shift)
                                           <option value="{{$shift->shift_id}}">{{$shift->shift_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-append">
                                        <button class="btn btn-primary extrabtn" data-url="{{route('shift-save')}}" name="Shift" type="button" data-toggle="modal" data-target="#extraModal">+</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Year</label>
                                <input type="number" id="year" class="form-control" name="year"  placeholder="Year" value="{{old('subject')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Upload Paper</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="paper">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save Paper</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="extraModal" tabindex="-1" role="dialog" aria-labelledby="extraModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="extraModal"></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="extraForm" method="post">
                        <input type="hidden" name="location" value="paper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label lbl"></label>
                                    <input type="text" class="form-control" id="name" name="name"  placeholder="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="editExtraBtn" class="btn btn-primary">Save Paper</button>
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

            $(document).on('click', '.extrabtn', function (e) {
                 var name=$(this).attr('name');
                 var url=$(this).data('url');
                $('.lbl').text(name+' Name');
                $('#name').attr('placeholder',name+' Name');
                $('.modal-title').text('Add '+name);
                $('#extraForm').attr('action',url);
                $('#editExtraBtn').text('Save '+name);

            });

            $(document).on('click', '#editExtraBtn', function (e) {
                e.preventDefault();
                var url=$('#extraForm').attr('action');
                var data=$('#extraForm').serialize();
                if($('#extraForm').valid())
                {
                    $.ajax({
                        type:'POST',
                        url:url,
                        data:data,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            if(data.type=='board')
                            {
                                $('#board').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='class')
                            {
                                $('#class').html(data.data);
                                $('#extraModal').modal('hide');
                            }

                            else if(data.type=='subject')
                            {
                                $('#subject').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='type')
                            {
                                $('#type').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='shift')
                            {
                                $('#shift').html(data.data);
                                $('#extraModal').modal('hide');
                            }


                        }
                    });
                }
            });

        })
    </script>
@endpush

@push('script')
    <script>
        $(document).ready(function () {

            $('#paperForm').validate({
                rules: {
                    board: {
                        required: true,
                    },
                    class: {
                        required: true,
                    },
                    subject: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
                    shift: {
                        required: true,
                    },
                    year: {
                        required: true,
                    },
                    paper: {
                        required: true,
                    }
                },
                messages: {
                    board: "board name is required",
                    class: "class name is required",
                    subject: "subject name is required",
                    type: "paper type is required",
                    shift: "paper shift  is required",
                    year: "year name is required",
                    paper: "please choose past paper"
                },
                errorPlacement: function(error, element) {
                    $(element).parents('.form-group').append(error)
                }
            });

            $('#extraForm').validate({
                rules: {
                    name: {
                        required: true,
                    }
                },
                messages: {
                    name: "this field is required"
                },
                errorPlacement: function(error, element) {
                    $(element).parents('.form-group').append(error)
                }
            });


        });

    </script>

@endpush