<input type="hidden" name="id" value="{{$topic->topic_id}}">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="course1">Course</label>
            <select class="form-control custom-select" name="course" id="course1">
                <option value="">--Select--</option>
                @foreach($courses as $course)
                    @if($topic->t_course==$course->course_id)
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
                    @if($topic->t_class==$class->class_id)
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
            <label class="form-label" for="subjects1">Subjects</label>
            <select class="form-control custom-select" id="subjects1" name="subject">
                @foreach($subjects as $subject)
                    @if($topic->t_subject==$subject->subject_id)
                        <option value="{{$subject->subject_id}}" selected>{{$subject->subject_name}}</option>
                    @else
                        <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="chapters1">Chapter</label>
            <select class="form-control custom-select" id="chapters1" name="chapter">
                @foreach($chapters as $chapter)
                    @if($topic->t_chapter==$chapter->chapter_id)
                        <option value="{{$chapter->chapter_id}}" selected>{{$chapter->chapter_name}}</option>
                    @else
                        <option value="{{$chapter->chapter_id}}">{{$chapter->chapter_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Topic Name</label>
            <input type="text" id="topic" class="form-control" name="topic"  placeholder="Topic Name" value="{{$topic->topic_name}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Topic Number</label>
            <input type="number" id="num" step="any" class="form-control" name="number"  placeholder="Topic Number" value="{{$topic->topic_number}}">
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
@push('script')
    <script>
        $(document).ready(function () {
        })
    </script>

@endpush