<input type="hidden" name="id" value="{{$chapter->chapter_id}}">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label" for="course1">Course</label>
            <select class="form-control custom-select" name="course" id="course1">
                <option value="">--Select--</option>
                @foreach($courses as $course)
                    @if($course->course_id==$chapter->course)
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
            <label class="form-label" for="classes1">Class</label>
            <select class="form-control custom-select" id="classes1" name="class">
                @foreach($classes as $class)
                    @if($class->class_id==$chapter->class)
                        <option value="{{$class->class_id}}" selected>{{$class->class_name}}</option>
                    @else
                        <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label" for="subjects1">Subjects</label>
            <select class="form-control custom-select" id="subjects1" name="subject">
                @foreach($subjects as $subject)
                    @if($subject->subject_id==$chapter->subject)
                        <option value="{{$subject->subject_id}}" selected>{{$subject->subject_name}}</option>
                    @else
                        <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Chapter Name</label>
            <input type="text" id="chapter" class="form-control" name="chapter"  placeholder="Chapter Name" value="{{$chapter->chapter_name}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Chapter Number</label>
            <input type="number" id="chapter" class="form-control" name="number"  placeholder="Chapter Number" value="{{$chapter->chapter_number}}">
        </div>
    </div>
</div>

<script>
    $(document).on('change', '#course1', function (e) {
        e.preventDefault();
        var url='{{route('course-classes','')}}'+'/'+$(this).val();
        $('#subjects1').empty();
        $('#chapters1').empty();
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

    $(document).on('change', '#subjects1', function (e) {
        e.preventDefault();
        var url='{{route('subject-chapters','')}}'+'/'+$(this).val();
        $.ajax({
            type:'GET',
            url:url,
            success:function(data){
                var option='<option>Select</option>';

                $.each(data.chapters,function (key,val) {
                    option +="<option value='"+val.chapter_id+"'>"+val.chapter_name+"</option>";
                });
                $('#chapters1').html(option);

            }
        });
    });
</script>
