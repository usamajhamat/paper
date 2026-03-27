@extends('admin.layout.master')
@section('content')
<div class="row row-cards">
   <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card bg-primary">
         <div class="card-body">
            <div class="d-flex no-block align-items-center">
               <div>
                  <h6 class="text-white">Users</h6>
                  <h2 class="text-white m-0 ">{{$users}}</h2>
               </div>
               <div class="ml-auto">
                  <span class="text-white display-6"><i class="fa fa-user fa-2x"></i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card bg-info">
         <div class="card-body">
            <div class="d-flex no-block align-items-center">
               <div>
                  <h6 class="text-white">Customers</h6>
                  <h2 class="text-white m-0 ">{{$customers}}</h2>
               </div>
               <div class="ml-auto">
                  <span class="text-white display-6"><i class="fa fa-users fa-2x"></i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card bg-success">
         <div class="card-body">
            <div class="d-flex no-block align-items-center">
               <div>
                  <h6 class="text-white">Courses</h6>
                  <h2 class="text-white m-0 ">{{$courses}}</h2>
               </div>
               <div class="ml-auto">
                  <span class="text-white display-6"><i class="fa fa-file-text-o fa-2x"></i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card bg-cyan">
         <div class="card-body">
            <div class="d-flex no-block align-items-center">
               <div>
                  <h6 class="text-white">Total Questions</h6>
                  <h2 class="text-white m-0 ">{{$questions}}</h2>
               </div>
               <div class="ml-auto">
                  <span class="text-white display-6"><i class="fa fa-book fa-2x"></i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card bg-purple">
         <div class="card-body">
            <div class="d-flex no-block align-items-center">
               <div>
                  <h6 class="text-white">Question Types</h6>
                  <h2 class="text-white m-0 ">{{$types}}</h2>
               </div>
               <div class="ml-auto">
                  <span class="text-white display-6"><i class="fa fa-edit fa-2x"></i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card bg-teal">
         <div class="card-body">
            <div class="d-flex no-block align-items-center">
               <div>
                  <h6 class="text-white">Saved Papers</h6>
                  <h2 class="text-white m-0 ">{{$papers}}</h2>
               </div>
               <div class="ml-auto">
                  <span class="text-white display-6"><i class="fa fa-file fa-2x"></i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('style')
<!-- c3.js Charts Plugin -->
<link href="{{asset('admin/assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />
<!-- Morris.js Charts Plugin -->
<link href="{{asset('admin/assets/plugins/morris/morris.css')}}" rel="stylesheet" />
@endpush
@push('script')
<script src="{{asset('admin/assets/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('admin/assets/plugins/flot/jquery.flot.fillbetween.js')}}"></script>
<script src="{{asset('admin/assets/plugins/flot/jquery.flot.pie.js')}}"></script>
<!-- Echarts Js-->
<script src="{{asset('admin/assets/plugins/echarts/echarts.js')}}"></script>
<script src="{{asset('admin/assets/js/index1.js')}}"></script>
<!--othercharts js-->
<script src="{{asset('admin/assets/js/othercharts.js')}}"></script>
<!-- Charts Plugin -->
<script src="{{asset('admin/assets/plugins/chart/Chart.bundle.js')}}"></script>
<script src="{{asset('admin/assets/plugins/chart/utils.js')}}"></script>
<!--Jquery.knob js-->
<script src="{{asset('admin/assets/plugins/othercharts/jquery.knob.js')}}"></script>
<!--Amcharts Charts Plugin -->
<script src="{{asset('admin/assets/plugins/am-chart/amcharts.js')}}"></script>
<script src="{{asset('admin/assets/plugins/am-chart/serial.js')}}"></script>
<!-- peitychart -->
<script src="{{asset('admin/assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/peitychart/peitychart.init.js')}}'"></script>
@endpush