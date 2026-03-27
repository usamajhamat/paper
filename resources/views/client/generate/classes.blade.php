<style>


    .Courses:hover{
        transform: scale(1.05);
        /*background-color: rgba(153,255,153,.5);*/
    }
     div.slide-left {
        width:100%;
        overflow:hidden;
    }
    div.slide-left {
        animation: slide-left 1s;
    }

    @keyframes slide-left {
        from {
            margin-left: 100%;
            width: 300%;
        }

        to {
            margin-left: 0%;
            width: 100%;
        }
    }
</style>
@foreach($classes as $course)
    <div class="col-md-4 col-sm-12 Courses slide-left">
        <a href="{{$course->class_id}}" class="text-dark cls">
            <div class="card  mb-5">
                <div class="card-body">
                    <div class="media mt-0">
                        <div class="media-body">
                            <h5 class="time-title p-0 mb-0 font-weight-semibold leading-normal">{{$course->class_name}}</h5>
                        </div>
                        <button href="" class="btn btn-dark  d-sm-block mr-2 print1"><i class="fas fa-sign-out-alt"></i> </button>
                        {{--<a href="{{route('past-paper-download',$course->course_id)}}" class="btn btn-azure  d-sm-block"><i class="fa fa-download"></i> </a>--}}
                    </div>
                </div>
                <div class="card-footer text-bold border-top bg-primary">
                    <h5 class="time-title p-0 mb-0 text-white font-weight-semibold leading-normal text-center">
                        {{--{{$paper->type_name}}--}}
                        <small>{{$course->descriptive_name}}</small>

                    </h5>
                </div>
            </div>
        </a>
    </div>
@endforeach