@foreach($papers as $paper)
    <div class="col-md-4 col-sm-12 rotate">
        <div class="bg-white SavedPapers mb-3">
            <h6 style="font-size:1rem; font-weight:bold; transform:scaleY(1.2); text-align:center; padding-top:10px;">{{$paper->class_name}} - {{$paper->subject_name}}</h6>
            <p style="text-align: center; margin:0px;">{{$paper->paper_name}}</p>
            <p style="text-align: center; margin-top:0px; margin-bottom:3px;">{{\Carbon\Carbon::parse($paper->schedule_date)->format('d-M-Y') }}</p>
            <div class="text-center bg-primary Icons">
                @if($role=='Administrator')
                    <a href="{{route('print-papers',$paper->paperId)}}" target="_blank"><i class="fa fa-print"></i></a>
                @endif
                <a href="{{route('edit-genPaper',$paper->paperId)}}"><i class="fa fa-edit"></i></a>
                @if($role=='Teacher')
                    <a href="{{route('show-paper',$paper->paperId)}}" id="show"><i class="fa fa-search"></i></a>
                @endif

                @if($role=='Administrator')
                    <a href="{{route('remove-paper',$paper->paperId)}}" class="remove"><i class="fa fa-trash-alt"></i></a>
                @endif
            </div>
        </div>
    </div>
@endforeach