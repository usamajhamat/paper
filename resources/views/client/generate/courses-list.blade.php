@extends('client.layout.master')

@section('content')

    <div class="row" id="syllabus">

        @foreach($courses as $course)

            <div class="col-md-4 col-sm-12">

                <a href="{{$course->course_id}}" class="text-dark course">

                    <div class="card  mb-5">

                        <div class="card-body">

                            <div class="media mt-0">

                                <div class="media-body">

                                    <h5 class="time-title p-0 mb-0 font-weight-semibold leading-normal">{{$course->course_name}}</h5>

                                </div>

                                <button href="{{url('images'.'/'.$course->course_id)}}" class="btn btn-dark  d-sm-block mr-2 print1"><i class="fas fa-sign-out-alt"></i> </button>

                                {{--<a href="{{route('past-paper-download',$course->course_id)}}" class="btn btn-azure  d-sm-block"><i class="fa fa-download"></i> </a>--}}

                            </div>

                        </div>

                        <div class="card-footer text-bold border-top bg-primary">

                            <h5 class="time-title p-0 mb-0 text-white font-weight-semibold leading-normal text-center">

                                {{--{{$paper->type_name}}--}}

                                <small>Syllabus</small>



                            </h5>

                        </div>

                    </div>

                </a>

            </div>

        @endforeach

    </div>



@endsection



@push('script')

    <script>

        $(document).on('click', '.course', function (e) {

            e.preventDefault();

            var id=$(this).attr('href');

            $.ajax({

                type:'POST',

                url:'{{route('client-classes')}}',

                data:{id:id},

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success:function(data){

                    $('#syllabus').html(data)

                }

            });

        });

        $(document).on('click', '.cls', function (e) {

            e.preventDefault();

            var id=$(this).attr('href');

            $.ajax({

                type:'POST',

                url:'{{route('client-subjects')}}',

                data:{id:id},

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success:function(data){

                    $('#syllabus').html(data)

                },

            });

        });

        $(document).on('click', '.subject', function (e) {

            e.preventDefault();

            var id=$(this).attr('href');

            $.ajax({

                type:'POST',

                url:'{{route('client-chapter')}}',

                data:{id:id},

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success:function(data){

                    $('#syllabus').html(data)

                },

            });

        });

    </script>

@endpush