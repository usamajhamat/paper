{{--<link href="https://www.paktestsolution.com/Content/GeneratePaper.css" rel="stylesheet" />--}}
<style>
    /*body {*/
    /*font-family:'Arial Narrow', 'Times New Roman', 'Jameel Noori Nastaleeq';*/
    /*}*/

    @font-face {
        font-family: 'Arial Narrow';
        src: local('Arial Narrow');
        src: url('https://www.paktestsolution.com/fonts/ARIALN.TTF') format('truetype');
    }

    @font-face {
        font-family: 'Jameel Noori Nastaleeq';
        src: local('Jameel Noori Nastaleeq');
    }

    @font-face {
        font-family: 'Jameel Noori Nastaleeq';
        src: local('Jameel Noori Nastaleeq');
        src: url('https://www.paktestsolution.com/fonts/Jameel Noori Nastaleeq.ttf') format('truetype');
    }


    .btn-outline-success:hover {
        cursor: pointer;
        color: #ffffff;
    }

    /*Pre Loader*/
    .pp-loader {
        position: fixed;
        background: rgba(255, 255, 255, 0.80);
        width: 100%;
        height: 100%;
        z-index: 99999;
        left: 0px;
        bottom: 0px;
        top: 0px;
        right: 0px;
    }

    .pp-loader-inner {
        position: absolute;
        top: 50%;
        left: 50%;
        -moz-transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        -o-transform: translate(-50%,-50%);
        -webkit-transform: translate(-50%,-50%);
        transform: translate(-50%,-50%);
    }

    /*Generate Paper Popup Question Div*/
    .ChaptersDiv {
        height: 120px;
        /*overflow-x: auto;*/
    }

    .QuestionDiv {
        height: 400px;
        width:100%;
        /*overflow-y: auto;*/
        margin-top:-10px;
        font-size:12pt;
        font-family: 'Arial Narrow', 'Jameel Noori Nastaleeq';
    }

    .QuestionDiv ul {
    }

    .QuestionDiv ul li.SelectedQuestion {
        background-color:rgba(200, 247, 197, .5);
        cursor:pointer;
    }

    .SelectedQuestion {
        background-color:rgba(200, 247, 197, .5);
        cursor:pointer;
    }

    .QuestionDiv .TableHover:hover {
        background-color: rgba(224, 224, 224, 0.5);
        cursor:pointer;
    }

    .QuestionDiv .SelectedQuestion:hover {
        color: #ff6a00;
        cursor:pointer;
    }

    .SelectedDiv {
        height: 300px;
        width:100%;
        /*overflow-y: auto;*/
        margin-top: 10px;
        background-color:rgba(200, 247, 197, .5);
        font-size:12pt;
        font-family: 'Arial Narrow', 'Jameel Noori Nastaleeq';
        color:#000;
    }


    /*Questions Alignment CSS*/
    .UrduDiv {
        float:right;
        direction:rtl;
        font-size:14pt;
        font-family:'Jameel Noori Nastaleeq';
        position:relative;
    }

    .EnglishDiv {
        float: left;
        direction: ltr;
        font-size: 13pt;
        font-family: 'Arial Narrow';
    }

    .UrduDiv p {
        float: inherit;
        line-height: 1;
    }

    .EnglishDiv p {
        float: inherit;
        line-height: 1;
    }

    .UrduDiv span {
        float: right;
        font-weight: bolder;
        line-height: 1;
    }

    .EnglishDiv span {
        float: left;
        font-weight: bolder;
        line-height: 1;
    }

    .QuestionType{
        width:100%;
        margin-top:8px;
        margin-bottom:8px;
    }

    .TwoWordsType{
        width:100%;
        margin-top:8px;
        margin-bottom:8px;
    }

    .ThreeWordsType{
        width:100%;
        margin-top:8px;
        margin-bottom:8px;
    }

    .FiveWordsType{
        width:100%;
        margin-top:8px;
        margin-bottom:8px;
    }

    .ParagraphsType p{
        line-height: 1.5;
        text-align:justify;
        float:none;
        color:#000;
    }

    .ParagraphsType span{
        line-height: 1.5;
        color:#000;
        font-weight:bolder;
    }

    .QuestionType table p{
        margin: 0;
        max-height: 3em;
        overflow: hidden;
        margin:2px;
    }

    .QuestionType ul{

    }

    .QuestionType ul li{
        width: 25%;
        display: inline-block;
        vertical-align:text-top;
    }

    .UrduMcqs{
        float: right;
        width: 25%;
        display: inline-block;
        font-size: 13pt;
        font-weight: 500;
        font-family: 'Arial Narrow','Jameel Noori Nastaleeq';
        vertical-align: top;
    }

    .UrduMcqs span {
        float: right;
        font-weight: bolder;
        margin-left: 3px;
        line-height: 15px;
    }

    .UrduMcqs p {
        float: right;
        margin-right: 3px;
        line-height: 15px;
    }

    .EnglishMcqs {
        width: 25%;
        display: inline-block;
        font-size: 13pt;
        font-weight: 400;
        font-family: 'Arial Narrow','Jameel Noori Nastaleeq';
        vertical-align: top;
    }

    .EnglishMcqs span {
        float: left;
        font-weight: bolder;
        margin-right: 3px;
        line-height: 20px;
    }

    .EnglishMcqs p {
        float: left;
        margin-left: 3px;
        line-height: 20px;
    }

    .UrduAlign{
    }

    .EnglishAlign{
    }

    .TwoWordsType .UrduAlign{
        width:50%;
        float:right;
    }

    .TwoWordsType .EnglishAlign{
        width:50%;
        float:left;
    }

    .ThreeWordsType .UrduAlign{
        width:33%;
        float:right;
        text-align:center;
    }

    .ThreeWordsType .EnglishAlign{
        width:33%;
        float:left;
        text-align:center;
    }

    .FiveWordsType .UrduAlign{
        width:20%;
        float:right;
    }

    .FiveWordsType .EnglishAlign{
        width:20%;
        float:left;
    }



    /*Table MCQ'S Alignment CSS*/
    .TblUrduDiv {
        float:right;
        direction:rtl;
        font-size:13pt;
        font-family:'Jameel Noori Nastaleeq';
    }

    .TblEnglishDiv {
        float:left;
        direction:ltr;
        font-size:13pt;
        font-family:'Arial Narrow';
    }

    .TblUrduDiv p{
        float:inherit;
        margin-bottom:0;
        margin-top:5px;
    }

    .TblEnglishDiv p{
        float:inherit;
        margin-bottom:0;
        margin-top:5px;
    }

    .TblUrduDiv span{
        float:inherit;
        font-weight:bolder;
        margin-bottom:0;
        margin-top:5px;
    }

    .TblEnglishDiv span{
        float:inherit;
        font-weight:bolder;
        margin-bottom:0;
        margin-top:5px;
    }


    /*Heading Table Alignment CSS*/
    .HeadingTbl tr{
        margin:10px;
    }

    .Td1{
        font-size:13pt;
        font-weight:bolder;
        text-align:center;
        border-bottom:2px solid #000;
        color:#000;
    }

    .Td2{
        font-size:12pt;
        font-weight:bolder;
        border-bottom:2px solid #000;
        color:#000;
    }

    .Td3{
        font-size:13pt;
        font-weight:bolder;
        text-align:center;
        border-bottom:2px solid #000;
        color:#000;
    }

    .Td4{
        font-size:13pt;
        font-weight:bolder;
        text-align:right;
        border-bottom:2px solid #000;
        font-family:'Jameel Noori Nastaleeq';
        color:#000;
    }


    @media screen and (max-width: 1200px) {
        body {
            zoom: 1;
        }
    }

    @media screen and (max-width: 992px) {
        body {
            zoom: 0.8;
        }
    }

    @media screen and (max-width: 768px) {
        body {
            zoom: 0.6;
        }
    }

    @media screen and (max-width: 576px) {
        body {
            zoom: 0.5;
        }
    }



    .Links {
        background-color: #fff;
        text-align: center;
    }

    .Links li {
        transition: .5s;
        text-decoration: none;
        padding: 10px;
        color: #000;
    }

    .Links li:hover {
        background-color: rgba(44, 180, 62, 0.3);
        cursor: pointer;
    }

    .Links a {
        text-decoration: none;
        color: #000;
    }

    .Links i {
        font-size: 35px;
    }



    .clearDiv{
        clear:both;
        margin:0;
    }

    .Qboards {
        margin-top: 10px;
        font-size: 10px;
        background-color: rgba(200, 247, 197, .5);
        width: 100%;
        font-weight: bold;
        float: left;
        margin-bottom:10px;
        padding-left:10px;
        text-align:left;
    }

    hr {
        box-sizing: content-box;
        /*overflow: visible;*/
        margin-bottom: 2rem;
        border-top: 1px solid #000;
    }


    .lineOuter {
        margin-top: -10px;
        margin-bottom: -10px;
    }

    .udButtons{
        padding:15px;
    }
</style>





<link href="https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css?display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/earlyaccess/notonaskharabic.css?display=swap" rel="stylesheet">

@if(in_array($type,\App\Models\Helper::addType1()))
   <div class="QuestionDiv" id="chooseQuestionsByChapterIDs">
    <div class="QuestionType">
        @php $count=1; @endphp
        @if($medium->medium_name=='Dual')
            @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                    <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                     <div class="EnglishDiv" style="">
                            <span class="roman mt-1">{{$count}}.</span>
                            <span style="margin-right:5px;"></span>
                            <p>{!! $question->question_english !!}</p>
                        </div>
                        <div class="UrduDiv mt-2" style="">
                            <span class="roman">{{$count}}</span>
                            <span style="margin-left:5px;">.</span>
                            <p class="text-right"> {!! $question->question_urdu !!}</p>
                        </div>
                        <div style="clear: both;"></div>
                        @if($board==1)
                            <div class="Qboards">
                                @if($question->question_board!=null)
                                    {{$question->question_board}}
                                @endif
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                    </div>
                      @else
                    <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">
                    <div class="EnglishDiv">
                            <span class="roman mt-1">{{$count}}.</span>
                            <span style="margin-right:5px;"></span>
                            <p>{!! $question->question_english !!}</p>
                        </div>
                        <div class="UrduDiv mt-2">
                            <span class="roman">{{$count}}</span>
                            <span style="margin-left:5px;">.</span>
                            <p class="text-right"> {!! $question->question_urdu !!}</p>
                        </div>
                        <div style="clear: both;"></div>
                        @if($board==1)
                            <div class="Qboards">
                                @if($question->question_board!=null)
                                    {{$question->question_board}}
                                @endif
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                    </div>
                    @endif
                @php $count++; @endphp
            @endforeach
        @elseif($medium->medium_name=='Urdu')
            @foreach($questions as $question)
                {{--<div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}" style="">--}}
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                        <div class="UrduDiv text-right" style="background:#f2ffe6; width: 100%;">
                            <span class="roman">{{$count}}.</span>
                            <span style="margin-left:5px;"></span>
                            <p> {!! $question->question_urdu !!}</p>
                        </div>
                        <div style="clear: both;"></div>
                        @if($board==1)
                            <div class="Qboards">
                                @if($question->question_board!=null)
                                    {{$question->question_board}}
                                @endif
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                        </div>
                      @else
                   <div class="TableHover EnglishAlign  upper" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                     <div class="UrduDiv text-right">
                            <span class="roman">{{$count}}.</span>
                            <span style="margin-left:5px;"></span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div style="clear: both;"></div>
                        @if($board==1)
                            <div class="Qboards">
                                @if($question->question_board!=null)
                                    {{$question->question_board}}
                                @endif
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                   </div>
                    @endif
                {{--</div>--}}
                @php $count++; @endphp
            @endforeach
        @elseif($medium->medium_name=='English')
            @foreach($questions as $question)
                {{--<div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}" style="font-family: 'Times New Roman', Times, serif;">--}}
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">
                        <div class="EnglishDiv active" style="background:#f2ffe6; width: 100%;">
                            <span class="roman">{{$count}}.</span>
                            <span style="margin-right:5px;"></span>
                            <p>{!! $question->question_english !!}</p>
                        </div>
                        <div style="clear: both;"></div>
                        @if($board==1)
                            <div class="Qboards">
                                @if($question->question_board!=null)
                                    {{$question->question_board}}
                                @endif
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                        </div>
                    @else
                        <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                        <div class="EnglishDiv" style="">
                            <span class="roman">{{$count}}.</span>
                            <span style="margin-right:5px;"></span>
                            <p>{!! $question->question_english !!}</p>
                        </div>
                        <div style="clear: both;"></div>
                        @if($board==1)
                            <div class="Qboards">
                                @if($question->question_board!=null)
                                    {{$question->question_board}}
                                @endif
                            </div>
                        @endif
                        <div style="clear: both;"></div>
                        </div>
                    @endif

                {{--</div>--}}
                @php $count++; @endphp
            @endforeach
        @endif
    </div>
</div>
@endif

@if(in_array($type,\App\Models\Helper::mcqTypes()))
    <div class="QuestionDiv" id="chooseQuestionsByChapterIDs">
        <div class="QuestionType">
            @php $count=1; @endphp
            @if($medium->medium_name=='Dual')
                @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">
                            <div class="EnglishDiv" style="">
                                <span>{{$count}}.</span>
                                <p>{!! $question->question_english !!}</p>
                            </div>
                            <div class="UrduDiv" style="">
                                <span>{{$count}}.</span>
                                <p>{!! $question->question_urdu !!}</p>
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                            <ul style="background:#f2ffe6; width: 100%;">
                                <li class="UrduMcqs">
                                    <span>(A)</span>
                                    <p>{!! $question->urdu_a !!}</p>
                                    <p>{!! $question->eng_a !!}</p>
                                </li>
                                <li class="correctAnswer UrduMcqs" thiscorrect="1-(B)">
                                    <span>(B)</span>
                                    <p> {!! $question->urdu_b !!}</p>
                                    <p>{!! $question->eng_b !!}</p>
                                </li>
                                <li class="UrduMcqs">
                                    <span>(C)</span>
                                    <p>{!! $question->urdu_c !!}</p>
                                    <p>{!! $question->eng_c !!}</p>
                                </li>
                                <li class="UrduMcqs">
                                    <span>(D)</span>
                                    <p>{!! $question->urdu_d !!}</p>
                                    <p>{!! $question->eng_d !!}</p>
                                </li>
                            </ul>

                            <div style="clear: both;"></div>
                        </div>
                        @else
                        <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">
                            <div class="EnglishDiv" style="">
                                <span>{{$count}}.</span>
                                <p>{!! $question->question_english !!}</p>
                            </div>
                            <div class="UrduDiv" style="">
                                <span>{{$count}}</span>
                                <p>{!! $question->question_urdu !!}</p>
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                            <ul style="background:#f2ffe6; width: 100%;">
                                <li class="UrduMcqs">
                                    <span>(A)</span>
                                    <p>{!! $question->urdu_a !!}</p>
                                    <p>{!! $question->eng_a !!}</p>
                                </li>
                                <li class="correctAnswer UrduMcqs" thiscorrect="1-(B)">
                                    <span>(B)</span>
                                    <p> {!! $question->urdu_b !!}</p>
                                    <p>{!! $question->eng_b !!}</p>
                                </li>
                                <li class="UrduMcqs">
                                    <span>(C)</span>
                                    <p>{!! $question->urdu_c !!}</p>
                                    <p>{!! $question->eng_c !!}</p>
                                </li>
                                <li class="UrduMcqs">
                                    <span>(D)</span>
                                    <p>{!! $question->urdu_d !!}</p>
                                    <p>{!! $question->eng_d !!}</p>
                                </li>
                            </ul>

                            <div style="clear: both;"></div>
                        </div>
                    @endif

                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='Urdu')
                @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">
                            <div class="UrduDiv">
                                <span>{{$count}}.</span>
                                <p>{!! $question->question_urdu !!}</p>
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                            <div style="clear: both;"></div>
                            <li class="UrduMcqs">
                                <span>(A)</span>
                                <p>{!! $question->urdu_a !!}</p>
                            </li>
                            <li class="correctAnswer UrduMcqs" thiscorrect="1-(B)">
                                <span>(B)</span>
                                <p> {!! $question->urdu_b !!}</p>
                            </li>
                            <li class="UrduMcqs">
                                <span>(C)</span>
                                <p>{!! $question->urdu_c !!}</p>
                            </li>
                            <li class="UrduMcqs">
                                <span>(D)</span>
                                <p>{!! $question->urdu_d !!}</p>
                            </li>
                            <div style="clear: both;"></div>
                        </div>
                    @else
                        <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">
                            <div class="UrduDiv">
                                <span>{{$count}}</span>
                                <p>{!! $question->question_urdu !!}</p>
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                            <div style="clear: both;"></div>
                            <li class="UrduMcqs">
                                <span>(A)</span>
                                <p>{!! $question->urdu_a !!}</p>
                            </li>
                            <li class="correctAnswer UrduMcqs" thiscorrect="1-(B)">
                                <span>(B)</span>
                                <p> {!! $question->urdu_b !!}</p>
                            </li>
                            <li class="UrduMcqs">
                                <span>(C)</span>
                                <p>{!! $question->urdu_c !!}</p>
                            </li>
                            <li class="UrduMcqs">
                                <span>(D)</span>
                                <p>{!! $question->urdu_d !!}</p>
                            </li>
                            <div style="clear: both;"></div>
                        </div>

                    @endif
                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='English')
                @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover EnglishAlign SelectedQuestion remove1"  data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">
                            <div class="EnglishDiv"><span>{{$count}}</span>{!! $question->question_english !!}
                            </div><div style="clear:both;"></div>@if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif<li class="EnglishMcqs"><span>(A)</span>{!! $question->eng_a !!}
                            </li><li class="EnglishMcqs"><span>(B)</span>{!! $question->eng_b !!}
                            </li><li class="correctAnswer EnglishMcqs" thiscorrect="1-(C)"><span>(C)</span>{!! $question->eng_a !!}
                            </li><li class="EnglishMcqs"><span>(D)</span>{!! $question->eng_d !!}
                            </li><div style="clear:both;"></div></div>
                    @else
                        <div class="TableHover EnglishAlign  upper"  data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">
                            <div class="EnglishDiv"><span>{{$count}}</span>{!! $question->question_english !!}
                            </div><div style="clear:both;"></div>@if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif<li class="EnglishMcqs"><span>(A)</span>{!! $question->eng_a !!}
                            </li><li class="EnglishMcqs"><span>(B)</span>{!! $question->eng_b !!}
                            </li><li class="correctAnswer EnglishMcqs" thiscorrect="1-(C)"><span>(C)</span>{!! $question->eng_a !!}
                            </li><li class="EnglishMcqs"><span>(D)</span>{!! $question->eng_d !!}
                            </li><div style="clear:both;"></div></div>

                    @endif
                    {{--<div class="TableHover EnglishAlign SelectedQuestion upper" data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">--}}
                        {{--<div class="EnglishDiv">--}}
                            {{--<span>{{$count}}</span>--}}
                            {{--{!! $question->question_english !!}--}}
                        {{--</div>--}}
                        {{--<div style="clear: both;"></div>--}}
                        {{--@if($board==1)--}}
                            {{--<div class="Qboards">--}}
                                {{--@if($question->question_board!=null)--}}
                                    {{--{{$question->question_board}}--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--<div style="clear: both;"></div>--}}
                        {{--<div style="clear: both;"></div>--}}
                        {{--<li class="EnglishMcqs">--}}
                            {{--<span>(A)</span>--}}
                            {{--{!! $question->eng_a !!}--}}
                        {{--</li>--}}
                        {{--<li class="correctAnswer EnglishMcqs" thiscorrect="1-(B)">--}}
                            {{--<span>(B)</span>--}}
                            {{--{!! $question->eng_b !!}--}}
                        {{--</li>--}}
                        {{--<li class="EnglishMcqs">--}}
                            {{--<span>(C)</span>--}}
                            {{--{!! $question->eng_c !!}--}}
                        {{--</li>--}}
                        {{--<li class="EnglishMcqs">--}}
                            {{--<span>(D)</span>--}}
                            {{--{!! $question->eng_d !!}--}}
                        {{--</li>--}}
                        {{--<div style="clear: both;"></div>--}}
                    {{--</div>--}}
                    @php $count++; @endphp
                @endforeach
            @endif
        </div>
    </div>
@endif

@if(in_array($type,\App\Models\Helper::addType3()))
    <div class="QuestionDiv" id="chooseQuestionsByChapterIDs">
        <div class="ParagraphsType">
            @php $count=1; @endphp
            @if($medium->medium_name=='Dual')
                @foreach($questions as $question)
                        @if(in_array($question->q_id,$random))
                        <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                        <div class="EnglishDiv" style="">
                                <span class="roman mt-1">{{$count}}.</span>
                                <span style="margin-right:5px;"></span>
                                <p>{!! $question->question_english !!}</p>
                            </div>
                            <div class="UrduDiv mt-2" style="">
                                <span class="roman">{{$count}}</span>
                                <span style="margin-left:5px;">.</span>
                                <p class="text-right"> {!! $question->question_urdu !!}</p>
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                        </div>
                        @else
                        <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                        <div class="EnglishDiv">
                                <span class="roman mt-1">{{$count}}.</span>
                                <span style="margin-right:5px;"></span>
                                <p>{!! $question->question_english !!}</p>
                            </div>
                            <div class="UrduDiv mt-2">
                                <span class="roman">{{$count}}</span>
                                <span style="margin-left:5px;">.</span>
                                <p class="text-right"> {!! $question->question_urdu !!}</p>
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                        </div>
                        @endif
                    {{--</div>--}}

                    {{--<div style="clear:both; margin-bottom: 15px"></div>--}}
                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='Urdu')
                @foreach($questions as $question)
                    {{--<div class="TableHover EnglishAlign SelectedQuestion upper" data-id="{{$question->q_id}}" id="{{$count}}" style="">--}}
                        @if(in_array($question->q_id,$random))
                    <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                    <div class="UrduDiv" style="background:#f2ffe6; width: 100%;">
                                <span class="roman">{{$count}}</span>
                                <span style="margin-left:5px;">.</span>
                                {!! $question->question_urdu !!}
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                    </div>
                        @else
                    <div class="TableHover EnglishAlign  upper" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                    <div class="UrduDiv">
                                <span class="roman">{{$count}}</span>
                                <span style="margin-left:5px;">.</span>
                                {!! $question->question_urdu !!}
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                    </div>
                        @endif
                    {{--</div>--}}
                    {{--<div style="clear:both; margin-bottom: 15px"></div>--}}
                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='English')
                @foreach($questions as $question)
                    {{--<div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}" style="font-family: 'Times New Roman', Times, serif;">--}}
                        @if(in_array($question->q_id,$random))
                            <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                            <div class="EnglishDiv" style="background:#f2ffe6; width: 100%;">
                                <span class="roman">{{$count}}.</span>
                                <span style="margin-right:5px;"></span>
                                <p>{!! $question->question_english !!}</p>
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                            </div>
                        @else
                    <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}" style="margin-top: 13px;">

                    <div class="EnglishDiv" style="">
                                <span class="roman">{{$count}}.</span>
                                <span style="margin-right:5px;"></span>
                                <p>{!! $question->question_english !!}</p>
                            </div>
                            <div style="clear: both;"></div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                            <div style="clear: both;"></div>
                    </div>
                        @endif

                    {{--</div>--}}
                    {{--<div style="clear:both; margin-bottom:6px"></div>--}}
                    @php $count++; @endphp
                @endforeach
            @endif
        </div>
    </div>
@endif


@if(in_array($type,\App\Models\Helper::addType5()))
    <div class="QuestionDiv" id="chooseQuestionsByChapterIDs">
        <div class="TwoWordsType">
            @php $count=1; @endphp
            @if($medium->medium_name=='Dual')
                @foreach($questions as $question)

                    <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">
                        <div class="EnglishDiv">
                            <span>{{$count}}.</span>{!! $question->question_english !!}
                        </div>
                        <div class="UrduDiv mt-2">
                            <span>{{$count}}.</span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div style="clear: both;"></div>
                        @if($board==1)
                            <div class="Qboards">
                                @if($question->question_board!=null)
                                    {{$question->question_board}}
                                @endif
                            </div>
                        @endif
                    </div>
                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='Urdu')
                @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover UrduAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="UrduDiv mt-2">
                                <span>{{$count}}.</span>
                                {!! $question->question_urdu !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                      @else
                        <div class="TableHover UrduAlign upper" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="UrduDiv mt-2">
                                <span>{{$count}}.</span>
                                {!! $question->question_urdu !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif

                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='English')
                @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="EnglishDiv">
                                <span>{{$count}}.</span>{!! $question->question_english !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                      @else
                        <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="EnglishDiv">
                                <span>{{$count}}.</span>{!! $question->question_english !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif

                    @php $count++; @endphp
                @endforeach
            @endif
        </div>
    </div>
@endif

@if(in_array($type,\App\Models\Helper::addType2()))
    <div class="QuestionDiv" id="chooseQuestionsByChapterIDs">
        <div class="ThreeWordsType">
            @php $count=1; @endphp
            @if($medium->medium_name=='Dual')
                @foreach($questions as $question)

                    <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">
                        <div class="EnglishDiv">
                            <span>{{$count}}.</span>{!! $question->question_english !!}
                        </div>
                        <div class="UrduDiv mt-2">
                            <span>{{$count}}.</span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div style="clear: both;"></div>
                        @if($board==1)
                            <div class="Qboards">
                                @if($question->question_board!=null)
                                    {{$question->question_board}}
                                @endif
                            </div>
                        @endif
                    </div>
                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='Urdu')
                @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover UrduAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="UrduDiv mt-2">
                                <span>{{$count}}.</span>
                                {!! $question->question_urdu !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="TableHover UrduAlign upper" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="UrduDiv mt-2">
                                <span>{{$count}}.</span>
                                {!! $question->question_urdu !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif

                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='English')
                @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="EnglishDiv">
                                <span>{{$count}}.</span>{!! $question->question_english !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="EnglishDiv">
                                <span>{{$count}}.</span>{!! $question->question_english !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif

                    @php $count++; @endphp
                @endforeach
            @endif
        </div>
    </div>
@endif

@if(in_array($type,\App\Models\Helper::addType4()))
    <div class="QuestionDiv" id="chooseQuestionsByChapterIDs">
        <div class="FiveWordsType">
            @php $count=1; @endphp
            @if($medium->medium_name=='Dual')
                @foreach($questions as $question)

                    <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}"  id="{{$count}}" style="margin-top: 13px;">
                        <div class="EnglishDiv">
                            <span>{{$count}}.</span>{!! $question->question_english !!}
                        </div>
                        <div class="UrduDiv mt-2">
                            <span>{{$count}}.</span>
                            {!! $question->question_urdu !!}
                        </div>
                        <div style="clear: both;"></div>
                        @if($board==1)
                            <div class="Qboards">
                                @if($question->question_board!=null)
                                    {{$question->question_board}}
                                @endif
                            </div>
                        @endif
                    </div>
                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='Urdu')
                @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover UrduAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="UrduDiv mt-2">
                                <span>{{$count}}.</span>
                                {!! $question->question_urdu !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="TableHover UrduAlign upper" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="UrduDiv mt-2">
                                <span>{{$count}}.</span>
                                {!! $question->question_urdu !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif

                    @php $count++; @endphp
                @endforeach
            @elseif($medium->medium_name=='English')
                @foreach($questions as $question)
                    @if(in_array($question->q_id,$random))
                        <div class="TableHover EnglishAlign SelectedQuestion remove1" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="EnglishDiv">
                                <span>{{$count}}.</span>{!! $question->question_english !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="TableHover EnglishAlign upper" data-id="{{$question->q_id}}" id="{{$count}}">
                            <div class="EnglishDiv">
                                <span>{{$count}}.</span>{!! $question->question_english !!}
                            </div>
                            <div style="clear:both;">
                            </div>
                            @if($board==1)
                                <div class="Qboards">
                                    @if($question->question_board!=null)
                                        {{$question->question_board}}
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif

                    @php $count++; @endphp
                @endforeach
            @endif
        </div>
    </div>
@endif

