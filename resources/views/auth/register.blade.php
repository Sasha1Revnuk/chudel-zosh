<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>Реєстрація</title>

    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('/admin/img/favicon.ico')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{asset('/admin/css/bootstrap.css')}}">

    <!-- Related styles of various javascript plugins -->
    <link rel="stylesheet" href="{{asset('/admin/css/plugins.css')}}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{asset('/admin/css/main.css')}}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="{{asset('/admin/js/vendor/modernizr-respond.min.js')}}"></script>
</head>
<body class="login">

<!-- Login Container -->
<div id="login-container">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> {{$error}}
            </div>
        @endforeach
    @endif
    <div id="login-logo" style="margin-bottom: 20px">
        <a href="{{route('main')}}" style="text-decoration: none"><h2 style="color:#002347"><strong>Чудельська ЗОШ І-ІІІ ступенів</strong></h2></a>
    </div>
         <form method="POST" action="{{ route('register') }}">
            {{csrf_field()}}
            <div class="form-group">
                <div class="col-md-4 col-xs-12">
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Електронна пошта" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="input-group">
                        <input type="text" id="name" name="name" placeholder="Ім'я" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="input-group">
                        <input type="text" id="surname" name="surname" placeholder="Прізвище" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Пароль" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <input type="password" id="confirm-password" name="password_confirmation" placeholder="Підтвердження пароля" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                    </div>
                </div>
            </div>

            <div class="clearfix">
                <div class="btn-group btn-group-sm pull-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-arrow-right"></i>Реєстрація</button>
                </div>
            </div>
        </form>
</div>
<!-- END Login Container -->

<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

<!-- Bootstrap.js -->
<script src="{{asset('/admin/js/vendor/bootstrap.min.js')}}"></script>

<!-- Jquery plugins and custom javascript code -->
<script src="{{asset('/admin/js/plugins.js')}}"></script>
<script src="{{asset('/admin/js/main.js')}}"></script>
</body>
</html>