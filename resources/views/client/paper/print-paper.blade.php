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
             body.no-select {
      user-select: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
    }
         </style>
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
         <title>One Click Test Solution</title>
         
         <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">

        <style>
          body {
            font-family: 'Noto Nastaliq Urdu', serif;
          }
          
          
        </style>



   </head>
   </head>
   <body class=" no-select" style="">
<style type="text/css">

@media print {
    /* Hide sidebar and navigation */
    .sidenav, .nav.nav-pills, .hidden-print {
        display: none !important;
    }
    
    /* Full width main content */
    .main {
        margin-left: 0 !important;
        margin-right: 0 !important;
        padding: 0 5px !important;
        width: 100% !important;
        max-width: 100% !important;
    }
    
    /* Full width for all sections */
    section {
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    /* Body adjustments */
    body {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }
    
    /* Page margins */
    @page {
        margin: 0.5cm;
    }
}

  .nav-item {
    color: #fff;
    background-color: #e6e6e6;
    cursor: pointer;
  }
  .UrduDiv span{
    margin-left:5px;
  }
  .EnglishDiv span{
    margin-right:5px;
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
  .bgtext {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-around;
    color: {{$school->wathermark_color}};
    text-align:center;
    z-index: -1;
    font-size:{{$school->wathermark_size}}px;
  }
  .diagonal {
    transform: rotate(-45deg);
    text-align: center;
  }
  #bubbles{
    text-align:left;
  }
  #bubbles table {
    display: inline-block;
  }
  #bubbles table {
    border-collapse: collapse;
    padding: 5px;
  }
  #bubbles td {
    border: 1px solid #000;
    border-collapse: collapse;
    padding: 5px;
    text-align: center;
  }
  #bubbles .non-circle {
    width: 20px;
    height: 20px;
    padding: 2px;
    background: #fff;
    color: #000;
    text-align: center;
    border: 1px solid #fff;
    font: 12px Arial, sans-serif;
  }
  #bubbles .circle {
    border-radius: 50%;
    width: 20px;
    height: 20px;
    padding: 2px;
    background: #fff;
    border: 1px solid #000;
    color: #000;
    text-align: center;
    font: 12px Arial, sans-serif;
  }
  .bubble {
    width: 20px;
    height: 20px;
    border: 1px solid #000;
    border-radius: 50%;
    display: inline-block;
    text-align: center;
    line-height: 20px;
    font-size: 12px;
  }
  /* Style for selected (filled) bubble */
  .selected {
    background-color: #000;
    color: #fff;
  }
  /* Style for questions */
  .question {
    margin-bottom: 20px;
  }

  /* --- MOBILE RESPONSIVE STYLES --- */

  .main {
    margin-left: 200px; /* default sidebar width */
    margin-right: 0; /* right side ka space hatane ke liye */
    padding: 10px; /* thoda padding content ke liye */
    overflow-x: hidden; /* horizontal scroll avoid karne ke liye */
    max-width: calc(100% - 200px); /* full width minus sidebar */
  }

  /* Images ko responsive aur overflow se bachane ke liye */
  /*img {*/
  /*  max-width: 100%;*/
  /*  height: auto;*/
  /*  display: block;*/
  /*}*/

   --- Mobile Responsive --- 
  @media (max-width: 768px) {
    .sidenav {
      width: 100%;
      height: auto;
      position: relative;
      padding: 10px 0;
    }
    .sidenav li {
      display: inline-block;
      margin: 0 5px;
      font-size: 12pt;
      background-color: transparent;
      padding: 8px 10px;
    }
    .sidenav i {
      font-size: 18pt;
    }
    .main {
      margin-left: 0;
      margin-right: 0;  
      max-width: 100%;  
      padding: 10px;
    }
  }

  @media (max-width: 480px) {
    .sidenav li {
      font-size: 10pt;
      padding: 6px 8px;
    }
    .sidenav i {
      font-size: 16pt;
    }
    .form-control-sm {
      font-size: 10pt;
    }
    input[type=number], select.form-control-sm, input[type=color] {
      font-size: 12pt;
    }
  }
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
                  <select class="form-control-sm form-select" id="boldFont" name="boldFont">
                     <option selected="selected" value="Normal">Normal</option>
                     <option value="Bold">Bold</option>
                  </select>
               </div>
                <div class="mb-2">
                      <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Font Style</label>
<label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Font Style</label>
<select class="form-control-sm form-select" id="styleFont" name="styleFont">
    <option value="Helvetica" style="font-family: Helvetica, sans-serif;">Helvetica (sans-serif)</option>
    <option value="Arial" style="font-family: Arial, sans-serif;">Arial (sans-serif)</option>
    <option value="Arial Black" style="font-family: 'Arial Black', sans-serif;">Arial Black (sans-serif)</option>
    <option value="Verdana" style="font-family: Verdana, sans-serif;">Verdana (sans-serif)</option>
    <option value="Tahoma" style="font-family: Tahoma, sans-serif;">Tahoma (sans-serif)</option>
    <option value="Trebuchet MS" style="font-family: 'Trebuchet MS', sans-serif;">Trebuchet MS (sans-serif)</option>
    <option value="Impact" style="font-family: Impact, sans-serif;">Impact (sans-serif)</option>
    <option value="Gill Sans" style="font-family: 'Gill Sans', sans-serif;">Gill Sans (sans-serif)</option>
    <option value="Times New Roman" style="font-family: 'Times New Roman', serif;">Times New Roman (serif)</option>
    <option value="Georgia" style="font-family: Georgia, serif;">Georgia (serif)</option>
    <option value="Palatino" style="font-family: Palatino, serif;">Palatino (serif)</option>
    <option value="Baskerville" style="font-family: Baskerville, serif;">Baskerville (serif)</option>
    <option value="Andalé Mono" style="font-family: 'Andalé Mono', monospace;">Andalé Mono (monospace)</option>
    <option value="Courier" style="font-family: Courier, monospace;">Courier (monospace)</option>
    <option value="Lucida" style="font-family: Lucida, monospace;">Lucida (monospace)</option>
    <option value="Monaco" style="font-family: Monaco, monospace;">Monaco (monospace)</option>
    <option value="Bradley Hand" style="font-family: 'Bradley Hand', cursive;">Bradley Hand (cursive)</option>
    <option value="Brush Script MT" style="font-family: 'Brush Script MT', cursive;">Brush Script MT (cursive)</option>
    <option value="Luminari" style="font-family: Luminari, fantasy;">Luminari (fantasy)</option>
    <option value="Comic Sans MS" style="font-family: 'Comic Sans MS', cursive;">Comic Sans MS (cursive)</option>
    


</select>

               </div>
               <div class="mb-2">
                  <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Font Colors</label>
                  <select class="form-control-sm form-select" id="fontColor" name="fontColor">
                     <option selected="selected" value="black">Black</option>
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
                  <select class="form-control-sm form-select" id="Templates" name="Templates" onchange="layoutId();" style="font-size:9pt;">
                     <option selected="selected" value="1">Layout 1</option>
                     <option value="2">Layout 2</option>
                     <option value="3">Layout 3</option>
                     <option value="4">Layout 4</option>
                      <option value="2">Layout 5</option>
                     <option value="3">Layout 6</option>
                     <option value="4">Layout 7</option>
                  </select>
               </div>
               <div class="mt-2" style="text-align:center;">
                  <input type="checkbox" class="checkbox" id="BubbleSheet" value="true">
                  <label style="font-size:9pt; margin-bottom:0px; padding-left:5px;color:#fff">Bubble Sheet</label>

                  <input type="number" class="number" id="number" placeholder="Enter Number of Bubbles" style="display:none; margin-bottom: 5px !important;">

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
            <li class="nav-item"><a href="#" > <i class="fa fa-angle-double-down"></i> <br> <input type="checkbox" id="line"><label for="line">Syllabus Line</label> </a></li>
         </ul>
         
         <div class="tab-content">

         

            <div class="tab-pane active" id="SinglePaper">

            

               <section>

               

                  <div @if($school->watermark_type == 'text') class="bgtext" @endif style="    -webkit-filter: grayscale(100%);     filter: grayscale(100%);     opacity: 25%;     position: fixed;     top: 25%;     left: 50;     right: 50;     bottom: 0;     width: 85%;     height: 70%;     Z-INDEX: -1; ">
                  @if($school->watermark_type == 'text' && $school->watermark_position == 'horizental')
                  {{$school->wathermark_text}}  
                  @elseif($school->watermark_type == 'text' && $school->watermark_position == 'diagonal')
                  <p class="diagonal">{{$school->wathermark_text}} </p>

                  
                  
                  @endif    
                  @if($school->watermark_type == 'image')
                  <img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark">
                  @endif
            </div>

            
            @include('client.paper.partial.table-layout')
            <div style="clear:both; margin-bottom:10px;">
            </div>
            <div class="form-group form-animate-text PrintSyllabus"  style="display:none;"> 
            <input type="text" class="form-text col-md-12">
            <span class="bar" style="border-bottom:2px solid #000;"></span>
            <div style="clear:both; margin-bottom:10px;"></div>
            </div>
            <div style="display:none; text-align:center;" class="PrintBubbles"> 
            <div id="htmlBubbles">
            </div>
            <!-- <img src="{{asset('public/client/Bubbles.jpg')}}" style="max-width:100%;">
               -->
            <div style="clear:both; margin-bottom:10px;"></div>
            </div>
            <div class="editable_content">

            {!!$paper->paper!!}
            </div>
            </section>
         </div>


      <div class="tab-pane fade" id="DoublePaper">

    <!-- First Watermark Div for Left Side -->
    <div @if($school->watermark_type == 'text') class="bgtext" @endif style="
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
        opacity: 25%;
        position: fixed;
        top: 25%;
        left: 0;
        width: 50%;
        height: 50%;
        z-index: -1;
    ">
        @if($school->watermark_type == 'text' && $school->watermark_position == 'horizental')
            {{$school->wathermark_text}}  
        @elseif($school->watermark_type == 'text' && $school->watermark_position == 'diagonal')
            <p class="diagonal">{{$school->wathermark_text}} </p>
        @endif    
        @if($school->watermark_type == 'image')
            <img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark">
        @endif
    </div>

    <!-- Second Watermark Div for Right Side -->
    <div @if($school->watermark_type == 'text') class="bgtext" @endif style="
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
        opacity: 25%;
        position: fixed;
        top: 25%;
        right: 0;
        width: 50%;
        height: 50%;
        z-index: -1;
    ">
        @if($school->watermark_type == 'text' && $school->watermark_position == 'horizental')
            {{$school->wathermark_text}}  
        @elseif($school->watermark_type == 'text' && $school->watermark_position == 'diagonal')
            <p class="diagonal">{{$school->wathermark_text}} </p>
        @endif    
        @if($school->watermark_type == 'image')
            <img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark">
        @endif
    </div>

    <!-- Table Content for Left and Right Pages -->
    <section>
        <table width="100%">
            <tbody>
                <tr>
                    <!-- Left Column (Left Page) -->
                    <td width="47%">
                        <section style="margin:5px; zoom:50%;">
                            <!-- Header for Left Page -->
                            @include('client.paper.partial.table-layout')

                            <div style="clear:both; margin-bottom:10px;"></div>

                            <div class="form-group form-animate-text PrintSyllabus" style="display:none;">
                                <input type="text" class="form-text col-md-12">
                                <span class="bar" style="border-bottom:2px solid #000;"></span>
                                <div style="clear:both; margin-bottom:10px;"></div>
                            </div>

                            <div style="display:none; text-align:center;" class="PrintBubbles2">
                                <div id="htmlBubbles2">
                                </div>
                                <div style="clear:both; margin-bottom:10px;"></div>
                            </div>

                            <div class="editable_content">
                                {!! $paper->paper !!}
                            </div>
                        </section>
                    </td>

                    <!-- Gap Between the Two Pages -->
                    <td width="6%">&nbsp;&nbsp;&nbsp;&nbsp;</td>

                    <!-- Right Column (Right Page) -->
                    <td width="47%">
                        <section style="margin:5px; zoom:50%;">
                            <!-- Header for Right Page -->
                            @include('client.paper.partial.table-layout')

                            <div style="clear:both; margin-bottom:10px;"></div>

                            <div class="form-group form-animate-text PrintSyllabus" style="display:none;">
                                <input type="text" class="form-text col-md-12">
                                <span class="bar" style="border-bottom:2px solid #000;"></span>
                                <div style="clear:both; margin-bottom:10px;"></div>
                            </div>

                            <div style="display:none; text-align:center;" class="PrintBubbles3">
                                <div id="htmlBubbles3">
                                </div>
                                <div style="clear:both; margin-bottom:10px;"></div>
                            </div>

                            <div class="editable_content">
                                {!! $paper->paper !!}
                            </div>
                        </section>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</div>

         <div class="tab-pane fade" id="AnswerKeys">

         
                  <div @if($school->watermark_type == 'text') class="bgtext" @endif style="    -webkit-filter: grayscale(100%);     filter: grayscale(100%);     opacity: 25%;     position: fixed;     top: 25%;     left: 50;     right: 50;     bottom: 0;     width: 85%;     height: 70%;     Z-INDEX: -1; ">
                  @if($school->watermark_type == 'text' && $school->watermark_position == 'horizental')
                  {{$school->wathermark_text}}  
                  @elseif($school->watermark_type == 'text' && $school->watermark_position == 'diagonal')
                  <p class="diagonal">{{$school->wathermark_text}} </p>

                  
                  
                  @endif    
                  @if($school->watermark_type == 'image')
                  <img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark">
                  @endif
            </div>
            <section class="text-center">
               <div style="    -webkit-filter: grayscale(100%);     filter: grayscale(100%);     opacity: 25%;     position: fixed;     top: 25%;     left: 50;     right: 50;     bottom: 0;     width: 85%;     height: 70%;     Z-INDEX: -1; "><img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark"></div>
               <table style="width:100%; font-size:12pt;">
                  <tbody>
                     <tr>
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
                  </tbody>
               </table>
               <div style="clear:both; margin-bottom:20px;"></div>
               {!! $paper->answers !!}
            </section>
         </div>
         <div class="tab-pane fade" id="Bubbles">
              <div @if($school->watermark_type == 'text') class="bgtext" @endif style="    -webkit-filter: grayscale(100%);     filter: grayscale(100%);     opacity: 25%;     position: fixed;     top: 25%;     left: 50;     right: 50;     bottom: 0;     width: 85%;     height: 70%;     Z-INDEX: -1; ">
                  @if($school->watermark_type == 'text' && $school->watermark_position == 'horizental')
                  {{$school->wathermark_text}}  
                  @elseif($school->watermark_type == 'text' && $school->watermark_position == 'diagonal')
                  <p class="diagonal">{{$school->wathermark_text}} </p>

                  
                  
                  @endif    
                  @if($school->watermark_type == 'image')
                  <img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark">
                  @endif
            </div>
                 
            <section class="sheet padding-10mm">
               <div style="    -webkit-filter: grayscale(100%);     filter: grayscale(100%);     opacity: 25%;     position: fixed;     top: 25%;     left: 50;     right: 50;     bottom: 0;     width: 85%;     height: 70%;     Z-INDEX: -1; "><img src="{{url('images').'/'.$school->watermark}}" style="width:100%; height:100%" alt="Watermark"></div>
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     
      <script>


$(document).on('click', '#BubbleSheet', function() {
    $('#number').show();
    var requiredQuesValue = null; // Declare the variable outside the if block
    
    var quePanelElement = document.getElementById('QuePanel-1');
    
    // Check if the element exists
    if (quePanelElement) {
        // Get the value of the requiredques attribute
        requiredQuesValue = quePanelElement.getAttribute('requiredques');
    
        // Log the value to the console (or do whatever you need with it)
        console.log('Required Questions:', requiredQuesValue);
    } else {
        console.log('Element with id "QuePanel-1" not found.');
    }
    
    $('#number').val(requiredQuesValue);

   
 
  
        var t_count =requiredQuesValue ;; // Replace with your desired value

         if (t_count < 1) {

            alert()
            
         }else{


            $.ajax({
            type: 'get',
            url: '{{ route("get-bubbles") }}', // Use the named route
            data: { count: t_count },
            success: function(data) {
                $("#htmlBubbles").html(data);
                $('.PrintBubbles').show();
                $("#htmlBubbles2").html(data);
                $('.PrintBubbles2').show();
                 $("#htmlBubbles3").html(data);
                $('.PrintBubbles3').show();
            },
            error: function(xhr, status, error) {
                // Handle any errors here
                console.error(xhr.responseText);
            }
        });


         }

      });



    ;


         
      </script>
      <script text="type/javascript">
         // function Bubbles() {
         
         // if ($('#BubbleSheet').prop('checked')) {
         
         //     alert('Success');
         //     $('.PrintBubbles').show();
         
         // }
         
         // else {
         
         //     $('.PrintBubbles').hide();
         
         // }
         
         // };



         
         
         
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
         
         
         
         
         
         
         
         $(document).ready(function () {
         
         $('.layout-1').show();
         
         var count = 0;
         
         var turn = 0;
         
         $('div[quetype="1"]').each(function() {
         
           count += parseInt($(this).attr('requiredques'));
         
           turn += 1; 
         
         });





    //         if(count > 0){
         
    //      var tCount = count/turn;
     
    //      $.ajax({
     
    //              type:'get',
     
    //              url:'{{url('paper/get-bubbles')}}/'+tCount,
     
    //              data:{count:count},
     
    //              success:function(data){
     
    //                 $("#htmlBubbles").html(data);
              
    //              },
     
    //          });
     
    //  }

         
         

         
         
         
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
         
            $('.HeadingTbl td').css("font-size", $(this).val() + "pt");
            
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
              $('.HeadingTbl td').css("font-weight", $(this).val());
         
             $('.UrduDiv p').css("font-weight", $(this).val());
         
             $('.EnglishDiv p').css("font-weight", $(this).val());
         
             $('.UrduMcqs').css("font-weight", $(this).val());
         
             $('.EnglishMcqs').css("font-weight", $(this).val());
         
             $('.TblUrduDiv').css("font-weight", $(this).val());
         
             $('.TblEnglishDiv').css("font-weight", $(this).val());
         
         });
         
         })
         
          $(function () {
         
         $("#styleFont").change(function () {
             var selectedFont = $(this).val();

    $('.HeadingTbl td').css("font-family", selectedFont);
    $('.UrduDiv p').css("font-family", selectedFont);
    $('.EnglishDiv p').css("font-family", selectedFont);
    $('.UrduMcqs').css("font-family", selectedFont);
    $('.EnglishMcqs').css("font-family", selectedFont);
    $('.TblUrduDiv').css("font-family", selectedFont);
    $('.TblEnglishDiv').css("font-family", selectedFont);
         
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
         
         });
         
         $("#line").change(function(){
         
         if($(this).prop('checked')){
         
             $("#syllabustable").show();
         
         }else{
         
             $("#syllabustable").hide();
         
         }
         
         
         
         });
         
         
         
      </script>
   </body>
</html>