@if($location=='paper')
    @foreach($types as $type)
        @if($type->type_id==$typeId)
            <option value="{{$type->type_id}}" selected>{{$type->type_name}}</option>
        @else
            <option value="{{$type->type_id}}">{{$type->type_name}}</option>
        @endif
    @endforeach

   @elseif($location=='modal')
    @foreach($types as $type)
        <tr>
            <td>{{$type->type_name}}</td>

            <td>
                <a class="btn btn-sm btn-primary edit" href="{{route('type-edit',$type->type_id)}}"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-sm btn-danger remove" href="{{route('type-remove',$type->type_id)}}"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
    @endforeach
@endif
