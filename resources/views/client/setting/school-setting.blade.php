@extends('client.layout.master')

@section('content')

<head>
          <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

</head>

    <div class="row row-deck">

        <div class="col-lg-12">

            <form class="card" id="customerForm" method="post" action="{{route('school-update')}}" enctype="multipart/form-data">

                @csrf

                <input type="hidden" name="id" value="{{$customer->id}}">

                <input type="hidden" name="mark" value="{{$customer->watermark}}">

                <input type="hidden" name="oldLogo" value="{{$customer->logo}}">

                <div class="card-header">

                    <h3 class="card-title">School Info</h3>

                </div>

                <div class="card-body">



                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Name</label>

                                <input type="text" class="form-control" name="name"  placeholder="Name" value="{{$customer->name}}" readonly>

                                @error('name')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Phone</label>

                                <input type="text" class="form-control" name="phone"  placeholder="Phone#" value="{{$customer->phone}}" readonly>

                                @error('phone')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                    </div>



                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">School Name</label>

                                
                                <input type="text" class="form-control" name="school"  placeholder="School name" value="{{$customer->school_name}}" readonly> 

                                @error('school')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>


                        {{-- <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">School Logo</label>

                                <textarea name="school_logo" class="ckeditor" id="school_logo" cols="50" rows="3" placeholder="school logo" readonly>{{$customer->logo}}</textarea>
                                <input type="text" class="form-control" name="school"  placeholder="School name" value="{{$customer->school_name}}" readonly>

                                @error('school')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div> --}}



                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Address</label>

                                <input type="text" class="form-control" name="address"  placeholder="Address" value="{{$customer->address}}" readonly>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                        <label class="form-label">Water Mark Type</label>

                           <label class="" style="display:inline-flex"><input type="radio" style="margin-right:5px;" class="form-control" {{ $customer->watermark_type== 'image'?'checked':''}} value="image" name="watermark_type"> Image</label>

                           <label class="" style="display:inline-flex"><input type="radio" style="margin-right:5px;margin-left:10px;" class="form-control" {{ $customer->watermark_type== 'text'?'checked':''}} value="text" name="watermark_type"> Text</label>   

                               

                        </div>

                    </div>

                    <div class="row" id="watermarkImage" @if($customer->watermark_type== 'text') style="display:none;" @endif>

                        <div class="col-md-12">

                            <div class="form-group">

                                <label class="form-label">Watermark <small>(1650x2350)</small> </label>

                                <div class="custom-file">

                                    <input type="file" class="custom-file-input"  name="water">

                                    <label class="custom-file-label">Choose file</label>

                                </div>

                            </div>

                        </div>

                        {{--<div class="col-md-6">--}}

                            {{--<div class="form-group">--}}

                                {{--<label class="form-label">Logo</label>--}}

                                {{--<div class="custom-file">--}}

                                    {{--<input type="file" class="custom-file-input"  name="logo">--}}

                                    {{--<label class="custom-file-label">Choose file</label>--}}

                                {{--</div>--}}

                            {{--</div>--}}

                        {{--</div>--}}

                    </div>

                    <div class="row" @if($customer->watermark_type== 'image') style="display:none;" @endif id="waterMarkText">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Water Mark Text</label>

                                <textarea class="form-control" name="wathermark_text" >{{$customer->wathermark_text}}</textarea>

                                @error('wathermark_text')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Water Mark Color</label>

                                <input type="color" name="wathermark_color" value="{{$customer->wathermark_color}}" >

                                @error('wathermark_color')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Water Mark Text Size (px)</label>

                                <input type="number" name="wathermark_size" class="form-control" value="{{$customer->wathermark_size}}" >

                                @error('wathermark_size')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Water Mark Type</label>

                                <input type="radio" name="watermark_position" id="horizental"  {{$customer->watermark_position=='horizental'?'checked':''}} value="horizental" >

                                

                                <label for="horizental">Horizental </label>

                                &nbsp;&nbsp;

                                <input type="radio" id="diagonall" name="watermark_position" {{$customer->watermark_position=='diagonal'?'checked':''}} value="diagonal" >

                                <label for="diagonall">Diagonal </label>

                                @error('wathermark_size')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <!-- <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Water Mark Rotate (in Degrees)</label>

                                <input type="number" name="wathermark_rotate" class="form-control" value="{{$customer->wathermark_rotate}}" >

                                @error('wathermark_rotate')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Water Mark Margin (in rem)</label>

                                <input type="number" name="wathermark_margin" class="form-control" value="{{$customer->wathermark_margin}}" >

                                @error('wathermark_margin')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Water Mark Position From Top (in %)</label>

                                <input type="number" name="wathermark_top" class="form-control" value="{{$customer->wathermark_top}}" >

                                @error('wathermark_top')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="form-label">Water Mark Water Mark Position From Left (in %)</label>

                                <input type="number" name="wathermark_left" class="form-control" value="{{$customer->wathermark_left}}" >

                                @error('wathermark_left')

                                <div class="text text-danger">{{ $message }}</div>

                                @enderror

                            </div>

                        </div> -->

                    </div>

                </div>

                <div class="card-footer text-right">

                    <button type="submit" class="btn btn-primary">Update Info</button>

                </div>

            </form>

        </div>

    </div>
    {{-- <script src="{{asset('/ckeditor/ckeditor.js')}}"></script> --}}


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="{{asset('ckeditors/ckeditor.js')}}"></script>
<script src="//cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('#school_logo');
</script> --}}


@endsection



@push('script')
{{-- <script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script> --}}
{{-- <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script> --}}

{{-- <div id="example"></div> --}}
      <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  	
        <script>
            var editor = new FroalaEditor('#school_logo');		
        </script>	

        <script>
            var editor = new FroalaEditor('#school');		
        </script>	


    <script> 

        $(document).ready(function () {



            $('#customerForm').validate({

                rules: {

                    name: {

                        required: true,

                    },

                    phone: {

                        required: true,

                    },

                    school: {

                        required: true,

                    },

                    address: {

                        required: true,

                    }

                },

                messages: {

                    name: "user name is required",

                    school: "school name is required",

                    phone: "phone number is required",

                    address: "address is required",

                }



            });



        });

        $('input[type=radio][name=watermark_type]').change(function() {

            

            var type = $('input[name="watermark_type"]:checked').val();

           

            if ( type == 'image') {

                $("#watermarkImage").show();

                $("#waterMarkText").hide();

            }

            else if (type == 'text') {

                $("#watermarkImage").hide();    

                $("#waterMarkText").show();

            }

        });

    </script>

@endpush