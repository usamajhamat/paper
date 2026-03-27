@if($type=='medium')
    @foreach($data as $medium)
        <tr>
            <td>{{$medium->medium_name}}</td>
            <td>
                <a class="btn btn-sm btn-info edit" href="{{route('pre-edit',[$medium->medium_id,'medium'])}}"><i class="fa fa-edit"></i> Edit</a>
            </td>
        </tr>
    @endforeach
    @elseif($type=='priority')
    @foreach($data as $priority)
        <tr>
            <td>{{$priority->priority_name}}</td>

            <td>
                <a class="btn btn-sm btn-info edit" href="{{route('pre-edit',[$priority->priority_id,'priority'])}}"><i class="fa fa-edit"></i> Edit</a>
            </td>
        </tr>
    @endforeach
    @elseif($type=='type')

    @foreach($data as $type)
        <tr>
            <td>{{$type->english}}</td>
            <td>{{$type->urdu}}</td>

            <td>
                <a class="btn btn-sm btn-info edit" href="{{route('pre-edit',[$type->question_id,'type'])}}"><i class="fa fa-edit"></i> Edit</a>
            </td>
        </tr>
    @endforeach
@endif