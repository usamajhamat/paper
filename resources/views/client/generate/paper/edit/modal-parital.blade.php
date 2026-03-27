<link href="{{asset('public/admin/assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

<!--Select2 js -->
<script src="{{asset('public/admin/assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- Inline js -->
<script src="{{asset('public/admin/assets/js/select2.js')}}"></script>
<form id="generateForm">
    <input type="hidden" name="form" value="edit">
    <input type="hidden" name="panel" value="{{$panel}}">
    <input type="hidden" name="cq_number" value="{{$cq}}">
    <div class="col-md-12">
        <div class="">
            <div class="panel-group" id="media-accordion1" role="tablist">
                <div class="media media-lg">
                    <div class="media-left media-middle">
                        <a data-toggle="collapse" data-parent="#accordion" href="#media-collapse-11" aria-expanded="true">
                            <img class="media-object" src="{{url('images').'/'.$subject->cover}}" alt="subject image" style="height:auto;">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="panel-heading m-0 pt-0 pb-0">Chapters List</h4>
                        <div class="panel-body">
                            <div class="row">
                                @foreach($chapters as $chapter)
                                @php $ch=\App\Models\Admin\Chapter::chaptersById($chapter) @endphp
                                @if(in_array($ch->chapter_id,$ch1))
                                <div class="col-md-4">
                                    <div class="form-group m-0">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="ch[]" value="{{$ch->chapter_id}}" checked>
                                                <span class="custom-control-label"> CHAP {{$ch->chapter_number}}: {{$ch->chapter_name}}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-3">
                                    <div class="form-group m-0">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="ch[]" value="{{$ch->chapter_id}}">
                                                <span class="custom-control-label"> CHAP {{$ch->chapter_number}}: {{$ch->chapter_name}}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @endforeach

                            </div>
                            {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                            {{--<footer class="text-right p-1 mt-1">--}}
                            {{--<a data-toggle="collapse" data-parent="#media-accordion1" href="#media-collapse-11" aria-expanded="true"  class="btn btn-sm btn-primary">--}}
                            {{--<i class="fa fa-search fa-blink"></i> Toggle Search Form--}}
                            {{--</a>--}}
                            {{--</footer>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div id="media-collapse-11" class="panel-collapse collapse show" role="tabpanel">
                    <div class="panel-body">
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="type">Question Type</label>
                                                <select name="type" id="type" class="form-control type101" style="border: 1px solid #ff685c;">
                                                    <option value="">select</option>
                                                    @foreach($types as $type)
                                                    @foreach($assign_types as $a)
                                                    @if($type->question_id==$type1)
                                                    @if($type->question_id==$a)
                                                    @php $urdu=$type->urdu!=null?'('.$type->urdu.')':'' @endphp
                                                    @if($type->english!=null)
                                                    <option value="{{$type->question_id}}" selected>{{$type->english}} {{$urdu}}</option>
                                                    @else
                                                    <option value="{{$type->question_id}}" selected>{{$type->urdu}}</option>
                                                    @endif
                                                    @endif
                                                    @else
                                                    @if($type->question_id==$a)
                                                    @php $urdu=$type->urdu!=null?'('.$type->urdu.')':'' @endphp
                                                    @if($type->english!=null)
                                                    <option value="{{$type->question_id}}">{{$type->english}} {{$urdu}}</option>
                                                    @else
                                                    <option value="{{$type->question_id}}">{{$type->urdu}}</option>
                                                    @endif
                                                    @endif
                                                    @endif

                                                    @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group m-0">
                                                <label class="form-label" for="priority">Priority</label>
                                                @foreach($priorities as $p)
                                                @foreach($assign_priority as $a)
                                                @if($p->priority_id==$a)
                                                @if(in_array($a,$priority))
                                                <div class="form-check-inline">
                                                    <label class="custom-control custom-checkbox" style="margin-left: 2px;">
                                                        <input type="checkbox" class="custom-control-input pr1"  name="priority[]" value="{{$p->priority_id}}" checked>
                                                        <span class="custom-control-label">{{$p->priority_name}}</span>
                                                    </label>
                                                </div>
                                                @else
                                                <div class="form-check-inline">
                                                    <label class="custom-control custom-checkbox" style="margin-left: 2px;">
                                                        <input type="checkbox" class="custom-control-input pr1"  name="priority[]" value="{{$p->priority_id}}">
                                                        <span class="custom-control-label">{{$p->priority_name}}</span>
                                                    </label>
                                                </div>
                                                @endif
                                                @endif
                                                @endforeach
                                                @endforeach
                                                {{--</div>--}}
                                            </div>
                                            {{--<div class="form-group">--}}
                                            {{--<label class="form-label" for="priority">Priority</label>--}}
                                            {{--<select name="priority[]" id="priority" class="form-control select2" multiple="multiple" style="width:100%;">--}}
                                            {{--@foreach($priorities as $p)--}}
                                            {{--@foreach($assign_priority as $a)--}}
                                            {{--@if($p->priority_id==$a)--}}
                                            {{--@if(in_array($a,$priority))--}}
                                            {{--<option value="{{$p->priority_id}}" selected>{{$p->priority_name}}</option>--}}
                                            {{--@else--}}
                                            {{--<option value="{{$p->priority_id}}">{{$p->priority_name}}</option>--}}
                                            {{--@endif--}}
                                            {{--@endif--}}
                                            {{--@endforeach--}}
                                            {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--</div>--}}
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="mediums">Medium</label>
                                                <select class="form-control medium101" id="mediums" name="medium" style="border: 1px solid #ff685c;">
                                                    <option value="">Select</option>
                                                    @foreach($mediums as $medium)
                                                    @if($medium->medium_id==$medium1)
                                                    <option value="{{$medium->medium_id}}" selected>{{$medium->medium_name}}</option>
                                                    @else
                                                    <option value="{{$medium->medium_id}}">{{$medium->medium_name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-label">Required Questions</label>
                                                <input type="number" class="form-control total_questions t1" value="{{$required}}" name="total_question" id="total_questions" placeholder="Required Questions" style="border: 1px solid #ff685c;">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-label">Ignored Questions</label>
                                                <input type="number" class="form-control" value="{{$ignore}}" name="ignored" id="ignored" placeholder="Ignored Questions" style="border: 1px solid #ff685c;">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-label">Each Marks</label>
                                                <input type="number" class="form-control e1" value="{{$marks}}" name="mark" id="mark" placeholder="Each Mark" style="border: 1px solid #ff685c;">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-label">Blank Lines</label>
                                                <input type="number" class="form-control" name="blank" value="{{$blank}}" id="exampleInputEmail11" placeholder="Blank Lines" style="border: 1px solid #ff685c;">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {{--<div class="form-label">Checkboxes</div>--}}
                                                        <div class="custom-controls-stacked">
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="boards" value="1">
                                                                <span class="custom-control-label">Show Boards</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {{--<div class="form-label">Checkboxes</div>--}}
                                                        <div class="custom-controls-stacked">
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="lines" value="2">
                                                                <span class="custom-control-label">2 Questions Per Line</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" style="width: 100%;"><i class="fa fa-search"></i> SEARCH</button>
                                    </div>
                                </div>

                            </div>
                            {{--<div class="form-footer">--}}
                            {{--<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> SEARCH</button>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
<div class="row mb-5 mt-3">
    <div class="col-md-12" style="height: 40px;background-color: #ff685c;color:#ffffff">
        <div class="row">
            <div class="col-md-6 mt-2">
                <strong class="">Selected Questions: <span class="selected"></span></strong>
            </div>
            <div class="col-md-6 mt-2">
                <strong class="float-right">Total Questions: <span class="total" id="total">0</span></strong>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-12" style="height: 150px;overflow-y: auto;">
        <div id="data1">
            {!! $question !!}
        </div>
    </div>
</div>
<div style="clear:both; margin-bottom: 15px"></div>
<div class="row">
    <div class="col-md-6">
        <button class="btn btn-info" type="button" id="randomSelect">
            Random Select <i class="fa fa-chevron-right"></i>
        </button>
    </div>
    <div class="col-md-6">
        <button class="btn btn-primary float-right" id="addBtn" type="button">
            <i class="fa fa-plus"></i> Add Question
        </button>
    </div>
</div>
<div style="clear:both; margin-bottom: 15px"></div>

<div class="row">
    <div class="col-12" style="height: 150px;overflow-y: auto;">
        <div class="SelectedDiv" id="selectedQuestion1" style="background-color: #ffff;">
            {!! $selected !!}
        </div>
    </div>
</div>