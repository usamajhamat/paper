@if($location=='paper')
    @foreach($subjects as $subject)
        @if($subject->subject_id==$subjectId)
            <option value="{{$subject->subject_id}}" selected>{{$subject->subject_name}}</option>
        @else
            <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
        @endif
    @endforeach

@elseif($location=='modal')
    @foreach($subjects as $subject)
        <tr>
            <td>{{$subject->subject_name}}</td>
            <td>
                <a class="btn btn-sm btn-primary edit" href="{{route('board-subject-edit',$subject->subject_id)}}"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-sm btn-danger remove" href="{{route('board-subject-remove',$subject->subject_id)}}"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
    @endforeach
@endif
