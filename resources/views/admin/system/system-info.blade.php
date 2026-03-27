@extends('admin.layout.master')
@section('content')
    <div class="row row-deck">
        <div class="col-lg-12">
            <form class="card" id="systemForm" method="post" action="{{route('system-update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="oldLogo" value="{{$info->logo}}">
                <div class="card-header">
                    <h3 class="card-title">System Information</h3>
                    <div class="card-options">
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title"  placeholder="Title" value="{{$info->title}}">
                                @error('title')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone"  placeholder="Phone#" value="{{$info->phone}}">
                                @error('phone')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email"  placeholder="email" value="{{$info->email}}">
                                @error('email')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="logo">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address"  placeholder="address" value="{{$info->address}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Update System</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {

            $('#systemForm').validate({
                rules: {
                    title: {
                        required: true,
                    }

                },
                messages: {
                    title: "system title is required",
                }
            });

        });
    </script>
@endpush