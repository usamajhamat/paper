<!doctype html>
<html lang="en">
<head>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Print Paper</title>
        <link href="{{asset('public/client/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('public/client/PrintPaper.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <style>
           .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
               color: #fff;
               background: #ff685c !important;           }
       </style>
           <title>One Click Test Solution</title>

    </head>
</head>
<body style="">
<style type="text/css">
    @media print and (color) {
        * {
            -webkit-print-color-adjust: exact;
            font-family: 'Arial Narrow','Jameel Noori Nastaleeq','Times New Roman',Arial;
        }

        .hidden-print, .no-print, .hidden-print * {
            display: none !important;
        }
        /* ...except our special div. */
        body .main {
            margin-left: 0px;
            display: block;
        }

        @page {
            margin: 22px;
        }
    }

    .nav-item {
        color: #fff;
        background-color: #e6e6e6;
        cursor: pointer;
    }

    .nav-item a {
        text-align: center;
        font-size: 10pt;
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .nav-item a i {
        font-size: 15px;
    }

    .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background: #ff685c  !important;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav li {
        font-size: 10pt;
        background-color: #fff;
        padding: 5px;
        margin: 5px;
        display: block;
        text-align: center;
        width: 100%;
    }

    .sidenav i {
        text-align: center;
        cursor: pointer;
        font-size: 20pt;
    }

    .sidenav a {
        text-decoration: none;
        cursor: pointer;
    }

    .main {
        margin-left: 200px; /* Same as the width of the sidenav */
    }

    .form-control-sm{
        font-size:9pt;
        border:none;
    }
    .form-control-sm:hover{
        border:1px solid darkslategray;
    }
</style>

<div class="sidenav hidden-print">
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Line Height</label>
                <input type="number" class="form-control-sm col-12" id="lineHeight" value="1" min="1" style="text-align:center;">
            </div>
            <div class="mb-2">
                <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Font Size</label>
                <input type="number" class="form-control-sm col-12" id="fontSize" value="14" min="6" style="text-align:center;">
            </div>
            <div class="mb-2">
                <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Bold font</label>
                <select class="form-control-sm form-select" id="boldFont" name="boldFont"><option selected="selected" value="Normal">Normal</option>
                    <option value="Bold">Bold</option>
                </select>
            </div>
            <div class="mb-2">
                <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Font Colors</label>
                <select class="form-control-sm form-select" id="fontColor" name="fontColor"><option selected="selected" value="black">Black</option>
                    <option value="gray">Gray</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="orange">Orange</option>
                    <option value="red">Red</option>
                </select>
            </div>
            <div class="mb-2">
                <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Customize Color</label>
                <input type="color" class="form-control" id="customizer">
            </div>
            <div class="mb-2">
                <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Select Layout</label>
                <select class="form-control-sm form-select" id="Templates" name="Templates" onchange="layoutId();" style="font-size:9pt;"><option selected="selected" value="1">Layout 1</option>
                    <option value="2">Layout 2</option>
                    <option value="3">Layout 3</option>
                    <option value="4">Layout 4</option>
                </select>
            </div>
            <div class="mt-2" style="text-align:center;">
                <input type="checkbox" class="checkbox" id="BubbleSheet" value="true" onclick="Bubbles();">
                <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Bubble Sheet</label>
            </div>
            <div class="mb-1">
                <a onclick="content_editable()" class="btn btn-dark btn-sm col-12">Editing Mode</a>
            </div>
            <div class="mb-1">
                <a onclick="window.print();" class="btn btn-success btn-sm col-12">Print Paper</a>
            </div>
        </div>
    </div>
</div>

<div class="main" style="padding:0px 20px 0px 20px;">
    <ul class="nav nav-pills nav-fill hidden-print">
        <li class="nav-item"><a href="#SinglePaper" data-bs-toggle="tab" role="tab" class="nav-link active"> <i class="fa fa-angle-double-down"></i> <br> Single Page </a></li>
        <li class="nav-item"><a href="#DoublePaper" data-bs-toggle="tab" role="tab" class="nav-link"> <i class="fa fa-angle-double-down"></i> <br> Half Page </a></li>
        <li class="nav-item"><a href="#AnswerKeys" data-bs-toggle="tab" role="tab" class="nav-link"> <i class="fa fa-angle-double-down"></i> <br> Answer Keys </a></li>
        <li class="nav-item"><a href="#Bubbles" data-bs-toggle="tab" role="tab" class="nav-link"> <i class="fa fa-angle-double-down"></i> <br> Bubbles Sheet </a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="SinglePaper">
            <section>
                <div style="position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100%; Z-INDEX:-1; "><img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark"></div>

                @include('client.paper.partial.table-layout')
                <div style="clear:both; margin-bottom:10px;"></div>

                <div class="form-group form-animate-text PrintSyllabus" style="display:none;">
                    <input type="text" class="form-text col-md-12">
                    <span class="bar" style="border-bottom:2px solid #000;"></span>
                    <div style="clear:both; margin-bottom:10px;"></div>
                </div>

                <div style="display:none; text-align:center;" class="PrintBubbles">
                    <img src="{{asset('public/client/Bubbles.jpg')}}" style="max-width:100%;">
                    <div style="clear:both; margin-bottom:10px;"></div>
                </div>
                <div class="">
                    {!!$paper->paper!!}
                </div>
            </section>
        </div>
        <div class="tab-pane fade" id="DoublePaper">
            <section>
                <table width="100%">
                    <tbody>
                    <tr>
                        <td width="47%">
                            <section style="margin:5px; zoom:50%;">
                                @include('client.paper.partial.table-layout')
                                <div style="clear:both; margin-bottom:10px;"></div>

                                <div class="form-group form-animate-text PrintSyllabus" style="display:none;">
                                    <input type="text" class="form-text col-md-12">
                                    <span class="bar" style="border-bottom:2px solid #000;"></span>
                                    <div style="clear:both; margin-bottom:10px;"></div>
                                </div>

                                <div style="display:none; text-align:center;" class="PrintBubbles">
                                    <img src="{{asset('public/client/Bubbles.jpg')}}" style="max-width:100%;">
                                    <div style="clear:both; margin-bottom:10px;"></div>
                                </div>
                                <div class="editable_content">
                                    {!! $paper->paper !!}
                                </div>
                            </section>
                        </td>
                        <td width="6%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td width="47%">
                            <section style="margin:5px; zoom:50%;">
                                @include('client.paper.partial.table-layout')
                                <div style="clear:both; margin-bottom:10px;"></div>

                                <div class="form-group form-animate-text PrintSyllabus" style="display:none;">
                                    <input type="text" class="form-text col-md-12">
                                    <span class="bar" style="border-bottom:2px solid #000;"></span>
                                    <div style="clear:both; margin-bottom:10px;"></div>
                                </div>

                                <div style="display:none; text-align:center;" class="PrintBubbles">
                                    <img src="{{asset('public/client/Bubbles.jpg')}}" style="max-width:100%;">
                                    <div style="clear:both; margin-bottom:10px;"></div>
                                </div>
                                <div class="editable_content">
                                     {!! $paper->paper !!}
                                </div>
                            </section>
                        </td>
                    </tr>
                    </tbody></table>
            </section>
        </div>
        <div class="tab-pane fade" id="AnswerKeys">
            <section class="text-center">
                <div style="position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100%; Z-INDEX:-1; "><img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark"></div>
                <table style="width:100%; font-size:12pt;">
                    <tbody><tr>
                        <td colspan="5" style="text-align:center;">
                            <h4 style="margin-bottom:0px; color:#000; text-align:center; font-size:30px; font-family:'Times New Roman'; font-weight:bold; transform:scaleY(1.3);"> {{$school->school_name}} </h4>
                            <p style="margin-bottom:2px; color:#000; text-align:center; font-size:9pt; font-family:'Times New Roman'; font-weight:bold; transform:scaleY(1.3);">{{$school->address}} PH: {{$school->phone}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="tblLabel">Paper Date:</td>
                        <td class="tblBox"> {{Carbon\Carbon::parse($paper->schedule_date)->format('d-M-Y')}} </td>
                        <td width="34%" rowspan="4" style="text-align:center; vertical-align:central; border:none;"> <img src="{{url('images').'/'.$school->logo}}" width="60" height="60"> </td>
                        <td class="tblLabel">Class:</td>
                        <td class="tblBox"> {{$paper->class_name}} </td>
                    </tr>
                    <tr>
                        <td class="tblLabel">Paper Code:</td>
                        <td class="tblBox"> <input type="text" style="width:180px; font-weight:bold; margin:0;"> </td>
                        <td class="tblLabel">Subject:</td>
                        <td class="tblBox"> {{$paper->subject_name}} </td>
                    </tr>
                    </tbody></table>
                <div style="clear:both; margin-bottom:20px;"></div>

               {!! $paper->answers !!}
        </section>
    </div>
    <div class="tab-pane fade" id="Bubbles">
        <section class="sheet padding-10mm">
            <div style="position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100%; Z-INDEX:-1; "><img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark"></div>
            <div class="col-md-12 text-center">
                <img src="{{asset('public/client/BubblesSheet.png')}}" class="img-responsive col-md-12">
            </div>
        </section>
    </div>
</div>
</div>


<script src="{{asset('public/client/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('public/client/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/client/jquery.romannumerals.js')}}"></script>
<script>
    function content_editable() {
        var value = $('.editable_content').attr('contenteditable');

        if (value == 'false') {
            $('.editable_content').attr('contenteditable', 'true');
            $('.editable_content').css('border-top-style', 'dotted');
            $('.editable_content').css('border-right-style', 'dotted');
            $('.editable_content').css('border-bottom-style', 'dotted');
            $('.editable_content').css('border-left-style', 'dotted');
            $('.editable_content').css('border-color', 'red');
        }
        else {
            $('.editable_content').attr('contenteditable', 'false');
            $('.editable_content').css('border-style', 'none');
        }
    }

    $(function () {
        document.addEventListener('contextmenu', event => event.preventDefault());
        $.fn.disableSelection = function () {
            return this
                .attr('unselectable', 'on')
                .css('user-select', 'none')
                .on('selectstart', false);
        };
        $(".paper_area").disableSelection();
    });

    $(document).ready(function () {
       // $('.roman').romannumerals();
    });

    function Bubbles() {
        if ($('#BubbleSheet').prop('checked')) {
            $('.PrintBubbles').show();
        }
        else {
            $('.PrintBubbles').hide();
        }
    };

    $(document).ready(function () {
        $('.layout-1').show();
    });

    function layoutId() {
        var lyt = $('#Templates').val();
        if (lyt == 1) {
            $('.layout-1').show();
            $('.layout-2').hide();
            $('.layout-3').hide();
            $('.layout-4').hide();
        }
        if (lyt == 2) {
            $('.layout-2').show();
            $('.layout-1').hide();
            $('.layout-3').hide();
            $('.layout-4').hide();
        }
        if (lyt == 3) {
            $('.layout-3').show();
            $('.layout-1').hide();
            $('.layout-2').hide();
            $('.layout-4').hide();
        }
        if (lyt == 4) {
            $('.layout-4').show();
            $('.layout-1').hide();
            $('.layout-2').hide();
            $('.layout-3').hide();
        }
    };

    $(function () {
        $("#fontSize").change(function () {
            $('.UrduDiv p').css("font-size", $(this).val() + "pt");
            $('.EnglishDiv p').css("font-size", $(this).val() + "pt");
            $('.UrduDiv span').css("font-size", $(this).val() + "pt");
            $('.EnglishDiv span').css("font-size", $(this).val() + "pt");
            $('.UrduMcqs').css("font-size", $(this).val() + "pt");
            $('.EnglishMcqs').css("font-size", $(this).val() + "pt");
            $('.TblUrduDiv p').css("font-size", $(this).val() + "pt");
            $('.TblEnglishDiv p').css("font-size", $(this).val() + "pt");
            $('.TblUrduDiv span').css("font-size", $(this).val() + "pt");
            $('.TblEnglishDiv span').css("font-size", $(this).val() + "pt");
            $('.QuestionType table p').css("font-size", $(this).val() + "pt");
            $('.QuestionType table span').css("font-size", $(this).val() + "pt");
        });
        jQuery('#customizer').on('change',function(){

            $('.UrduDiv p').css("color", $(this).val());
            $('.EnglishDiv p').css("color", $(this).val());
            $('.UrduDiv span').css("color", $(this).val());
            $('.EnglishDiv span').css("color", $(this).val());
            $('.UrduMcqs').css("color", $(this).val());
            $('.EnglishMcqs').css("color", $(this).val());
            $('.TblUrduDiv').css("color", $(this).val());
            $('.TblEnglishDiv').css("color", $(this).val());
        });
    })

    $(function () {
        $("#lineHeight").change(function () {
            $('.UrduDiv p').css("line-height", $(this).val());
            $('.EnglishDiv p').css("line-height", $(this).val());
            $('.UrduDiv span').css("line-height", $(this).val());
            $('.EnglishDiv span').css("line-height", $(this).val());
            $('.TblUrduDiv').css("line-height", $(this).val());
            $('.TblEnglishDiv').css("line-height", $(this).val());
        });
    })

    $(function () {
        $("#boldFont").change(function () {
            $('.UrduDiv p').css("font-weight", $(this).val());
            $('.EnglishDiv p').css("font-weight", $(this).val());
            $('.UrduMcqs').css("font-weight", $(this).val());
            $('.EnglishMcqs').css("font-weight", $(this).val());
            $('.TblUrduDiv').css("font-weight", $(this).val());
            $('.TblEnglishDiv').css("font-weight", $(this).val());
        });
    })

    $(function () {
        $("#fontColor").change(function () {
            $('.UrduDiv p').css("color", $(this).val());
            $('.EnglishDiv p').css("color", $(this).val());
            $('.UrduDiv span').css("color", $(this).val());
            $('.EnglishDiv span').css("color", $(this).val());
            $('.UrduMcqs').css("color", $(this).val());
            $('.EnglishMcqs').css("color", $(this).val());
            $('.TblUrduDiv').css("color", $(this).val());
            $('.TblEnglishDiv').css("color", $(this).val());
        });
    })
</script>


</body>
</html>