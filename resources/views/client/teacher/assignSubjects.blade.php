@extends('client.layout.master')
@section('content')
<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title"> <i class="fa fa-user-plus"></i> Assign Subjects </h3>
            <div class="card-options">
               <a href="{{route('client-teacher')}}" type="button" class="btn  btn-pill btn-primary"><i
                  class="fe fe-list mr-2"></i>Teachers List</a>
            </div>
         </div>
         <div class="card-body">
            <div class="media media-lg m-0">
               <div class="media-body">
                  <div class="col-md-12">
                     <form id="teacherForm" action="{{route('addAssignSubjects')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <!-- <label class="form-label">Assign Subjects</label> -->
                              </div>
                           </div>


                           <input type="hidden" class="form-check-input"  name="teacherId" value="{{$teacherId}}">

                           @foreach ($subjects as $subject) 
                           <div class="col-md-3 mb-5">
                              <div class="form-check">

                                 <div class="p-3 mb-2 bg-info text-white">{{$subject->class_name}} <b style="color:red;">{{$subject->descriptive_name}}</b></div>
                                 
                                 @foreach ($subject->subjects as $sub)
                                 <input type="checkbox" class="form-check-input" id="check{{$loop->iteration}}" name="option[]" value="{{$sub->subject_id}}" 
                                 @if(in_array($sub->subject_id, $assignedSubjectsArray)) checked @endif>

                                 <label class="form-check-label" for="check{{$loop->iteration}}">
                                   {{$sub->subject_name}}
                                 </label>
                                 <br>
                                 @endforeach

                              </div>
                           </div>

                           
                           @endforeach

                        </div>
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <button type="submit" class="btn btn-primary mt-2 float-right">Save</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('script')
<script>
   var loadFile = function(event) {
   
       var reader = new FileReader();
   
       reader.onload = function() {
   
           var output = document.getElementById('output');
   
           output.src = reader.result;
   
       };
   
       reader.readAsDataURL(event.target.files[0]);
   
   };
   
   
   
   function togglePassword($element) {
   
       var newtype = $element.prop('type') == 'password' ? 'text' : 'password';
   
       if (newtype == 'password')
   
       {
   
           $('#hs').removeClass('fa fa-eye').addClass('fa fa-eye-slash')
   
       } else if (newtype == 'text') {
   
           $('#hs').removeClass('fa fa-eye-slash').addClass('fa fa-eye')
   
       }
   
       $element.prop('type', newtype);
   
   }
   
   $(document).ready(function() {
   
       $('#hs').click(function() {
   
           togglePassword($('#pass'));
   
       });
   
       $('#hs1').click(function() {
   
           togglePassword1($('#pass1'));
   
       });
   
   });
</script>
@include('client.teacher.teacher-validate')
@endpush