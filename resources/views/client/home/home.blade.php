@extends('client.layout.master')
@section('content')
   <style>
      /* Custom card styling with all four corner borders */
      .custom-card {
         position: relative;
         border: none;
         padding: 20px;
         margin: 15px;
         text-align: center;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      /* Four-corner border design */
      .custom-card:before, .custom-card:after, .custom-card .border-tl, .custom-card .border-br {
         content: '';
         position: absolute;
         border: 3px solid transparent;
         width: 20px;
         height: 20px;
      }

      .custom-card:before {
         top: 0;
         left: 0;
         border-top-color: var(--border-color, orange);
         border-left-color: var(--border-color, orange);
         /*border-top-color:black;*/
         /*border-left-color:black;*/
      }

      .custom-card:after {
         top: 0;
         right: 0;
         border-top-color: var(--border-color, orange);
         border-right-color: var(--border-color, orange);
         /*border-top-color: black;*/
         /*border-right-color: black;*/
      }

      .custom-card .border-tl {
         bottom: 0;
         left: 0;
         border-bottom-color: var(--border-color, orange);
         border-left-color: var(--border-color, orange);
         /*border-bottom-color:black;*/
         /*border-left-color:black;*/
      }

      .custom-card .border-br {
         bottom: 0;
         right: 0;
         border-bottom-color: var(--border-color, orange);
         border-right-color: var(--border-color, orange);
         /*border-bottom-color:black;*/
         /*border-right-color:black;*/
      }

      /* Spacing for icons and text */
      .custom-card i {
         font-size: 30px;
         margin-bottom: 10px;
         /*color: black;*/
      }

      /* Hover effect */
      .custom-card:hover {
         background-color: #f9f9f9;
         box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      }

      /* Urdu text section */
      .urdu-section {
         background-color: #fff;
         margin-top: 15px;
      }

      /* Green header for alerts */
      .urdu-section h4 {
         background-color: #90ee90;
         text-align: center;
         padding: 8px;
         font-size: 15px;
         font-weight: bold;
         margin: 0;
      }

      .urdu-section ul {
         list-style-type: none;
         padding-right: 4px;
         padding-top: 15px;
         text-align: right;
         margin: 0;
      }

      .urdu-section ul li {
         font-family:'NooriNastaleeq', serif;
         margin-bottom: 10px;
         padding-top: 15px;
         padding-bottom: 8px;
         font-size: 18px;
         font-weight: bold;
         border-bottom: 1px solid #D3D3D3;
      }

      /* Highlighted text for special alerts */
      /*.highlighted-alert {*/
         /*background-color: #FFFFE0;*/
         /*padding: 5px;*/
      /*}*/

      /* Checkmark icon for alerts */
      /*.urdu-section .statuscomplete:before {*/
         /*content: '✔';*/
         /*margin-left: 10px;*/
         /*color:darkgreen;*/
      /*}*/
      /*.urdu-section .statusincomplete:before {*/
         /*font-family: 'Font Awesome 5 Free';*/
         /*font-weight: 900;*/
         /*content: '\f021';*/
         /*margin-right: 10px;*/
         /*color:black;*/
         /*display: inline-block;*/
         /*transform: rotate(30deg);*/
      /*}*/
      .custom-card p{
         color: black;
         font-size: 15px;
         font-family: Arial;
      }
      .custom-card{
         background-color: white;
      }
      .blink {
         font-size: 13px;
         font-weight: bold;
         font-family: Arial;
         transition: 0.5s;
      }
   </style>
   @if($notificationpanels==1)
   @include('client.messages.notification')
   @endif
<div class="row">
@if($role=='Administrator')
   <!-- Left side - Cards -->
   <div class="col-lg-8">
      <div class="row">
         <!-- Card 1 -->
         <div class="col-lg-6">
            <a href="{{route('client-courses')}}">
            {{--<div class="custom-card" style="--border-color: orange;background: radial-gradient(circle, rgba(255,11,12,1) 0%, rgba(207,148,148,1) 100%);">--}}
            <div class="custom-card" style="--border-color: orange;">
               <div class="border-tl"></div>
               <div class="border-br"></div>
               <i class="fas fa-file-alt text-warning"></i>
               <p><b>GENERATE PAPER</b></p>
            </div>
            </a>
         </div>

         <!-- Card 2 -->
         <div class="col-lg-6">
            <a href="#">
            {{--<div class="custom-card" style="--border-color: green;background: radial-gradient(circle, rgba(255,101,11,1) 0%, rgba(240,147,147,1) 100%);">--}}
            <div class="custom-card" style="--border-color: green;">
               <div class="border-tl"></div>
               <div class="border-br"></div>
               <i class="fas fa-file-alt text-success"></i>
               <p><b>GENERATE PAPER 2</b></p>
               <span class="blink text-success">Coming Soon</span>
               <script type="text/javascript">
                   var blink = document.getElementsByName('blink');
                   setInterval(function() {
                       blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
                   }, 700);
               </script>
            </div>
            </a>
         </div>

         <!-- Card 3 -->
         <div class="col-lg-6">
            <a href="{{route('saved-papers')}}">
            {{--<div class="custom-card" style="--border-color: purple;background: radial-gradient(circle, rgba(187,11,255,1) 0%, rgba(244,157,157,1) 100%);">--}}
            <div class="custom-card" style="--border-color: purple;">
               <div class="border-tl"></div>
               <div class="border-br"></div>
               <i class="fas fa-save text-primary"></i>
               <p><b>SAVED PAPERS ({{$papers}})</b></p>
            </div>
            </a>
         </div>

         <!-- Card 4 -->
         <div class="col-lg-6">
            <a href="{{route('client-past')}}">
            {{--<div class="custom-card" style="--border-color: red;background: linear-gradient(90deg, rgba(105,166,255,1) 0%, rgba(57,46,46,1) 100%);">--}}
            <div class="custom-card" style="--border-color: red;">
               <div class="border-tl"></div>
               <div class="border-br"></div>
               <i class="fas fa-paperclip text-danger"></i>
               <p><b>PAST PAPERS ({{count(\App\Models\Admin\PastPaper\PastPaper::total())}})</b></p>
            </div>
            </a>
         </div>

         <!-- Card 5 -->
         <div class="col-lg-6">
            <a href="{{route('client-teacher')}}">
            {{--<div class="custom-card" style="--border-color: yellow;background: radial-gradient(circle, rgba(132,255,187,1) 0%, rgba(56,49,49,1) 100%);">--}}
            <div class="custom-card" style="--border-color: yellow;">
               <div class="border-tl"></div>
               <div class="border-br"></div>
               <i class="fas fa-users text-warning"></i>
               <p><b>TEACHERS ({{$teachers}})</b></p>
            </div>
            </a>
         </div>

         <!-- Card 6 -->
         <div class="col-lg-6">
            <a href="{{route('school-info')}}">
            {{--<div class="custom-card" style="--border-color: blue;background: linear-gradient(90deg, rgba(255,228,11,1) 0%, rgba(189,57,57,1) 100%);">--}}
            <div class="custom-card" style="--border-color: blue;">
               <div class="border-tl"></div>
               <div class="border-br"></div>
               <i class="fas fa-cog text-info"></i>
               <p><b>SETTINGS</b></p>
            </div>
            </a>
         </div>

         <!-- Card 7 -->
         <div class="col-lg-6">
            <a href="#">
            {{--<div class="custom-card" style="--border-color: black;background: radial-gradient(circle, rgba(11,255,84,1) 0%, rgba(166,81,81,1) 100%);">--}}
            <div class="custom-card" style="--border-color: black;">
               <div class="border-tl"></div>
               <div class="border-br"></div>
               <i class="fas fa-history text-dark"></i>
               <p><b>CHECK HISTORY</b></p>
               <span class="blink text-dark">Coming Soon</span>
            </div>
            </a>
         </div>
      </div>
   </div>

   @elseif($role=='Teacher')
      <div class="col-lg-8">
         <!-- Card 1 -->
         <div class="col-lg-6">
            <a href="{{route('client-courses')}}">
               {{--<div class="custom-card" style="--border-color: orange;background: radial-gradient(circle, rgba(255,11,12,1) 0%, rgba(207,148,148,1) 100%);">--}}
               <div class="custom-card" style="--border-color: orange;">
                  <div class="border-tl"></div>
                  <div class="border-br"></div>
                  <i class="fas fa-file-alt text-warning"></i>
                  <p><b>GENERATE PAPER</b></p>
               </div>
            </a>
         </div>
         <!-- Card 3 -->
         <div class="col-lg-6">
            <a href="{{route('saved-papers')}}">
               {{--<div class="custom-card" style="--border-color: purple;background: radial-gradient(circle, rgba(187,11,255,1) 0%, rgba(244,157,157,1) 100%);">--}}
               <div class="custom-card" style="--border-color: purple;">
                  <div class="border-tl"></div>
                  <div class="border-br"></div>
                  <i class="fas fa-save text-primary"></i>
                  <p><b>SAVED PAPERS ({{$papers}})</b></p>
               </div>
            </a>
         </div>
      </div>
@endif


<!-- Right side - Urdu text section -->
   <div class="col-lg-4">
      <div class="urdu-section">
         <h4>NEW ALERTS</h4>
         <ul>
            @foreach($alerts as $alert)
               @if($alert->alert_status==1)
                  <li class="text-{{$alert->alert_color}}"><i class="fa fa-thumbs-up" style="color:black;margin-right:3%;"></i>{{$alert->alert_name}}</li>
               @else
                  <li class="text-{{$alert->alert_color}}"><i class="fa fa-solid fa-refresh fa-spin" style="color:black;margin-right:3%;"></i>{{$alert->alert_name}}</li>
               @endif
            @endforeach
         </ul>
      </div>
   </div>
</div>
<style>
   .animate-charcter
   {
   text-transform: uppercase;
   background-image: linear-gradient(
   -225deg,
   #231557 0%,
   #44107a 29%,
   #ff1361 67%,
   #ffffff 100%
   );
   background-size: auto auto;
   background-clip: border-box;
   background-size: 200% auto;
   color: #fff;
   background-clip: text;
   text-fill-color: transparent;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   animation: textclip 2s linear infinite;
   display: inline-block;
   font-size:16px;
   }
   @keyframes textclip {
   to {
   background-position: 200% center;
   }
   }
</style>

<!-- {{\App\Models\Helper::expiry()}} -->

@if(\App\Models\Helper::expiry()<=15 and \App\Models\Helper::expiry()!=0)
<div class="modal fade" id="tst" tabindex="-1" role="dialog" aria-labelledby="normalmodal" aria-hidden="true">
   <div class="modal-dialog" role="document" style="border: 4px solid #ffff">
      <div class="modal-content bg-primary border-0" style="color: #ff685c !important;">
         <div class="modal-header border-0">
            {{--
            <h5 class="modal-title" id="normalmodal1">Account Expiry Message</h5>
            --}}
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body border-0" style="background: white !important;">
            <img src="https://i.giphy.com/media/HxORVNECn1UkjgFF8M/giphy.webp">
            <p class="text-center animate-charcter" style="text-align: center;">Your account will be expired after {{\App\Models\Helper::expiry()}} days</p>
         </div>
      </div>
   </div>
</div>
@elseif(\App\Models\Helper::expiry()==0)
<div class="modal fade" id="tst" tabindex="-1" role="dialog" aria-labelledby="normalmodal" aria-hidden="true">
   <div class="modal-dialog bg-primary " role="document" style="border: 4px solid #ffff">
      <div class="modal-content bg-primary border-0" style="color: #ff685c !important;">
         <div class="modal-header border-0">
            {{--
            <h5 class="modal-title" id="normalmodal1">Account Expiry Message</h5>
            --}}
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body border-0" style="background: white !important;">
            <img src="https://i.giphy.com/media/HxORVNECn1UkjgFF8M/giphy.webp">
            <!-- old gify   https://giphy.com/stickers/clap-bullshitalarm-1fjDU6hWfxPqPjzHqF -->
            <p class="text-center animate-charcter">Your account has expired please renew your account</p>
         </div>
      </div>
   </div>
</div>
@endif
@endsection