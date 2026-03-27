

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
        overflow-x: auto;
    }

    .QuestionDiv {
        height: 400px;
        width:100%;
        overflow-y: auto;
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
        overflow-y: auto;
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
        overflow: visible;
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

<div class="page-content" id="content">

    <form action="/GeneratePaper/SavePaper" id="myform" method="post">                <input type="hidden" name="CourseID" value="1">
        <input type="hidden" name="ClassID" value="9">
        <input type="hidden" name="SubjectID" value="44">
        <input type="hidden" name="ChapterIDs" value="350,351,352,353,354">
        <input type="hidden" name="TopicIDs" value="533,534,535,536,537,538,539,624,625,626,627,628,629,630,631,632,633,634,635,636,637,638,639,640,641,642,643,644,645">
        <input type="hidden" id="PaperHtml" name="PaperHtml">
        <input type="hidden" id="AnswersHtml" name="AnswersHtml">
        <input type="hidden" id="PaperID" name="PaperID" value="0">
        <input type="hidden" name="SchoolID" value="276">
        <section style="padding:20px; background-color:none;">
            <div style="position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100%; Z-INDEX:-1; "><img src="https://www.paktestsolution.com/Images/Schools/637559931951180829.jpg" style="width:100%; height:100%" alt="Watermark"></div>

            <table style="width: 100%; font-size: 10pt; font-weight: bold; display: table;" class="layout-1">
                <tbody><tr>
                    <td colspan="5">
                        <p style="padding:0px; margin:0px; text-align:center; color:#000000; font-size:20pt; transform:scaleY(1); font-family:'Times New Roman';">
                            MASHAL SCHOOLS &amp; COLLEGES
                        </p>
                        <p style="padding:0px; margin:0px; margin-top:-5px; text-align:center; color:#a86060; font-size:10pt; transform:scaleY(1); font-family:'Times New Roman';">
                            Begum Kot, Shahdara, Lahore PH: 03234669919
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border:2px solid #000; padding-left:5px;">STUDENT NAME</td>
                    <td style="border:2px solid #000; padding-left:5px;"></td>
                    <td rowspan="3" style="width:30%; text-align:center; vertical-align:central; border-bottom:1px solid #fff; border-top:1px solid #fff; margin-top:3px;"> <img src="https://www.paktestsolution.com/Images/Schools/637552148998716238.jpeg" width="80" height="80"> </td>
                    <td style="border:2px solid #000; padding-left:5px;">CLASS</td>
                    <td style="border:2px solid #000; padding-left:5px;"> 9TH </td>
                </tr>
                <tr>
                    <td style="border:2px solid #000; padding-left:5px;">PAPER CODE</td>
                    <td style="border:2px solid #000; padding-left:5px;"> <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;" value="44"></td>
                    <td style="border:2px solid #000; padding-left:5px;">SUBJECT</td>
                    <td style="border:2px solid #000; padding-left:5px;"> Computer </td>
                </tr>
                <tr>
                    <td style="border:2px solid #000; padding-left:5px;">TIME ALLOWED</td>
                    <td style="border:2px solid #000; padding-left:5px;"> <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;"></td>
                    <td style="border:2px solid #000; padding-left:5px;">TOTAL MARKS</td>
                    <td style="border:2px solid #000; padding-left:5px;"> <input type="text" id="total_marks" style="width:100px; margin:0; border:none; font-weight:bold;"></td>
                </tr>
                </tbody></table>

            <table width="100%" cellpadding="3" style="font-size: 10pt; border-bottom: 2px solid rgb(0, 0, 0); font-weight: bold; display: none;" class="layout-2">
                <tbody><tr>
                    <td rowspan="3" style="padding-right:10px;"> <img src="/Images/Schools/637552148998716238.jpeg" width="80" height="80"> </td>
                    <td colspan="3">
                        <p style="padding:0px; margin:0px; text-align:center; color:#000000; font-size:20pt; transform:scaleY(1); font-family:'Times New Roman';">
                            MASHAL SCHOOLS &amp; COLLEGES
                        </p>
                        <p style="padding:0px; margin:0px; text-align:center; margin-top:-5px; color:#a86060; font-size:10pt; transform:scaleY( 1 ); font-family:'Times New Roman';">
                            Begum Kot, Shahdara, Lahore PH: 03234669919
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:28%; background-color:darkslategray; color:#fff; text-align:center; font-size:12pt; border-radius:0px 100px 100px 0px;">CLASS: 9TH </td>
                    <td style="width:28%; border-top:2px solid #000000; border-bottom:2px solid #000000; text-align:center; font-size:12pt;"> Computer </td>
                    <td style="width:28%; background-color:darkslategray; color:#fff; text-align:center; font-size:12pt; border-radius:100px 0px 0px 100px;">TOTAL MARKS:  </td>
                </tr>
                <tr>
                    <td style="text-align:center;">STUDENT NAME: .....................</td>
                    <td style="text-align:center;">PAPER CODE: <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;" value="44"></td>
                    <td style="text-align:center;">TIME: <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;"></td>
                </tr>
                </tbody></table>

            <table style="width: 100%; font-size: 10pt; border-bottom: 2px solid rgb(0, 0, 0); font-weight: bold; display: none;" class="layout-3">
                <tbody><tr>
                    <td rowspan="3" style="padding-right:10px;"> <img src="https://www.paktestsolution.com/Images/Schools/637559931951180829.jpg" width="80" height="80"> </td>
                    <td colspan="3">
                        <p style="padding:0px; margin:0px; text-align:center; color:#000000; font-size:20pt; transform:scaleY(1); font-family:'Times New Roman';">
                            MASHAL SCHOOLS &amp; COLLEGES
                        </p>
                        <p style="padding:0px; margin:0px; text-align:center; margin-top:-5px; color:#a86060; font-size:10pt; transform:scaleY(1); font-family:'Times New Roman';">
                            Begum Kot, Shahdara, Lahore PH: 03234669919
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>STUDENT NAME: .....................</td>
                    <td>CLASS: 9TH</td>
                    <td>SUBJECT: Computer</td>
                </tr>
                <tr>
                    <td>PAPER CODE: <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;" value="44"></td>
                    <td>TIME ALLOWED: <input type="text" style="width:100px; margin:0; border:none; font-weight:bold;"></td>
                    <td>TOTAL MARKS: <input type="text" id="total_marks" value="0" style="width:100px; margin:0; border:none; font-weight:bold;"></td>
                </tr>
                </tbody></table>

            <table style="width: 100%; font-size: 10pt; border-bottom: 2px solid rgb(0, 0, 0); font-weight: bold; text-align: center; display: none;" class="layout-4">
                <tbody><tr>
                    <td rowspan="2" style="padding-right:10px;"> <img src="https://www.paktestsolution.com/Images/Schools/637552148998716238.jpeg" width="80" height="80"> </td>
                    <td colspan="2">
                        <p style="padding:0px; margin:0px; text-align:center; color:#000000; font-size:20pt; transform:scaleY(1); font-family:'Times New Roman';">
                            MASHAL SCHOOLS &amp; COLLEGES
                        </p>
                        <p style="padding:0px; margin:0px; text-align:center; margin-top:-5px; color:#a86060; font-size:10pt; transform:scaleY(1); font-family:'Times New Roman';">
                            Begum Kot, Shahdara, Lahore PH: 03234669919
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;">CLASS: 9TH</td>
                    <td style="text-align:center;">SUBJECT: Computer</td>
                </tr>
                </tbody></table>
            <div style="clear:both; margin-bottom:10px;"></div>

            <div id="QuestionPanelDiv" class="editable_content">

            </div>

            <div id="AnswerPanelDiv">
                <ul style="width: 100%;" id="MultiAnswerSheet"></ul>
                <ul style="width: 100%;" id="TrueFalseAnswerSheet"></ul>
                <ul style="width: 100%;" id="FillBlankAnswerSheet"></ul>
            </div>
        </section>
        <!-- Save Paper Modal -->
        <div class="modal fade no-print" id="SaveModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">SAVE PAPER</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Paper Name <span>*</span></label>
                                    <div class="input-group">
                                        <span><i class="fa fa-share" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="PaperName" required="">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Paper Date <span>*</span></label>
                                    <div class="input-group">
                                        <span><i class="fa fa-share" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control datepicker" name="PaperDate" required="">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Time Allowed <span>*</span></label>
                                    <div class="input-group">
                                        <span><i class="fa fa-share" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="PaperTime" required="">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Total Marks <span>*</span></label>
                                    <div class="input-group">
                                        <span><i class="fa fa-share" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="TotalMarks" required="">
                                    </div>
                                </div>
                                <div class="mt-3 float-end">
                                    <input type="submit" class="btn btn-sm btn-success" value="Save Paper" onclick="SavePaper();">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>