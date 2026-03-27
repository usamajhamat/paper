<script>
    tinymce.editors = [];
    if(window.tinymce){
        $(window.tinymce.editors).each(function(idx, p) {
            window.tinymce.remove(idx);
        });
    }
</script>
@include('editor.my-editor')
@if($types!=null)
    @if(in_array($type,\App\Models\Helper::questionTypes()))
        <input type="hidden" name="type" value="{{$type}}">
        {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
        {{--<div class="form-group">--}}
        {{--<label for="">Urdu</label>--}}
        {{--<textarea name=""  id="" class="form-control te"></textarea>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        @if($lang=='Dual')
            <div class="row bg-light margin_bottom">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="mytextarea">{{$title}} Name</label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>

                                {{--<input type="text" class="form-control input english" name="english" placeholder="write here...">--}}
                            </div>
                            {{--<span class="col-auto">--}}
                            {{--<button class="btn btn-info" type="button"><i class="fe fe-plus"></i></button>--}}
                            {{--</span>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">{{$title}} Name</label>
                        <div class="row gutters-xs">
                            <div class="col">
                                {{--<input type="text"  class="form-control urdu input" name="urdu"  placeholder="یہاں لکھیں...">--}}
                                <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Question Boards</label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <input type="text" class="form-control input english" name="boards" placeholder="Boards">
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
                                <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں"></textarea>
                                {{--<input type="text" class="form-control urdu input" name="urdu" placeholder="یہاں لکھیں...">--}}
                            </div>
                            {{--<span class="col-auto">--}}
                            {{--<button class="btn btn-info" type="button"><i class="fe fe-plus"></i></button>--}}
                            {{--</span>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Question Boards</label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <input type="text" class="form-control input english" name="boards" placeholder="Boards">
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
                                <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here"></textarea>
                                {{--<input type="text" class="form-control input english" name="english" placeholder="write here...">--}}
                            </div>
                            {{--<span class="col-auto">--}}
                            {{--<button class="btn btn-info" type="button"><i class="fe fe-plus"></i></button>--}}
                            {{--</span>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Question Boards</label>
                        <div class="row gutters-xs">
                            <div class="col">
                                <input type="text" class="form-control input english" name="boards" placeholder="Boards">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

@endif
@if(in_array($type,\App\Models\Helper::booleanTypes()))
    <input type="hidden" name="type" value="{{$type}}">


    @if($lang=='Dual')
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Answer</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control input english" name="ans_eng" placeholder="answer">
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
                            <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Answer</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text"  class="form-control urdu input" name="ans_urdu"  placeholder="یہاں لکھیں...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control input english" name="boards" placeholder="Boards">
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
                            <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Answer</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text"  class="form-control urdu input" name="ans_urdu"  placeholder="یہاں لکھیں...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control input english" name="boards" placeholder="Boards">
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
                            <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Answer</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control input english" name="ans_eng" placeholder="answer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

@if(in_array($type,\App\Models\Helper::mcqTypes()))
    <input type="hidden" name="type" value="{{$type}}">
    @if($lang=='Dual')
        <div class="row bg-light margin_bottom">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">{{$title}} Name</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option A</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_a"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option B</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_b"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option C</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_c"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option D</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_d"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">Answer</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text" class="form-control input english" name="ans_eng" placeholder="answer">--}}
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
                            <textarea name="urdu" id="urdutst" class="form-control te input" placeholder="لکھنا شروع کریں"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option A</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_a"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option B</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_b"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option C</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_c"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option D</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_d"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">Answer</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text"  class="form-control urdu input" name="ans_urdu"  placeholder="یہاں لکھیں...">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12">
                @include('admin.question.question-partial.mcq-options')
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control input english" name="boards" placeholder="Boards">
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
                            <textarea name="urdu"  id="" class="form-control te input" placeholder="لکھنا شروع کریں"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option A</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_a"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option B</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_b"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option C</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_c"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option D</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="ur_d"  id="" class="form-control te input" placeholder="لکھنا شروع کریں" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">Answer</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text"  class="form-control urdu input" name="ans_urdu"  placeholder="یہاں لکھیں...">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12">
                @include('admin.question.question-partial.mcq-options')
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control input english" name="boards" placeholder="Boards">
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
                            <textarea name="english"  id="" class="form-control eng english" placeholder="Write Here"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option A</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_a"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option B</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_b"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option C</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_c"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="mytextarea">Option D</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <textarea name="eng_d"  id="" class="form-control eng english" placeholder="Write Here" style="height: 40px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="form-label">Answer</label>--}}
                    {{--<div class="row gutters-xs">--}}
                        {{--<div class="col">--}}
                            {{--<input type="text" class="form-control input english" name="ans_eng" placeholder="answer">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12">
                @include('admin.question.question-partial.mcq-options')
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Question Boards</label>
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control input english" name="boards" placeholder="Boards">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif


@endif
