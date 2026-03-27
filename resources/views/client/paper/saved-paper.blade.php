@extends('client.layout.master')

@section('content')

<div class="row">

        <div class="col-md-12 col-xl-12">

            <form action="{{url('saved/papers/sort')}}"  method="get" >    

                <div class="card">

                <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-search"></i> Papers by Date</h3>

                    <div class="card-options">

                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>

                        {{--<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>--}}

                    </div>

                </div>

                <div class="card-body">

                  <div class="row">

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label class="form-label" for="board">Select Date</label>

                                    <div class="input-group">

                                        <input type ="date"  class="form-control" name="date">

                                            

                                    </div>

                                </div>

                            </div>

                            <!--<div class="col-md-4">-->

                            <!--    <div class="form-group">-->

                            <!--        <label class="form-label" for="board">Select Subject</label>-->

                            <!--        <div class="input-group">-->
                            <!--            <select class="form-control"  name="subject">-->
                            <!--                <option value="">Choose a Subject</option>-->
                            <!--        @foreach($subjectNames as $subject)-->
                            <!--            <option value="{{$subject['subject_id']}}">{{$subject['subject_name']}}</option>-->
                            <!--        @endforeach-->
                            <!--           </select>     -->

                            <!--        </div>-->

                            <!--    </div>-->

                            <!--</div>-->

                            <!--<div class="col-md-4">-->

                            <!--    <div class="form-group">-->

                            <!--        <label class="form-label" for="board">Select Class</label>-->

                            <!--        <div class="input-group">-->

                            <!--            <input type ="text"  class="form-control" name="">-->

                                            

                            <!--        </div>-->

                            <!--    </div>-->

                            <!--</div>-->


                            <div class="col-md-4">

                                <div class="form-group">

                                    <label class="form-label" for="board">Select Teacher</label>

                                    <div class="input-group">

                                         <select class="form-control"  name="teachers">
                                            <option value="">Choose a Teacher</option>
                                            @php
                                            if(@$_REQUEST['teachers']){
                                            $selectedteacher=$_REQUEST['teachers'];
                                            }else{
                                            $selectedteacher="";
                                            }
                                            @endphp
                                            
                                            
                                            
                                    @foreach($teachers as $teacher)
                                        <option @if($teacher->id==$selectedteacher) selected @endif value="{{@$teacher->id}}">{{@$teacher->name}}</option>
                                    @endforeach
                                       </select> 

                                            

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                <label class="form-label" for="board">&nbsp;</label>

                                <div class="input-group">

                                    <button type="submit" class="btn btn-primary"><i class="fe fe-search mr-2"></i>Search Paper</button>

                                    </div>    

                            </div>

                            </div>                            



                        </div>

                   



                </div>

                <div class="card-footer">

                    <div class="text-right">

                       

                    </div>

                </div>

            </div>

            </form>

        </div>

    </div>

       <div class="row mt-3" id="papers">

        @foreach($papers as $paper)

            <div class="col-md-4 col-sm-12 rotate">

                <div class="bg-white SavedPapers mb-3">

                    <h6 style="font-size:1rem; font-weight:bold; transform:scaleY(1.2); text-align:center; padding-top:10px;">{{$paper->class_name}} - {{$paper->subject_name}}</h6>

                    <p style="text-align: center; margin:0px;">{{$paper->paper_name}}</p>

                    <p style="text-align: center; margin-top:0px; margin-bottom:3px;">{{\Carbon\Carbon::parse($paper->schedule_date)->format('d-M-Y') }}</p>

                    <div class="text-center bg-primary Icons">

                        @if($role=='Administrator')

                         <a href="{{route('print-papers',$paper->paperId)}}" target="_blank"><i class="fa fa-print"></i></a>

                        @endif

                        <a href="{{route('edit-genPaper',$paper->paperId)}}"><i class="fa fa-edit"></i></a>

                            @if($role=='Teacher')

                                <a href="{{route('show-paper',$paper->paperId)}}" id="show"><i class="fa fa-search"></i></a>

                            @endif



                            @if($role=='Administrator')

                            <a href="{{route('remove-paper',$paper->paperId)}}" class="remove"><i class="fa fa-trash-alt"></i></a>

                            @endif

                    </div>

                </div>

            </div>

        @endforeach

    </div>

    <style>





        .SavedPapers .Icons {

            background-color: #ff6a00;

            padding-top:3px;

        }



        .SavedPapers .Icons a{

            font-size:1.3rem;

            color:#fff;

            padding-left:10px;

            padding-right:10px;

        }

    </style>

   @endsection

@push('css12')

    <link href="https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css?display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/earlyaccess/notonaskharabic.css?display=swap" rel="stylesheet">

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

    @endpush

@push('script')

    <script>

        $(document).ready(function () {

            $('.remove').click(function (e) {

                e.preventDefault();

                var url=$(this).attr('href');

                $.confirm({

                    icon: 'fa fa-warning text-danger',

                    title: 'Are you sure!',

                    content: "Fatal! data will be lost.You can not recover it.",

                    type: 'red',

                    typeAnimated: true,

                    buttons: {

                        delete: function () {

                            window.location.href =url;



                        },

                        cancel: function () {

                            $.alert('Canceled!');

                        }

                    }

                });



            })



            $(document).on('submit', '#searchForm', function (e) {

                e.preventDefault();

                $.ajax({

                    type:'POST',

                    url:$(this).attr('action'),

                    data:$(this).serialize(),

                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                    success:function(data){

                        $('#papers').html(data);

                    },

                    error: function (reject) {

                        if( reject.status === 422 ) {

                            var errors = $.parseJSON(reject.responseText);

                            $.each(errors, function (key, val) {

                                if(val.class!=null)

                                {

                                    notification('error',val.class);

                                }else if (val.course!=null)

                                {

                                    notification('error',val.course);

                                }



                            });

                        }

                    }

                });

            });



        })

    </script>

@endpush