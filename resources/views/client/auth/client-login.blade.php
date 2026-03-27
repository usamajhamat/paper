<!doctype html>

@php $sys=\App\Models\Admin\System::info(); @endphp

<html>

<head>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>One Click Test Solution</title>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>

    <link href='' rel='stylesheet'>

    <style>@import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);



        body {

            background: #f5f5f5;

        }



        @media only screen and (max-width: 767px) {

            .hide-on-mobile {

                display: none;

            }

        }



        .login-box {

            background: url(https://i.imgur.com/73BxBuI.png);

            background-size:cover;

            background-position: center;

            padding: 50px;

            min-height: 700px;

            -webkit-box-shadow: 0 2px 60px -5px rgba(0, 0, 0, 0.1);

            box-shadow: 0 2px 60px -5px rgba(0, 0, 0, 0.1);

        }



        .logo {

            font-family: "Script MT";

            font-size: 54px;

            /*text-align: center;*/

            color: #888888;

            margin-bottom: 50px;

        }



        .logo .logo-font {

            color: #3BC3FF;

        }



        @media only screen and (max-width: 767px) {

            .logo {

                font-size: 34px;

            }

        }



        .header-title {

            text-align: center;

            margin-bottom: 50px;

        }



        .login-form {

            max-width: 100%;

            margin: 0 auto;

        }



        .login-form .form-control {

            border-radius: 0;

            margin-bottom: 30px;

        }



        .login-form .form-group {

            position: relative;

        }



        .login-form .form-group .forgot-password {

            position: absolute;

            top: 6px;

            right: 15px;

        }



        .login-form .btn {

            border-radius: 0;

            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

            margin-bottom: 30px;

        }



        .login-form .btn.btn-primary {

            background: #3BC3FF;

            border-color: #31c0ff;

        }



        .slider-feature-card {

            background: #fff;

            max-width: 100%;

            margin: 0 auto;

            padding: 30px;

            text-align: center;

            -webkit-box-shadow: 0 2px 25px -3px rgba(0, 0, 0, 0.1);

            box-shadow: 0 2px 25px -3px rgba(0, 0, 0, 0.1);

        }



        .slider-feature-card img {

            height: 80px;

            margin-top: 30px;

            margin-bottom: 30px;

        }



        .slider-feature-card h3,

        .slider-feature-card p {

            margin-bottom: 30px;

        }



        .carousel-indicators {

            bottom: -50px;

        }



        .carousel-indicators li {

            cursor: pointer;

        }</style>

    <script type='text/javascript' src=''></script>

    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>

    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>

</head>

<body class='snippet-body'>

<section class="body">

    <div class="container" style="width: 100%;">

        <div class="login-box">

            <div class="row">

                <div class="col-sm-9">

                    <img src="{{url('images').'/'.$sys->logo}}" alt="" width="50">

                    <div class="logo">

                        <span class="logo-font"> {{$sys->title}}</span>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-sm-6">

                    <br>

                    <h3 class="header-title">LOGIN HERE</h3>

                    @if(session()->has('msg'))

                        <div class="text-danger">{{session('msg')}}</div>

                    @endif

                    <!-- @if(session()->has('Expiredmsg'))
                    <div class="text-danger">{{session('Expiredmsg')}}</div>
                    @endif -->



                    @if (Session::get('Expiredmsg'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> {{ Session::get('Expiredmsg') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif






                    

                    <form action="{{route('client-auth')}}" method="post" class="login-form">

                        @csrf

                        <div class="form-group">

                            <input type="text" name="username" class="form-control" placeholder="Email or UserName">

                        </div>

                        <div class="form-group">

                            <input type="Password" name="password" class="form-control" placeholder="Password">

                            {{--<a href="#!" class="forgot-password">Forgot Password?</a>--}}

                        </div>

                        <div class="form-group">

                            <button class="btn btn-primary btn-block">LOGIN</button>

                        </div>

                        {{--<div class="form-group">--}}

                            {{--<div class="text-center">New Member? <a href="#!">Sign up Now</a></div>--}}

                        {{--</div>--}}

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<script type='text/javascript'></script>

</body>

</html>