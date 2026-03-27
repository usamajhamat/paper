@foreach($courses as $course)
    <tr>
        {{--<th scope="row">{{$course->course_id}}</th>--}}
        @if($course->descriptive_name!=null)
            <td>{{$course->course_name}} (<small>{{$course->descriptive_name}}</small>)</td>
        @else
            <td>{{$course->course_name}}</td>
        @endif

        <td>
            <a class="btn btn-sm btn-info edit" href="{{route('course-edit',$course->course_id)}}"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-sm btn-danger remove" href="{{route('course-remove',$course->course_id)}}"><i class="fa fa-trash"></i> Delete</a>
        </td>
    </tr>
@endforeach