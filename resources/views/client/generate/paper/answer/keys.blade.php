@if(in_array($type,\App\Models\Helper::mcqTypes()))
    <h6 style="text-align:center; width:100%; clear:both;">Multiple Choice Correct Answers</h6>
    @php $count=1; @endphp
    @foreach($questions as $question)
        <li style="display: inline-block;border-top: 1px solid #fff;border-bottom: 1px solid #fff; font-size: 15px;background-color: #000;color: #fff;width: 5%;text-align: center;">{{$count}}</li>
        <li style="display: inline-block;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 15px;background-color: #fff;width: 5%;text-align: center;">
            {{$question->answer}}
        </li>
        @php $count++; @endphp
    @endforeach
@endif

@if(in_array($type,['blank']))
    <h6 style="text-align:center; width:100%; clear:both;">Fill In The Blanks Correct Answers</h6>
    @php $count=1; @endphp
    @foreach($questions as $question)
        <li style="display: inline-block;border-top: 1px solid #fff;border-bottom: 1px solid #fff; font-size: 15px;background-color: #000;color: #fff;width: 5%;text-align: center;">{{$count}}</li>
        <li style="display: inline-block;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 15px;background-color: #fff;width: 5%;text-align: center;">
            @if($medium->medium_name=='Dual')
                 {{$question->ans_english}}({{$question->ans_urdu}})
                @elseif($medium->medium_name=='Urdu')
                 {{$question->ans_urdu}}
                @elseif($medium->medium_name=='English')
                 {{$question->ans_english}}
            @endif
        </li>
        @php $count++; @endphp
    @endforeach

@endif
@if(in_array($type,['boolean1']))
    <h6 style="text-align:center; width:100%; clear:both;">True / False Correct Answers</h6>
    @php $count=1; @endphp
    @foreach($questions as $question)
        <li style="display: inline-block;border-top: 1px solid #fff;border-bottom: 1px solid #fff; font-size: 15px;background-color: #000;color: #fff;width: 5%;text-align: center;">{{$count}}</li>
        <li style="display: inline-block;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 15px;background-color: #fff;width: 5%;text-align: center;">
            @if($medium->medium_name=='Dual')
                {{$question->ans_english}}({{$question->ans_urdu}})
            @elseif($medium->medium_name=='Urdu')
                {{$question->ans_urdu}}
            @elseif($medium->medium_name=='English')
                {{$question->ans_english}}
            @endif
        </li>
        @php $count++; @endphp
    @endforeach
@endif