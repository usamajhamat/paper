@if($location=='paper')
    @foreach($classes as $class)
        @if($class->class_id==$classId)
            <option value="{{$class->class_id}}" selected>{{$class->class_name}}</option>
        @else
            <option value="{{$class->class_id}}">{{$class->class_name}}</option>
        @endif
    @endforeach
    @elseif($location=='modal')
    @foreach($classes as $class)
        <tr>
            <td>{{$class->class_name}}</td>
            <td>
                <a class="btn btn-sm btn-info edit" href="{{route('board-class-edit',$class->class_id)}}"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-sm btn-danger remove" href="{{route('board-class-remove',$class->class_id)}}"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
    @endforeach
@endif
