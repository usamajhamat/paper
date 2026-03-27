<div class="row">
    <input type="hidden" name="id" value="{{$class->class_id}}">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label">Course</label>
            <select class="form-control custom-select" name="course">
                @foreach($courses as $course)
                    @if($class->course_id==$course->course_id)
                        <option value="{{$course->course_id}}" selected>{{$course->course_name}}</option>
                        @else
                        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label">Class Name</label>
            <input type="text" class="form-control" name="class"  placeholder="Name" value="{{$class->class_name}}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label">Class In Number</label>
            <input type="number" class="form-control" name="num"  placeholder="Number" value="{{$class->class_number}}">
        </div>
    </div>
</div>


<script>


</script>