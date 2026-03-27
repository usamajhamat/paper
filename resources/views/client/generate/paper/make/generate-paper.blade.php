
@php
    $eng=$ignored!=null?'Any '.($total_questions-$ignored):'';
    $urdu=$ignored!=null?' کوئی سے '.($total_questions-$ignored):'';
    $total_marks=$ignored!=null?($total_questions-$ignored)*$mark:$total_questions*$mark;
    $total_questions1=$ignored!=null?($total_questions-$ignored):$total_questions;
@endphp
@if(in_array($type,\App\Models\Helper::mcqTypes()))
    <div id="QuePanel-{{$qn}}" chapters="{{ implode(',', $chapters)}}" quetype="{{$typeId}}" requiredques="{{$total_questions}}" ignoreques="{{$ignored}}" questionmarks="{{$mark}}" blanklines="{{$blank}}" medium="{{$mediumId}}" selectedids="{{ implode(',', $questionsId)}}" prioritytype="{{implode(',',$priorities)}}">
        <table width="100%" class="HeadingTbl">
            <tbody>
            <tr>
                {{--@php $total_marks=$total_questions*$mark; @endphp--}}
                @if($medium=='Dual')
                  <td width="9%" class="Td1">Q{{$qn}}.</td>
                  <td width="44%" class="Td2">{{$qt->st_eng}} {{$eng}} </td>
                  <td width="9%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                  <td width="34%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                @elseif($medium=='English')
                    <td width="10%" class="Td1">Q{{$qn}}.</td>
                    <td width="80%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                @elseif($medium=='Urdu')
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="80%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                    <td width="10%" class="Td1">{{$qn}}: سوال نمبر</td>
                @endif
            </tr>
            </tbody>
        </table>
        <div class="QuestionType">
            @php $count=1; @endphp
            @foreach($questions as $question)
                @if($medium=='Dual')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146451" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div style="clear: both;"></div>
                        <li class="UrduMcqs">
                            <span>(A)</span>
                            {!! $question->urdu_a !!}
                            {!! $question->eng_a !!}

                        </li>
                        <li class="UrduMcqs">
                            <span>(B)</span>
                            {!! $question->urdu_b !!}
                            {!! $question->eng_b !!}
                        </li>
                        <li class="correctAnswer UrduMcqs" thiscorrect="1-(C)">
                            <span>(C)</span>
                            {!! $question->urdu_c !!}
                            {!! $question->eng_c !!}
                        </li>
                        <li class="UrduMcqs">
                            <span>(D)</span>
                            {!! $question->urdu_d !!}
                            {!! $question->eng_d!!}
                        </li>
                        <div style="clear: both;"></div>
                    </div>
                @elseif($medium=='English')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146576" onclick="">
                        <div class="EnglishDiv"><span class="roman">{{$count}}.</span>{!! $question->question_english !!}
                        </div><div style="clear:both;"></div><li class="EnglishMcqs"><span>(A)</span>{!! $question->eng_a !!}
                        </li><li class="EnglishMcqs"><span>(B)</span>{!! $question->eng_b !!}
                        </li><li class="EnglishMcqs"><span>(C)</span>{!! $question->eng_c !!}
                        </li><li class="EnglishMcqs"><span>(D)</span>{!! $question->eng_d !!}
                        </li><div style="clear:both;"></div></div>
                    {{--<div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146576" onclick="">--}}
                        {{--<div class="EnglishDiv">--}}
                            {{--<span>{{$count}}.</span>--}}
                            {{--{!! $question->question_english !!}--}}
                        {{--</div>--}}
                        {{--<div style="clear: both;"></div>--}}
                        {{--<li class="EnglishMcqs">--}}
                            {{--<span>(A)</span>--}}
                            {{--{!! $question->eng_a !!}--}}
                        {{--</li>--}}
                        {{--<li class="EnglishMcqs">--}}
                            {{--<span>(B)</span>--}}
                            {{--{!! $question->eng_b !!}--}}
                        {{--</li>--}}
                        {{--<li class="correctAnswer EnglishMcqs" thiscorrect="1-(C)">--}}
                            {{--<span>(C)</span>--}}
                            {{--{!! $question->eng_c !!}--}}
                        {{--</li>--}}
                        {{--<li class="EnglishMcqs">--}}
                            {{--<span>(D)</span>--}}
                            {{--{!! $question->eng_d !!}--}}
                        {{--</li>--}}
                        {{--<div style="clear: both;"></div>--}}
                    {{--</div>--}}
                @elseif($medium=='Urdu')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146451" onclick="">
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_urdu!!}
                        </div>
                        <div style="clear: both;"></div>
                        <li class="UrduMcqs">
                            <span>(A)</span>
                            {!! $question->urdu_a !!}
                        </li>
                        <li class="UrduMcqs">
                            <span>(B)</span>
                            {!! $question->urdu_b !!}
                        </li>
                        <li class="correctAnswer UrduMcqs" thiscorrect="1-(C)">
                            <span>(C)</span>
                            {!! $question->urdu_c !!}
                        </li>
                        <li class="UrduMcqs">
                            <span>(D)</span>
                            {!! $question->urdu_d !!}
                        </li>
                        <div style="clear: both;"></div>
                    </div>
                @endif
                @php $count=$count+1 @endphp
            @endforeach
        </div>
        <div class="no-print udButtons">
            <span><a class="fa fa-edit text-info" data-bs-toggle="modal" data-bs-target="#QuestionsModal" mainid="QuePanel-{{$qn}}" onclick="EditQuePanel(this)"></a></span>
            <span><a class="fa fa-trash text-danger" mainid="QuePanel-{{$qn}}" onclick="RemoveQuePanel(this)"></a></span>
        </div>
    </div>

@endif

@if(in_array($type,\App\Models\Helper::addType1()))
    <div id="QuePanel-{{$qn}}" chapters="{{ implode(',', $chapters)}}" quetype="{{$typeId}}" requiredques="{{$total_questions}}" ignoreques="{{$ignored}}" questionmarks="{{$mark}}" blanklines="{{$blank}}" medium="{{$mediumId}}" selectedids="{{ implode(',', $questionsId)}}" prioritytype="{{implode(',',$priorities)}}">
        <table width="100%" class="HeadingTbl">
            <tbody>
            <tr>
                {{--@php $total_marks=$total_questions*$mark; @endphp--}}
                @if($medium=='Dual')
                    <td width="9%" class="Td1">Q{{$qn}}.</td>
                    <td width="44%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="9%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="34%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                @elseif($medium=='English')
                    <td width="10%" class="Td1">Q{{$qn}}.</td>
                    <td width="80%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                @elseif($medium=='Urdu')
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="80%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                    <td width="10%" class="Td1">{{$qn}}: سوال نمبر</td>
                @endif
            </tr>
            </tbody>
        </table>
        <div class="QuestionType">
            @php $count=1; @endphp
            @foreach($questions as $question)
                @if($medium=='Dual')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146514" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span><span style="margin-right: 5px;"></span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}.</span><span style="margin-left: 5px;"></span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div class="clearfix"></div>
                         @if($blank!=0)
                            <div class="lineOuter">
                             @for($i=1;$i<=$blank;$i++)
                                    <hr class="blankLine" style="display: block;" />
                             @endfor
                            </div>
                          @endif
                        <div style="clear: both;"></div>
                    </div>
                @elseif($medium=='English')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @elseif($lines == 2) style="width:48% !important; display:inline-block;" @endif  id="Paste-146432" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}</span><span style="margin-right: 5px;">.</span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                @elseif($medium=='Urdu')
                    <div class="TableHover UrduAlign" @if($lines == 1) style="width:100% !important;" @elseif($lines == 2) style="width:48% !important; display:inline-block;" @endif id="Paste-147805" onclick="">
                        <div class="UrduDiv text-right"><span class="roman">{{$count}}.</span><span style="margin-left:5px;"></span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                @endif
                @php $count=$count+1 @endphp
            @endforeach
        </div>
        <div class="no-print udButtons">
        <span><a class="fa fa-edit text-info" data-bs-toggle="modal" data-bs-target="#QuestionsModal" mainid="QuePanel-{{$qn}}" onclick="EditQuePanel(this)"></a></span>
        <span><a class="fa fa-trash text-danger" mainid="QuePanel-{{$qn}}" onclick="RemoveQuePanel(this)"></a></span>
        </div>
    </div>

@endif
@if(in_array($type,\App\Models\Helper::addType2()))
    <div id="QuePanel-{{$qn}}" chapters="{{ implode(',', $chapters)}}" quetype="{{$typeId}}" requiredques="{{$total_questions}}" ignoreques="{{$ignored}}" questionmarks="{{$mark}}" blanklines="{{$blank}}" medium="{{$mediumId}}" selectedids="{{ implode(',', $questionsId)}}" prioritytype="{{implode(',',$priorities)}}">
        <table width="100%" class="HeadingTbl">
            <tbody>
            <tr>
                {{--@php $total_marks=$total_questions*$mark; @endphp--}}
                @if($medium=='Dual')
                    <td width="9%" class="Td1">Q{{$qn}}.</td>
                    <td width="44%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="9%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="34%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                @elseif($medium=='English')
                    <td width="10%" class="Td1">Q{{$qn}}.</td>
                    <td width="80%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                @elseif($medium=='Urdu')
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="80%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                    <td width="10%" class="Td1">{{$qn}}: سوال نمبر</td>
                @endif
            </tr>
            </tbody>
        </table>
        <div class="ThreeWordsType">
            @php $count=1; @endphp
            @foreach($questions as $question)
                @if($medium=='Dual')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146514" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div class="clearfix"></div>
                        @if($blank!=0)
                            <div class="lineOuter">
                                @for($i=1;$i<=$blank;$i++)
                                    <hr class="blankLine" style="display: block;" />
                                @endfor
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                    </div>
                @elseif($medium=='English')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146432" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                @elseif($medium=='Urdu')
                    <div class="TableHover UrduAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-147805" onclick="">
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                @endif
                @php $count=$count+1 @endphp
            @endforeach
        </div>
        <div class="no-print udButtons">
        <span><a class="fa fa-edit text-info" data-bs-toggle="modal" data-bs-target="#QuestionsModal" mainid="QuePanel-{{$qn}}" onclick="EditQuePanel(this)"></a></span>
        <span><a class="fa fa-trash text-danger" mainid="QuePanel-{{$qn}}" onclick="RemoveQuePanel(this)"></a></span>
        </div>
    </div>

@endif
@if(in_array($type,\App\Models\Helper::addType3()))
    <div id="QuePanel-{{$qn}}" chapters="{{ implode(',', $chapters)}}" quetype="{{$typeId}}" requiredques="{{$total_questions}}" ignoreques="{{$ignored}}" questionmarks="{{$mark}}" blanklines="{{$blank}}" medium="{{$mediumId}}" selectedids="{{ implode(',', $questionsId)}}" prioritytype="{{implode(',',$priorities)}}">
        <table width="100%" class="HeadingTbl">
            <tbody>
            <tr>
                {{--@php $total_marks=$total_questions*$mark; @endphp--}}
                @if($medium=='Dual')
                    <td width="9%" class="Td1">Q{{$qn}}.</td>
                    <td width="44%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="9%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="34%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                @elseif($medium=='English')
                    <td width="10%" class="Td1">Q{{$qn}}.</td>
                    <td width="80%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                @elseif($medium=='Urdu')
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="80%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                    <td width="10%" class="Td1">{{$qn}}: سوال نمبر </td>
                @endif
            </tr>
            </tbody>
        </table>
        <div class="ParagraphsType">
            @php $count=1; @endphp
            @foreach($questions as $question)
                @if($medium=='Dual')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146514" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span><span style="margin-right: 5px;"></span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}</span><span style="margin-left: 5px;">.</span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div class="clearfix"></div>
                        @if($blank!=0)
                            <div class="lineOuter">
                                @for($i=1;$i<=$blank;$i++)
                                    <hr class="blankLine" style="display: block;" />
                                @endfor
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                    </div>
                @elseif($medium=='English')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146432" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span><span style="margin-right: 5px;"></span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                @elseif($medium=='Urdu')
                    <div class="TableHover UrduAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-147805" onclick="">
                        <div class="UrduDiv"><span class="roman">{{$count}}.</span><span style="margin-left:5px;"></span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                @endif
                @php $count=$count+1 @endphp
            @endforeach
        </div>
        <div class="no-print udButtons">
        <span><a class="fa fa-edit text-info" data-bs-toggle="modal" data-bs-target="#QuestionsModal" mainid="QuePanel-{{$qn}}" onclick="EditQuePanel(this)"></a></span>
        <span><a class="fa fa-trash text-danger" mainid="QuePanel-{{$qn}}" onclick="RemoveQuePanel(this)"></a></span>
        </div>
    </div>
@endif

@if(in_array($type,\App\Models\Helper::addType4()))
    <div id="QuePanel-{{$qn}}" chapters="{{ implode(',', $chapters)}}" quetype="{{$typeId}}" requiredques="{{$total_questions}}" ignoreques="{{$ignored}}" questionmarks="{{$mark}}" blanklines="{{$blank}}" medium="{{$mediumId}}" selectedids="{{ implode(',', $questionsId)}}" prioritytype="{{implode(',',$priorities)}}">
        <table width="100%" class="HeadingTbl">
            <tbody>
            <tr>
                {{--@php $total_marks=$total_questions*$mark; @endphp--}}
                @if($medium=='Dual')
                    <td width="9%" class="Td1">Q{{$qn}}.</td>
                    <td width="44%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="9%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="34%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                @elseif($medium=='English')
                    <td width="10%" class="Td1">Q{{$qn}}.</td>
                    <td width="80%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                @elseif($medium=='Urdu')
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="80%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                    <td width="10%" class="Td1">{{$qn}}: سوال نمبر</td>
                @endif
            </tr>
            </tbody>
        </table>
        <div class="FiveWordsType">
            @php $count=1; @endphp
            @foreach($questions as $question)
                @if($medium=='Dual')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146514" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div class="clearfix"></div>
                        @if($blank!=0)
                            <div class="lineOuter">
                                @for($i=1;$i<=$blank;$i++)
                                    <hr class="blankLine" style="display: block;" />
                                @endfor
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                    </div>
                @elseif($medium=='English')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146432" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                @elseif($medium=='Urdu')
                    <div class="TableHover UrduAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-147805" onclick="">
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                @endif
                @php $count=$count+1 @endphp
            @endforeach
        </div>
        <div class="no-print udButtons">
         <span><a class="fa fa-edit text-info" data-bs-toggle="modal" data-bs-target="#QuestionsModal" mainid="QuePanel-{{$qn}}" onclick="EditQuePanel(this)"></a></span>
          <span><a class="fa fa-trash text-danger" mainid="QuePanel-{{$qn}}" onclick="RemoveQuePanel(this)"></a></span>
        </div>
    </div>
@endif

@if(in_array($type,\App\Models\Helper::addType5()))
    <div id="QuePanel-{{$qn}}" chapters="{{ implode(',', $chapters)}}" quetype="{{$typeId}}" requiredques="{{$total_questions}}" ignoreques="{{$ignored}}" questionmarks="{{$mark}}" blanklines="{{$blank}}" medium="{{$mediumId}}" selectedids="{{ implode(',', $questionsId)}}" prioritytype="{{implode(',',$priorities)}}">
        <table width="100%" class="HeadingTbl">
            <tbody>
            <tr>
                {{--@php $total_marks=$total_questions*$mark; @endphp--}}
                @if($medium=='Dual')
                    <td width="9%" class="Td1">Q{{$qn}}.</td>
                    <td width="44%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="9%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="34%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                @elseif($medium=='English')
                    <td width="10%" class="Td1">Q{{$qn}}.</td>
                    <td width="80%" class="Td2">{{$qt->st_eng}} {{$eng}}</td>
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                @elseif($medium=='Urdu')
                    <td width="10%" class="Td3">{{$total_questions1}}X{{$mark}}={{$total_marks}}</td>
                    <td width="80%" class="Td4">{{$qt->st_urdu }} {{$urdu}}</td>
                    <td width="10%" class="Td1">{{$qn}} : سوال نمبر</td>
                @endif
            </tr>
            </tbody>
        </table>
        <div class="TwoWordsType">
            @php $count=1; @endphp
            @foreach($questions as $question)
                @if($medium=='Dual')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146514" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span>
                            {!! $question->question_english !!}
                        </div>
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}.</span>
                            <p>{!! $question->question_urdu !!}</p>
                        </div>
                        <div class="clearfix"></div>
                        @if($blank!=0)
                            <div class="lineOuter">
                                @for($i=1;$i<=$blank;$i++)
                                    <hr class="blankLine" style="display: block;" />
                                @endfor
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                    </div>
                @elseif($medium=='English')
                    <div class="TableHover EnglishAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-146432" onclick="">
                        <div class="EnglishDiv">
                            <span class="roman">{{$count}}.</span>
                            <p>{!! $question->question_english !!}</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                @elseif($medium=='Urdu')
                    <div class="TableHover UrduAlign" @if($lines == 1) style="width:100% !important;" @endif id="Paste-147805" onclick="">
                        <div class="UrduDiv">
                            <span class="roman">{{$count}}.</span>
                           <p> {!! $question->question_urdu !!}</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="lineOuter">
                            @if($blank!=0)
                                <div class="lineOuter">
                                    @for($i=1;$i<=$blank;$i++)
                                        <hr class="blankLine" style="display: block;" />
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                @endif
                @php $count=$count+1 @endphp
            @endforeach
        </div>
        <div class="no-print udButtons">
          <span><a class="fa fa-edit text-info" data-bs-toggle="modal" data-bs-target="#QuestionsModal" mainid="QuePanel-{{$qn}}" onclick="EditQuePanel(this)"></a></span>
          <span><a class="fa fa-trash text-danger" mainid="QuePanel-{{$qn}}" onclick="RemoveQuePanel(this)"></a></span>
        </div>
    </div>

@endif

{{--<script src="{{asset('admin/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>--}}

{{--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>--}}
{{--<script src="{{asset('client/jquery.romannumerals.js')}}"></script>--}}

{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('.roman').romannumerals();--}}
    {{--});--}}
{{--</script>--}}