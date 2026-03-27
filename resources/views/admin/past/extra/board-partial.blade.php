
@if($location=='paper')
    @foreach($boards as $board)
        @if($board->board_id==$boardId)
            <option value="{{$board->board_id}}" selected>{{$board->board_name}}</option>
        @else
            <option value="{{$board->board_id}}">{{$board->board_name}}</option>
        @endif
    @endforeach

    @elseif($location=='modal')
    @foreach($boards as $board)
        <tr>
            <td>{{$board->board_name}}</td>

            <td>
                <a class="btn btn-sm btn-info edit" href="{{route('board-edit',$board->board_id)}}"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-sm btn-danger remove" href="{{route('board-remove',$board->board_id)}}"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
    @endforeach
@endif


