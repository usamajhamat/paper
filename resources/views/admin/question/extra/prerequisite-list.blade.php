@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary card">
                <div class="tab-menu-heading">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li><a href="#type" data-toggle="tab" class="active">Question Types</a></li>
                            <li><a href="#priority" data-toggle="tab">Question Priority</a></li>
                            <li><a href="#medium" data-toggle="tab">Medium</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body">
                    <div class="tab-content">
                        <div class="tab-pane  active" id="type">
                            <a href="javascript:void(0)"  data-url="{{route('board-class-save')}}" class="btn btn-sm btn-success float-right prebtn mb-2"  name="type">
                                <i class="fa fa-plus"></i> Assign
                            </a>
                            <div class="table-responsive">
                                <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                    <thead class="bg-light">
                                    <tr>
                                        <th width="48%">English</th>
                                        <th width="48%">Urdu</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="typeData">
                                    @foreach($types as $type)
                                        <tr>
                                            <td>{{$type->english}}</td>
                                            <td>{{$type->urdu}}</td>

                                            <td>
                                                <a class="btn btn-sm btn-info edit" href="{{route('pre-edit',[$type->question_id,'type'])}}"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane " id="priority">
                            <a href="javascript:void(0)"  data-url="{{route('board-class-save')}}" class="btn btn-sm btn-success float-right prebtn mb-2"  name="priority">
                                <i class="fa fa-plus"></i> Assign
                            </a>
                            <a href="#" id="addbtn" class="btn btn-sm btn-success float-right" style="margin-right:1%;">
                                <i class="fa fa-plus"></i> Add
                            </a>
                            <div class="table-responsive">
                                <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                    <thead class="bg-light">
                                    <tr>
                                        <th width="95%">Question Priority</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="priorityData">
                                    @foreach($priorities as $priority)
                                        <tr>
                                            <td>{{$priority->priority_name}}</td>

                                            <td>
                                                <a class="btn btn-sm btn-info edit" href="{{route('pre-edit',[$priority->priority_id,'priority'])}}"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane " id="medium">
                            <div class="table-responsive">
                                <a href="javascript:void(0)"  data-url="{{route('board-class-save')}}" class="btn btn-sm btn-success float-right prebtn mb-2"  name="medium">
                                    <i class="fa fa-plus"></i> Assign
                                </a>
                                <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                    <thead class="bg-light">
                                    <tr>
                                        {{--<th scope="col">ID</th>--}}
                                        <th width="95%">Medium Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="mediumData">
                                    @foreach($mediums as $medium)
                                        <tr>
                                            <td>{{$medium->medium_name}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info edit" href="{{route('pre-edit',[$medium->medium_id,'medium'])}}"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="assignModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignModal"></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('pre-assign-save')}}" id="assignForm" method="post">
                        @csrf
                        <input type="hidden" name="type" id="type12" value="">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-options">
                                    <a href="{{route('pre-assign')}}" id="searchButton" type="button" class="btn btn-sm btn-success float-right"><i class="fa fa-search"></i> Search</a>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="data">

                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="footer" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="assignBtn" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('pre-update')}}" id="editForm" method="post">
                        <input type="hidden" name="type" id="type1">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label lbl"></label>
                                    <input type="text" class="form-control" id="name1" name="name"  placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="ur" style="display: none;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">In Urdu</label>
                                    <input type="text" class="form-control" id="urdu" name="urdu"  placeholder="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="updateBtn" class="btn btn-primary">update</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModal">Add Priority</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('add-list')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Priority Name</label>
                                    <input type="text" class="form-control" name="priorityname" required  placeholder="Write Priority Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Priority Key</label>
                                    <input type="text" class="form-control" name="prioritykey" required  placeholder="Write Priority Key">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>

        $('#assignModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            $('#data').html(null);
            $('#footer').hide();
        });
        $('#addModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
//            $('#data').html(null);
//            $('#footer').hide();
        });
        $(document).ready(function () {

            $(document).on('click', '.prebtn', function (e) {
                var name=$(this).attr('name');
                // var url=$(this).data('url');
                // $('.lbl').text(name+' Name');
                // $('#name').attr('placeholder',name+' Name');
                // $('#ExtraBtn').text('Save '+name);
                // $('.modal-title').text('Add '+name);
                $('#type12').val(name);
                $('#assignModal').modal('show');
            });

            $(document).on('click', '#addbtn', function (e) {
                $('#addModal').modal('show');
            });


            $(document).on('click', '#searchButton', function (e) {
                e.preventDefault();
                //$('#assignForm').submit();
                var url=$(this).attr('href');
                if($('#assignForm').valid())
                {
                    var form=new FormData();
                    form.append('course',$('#course').val());
                    form.append('class',$('#classes').val());
                    form.append('subject',$('#subjects').val());
                    form.append('chapter',$('#chapters').val());
                    form.append('type',$('#type12').val());
                    $.ajax({
                        type:'POST',
                        enctype: 'multipart/form-data',
                        url:url,
                        processData: false,
                        contentType: false,
                        cache: false,
                        data:form,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            $('#footer').show();
                            $('#data').html(data)
                        }
                    });
                }

            });


            $(document).on('click', '.edit', function (e) {
                e.preventDefault();
                var url=$(this).attr('href');
                $.ajax({
                    type:'GET',
                    url:url,
                    success:function(data){
                        if(data.type=='type')
                        {
                            $('#ur').show();
                            $('#id').val(data.data.question_id);
                            $('#type1').val(data.type);
                            $('#name1').val(data.data.english);
                            $('#urdu').val(data.data.urdu);
                            $('.lbl').text('In English');
                            $('.modal-title').text(data.title);
                        }
                        else if(data.type=='medium')
                        {
                            $('#ur').hide();
                            $('#id').val(data.data.medium_id);
                            $('#type1').val(data.type);
                            $('#name1').val(data.data.medium_name);
                            $('.lbl').text('Medium');
                            $('.modal-title').text(data.title);
                        }

                        else if(data.type=='priority')
                        {
                            $('#ur').hide();
                            $('#id').val(data.data.priority_id);
                            $('#type1').val(data.type);
                            $('#name1').val(data.data.priority_name);
                            $('.lbl').text('Question Priority');
                            $('.modal-title').text(data.title);
                        }
                        $('#editModal').modal('show');

                    }
                });
            });


            $(document).on('click', '#updateBtn', function (e) {
                e.preventDefault();
                var url=$('#editForm').attr('action');
                var data=$('#editForm').serialize();
                if($('#editForm').valid())
                {
                    $.ajax({
                        type:'POST',
                        url:url,
                        data:data,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            if(data.type=='type')
                            {
                                $('#typeData').html(data.data);
                            }
                            else if(data.type=='medium')
                            {
                                $('#mediumData').html(data.data);
                                $('#extraModal').modal('hide');
                            }

                            else if(data.type=='priority')
                            {
                                $('#priorityData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            $('#editModal').modal('hide');
                        }
                    });
                }
            });
            $(document).on('click', '#assignBtn', function (e) {
                e.preventDefault();
                var url=$('#assignForm').attr('action');
                var data=$('#assignForm').serialize();
                $.ajax({
                    type:'POST',
                    url:url,
                    data:data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        console.log(data)
                        $('#footer').hide();
                        $('#data').html(null);
                       // notification('success','changes are saved');
                    }
                });
            });

            $(document).on('click', '.remove', function (e) {
                e.preventDefault();
                var url=$(this).attr('href');
                confirmBox(url);

            });

            $('#editForm').validate({
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

            $('#assignForm').validate({
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
                    }
                },
                messages: {
                    course: "this field is required",
                    Class: "this field is required",
                    subject: "this field is required",
                    chapter: "this field is required"
                },
                errorPlacement: function(error, element) {
                    $(element).parents('.form-group').append(error)
                }
            })

        });

        function remove(url) {
            $.ajax({
                type:'GET',
                url:url,
                success:function(data){
                    if(data.type=='board')
                    {
                        $('#boardData').html(data.data);
                    }
                    else if(data.type=='class')
                    {
                        $('#classData').html(data.data);
                    }

                    else if(data.type=='subject')
                    {
                        $('#subjectData').html(data.data);
                    }
                    else if(data.type=='type')
                    {
                        $('#typeData').html(data.data);
                    }
                    else if(data.type=='shift')
                    {
                        $('#shiftData').html(data.data);
                    }


                }
            });
        }
    </script>
@endpush