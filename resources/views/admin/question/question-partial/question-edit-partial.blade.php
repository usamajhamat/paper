{{--@if(in_array($type,$types))--}}
    {{--<input type="hidden" name="id" value="{{$question->q_id}}">--}}
    {{--@if($lang=='Dual')--}}
        {{--<div class="row bg-light margin_bottom">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label" for="mytextarea">{{$title}} Name</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text" class="form-control input english" name="english" placeholder="write here..." value="{{$question->question_english}}" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">{{$title}} Name</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text"  class="form-control urdu input" name="urdu"  placeholder="یہاں لکھیں..." value="{{$question->question_urdu}}" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@elseif($lang=='Urdu')--}}
        {{--<div class="row bg-light">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">{{$title}} Name</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text" class="form-control urdu input" name="urdu" placeholder="یہاں لکھیں..." value="{{$question->question_urdu}}" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@elseif($lang=='English')--}}
        {{--<div class="row bg-light margin_bottom">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">{{$title}} Name</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text" class="form-control input english" name="english" value="{{$question->question_english}}" placeholder="write here..." required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}
{{--@endif--}}

<script>
    tinymce.editors = [];
    if(window.tinymce){
        $(window.tinymce.editors).each(function(idx, p) {
            window.tinymce.remove(idx);
        });
    }
</script>
@include('editor.my-editor')
@if(in_array($type,\App\Models\Helper::questionTypes()))

    <input type="hidden" name="type" value="{{$type}}">
    <input type="hidden" name="id" value="{{$question->q_id}}">
    @if($lang=='Dual')
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here">{{$question->question_english}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں">{{$question->question_urdu}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->question_board}}" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($lang=='Urdu')
        <div class="row bg-light">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں">{{$question->question_urdu}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->question_board}}" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($lang=='English')
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here">{{$question->question_english}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->question_board}}" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="quBtn" class="btn btn-primary">Save Changes</button>
    </div>
@endif

@if(in_array($type,\App\Models\Helper::booleanTypes()))
    <input type="hidden" name="id" value="{{$question->q_id}}">
    <input type="hidden" name="type" value="{{$type}}">

    @if($lang=='Dual')
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="english" id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->question_english}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Answer</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->ans_english}}" class="form-control input english" name="ans_eng" placeholder="answer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں">{{$question->question_urdu}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Answer</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->ans_urdu}}"  class="form-control urdu input" name="ans_urdu"  placeholder="یہاں لکھیں...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->question_board}}" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @elseif($lang=='Urdu')
        <div class="row bg-light">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں">{{$question->question_urdu}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Answer</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->ans_urdu}}"  class="form-control urdu input" name="ans_urdu"  placeholder="یہاں لکھیں...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->question_board}}" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($lang=='English')
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here">{{$question->question_english}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Answer</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->ans_english}}" class="form-control input english" name="ans_eng" placeholder="answer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->question_board}}" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="quBtn" class="btn btn-primary">Save Changes</button>
    </div>
@endif

@if(in_array($type,\App\Models\Helper::mcqTypes()))
    <input type="hidden" name="type" value="{{$type}}">
    <input type="hidden" name="id" value="{{$question->q_id}}">
    @if($lang=='Dual')
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->question_english}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option A</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_a"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->eng_a}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option B</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_b"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->eng_b}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option C</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_c"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->eng_c}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option D</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_d"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->eng_d}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">Answer</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text" value="{{$question->ans_english}}" class="form-control input english" name="ans_eng" placeholder="answer">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں">{{$question->question_urdu}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option A</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_a"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;">{{$question->urdu_a}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option B</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_b"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;">{{$question->urdu_b}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option C</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_c"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;">{{$question->urdu_c}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option D</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_d"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;">{{$question->urdu_d}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">Answer</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text" value="{{$question->ans_urdu}}"  class="form-control urdu input" name="ans_urdu"  placeholder="یہاں لکھیں...">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12">
                @include('admin.question.question-partial.edit-mcq')
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->question_board}}" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($lang=='Urdu')
        <div class="row bg-light">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں">{{$question->question_urdu}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option A</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_a"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;">{{$question->urdu_a}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option B</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_b"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;">{{$question->urdu_b}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option C</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_c"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;">{{$question->urdu_c}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option D</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_d"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;">{{$question->urdu_d}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">Answer</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text" value="{{$question->ans_urdu}}"  class="form-control urdu input" name="ans_urdu"  placeholder="یہاں لکھیں...">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12">
                @include('admin.question.question-partial.edit-mcq')
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->question_board}}" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($lang=='English')
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->question_english}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option A</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_a"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->eng_a}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option B</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_b"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->eng_b}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option C</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_c"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->eng_c}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option D</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_d"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;">{{$question->eng_d}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">Answer</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text" value="{{$question->ans_english}}" class="form-control input english" name="ans_eng" placeholder="answer">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12">
                @include('admin.question.question-partial.edit-mcq')
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" value="{{$question->question_board}}" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="quBtn" class="btn btn-primary">Save Changes</button>
    </div>
@endif
