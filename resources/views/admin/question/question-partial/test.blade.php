<div class="card-body">

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="course">Course</label>
                <select class="form-control custom-select" name="course" id="course1">
                    <option value="">--Select--</option>
                    @foreach($courses as $course)
                        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="classes1">Class</label>
                <select class="form-control custom-select" id="classes1" name="class">
                    @foreach($subjects as $subject)
                        @if($question->chapter==$subject->subject_id)
                            <option value="{{$subject->subject_id}}" selected>{{$subject->subject_name}}</option>
                        @else
                            <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="subjects1">Subjects</label>
                <select class="form-control custom-select" id="subjects1" name="subject">
                    @foreach($subjects as $subject)
                        @if($question->chapter==$subject->subject_id)
                            <option value="{{$subject->subject_id}}" selected>{{$subject->subject_name}}</option>
                        @else
                            <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="chapters1">Chapter</label>
                <select class="form-control custom-select" id="chapters1" name="chapter">
                    @foreach($chapters as $chapter)
                        @if($question->chapter==$chapter->chapter_id)
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

        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="topics1">Topics</label>
                <select class="form-control custom-select" id="topics1" name="topic">
                    @foreach($topics as $topic)
                        @if($question->topic==$topic->topic_id)
                            <option value="{{$topic->topic_id}}" selected>{{$topic->topic_name}}</option>
                        @else
                            <option value="{{$topic->topic_id}}">{{$topic->topic_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="types1">Question Type</label>
                <select class="form-control custom-select" id="types1" name="q_type">
                    @foreach($types as $type)
                        @php $urdu=$type->urdu!=null?'('. $type->urdu.')':''; @endphp
                        @if($type->english!=null)
                            @if($question->question_type==$type->question_id)
                                <option value="{{$type->question_id}}" selected>{{$type->english}} <small>{{$urdu}}</small></option>
                            @else
                                <option value="{{$type->question_id}}">{{$type->english}} <small>{{$urdu}}</small></option>
                            @endif
                        @else
                            @if($question->question_type==$type->question_id)
                                <option value="{{$type->question_id}}" selected>{{$type->urdu}}</option>
                            @else
                                <option value="{{$type->question_id}}">{{$type->urdu}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="priorities1">Question Priority</label>
                <select class="form-control custom-select" id="priorities1" name="priority">
                    @foreach($priorities as $priority)
                        @if($question->priority==$priority->priority_id)
                            <option value="{{$priority->priority_id}}" selected>{{$priority->priority_name}}</option>
                        @else
                            <option value="{{$priority->priority_id}}">{{$priority->priority_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="mediums">Medium</label>
                <select class="form-control custom-select" id="mediums" name="medium">
                    @foreach($mediums as $medium)
                        @if($question->medium==$medium->medium_id)
                            <option value="{{$medium->medium_id}}" selected>{{$medium->medium_name}}</option>
                        @else
                            <option value="{{$medium->medium_id}}">{{$medium->medium_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div id="dataToAppend">

    </div>
    {{--<div class="row bg-light mt-2">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="form-group">--}}
    {{--<label class="form-label">In English</label>--}}
    {{--<div class="row gutters-xs">--}}
    {{--<div class="col">--}}
    {{--<input type="text" class="form-control" placeholder="Search for...">--}}
    {{--</div>--}}
    {{--<span class="col-auto">--}}
    {{--<button class="btn btn-primary" type="button"><i class="fa fa-trash"></i></button>--}}
    {{--</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="form-group">--}}
    {{--<label class="form-label">In Urdu</label>--}}
    {{--<div class="row gutters-xs">--}}
    {{--<div class="col">--}}
    {{--<input type="text" class="form-control urdu" style="width: 95%;" placeholder="یہاں لکھیں...">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    @include('admin.js.js-partial')

</div>

