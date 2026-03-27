<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-TileColor" content="#ff685c">
    <meta name="theme-color" content="#32cafe">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Title -->
    <title>School</title>
    <link rel="stylesheet" href="{{asset('public/admin/assets/fonts/fonts/font-awesome.min.css')}}">

    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">

    <!-- Dashboard Css -->
    <link href="{{asset('public/admin/assets/css/dashboard.css')}}" rel="stylesheet" />


    <!---Font icons-->
    <link href="assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

</head>
<body class="login-img">
<div class="page">
    <div class="page-single">
        <div class="container">

            <div class="row">
                <div class="col mx-auto">
                    <div class="text-center mb-6">
                        <img src="assets/images/brand/logo.png" class="" alt="">
                    </div>

                    <form action="{{route('user-auth')}}" method="post">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @if(session()->has('failure'))
                                    <div class="alert alert-icon alert-danger" role="alert">
                                        <i class="fa fa-frown-o mr-2" aria-hidden="true"></i> Oh snap! {{session('failure')}}
                                    </div>
                                @endif
                                <div class="card-group mb-0">
                                    <div class="card p-4">
                                        <div class="card-body">
                                            <h1>Login</h1>
                                            <p class="text-muted">Sign In to your account</p>
                                            <div class="input-group mb-3">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}">

                                            </div>
                                            @error('username')
                                            <div class="text text-danger">{{$message}}</div>
                                            @enderror
                                            <div class="input-group mb-4">
                                                <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                                <input type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
                                            </div>
                                            @error('password')
                                            <div class="text text-danger">{{$message}}</div>
                                            @enderror
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-gradient-primary btn-block">Login</button>
                                                </div>
                                                <div class="col-12">
                                                    {{--<a href="forgot-password.html" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="card text-white bg-primary py-5 d-md-down-none login-transparent">--}}
                                    {{--<div class="card-body text-center justify-content-center ">--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Dashboard js -->
<script src="{{asset('public/admin/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
