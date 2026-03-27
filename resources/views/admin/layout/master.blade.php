@php
    $user1=session('user');
    $system=\App\Models\Admin\System::info();
@endphp
<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-TileColor" content="#ff685c">
    <meta name="theme-color" content="#32cafe">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Title -->
    <title>One Click Test Solution</title>

    <link href="https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css?display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/notonaskharabic.css?display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/admin/assets/fonts/fonts/font-awesome.min.css')}}">

    <!-- Font Family-->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">
    <!-- Dashboard Css -->
    <link href="{{asset('public/admin/assets/css/dashboard.css')}}" rel="stylesheet" />
    <!-- Accordion Css -->
    <link href="{{asset('public/admin/assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
    <!-- Tabs Style -->
    <link href="{{asset('public/admin/assets/plugins/tabs/style.css')}}" rel="stylesheet" />

    <!-- Date Picker Plugin -->
    <link href="{{asset('public/admin/assets/plugins/date-picker/spectrum.css')}}" rel="stylesheet" />

    <!-- Notifications  Css -->
    <link href="{{asset('public/admin/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet" />
    <link href="{{asset('public/admin/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />

    <!-- c3.js Charts Plugin -->
    <link href="{{asset('public/admin/assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />
    <!-- Data table css -->
    <link href="{{asset('public/admin/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="{{asset('public/admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!-- Sidemenu Css -->
    <link href="{{asset('public/admin/assets/plugins/toggle-sidebar/sidemenu.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/jquery-confirm.min.css')}}">
    <link href="https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css?display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/notonaskharabic.css?display=swap" rel="stylesheet">
    <!---Font icons-->
    <link href="{{asset('public/admin/assets/plugins/iconfonts/plugin.css')}}" rel="stylesheet" />
    {{--<script src="https://wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image"></script>--}}
    {{--<script src="{{asset('public/WIRISplugins.js?viewer=image')}}"></script>--}}



    <style>
        .error {
            color: red;
            font-size:small;
        }
        .urdu{
            direction: rtl;
            font-family: 'Noto Naskh Arabic', serif;
            font-size: 1.5em;
        }

        .english{
            font-family: 'Noto Naskh Arabic', serif;
            font-size: 1.5em;
        }
        .set_width{
            width: 95%;
        }
        .margin_bottom{
            margin-bottom: 3px;
        }
    </style>

</head>
<body class="app sidebar-mini rtl">
<div id="global-loader" ></div>
<div class="page">
    <div class="page-main">
        <div class="app-header header py-1 d-flex">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="header-brand" href="{{route('admin-home')}}">
                        <img src="{{url('images').'/'.$system->logo}}" class="header-brand-img d-none d-sm-block" alt="CTS Logo"><img src="{{url('images').'/'.$system->logo}}" class="header-brand-img-2 d-sm-none" alt="CTS logo">
                    </a>
                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

                    <div class="d-flex order-lg-2 ml-auto">

                        <div class="dropdown d-none d-md-flex " >
                            <a  class="nav-link icon full-screen-link">
                                <i class="mdi mdi-arrow-expand-all"  id="fullscreen-button"></i>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                <span class="avatar avatar-md brround"><img src="{{url('images').'/'.$user1->photo}}" alt="Profile-img" class="avatar avatar-md brround"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                                <div class="text-center">
                                    <a href="#" class="dropdown-item text-center font-weight-sembold user">{{$user1->name}}</a>

                                    <div class="dropdown-divider"></div>
                                </div>
                                <a class="dropdown-item" href="{{route('admin-profile',$user1->id)}}">
                                    <i class="dropdown-icon mdi mdi-account-outline "></i> Profile
                                </a>
                                <a class="dropdown-item" href="{{route('admin-setting',$user1->id)}}">
                                    <i class="dropdown-icon  mdi mdi-settings"></i> Settings
                                </a>
                                <a class="dropdown-item" href="{{route('admin-logout')}}">
                                    <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <div class="dropdown user-pro-body">
                    <div>
                        <img src="{{url('images').'/'.$user1->photo}}" alt="User Image" class="avatar avatar-xl brround mCS_img_loaded">
                        <a href="{{route('admin-setting',$user1->id)}}" class="profile-img">
                            <span class="fa fa-pencil" aria-hidden="true"></span>
                        </a>
                    </div>
                    <div class="user-info mb-2">
                        <h4 class="font-weight-semibold text-dark mb-1">{{$user1->name}}</h4>
                        <span class="mb-0 text-muted">{{$user1->role_name}}</span>
                    </div>
                    {{--<a href="#" title="settings" class="user-button"><i class="fa fa-cog"></i></a>--}}
                    <a href="{{route('admin-setting',$user1->id)}}" title="edit profile" class="user-button"><i class="fa fa-edit"></i></a>
                    <a href="{{route('admin-logout')}}" title="logout" class="user-button"><i class="fa fa-power-off"></i></a>
                </div>
            </div>
            <ul class="side-menu">

                <li>
                    <a class="side-menu__item" href="{{route('admin-home')}}"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Users</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('admin-list')}}">Users List</a></li>
                        <li><a class="slide-item" href="{{route('admin-add')}}">Add User</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Customer</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('customer-list')}}">Customer List</a></li>
                        <li><a class="slide-item" href="{{route('customer-add')}}">Add Customer</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cog"></i><span class="side-menu__label">Setting</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('course-list')}}">Course</a></li>
                        <li><a class="slide-item" href="{{route('classes-list')}}">Classes</a></li>
                        <li><a class="slide-item" href="{{route('subject-list')}}">Subjects</a></li>
                        <li><a class="slide-item" href="{{route('chapter-list')}}">Chapters</a></li>
                        <li><a class="slide-item" href="{{route('topic-list')}}">Topics</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-file-text-o"></i><span class="side-menu__label">Past Papers</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('past-add')}}">Add Paper</a></li>
                        <li><a class="slide-item" href="{{route('past-list')}}">Papers List</a></li>
                        <li><a class="slide-item" href="{{route('extra-list')}}">Modal</a></li>
                    </ul>
                </li>


                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-book"></i><span class="side-menu__label">Question Bank</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('question-add')}}">Add Question</a></li>
                        <li><a class="slide-item" href="{{route('question-list')}}">Questions List</a></li>
                        <li><a class="slide-item" href="{{route('pre-list')}}">Prerequisite</a></li>
                    </ul>
                </li>

                <li>
                    <a class="side-menu__item" href="{{route('system-info')}}"><i class="side-menu__icon fa fa-television"></i><span class="side-menu__label">System Setting</span></a>
                </li>
            </ul>
        </aside>

        <div class="app-content  my-3 my-md-5">
            <div class="side-app">
                @include('admin.messages.message')
                @section('content')
                @show
            </div>
        </div>
    </div>

    <!--footer-->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
                    Copyright © 2024. Designed by <a href="#">SignHub</a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->
</div>

<!-- Dashboard js -->
<script src="{{asset('public/admin/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
{{--<script src="https://www.rosariosis.org/demonstration/assets/js/jquery.js?v=2.2.4"></script>--}}
<script src="{{asset('public/admin/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/vendors/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/vendors/selectize.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/vendors/jquery.tablesorter.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/vendors/circle-progress.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

<script src="{{asset('public/admin/assets/js/jquery.validate.js')}}"></script>
<script src="{{asset('public/admin/assets/js/additional-methods.js')}}"></script>
<!-- Fullside-menu Js-->
<script src="{{asset('public/admin/assets/plugins/toggle-sidebar/sidemenu.js')}}"></script>

<script src="{{asset('public/admin/assets/js/printThis.js')}}"></script>

<!---Accordion Js-->
{{--<script src="{{asset('public/admin/assets/plugins/accordion/accordion.min.js')}}"></script>--}}
{{--<script src="{{asset('public/admin/assets/plugins/accordion/accordions.js')}}"></script>--}}

<!-- Data tables -->
<script src="{{asset('public/admin/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/datatable/datatable.js')}}"></script>

<!-- Notifications js -->
<script src="{{asset('public/admin/assets/plugins/notify/js/rainbow.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/notify/js/sample.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/notify/js/jquery.growl.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/notify/js/notifIt.js')}}"></script>

<!-- Datepicker js -->
<script src="{{asset('public/admin/assets/plugins/date-picker/spectrum.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/date-picker/jquery-ui.js')}}"></script>



@stack('style',false)


<!-- Custom scroll bar Js-->
<script src="{{asset('public/admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/jquery-confirm.min.js')}}"></script>


<!-- Custom Js-->
<script src="{{asset('public/admin/assets/js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('script',false)
<script>
    function  confirmBox(url) {
        $.confirm({
            icon: 'fa fa-warning text-danger',
            title: 'Are you sure!',
            content: "Fatal! data will be lost.You can not recover it.",
            type: 'red',
            typeAnimated: true,
            buttons: {
                delete: function () {
                    remove(url)
                },
                cancel: function () {
                    $.alert('Canceled!');
                }
            }
        });

    }



    $(document).on('click','#customerdelete',function () {
        var id = $(this).data('id');
        var element = this;
            //alert(id);
        swal.fire({
            title: "Are you sure?",
            text: "You want to Delete This Customer!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
                //alert(userid);
                $.ajax({
                    url: '{{route("customer-remove")}}',
                    type: 'get',
                    data: {'id': id, _token: '{{csrf_token()}}'},
                    success:function (data) {
//                        alert(data)
                        if (data==1){
                            $(element).closest('tr').fadeOut();
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                                timer: 1000
                            });
                        }
                        else{
                            Swal.fire({
                                title: "Canceled!",
                                text: "Your Customer is Safe.",
                                icon: "Error"
                            });
                        }
                    }
//
                });
            }
        })
    });



//    Swal.fire({
//        title: "Are you sure?",
//        text: "You won't be able to revert this!",
//        icon: "warning",
//        showCancelButton: true,
//        confirmButtonColor: "#3085d6",
//        cancelButtonColor: "#d33",
//        confirmButtonText: "Yes, delete it!"
//    }).then((result) => {
//        if (result.isConfirmed) {
//        Swal.fire({
//            title: "Deleted!",
//            text: "Your file has been deleted.",
//            icon: "success"
//        });
//    }
//    });


    {{--function deleteCustomer($id){--}}
        {{--alert($id);--}}
        {{--$.confirm({--}}
            {{--icon: 'fa fa-warning text-danger',--}}
            {{--title: 'Are you sure!',--}}
            {{--content: "Fatal! data will be lost. You cannot recover it.",--}}
            {{--type: 'red',--}}
            {{--typeAnimated: true,--}}
            {{--buttons: {--}}
                {{--delete: function () {--}}
                    {{--var url = "{{ route('customer-remove', ['id' => $id]) }}"; // Pass route with parameters if needed--}}
                    {{--remove(url);--}}
                {{--},--}}
                {{--cancel: function () {--}}
                    {{--$.alert('Canceled!');--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
    function notification(type,message) {
        notif({
            msg: "<b>"+type+": </b>"+message,
            type:type
        });
    }

    $('#course').bind('change', function (e) {
        e.preventDefault();
        var url='{{route('course-classes','')}}'+'/'+$(this).val();
        changePrerequisite();
        $.ajax({
            type:'GET',
            url:url,
            success:function(data){
                var option='<option value="">Select</option>';

                $.each(data.classes,function (key,val) {
                    option +="<option value='"+val.class_id+"'>"+val.class_name+"</option>";
                });

                $('#classes').html(option);

            }
        });
    });
    $(document).on('change', '#classes', function (e) {
        e.preventDefault();
        var url='{{route('class-subjects','')}}'+'/'+$(this).val();
        changePrerequisite()
        $.ajax({
            type:'GET',
            url:url,
            success:function(data){
                var option='<option value="">Select</option>';

                $.each(data.subjects,function (key,val) {
                    option +="<option value='"+val.subject_id+"'>"+val.subject_name+"</option>";
                });
                $('#subjects').html(option);

            }
        });
    });
    $(document).on('change', '#subjects', function (e) {
        e.preventDefault();
        var url='{{route('subject-chapters','')}}'+'/'+$(this).val();
        changePrerequisite();
        $.ajax({
            type:'GET',
            url:url,
            success:function(data){
                var option='<option value="">Select</option>';

                $.each(data.chapters,function (key,val) {
                    option +="<option value='"+val.chapter_id+"'>"+val.chapter_name+"</option>";
                });
                $('#chapters').html(option);

            }
        });
        $(document).on('change', '#chapters', function (e) {
            e.preventDefault();
            var url = '{{route('chapter-topics','')}}' + '/' + $(this).val();
            var chId=$(this).val();
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    var option = '<option value="">Select</option>';

                    $.each(data.topics, function (key, val) {
                        option += "<option value='" + val.topic_id + "'>" + val.topic_name + "</option>";
                    });
                    $('#topics').html(option);
                    questionTypes(chId);
                    priorities(chId)
                }
            });
        });

        $(".modal").on("hidden.bs.modal", function(){
            $(".modal-body1").html("");
        });
    });

    function changePrerequisite() {
        $('#data').html(null);
        $('#footer').hide();

    }
    function questionTypes(chapterId) {
        var url = '{{route('chapter-QT','')}}' + '/' +chapterId;
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                var option = '<option value="">Select</option>';

                $.each(data.types, function (key, val) {
                    var urdu=val.urdu!=null?' ('+val.urdu+')':'';
                    if(val.english!=null)
                    {
                        option += "<option value='" + val.assign_id + "'>" + val.english +urdu + "</option>";
                    }else{
                        option += "<option value='" + val.assign_id + "'>" + val.urdu + "</option>";
                    }

                });
                $('#types').html(option);

            }
        });
    }

    function priorities(chapterId) {
        {{--var url = '{{route('chapter-priority','')}}' + '/' +chapterId;--}}
        {{--$.ajax({--}}
            {{--type: 'GET',--}}
            {{--url: url,--}}
            {{--success: function (data) {--}}
                {{--var option = '<option>Select</option>';--}}

                {{--$.each(data.types, function (key, val) {--}}
                    {{--option += "<option value='" + val.priority_id + "'>" + val.priority_name + "</option>";--}}
                {{--});--}}
                {{--$('#priorities').html(option);--}}

            {{--}--}}
        {{--});--}}
    }



</script>
</body>
</html>