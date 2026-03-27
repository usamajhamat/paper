@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary card">
                <div class="tab-menu-heading">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li><a href="#boards" data-toggle="tab" class="active">Boards</a></li>
                            <li><a href="#classes" data-toggle="tab">Classes</a></li>
                            <li><a href="#subjects" data-toggle="tab">Subjects</a></li>
                            <li><a href="#types" data-toggle="tab">Paper Type</a></li>
                            <li><a href="#shift" data-toggle="tab">Shift</a></li>
                            <li><a href="#notifications" data-toggle="tab">Notification</a></li>
                            <li><a href="#alerts" data-toggle="tab">Alert</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body">
                    <div class="tab-content">

                        <div class="tab-pane  active" id="boards">
                            <a href="javascript:void(0)"  data-url="{{route('board-save')}}" class="btn btn-sm btn-success float-right extrabtn mb-2"  name="Board"  data-toggle="modal" data-target="#extraModal">
                                <i class="fa fa-plus"></i> Add Board
                            </a>
                            <div class="table-responsive">
                                <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                    <thead class="bg-light">
                                    <tr>
                                        <th width="90%">Board Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="boardData">
                                    @foreach($boards as $board)
                                        <tr>
                                            {{--<th scope="row">{{$course->course_id}}</th>--}}
                                            <td>{{$board->board_name}}</td>

                                            <td>
                                                <a class="btn btn-sm btn-info edit" href="{{route('board-edit',$board->board_id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn btn-sm btn-danger remove" href="{{route('board-remove',$board->board_id)}}"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane " id="classes">
                            <a href="javascript:void(0)"  data-url="{{route('board-class-save')}}" class="btn btn-sm btn-success float-right extrabtn mb-2"  name="Class"  data-toggle="modal" data-target="#extraModal">
                                <i class="fa fa-plus"></i> Add Class
                            </a>
                            <div class="table-responsive">
                              <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                <thead class="bg-light">
                                <tr>
                                    <th width="90%">Class Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="classData">
                                @foreach($classes as $class)
                                    <tr>
                                        <td>{{$class->class_name}}</td>

                                        <td>
                                            <a class="btn btn-sm btn-info edit" href="{{route('board-class-edit',$class->class_id)}}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-sm btn-danger remove" href="{{route('board-class-remove',$class->class_id)}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="tab-pane " id="subjects">
                            <a href="javascript:void(0)"  data-url="{{route('board-subject-save')}}" class="btn btn-sm btn-success float-right extrabtn mb-2"  name="Subject"  data-toggle="modal" data-target="#extraModal">
                                <i class="fa fa-plus"></i> Add Subject
                            </a>
                            <div class="table-responsive">
                                <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                    <thead class="bg-light">
                                    <tr>
                                        {{--<th scope="col">ID</th>--}}
                                        <th width="90%">Subject Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="subjectData">
                                    @foreach($subjects as $subject)
                                        <tr>
                                            {{--<th scope="row">{{$course->course_id}}</th>--}}
                                            <td>{{$subject->subject_name}}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary edit" href="{{route('board-subject-edit',$subject->subject_id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn btn-sm btn-danger remove" href="{{route('board-subject-remove',$subject->subject_id)}}"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane " id="types">
                            <a href="javascript:void(0)"  data-url="{{route('type-save')}}" class="btn btn-sm btn-success float-right extrabtn mb-2"  name="Paper Type"  data-toggle="modal" data-target="#extraModal">
                                <i class="fa fa-plus"></i> Add Paper Type
                            </a>
                            <div class="table-responsive">
                                <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                    <thead class="bg-light">
                                    <tr>
                                        {{--<th scope="col">ID</th>--}}
                                        <th width="90%">Paper Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="typeData">
                                    @foreach($types as $type)
                                        <tr>
                                            <td>{{$type->type_name}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary edit" href="{{route('type-edit',$type->type_id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn btn-sm btn-danger remove" href="{{route('type-remove',$type->type_id)}}"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane " id="shift">
                            <a href="javascript:void(0)"  data-url="{{route('shift-save')}}" class="btn btn-sm btn-success float-right extrabtn mb-2"  name="Shift"  data-toggle="modal" data-target="#extraModal">
                                <i class="fa fa-plus"></i> Add Shift
                            </a>

                            <div class="table-responsive">
                                <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                    <thead class="bg-light">
                                    <tr>
                                        {{--<th scope="col">ID</th>--}}
                                        <th width="90%">Shift Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="shiftData">
                                    @foreach($shifts as $shift)
                                        <tr>
                                            {{--<th scope="row">{{$course->course_id}}</th>--}}
                                            <td>{{$shift->shift_name}}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary edit" href="{{route('shift-edit',$shift->shift_id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn btn-sm btn-danger remove" href="{{route('shift-remove',$shift->shift_id)}}"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="notifications">
                            <a href="javascript:void(0)"  data-url="{{route('notification-save')}}" class="btn btn-sm btn-success float-right extrabtn mb-2"  name="Notification"  data-toggle="modal" data-target="#extraModal" style="margin-left:1%;">
                                <i class="fa fa-plus"></i> Add Notification
                            </a>
                            @if($notificationpanels->status==1)
                            <a href="javascript:void(0)" class="btn btn-sm btn-success float-right mb-2" id="notificationpanel">
                                <span id="notifytext">Notification On</span>
                            </a>
                            @else
                                <a href="javascript:void(0)" class="btn btn-sm btn-light float-right mb-2" id="notificationpanel">
                                    <span id="notifytext">Notification Off</span>
                                </a>
                            @endif
                            <div class="table-responsive">
                                <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                    <thead class="bg-light">
                                    <tr>
                                        <th width="90%">Notifications</th>
                                        {{--<th>Color</th>--}}
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="notificationData">
                                    @foreach($notifications as $notification)
                                        <tr>
                                            <th scope="row">{{$notification->notification_name}}</th>
                                            {{--<td>--}}
                                                {{--<label class="colorinput">--}}
                                                    {{--<input name="notification_color" onclick="onlyOne(this)" type="checkbox" value="secondary" class="colorinput-input"/>--}}
                                                    {{--<span class="colorinput-color bg-secondary"></span>--}}
                                                {{--</label>--}}
                                                {{--<label class="colorinput">--}}
                                                    {{--<input name="notification_color" onclick="onlyOne(this)" type="checkbox" value="danger" class="colorinput-input" />--}}
                                                    {{--<span class="colorinput-color bg-danger"></span>--}}
                                                {{--</label>--}}
                                                {{--<label class="colorinput">--}}
                                                    {{--<input name="notification_color" onclick="onlyOne(this)" type="checkbox" value="warning" class="colorinput-input" />--}}
                                                    {{--<span class="colorinput-color bg-warning"></span>--}}
                                                {{--</label>--}}
                                                {{--<label class="colorinput">--}}
                                                    {{--<input name="notification_color" onclick="onlyOne(this)" type="checkbox" value="warning" class="colorinput-input" />--}}
                                                    {{--<span class="colorinput-color bg-info"></span>--}}
                                                {{--</label>--}}
                                                {{--<label class="colorinput">--}}
                                                    {{--<input name="notification_color" onclick="onlyOne(this)" type="checkbox" value="warning" class="colorinput-input" />--}}
                                                    {{--<span class="colorinput-color bg-success"></span>--}}
                                                {{--</label>--}}
                                            {{--</td>--}}
                                            <td  class="material-switch">
                                                @if($notification->notification_status==1)
                                                    <input data-id="{{$notification->notification_id}}" id="notificationsuccess{{$notification->notification_id}}" name="notificationstatuson" class="userStatus notificationstatus" type="checkbox" checked/>
                                                    <label for="notificationsuccess{{$notification->notification_id}}" class="label-success"></label>
                                                @else
                                                    <input data-id="{{$notification->notification_id}}" id="notificationsuccess{{$notification->notification_id}}" name="notificationstatusoff" class="userStatus notificationstatus" type="checkbox"/>
                                                    <label for="notificationsuccess{{$notification->notification_id}}" class="label-success"></label>
                                                @endif
                                            </td>

                                            <td>
                                                <a class="btn btn-sm btn-info edit" href="{{route('notification-edit',$notification->notification_id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn btn-sm btn-danger remove" href="{{route('notification-remove',$notification->notification_id)}}"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="alerts">
                            <a href="javascript:void(0)"  data-url="{{route('alert-save')}}" class="btn btn-sm btn-success float-right extrabtn mb-2"  name="Alert"  data-toggle="modal" data-target="#extraModal" style="margin-left:1%;">
                                <i class="fa fa-plus"></i> Add New Alert
                            </a>
                            <div class="table-responsive">
                                <table  class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                                    <thead class="bg-light">
                                    <tr>
                                        <th width="90%">Alerts</th>
                                        <th>Color</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="alertData">
                                    @foreach($alerts as $alert)
                                        <tr>
                                            <th scope="row">{{$alert->alert_name}}</th>
                                            <td>
                                                <label class="colorinput">
                                                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="dark" class="colorinput-input" @if($alert->alert_color=='dark') checked @endif/>
                                                    <span class="colorinput-color bg-dark"></span>
                                                </label>
                                                <label class="colorinput">
                                                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="danger" class="colorinput-input" @if($alert->alert_color=='danger') checked @endif/>
                                                    <span class="colorinput-color bg-danger"></span>
                                                </label>
                                                <label class="colorinput">
                                                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="warning" class="colorinput-input" @if($alert->alert_color=='warning') checked @endif/>
                                                    <span class="colorinput-color bg-warning"></span>
                                                </label>
                                                <label class="colorinput">
                                                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="info" class="colorinput-input" @if($alert->alert_color=='info') checked @endif/>
                                                    <span class="colorinput-color bg-info"></span>
                                                </label>
                                                <label class="colorinput">
                                                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="success" class="colorinput-input" @if($alert->alert_color=='success') checked @endif/>
                                                    <span class="colorinput-color bg-success"></span>
                                                </label>
                                            </td>
                                            <td  class="material-switch">
                                                @if($alert->alert_status==1)
                                                    <input data-id="{{$alert->alert_id}}" id="alertsuccess{{$alert->alert_id}}" name="alertstatuscomplete" class="userStatus alertstatus" type="checkbox" checked/>
                                                    <label for="alertsuccess{{$alert->alert_id}}" class="label-success"></label>
                                                @else
                                                    <input data-id="{{$alert->alert_id}}" id="alertsuccess{{$alert->alert_id}}" name="alertstatusincomplete" class="userStatus alertstatus" type="checkbox"/>
                                                    <label for="alertsuccess{{$alert->alert_id}}" class="label-success"></label>
                                                @endif
                                            </td>

                                            <td>
                                                <a class="btn btn-sm btn-info edit" href="{{route('alert-edit',$alert->alert_id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn btn-sm btn-danger remove" href="{{route('alert-remove',$alert->alert_id)}}"><i class="fa fa-trash"></i> Delete</a>
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
                        <input type="hidden" name="location" value="modal">
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
                    <button type="button" id="ExtraBtn" class="btn btn-primary">Save Paper</button>
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
                    <form action="" id="editForm" method="post">
                        <input type="hidden" name="location" value="modal">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label lbl"></label>
                                    <input type="text" class="form-control" id="name1" name="name"  placeholder="">
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

@endsection

@push('script')
    <script>
        $(document).ready(function () {

            $(document).on('click', '.extrabtn', function (e) {
                var name=$(this).attr('name');
                var url=$(this).data('url');
                $('.lbl').text(name+' Name');
                $('#name').attr('placeholder',name+' Name');
                $('#ExtraBtn').text('Save '+name);
                $('.modal-title').text('Add '+name);
                $('#extraForm').attr('action',url);
            });


            $(document).on('click', '#ExtraBtn', function (e) {
                e.preventDefault();
                var url=$('#extraForm').attr('action');
                var data=$('#extraForm').serialize();
                if ($('#extraForm').valid())
                {
                    $.ajax({
                        type:'POST',
                        url:url,
                        data:data,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            if(data.type=='board')
                            {
                                $('#boardData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='class')
                            {
                                $('#classData').html(data.data);
                                $('#extraModal').modal('hide');
                            }

                            else if(data.type=='subject')
                            {
                                $('#subjectData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='type')
                            {
                                $('#typeData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='shift')
                            {
                                $('#shiftData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='notification')
                            {
                                $('#notificationData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='alert')
                            {
                                $('#alertData').html(data.data);
                                $('#extraModal').modal('hide');
                            }


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
                        if(data.type=='board')
                        {
                            $('#id').val(data.data.board_id);
                            $('#name1').val(data.data.board_name);
                            $('#editForm').attr('action',data.url);
                            $('.modal-title').text(data.title);
                        }
                        else if(data.type=='class')
                        {
                            $('#id').val(data.data.class_id);
                            $('#name1').val(data.data.class_name);
                            $('#editForm').attr('action',data.url);
                            $('.modal-title').text(data.title);
                        }

                        else if(data.type=='subject')
                        {
                            $('#id').val(data.data.subject_id);
                            $('#name1').val(data.data.subject_name);
                            $('#editForm').attr('action',data.url);
                            $('.modal-title').text(data.title);
                        }
                        else if(data.type=='type')
                        {
                            $('#id').val(data.data.type_id);
                            $('#name1').val(data.data.type_name);

                            $('#editForm').attr('action',data.url);
                            $('.modal-title').text(data.title);
                        }
                        else if(data.type=='shift')
                        {
                            $('#id').val(data.data.shift_id);
                            $('#name1').val(data.data.shift_name);

                            $('#editForm').attr('action',data.url);
                            $('.modal-title').text(data.title);
                        }
                        else if(data.type=='notification')
                        {
                            $('#id').val(data.data.notification_id);
                            $('#name1').val(data.data.notification_name);

                            $('#editForm').attr('action',data.url);
                            $('.modal-title').text(data.title);
                        }
                        else if(data.type=='alert')
                        {
                            $('#id').val(data.data.alert_id);
                            $('#name1').val(data.data.alert_name);

                            $('#editForm').attr('action',data.url);
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
                            if(data.type=='board')
                            {
                                $('#boardData').html(data.data);
                            }
                            else if(data.type=='class')
                            {
                                $('#classData').html(data.data);
                                $('#extraModal').modal('hide');
                            }

                            else if(data.type=='subject')
                            {
                                $('#subjectData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='type')
                            {
                                $('#typeData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='shift')
                            {
                                $('#shiftData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='notification')
                            {
                                $('#notificationData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            else if(data.type=='alert')
                            {
                                $('#alertData').html(data.data);
                                $('#extraModal').modal('hide');
                            }
                            $('#editModal').modal('hide');


                        }
                    });
                }
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
                    else if(data.type=='notification')
                    {
                        $('#notificationData').html(data.data);
                    }
                    else if(data.type=='alert')
                    {
                        $('#alertData').html(data.data);
                    }


                }
            });
        }

        $(".notificationstatus").on('click',function () {
           //alert("check");
           var notification_id=$(this).data('id');
           var element=$(this);
           //alert(notification_id);
            $.ajax({
                url: '{{route('notification-status')}}',
                type: 'get',
                data: {'notification_id': notification_id,_token: '{{csrf_token()}}'},
                success:function (data) {
                    //alert(data)
//                    if (data==1){
//                        $(element).closest('tr').css('color','red');
//                    }
//                    else{
//                        swal("Cancelled", "Customer file is Safe :)", "Error");
//                    }
                }

            });
        });

        $("#notificationpanel").on('click',function () {
            //alert("check");
            notification_id=1;
            var element=$(this);
            $.ajax({
                url: '{{route('notification-panel')}}',
                type: 'get',
                data: {'notification_id': notification_id,_token: '{{csrf_token()}}'},
                success:function (data) {
                    //alert(data)
                    if (data==1){
                        $("#notificationpanel").removeClass("btn-light");
                        $("#notificationpanel").addClass("btn-success");
                        $("#notifytext").text("Notification On");
                    }
                    else{
                        $("#notificationpanel").addClass("btn-light");
                        $("#notificationpanel").removeClass("btn-success");
                        $("#notifytext").text("Notification Off");
                    }
                }
//
            });
        });

        $(".alertstatus").on('click',function () {
//            alert("check alert");
            var alert_id=$(this).data('id');
            var element=$(this);
//            alert(alert_id);
            $.ajax({
                url: '{{route('alert-status')}}',
                type: 'get',
                data: {'alert_id': alert_id,_token: '{{csrf_token()}}'},
                success:function (data) {
                    //alert(data)
//                    if (data==1){
//                        $(element).closest('tr').css('color','red');
//                    }
//                    else{
//                        swal("Cancelled", "Customer file is Safe :)", "Error");
//                    }
                }

            });
        });

        function alertOne(checkbox) {
            var checkboxes = document.getElementsByName(checkbox.name)
            var alert_color = checkbox.value;
            var alert_id=checkbox.id;
            // alert(alert_id);
//            checkboxes.forEach((item) => {
            checkboxes.forEach(function(item) {
                if (item !== checkbox) item.checked = false
        });
            $.ajax({
                url: '{{route('alert-color')}}',
                type: 'get',
                data: {'alert_id':alert_id,'alert_color': alert_color,_token: '{{csrf_token()}}'},
                success:function (data) {
                    //alert(data)
//                    if (data==1){
//                        $(element).closest('tr').css('color','red');
//                    }
//                    else{
//                        swal("Cancelled", "Customer file is Safe :)", "Error");
//                    }
                }

            });
        }

    </script>
@endpush