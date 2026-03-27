<div class="row">
    @foreach($papers as $paper)
        <div class="col-md-4 col-sm-12">
            <div class="card  mb-5">
                <div class="card-body">
                    <div class="media mt-0">
                        <div class="media-body">
                            <h5 class="time-title p-0 mb-0 font-weight-semibold leading-normal">{{$paper->subject_name}}</h5>
                            {{$paper->paper_year}}
                        </div>
                        <button href="{{url('images'.'/'.$paper->paper)}}" class="btn btn-dark  d-sm-block mr-2 print1"><i class="fa fa-print"></i> </button>
                        <a href="{{route('client-past-download',$paper->paper)}}" class="btn btn-azure  d-sm-block"><i class="fa fa-download"></i> </a>
                    </div>
                </div>
                <div class="card-footer text-bold border-top bg-primary">
                    <h5 class="time-title p-0 mb-0 text-white font-weight-semibold leading-normal text-center">
                        {{$paper->type_name}}
                        <small>({{$paper->shift_name}})</small>
                    </h5>
                </div>
            </div>
        </div>
    @endforeach
</div>