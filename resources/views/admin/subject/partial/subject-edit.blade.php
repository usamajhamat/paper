<div class="row">
    <input type="hidden" name="id" value="{{$subject->subject_id}}">
    <input type="hidden" name="cover" value="{{$subject->cover}}">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="course1">Course</label>
            <select class="form-control custom-select" name="course" id="course1">
                @foreach($courses as $course)
                    @if($subject->courseId==$course->course_id)
                        <option value="{{$course->course_id}}" selected>{{$course->course_name}}</option>
                        @else
                        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="classes1">Class</label>
            <select class="form-control custom-select" id="classes1" name="class">
                @foreach($classes as $class)
                    @if($subject->classId==$class->class_id)
                        <option value="{{$class->class_id}}" selected>{{$class->class_name}}</option>
                    @else
                        <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                    @endif

                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Subject Name</label>
            <input type="text" id="subject" class="form-control" name="subject"  placeholder="Name" value="{{$subject->subject_name}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Upload Subject Photo</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="cover"  name="photo">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" id="editSubjectBtn" class="btn btn-primary">Save changes</button>
</div>

<script>
    $(document).on('change', '#course1', function (e) {
        e.preventDefault();
        var url='{{route('course-classes','')}}'+'/'+$(this).val();
        $.ajax({
            type:'GET',
            url:url,
            success:function(data){
                var option='<option>Select</option>';

                $.each(data.classes,function (key,val) {
                    option +="<option value='"+val.class_id+"'>"+val.class_name+"</option>";
                });

                $('#classes1').html(option);

            }
        });
    });
    $(document).on('change', '#classes1', function (e) {
        e.preventDefault();
        var url='{{route('class-subjects','')}}'+'/'+$(this).val();
        $.ajax({
            type:'GET',
            url:url,
            success:function(data){
                var option='<option>Select</option>';

                $.each(data.subjects,function (key,val) {
                    option +="<option value='"+val.subject_id+"'>"+val.subject_name+"</option>";
                });
                $('#subjects1').html(option);

            }
        });
    });
</script>
