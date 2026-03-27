@extends('client.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <i class="fa fa-user-cog"></i> Change Password</h3>
                    <div class="card-options">
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form id="teacherForm" action="{{route('client-save-password')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Current Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-key op-6"></i>
                                                </div>
                                            </div>
                                            <input type="password" id="pass" name="cpassword" class="form-control" placeholder="Current Password" value="{{old('cpassword')}}">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-eye-slash op-6" id="hs"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">New Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-key op-6"></i>
                                                </div>
                                            </div>
                                            <input type="password" id="pass1" name="npassword" class="form-control" placeholder="New Password" value="{{old('npassword')}}">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-eye-slash op-6" id="hs1"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-2 float-right"><i class="fa fa-key mr-2"></i>Change Password</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @include('client.teacher.password-validate')
    <script>
        function togglePassword1($element){
            var newtype=$element.prop('type')=='password'?'text':'password';
            if(newtype=='password')
            {
                $('#hs').removeClass('fa fa-eye').addClass('fa fa-eye-slash')
            }else if (newtype=='text'){
                $('#hs').removeClass('fa fa-eye-slash').addClass('fa fa-eye')
            }
            $element.prop('type',newtype);
        }
        function togglePassword($element){
            var newtype=$element.prop('type')=='password'?'text':'password';
            if(newtype=='password')
            {
                $('#hs').removeClass('fa fa-eye').addClass('fa fa-eye-slash')
            }else if (newtype=='text'){
                $('#hs').removeClass('fa fa-eye-slash').addClass('fa fa-eye')
            }
            $element.prop('type',newtype);
        }
        $(document).ready(function() {
            $('#hs').click(function(){
                togglePassword($('#pass'));
            });
            $('#hs1').click(function(){
                togglePassword1($('#pass1'));
            });
        });
    </script>
@endpush