<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#009688">

    <title>Login | Badak LNG</title>

    <!-- Favicon-->
    <link rel="icon" sizes="192x192" href="{{url('/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Waves Effect Css -->
    <link href="{{url('assets/bower_components/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('assets/bower_components/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('assets/dist/css/style.css')}}" rel="stylesheet">
</head>

<style type="text/css">
    .login-page {
        background-color: #015687;
        padding-left: 0;
        max-width: 360px;
        margin: 5% auto;
        overflow-x: hidden;
    }

    .btn-submit {
        background-color: #015687;
        color:  #FFFFFF;
    }
</style>

<body class="login-page">

    <div class="login-box">

        <div class="card">
            <div class="body">

				@yield('content')

            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{url('assets/bower_components/jQuery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url('assets/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url('assets/bower_components/node-waves/waves.js')}}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{url('assets/bower_components/jquery-validation/jquery.validate.js')}}"></script>

    <!-- Custom Js -->
    <script src="assets/dist/js/admin.js"></script>
    <script src="assets/dist/js/sign-in.js"></script>
</body>

</html>
