
<script>
  
    document.addEventListener('contextmenu', function(event) {
      event.preventDefault();
    });
    
    document.addEventListener('keypress', function(event) {
        console.log(event)
      event.preventDefault();
    });

   
  });
  </script>
<style>

    body {

        font-family: 'Arial Narrow', 'Jameel Noori Nastaleeq';

        -webkit-print-color-adjust: exact !important;

    }



    @media print {

        #AnswerPanelDiv {

            page-break-before: always;

        }

        .hidden-print, .no-print, .hidden-print * {

            display: none !important;

        }

    }



    @page {

        margin: 20px;

    }



    .udButtons {

        float: left;

        margin-bottom: 10px;

        margin-top: -30px;

    }



    .udButtons a {

        cursor: pointer;

        color: #ff0000;

        padding-right: 10px;

    }

</style>

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

        margin-top: -10px;

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
.no-select {
      user-select: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
    }
</style>

  

{{--<link href="https://www.paktestsolution.com/Content/GeneratePaper.css" rel="stylesheet" />--}}





<section class="no-select" style="padding:20px; background-color:none;" id="paperPrint">

    <div style="position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100%; Z-INDEX:-1; "><img src="{{url('images').'/'.$school->watermark}}" style="width:1650px; height:auto" alt="Watermark"></div>

@php
   $schoolName = strip_tags($school->school_name); // Remove HTML tags
$schoolName = preg_replace('/Powered by Froala Editor/', '', $schoolName); // Remove "Powered by Froala Editor"
$schoolName = html_entity_decode($schoolName); // Convert HTML entities to their respective characters

$schoolName = trim($schoolName); // Trim leading and trailing spaces
@endphp

    <table style="width: 100%; font-size: 10pt; font-weight: bold;" class="layout-1">

        <tbody>

        <tr>

            <td colspan="5">

                <p style="padding:0px; margin:0px; text-align:center; color:#000000; font-size:20pt; transform:scaleY(1); font-family:'Times New Roman';">

                    {{$schoolName}}

                </p>

                <p style="padding:0px; margin:0px; margin-top:-5px; text-align:center; color:#a86060; font-size:10pt; transform:scaleY(1); font-family:'Times New Roman';">

                    {{$school->address}}, Lahore PH: {{$school->phone}}

                </p>

            </td>

        </tr>

        <tr>

            <td style="border:2px solid #000; padding-left:5px;">STUDENT NAME</td>

            <td style="border:2px solid #000; padding-left:5px;"></td>

            <td rowspan="3" style="width:30%; text-align:center; vertical-align:central; border-bottom:1px solid #fff; border-top:1px solid #fff; margin-top:3px;"> <img src="{{url('images').'/'.$school->logo}}" width="80" height="80"> </td>

            <td style="border:2px solid #000; padding-left:5px;">CLASS</td>

            <td style="border:2px solid #000; padding-left:5px;"> {{$class1->class_name}} </td>

        </tr>

        <tr>

            <td style="border:2px solid #000; padding-left:5px;">Roll No</td>

            <td style="border:2px solid #000; padding-left:5px;"> <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;" value=""></td>

            <td style="border:2px solid #000; padding-left:5px;">SUBJECT</td>

            <td style="border:2px solid #000; padding-left:5px;"> {{$subject->subject_name}} </td>

        </tr>

        <tr>

            <td style="border:2px solid #000; padding-left:5px;">TIME ALLOWED</td>

            <td style="border:2px solid #000; padding-left:5px;"> <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;"></td>

            <td style="border:2px solid #000; padding-left:5px;">TOTAL MARKS</td>

            <td style="border:2px solid #000; padding-left:5px;"> <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;"></td>

        </tr>

        </tbody></table>



    <table width="100%" cellpadding="3" style="font-size:10pt; border-bottom:2px solid #000; font-weight:bold; display:none;" class="layout-2">

        <tbody><tr>

            <td rowspan="3" style="padding-right:10px;"> <img src="{{url('images').'/'.$school->logo}}" width="80" height="80"> </td>

            <td colspan="3">

                <p style="padding:0px; margin:0px; text-align:center; color:#000000; font-size:20pt; transform:scaleY(1); font-family:'Times New Roman';">

                    {{$school->school_name}}

                </p>

                <p style="padding:0px; margin:0px; text-align:center; margin-top:-5px; color:#a86060; font-size:10pt; transform:scaleY( 1 ); font-family:'Times New Roman';">

                    {{$school->address}}, Lahore PH: {{$school->phone}}

                </p>

            </td>

        </tr>

        <tr>

            <td style="width:28%; background-color:darkslategray; color:#fff; text-align:center; font-size:12pt; border-radius:0px 100px 100px 0px;">CLASS: {{$class1->class_name}} </td>

            <td style="width:28%; border-top:2px solid #000000; border-bottom:2px solid #000000; text-align:center; font-size:12pt;"> {{$subject->subject_name}} </td>

            <td style="width:28%; background-color:darkslategray; color:#fff; text-align:center; font-size:12pt; border-radius:100px 0px 0px 100px;">TOTAL MARKS:  </td>

        </tr>

        <tr>

            <td style="text-align:center;">STUDENT NAME: .....................</td>

            <td style="text-align:center;">PAPER CODE: <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;" value=""></td>

            <td style="text-align:center;">TIME: <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;"></td>

        </tr>

        </tbody></table>



    <table style="width:100%; font-size:10pt; border-bottom:2px solid #000; font-weight:bold; display:none;" class="layout-3">

        <tbody><tr>

            <td rowspan="3" style="padding-right:10px;"> <img src="{{url('images').'/'.$school->logo}}" width="80" height="80"> </td>

            <td colspan="3">

                <p style="padding:0px; margin:0px; text-align:center; color:#000000; font-size:20pt; transform:scaleY(1); font-family:'Times New Roman';">

                    {{$school->school_name}}

                </p>

                <p style="padding:0px; margin:0px; text-align:center; margin-top:-5px; color:#a86060; font-size:10pt; transform:scaleY(1); font-family:'Times New Roman';">

                    {{$school->address}} Lahore PH: {{$school->phone}}

                </p>

            </td>

        </tr>

        <tr>

            <td>STUDENT NAME: .....................</td>

            <td>CLASS: {{$class1->class_name}}</td>

            <td>SUBJECT: {{$subject->subject_name}}</td>

        </tr>

        <tr>

            <td>PAPER CODE: <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;" value=""></td>

            <td>TIME ALLOWED: <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;"></td>

            <td>TOTAL MARKS: <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;"></td>

        </tr>

        </tbody></table>



    <table style="width:100%; font-size:10pt; border-bottom:2px solid #000; font-weight:bold; text-align:center; display:none;" class="layout-4">

        <tbody><tr>

            <td rowspan="2" style="padding-right:10px;"> <img src="{{url('images').'/'.$school->logo}}" width="80" height="80"> </td>

            <td colspan="2">

                <p style="padding:0px; margin:0px; text-align:center; color:#000000; font-size:20pt; transform:scaleY(1); font-family:'Times New Roman';">

                    {{$school->school_name}}

                </p>

                <p style="padding:0px; margin:0px; text-align:center; margin-top:-5px; color:#a86060; font-size:10pt; transform:scaleY(1); font-family:'Times New Roman';">

                    {{$school->address}} PH: {{$school->phone}}

                </p>

            </td>

        </tr>

        <tr>

            <td style="text-align:center;">CLASS: {{$class1->class_name}}</td>

            <td style="text-align:center;">SUBJECT: {{$subject->subject_name}}</td>

        </tr>

        </tbody></table>

    <div style="clear:both; margin-bottom:10px;"></div>



    <div id="QuestionPanelDiv" class="editable_content" style="color: #000;filter: brightness(100%);">

        @if(session()->has('edit00-paper'))

            @php $paper128=session('edit00-paper') @endphp

            {!! $paper128->paper !!}

        @endif

    </div>

    <div id="AnswerPanelDiv">

        @if(session()->has('edit00-paper'))

            @php $paper128=session('edit00-paper') @endphp

            {!! $paper128->answers !!}

            @else

            <ul style="width: 100%;" id="MultiAnswerSheet"></ul>

            <ul style="width: 100%;" id="TrueFalseAnswerSheet"></ul>

            <ul style="width: 100%;" id="FillBlankAnswerSheet"></ul>

        @endif

    </div>



</section>



<!-- Get Questions Modal -->





@push('script')

    <script>





        $(function() {

            $('.print').click(function() {

                $('#paperPrint').printThis();

            });

            $(document).on('click','.print1',function(e) {

                e.preventDefault();

                var paper=$(this).attr('href');

                var img='<img src="'+paper+'">';

                // $('.img').attr('src',paper);

                $(img).printThis();

            });

        });

        $(document).ready(function () {

            $('#searchForm').validate({

                rules: {

                    board: {

                        required: true,

                    },

                    class: {

                        required: true,

                    },

                    subject: {

                        required: true

                    }

                },

                messages: {

                    board: "board name is required",

                    class: "class name is required",

                    subject: "subject name is required"

                },

                errorPlacement: function(error, element) {

                    $(element).parents('.form-group').append(error)

                }

            });



            $(document).on('click', '#btnSearch', function (e) {

                e.preventDefault();

                //$('searchForm').submit()

                var url="{{route('client-past-search')}}";

                var data=$('#searchForm').serialize();

                $.ajax({

                    type:'POST',

                    url:url,

                    data:data,

                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                    success:function(data){

                        $('#dt').show();

                        $('#paperData').html(data.papers)

                    }

                });

            });



            $(document).on('click', '.remove', function (e) {

                e.preventDefault();

                var url=$(this).attr('href');

                confirmBox(url);

            });



            $(document).on('click', '.edit', function (e) {

                e.preventDefault();

                $.ajax({

                    type:'GET',

                    url:$(this).attr('href'),

                    success:function(data){

                        console.log(data);

                        $('#editForm').html(data.subject);

                        $('#chapterModal').modal('show');



                    }

                });

            });

            $(document).on('click', '.detail', function (e) {

                e.preventDefault();

                $.ajax({

                    type:'GET',

                    url:$(this).attr('href'),

                    success:function(data){

                        $("#paper-ing").attr("src",data.paper);

                        $('#paperModal').modal('show')

                    }

                });

            });





        });

        function remove(url) {

            $.ajax({

                type:'GET',

                url:url,

                success:function(data){

                    if(data.status==true)

                    {

                        $('#paperData').html(data.papers)

                    }

                }

            });

        }

    </script>



@endpush