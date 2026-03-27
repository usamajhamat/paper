@extends('client.layout.master')
@section('content')
<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title"> <i class="fa fa-user-plus"></i> New Teacher</h3>
            <div class="card-options">
               <a href="{{route('client-teacher')}}" type="button" class="btn  btn-pill btn-primary"><i
                  class="fe fe-list mr-2"></i>Teachers List</a>
            </div>
         </div>
         <div class="card-body">
            <div class="media media-lg m-0">
               {{--
               <div class="media-left">--}}
                  {{--<a href="#">--}}
                  {{--<img class="media-object" id="output" src="https://www.saraswatiias.com/wp-content/uploads/2018/11/dummy-profile-pic-male1.jpg" alt="media1">--}}
                  {{--</a>--}}
                  {{--
               </div>
               --}}
               <div class="media-body">
                  <div class="col-md-12">
                     <form id="teacherForm" action="{{route('teacher-save')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="form-label">Teacher Name</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <div class="input-group-text">
                                                <i class="fa fa-user op-6"></i>
                                             </div>
                                          </div>
                                          <input type="text" name="name" class="form-control"
                                             placeholder="Teacher name">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="form-label">Father Name</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <div class="input-group-text">
                                                <i class="fa fa-user op-6"></i>
                                             </div>
                                          </div>
                                          <input type="text" name="fname" class="form-control"
                                             placeholder="Father name">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="form-label">Contact Number</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <div class="input-group-text">
                                                <i class="fa fa-phone op-6"></i>
                                             </div>
                                          </div>
                                          <input type="text" name="phone" class="form-control"
                                             placeholder="Phone number">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="form-label">Username</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <div class="input-group-text">
                                                <i class="fa fa-envelope op-6"></i>
                                             </div>
                                          </div>
                                          <input type="text" name="username" class="form-control"
                                             placeholder="Username">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="form-label">Password</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <div class="input-group-text">
                                                <i class="fa fa-key op-6"></i>
                                             </div>
                                          </div>
                                          <input type="password" id="pass" name="password"
                                             class="form-control" placeholder="Password">
                                          <div class="input-group-prepend">
                                             <div class="input-group-text">
                                                <i class="fa fa-eye-slash op-6" id="hs"></i>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                                 <div class="col-md-12">
                                    <img class="center" style="width: 250px;height:235px;margin-left:20%;"
                                       id="output" src="{{url('images/photo/not-available.png')}}"
                                       alt="media1">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="form-label">Choose Image</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <div class="input-group-text">
                                                <i class="fa fa-image op-6"></i>
                                             </div>
                                          </div>
                                          <input type="file" name="photo" class="form-control"
                                             placeholder="Search for..." accept="image/*"
                                             onchange="loadFile(event)">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group mt-6">
                                       <label class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input"
                                          name="status" value="1" checked>
                                       <span class="custom-control-label">IsActive</span>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="form-label">Address</label>
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <div class="input-group-text">
                                          <i class="fa fa-map-marker-alt op-6"></i>
                                       </div>
                                    </div>
                                    <input type="text" name="address" class="form-control"
                                       placeholder="Username">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <button type="submit" class="btn btn-primary mt-2 float-right">Save
                                 Teacher</button>
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