@extends('client.layout.master')

@section('content')

    <div class="row">

        <div class="col-md-12 col-lg-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title "><i class="fe fe-list"></i>Teachers List</h3>

                    <div class="card-options">

                        <a href="{{route('teacher-add')}}" type="button" class="btn  btn-pill btn-primary"><i class="fa fa-user-plus mr-2"></i>Add New</a>

                    </div>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table id="example" class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap w-100">

                            <thead>

                            <tr>

                                <th scope="col">ID</th>

                                <th scope="col">Teacher Name</th>

                                <th scope="col">Father Name</th>

                                <th scope="col">Contact Number</th>

                                <th scope="col">Status</th>

                                <th scope="col">Action</th>

                            </tr>

                            </thead>

                            <tbody>

                                @foreach($teachers as $teacher)

                                    <tr>

                                        <th scope="row">{{$teacher->id}}</th>

                                        <td>{{$teacher->name}}</td>

                                        <td>{{$teacher->father_name}} </td>

                                        <td>{{$teacher->phone}}</td>

                                        <td>

                                            <div class="material-switch">

                                                @if($teacher->status==1)

                                                    <span class="badge badge-success">Active</span>

                                                    @else

                                                    <span class="badge badge-primary">Inactive</span>

                                                @endif

                                            </div>

                                        </td>

                                        <td>

                                        <a class="btn btn-sm btn-warning" href="{{route('assignSubjects',$teacher->id)}}"><i class="fa fa-edit"></i>Assign Classes/Subjects </a>

                                            <a class="btn btn-sm btn-info" href="{{route('teacher-edit',$teacher->id)}}"><i class="fa fa-edit"></i> Edit</a>

                                            <a class="btn btn-sm btn-danger remove" href="{{route('teacher-remove',$teacher->id)}}"><i class="fa fa-trash"></i> Delete</a>



                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

                <!-- table-wrapper -->

            </div>

            <!-- section-wrapper -->



        </div>

    </div>

@endsection



@push('script')

    <script>

        $(document).ready(function () {

            $(document).on('click','.userStatus',function (e) {

                var isChecked = this.checked;

                var id=$(this).val();

                var status=isChecked==true?1:0;

                var url='{{route('customer-status',['',''])}}'+'/'+id+'/'+status;

                $.get(url,function (data) {

                    if(data.status ==true)

                    {

                        notification("success","Teacher account status is changed!")

                    }else{

                        notification('error',"Teacher account status is not changed!")

                    }

                });

            });



            $(document).on('click','.remove',function (e) {

                e.preventDefault();

                var url=$(this).attr('href');

                $.confirm({

                    icon: 'fa fa-warning text-danger',

                    title: 'warning Message!',

                    content: 'Pleas make sure otherwise will lost data',

                    type: 'red',

                    typeAnimated: true,

                    buttons: {

                        Yes: function () {

                            location.href =url;

                        },

                        No: function () {

                            $.alert('Canceled!');

                        }

                    }

                });



            });



        })

    </script>

@endpush