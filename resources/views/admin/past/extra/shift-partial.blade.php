@if($location=='paper')
    @foreach($shifts as $shift)
        @if($shift->shift_id==$shiftId)
            <option value="{{$shift->shift_id}}" selected>{{$shift->shift_name}}</option>
        @else
            <option value="{{$shift->shift_id}}">{{$shift->shift_name}}</option>
        @endif
    @endforeach

   @elseif($location=='modal')
    @foreach($shifts as $shift)
        <tr>
            <td>{{$shift->shift_name}}</td>

            <td>
                <a class="btn btn-sm btn-primary edit" href="{{route('shift-edit',$shift->shift_id)}}"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-sm btn-danger remove" href="{{route('shift-remove',$shift->shift_id)}}"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
    @endforeach
@endif
