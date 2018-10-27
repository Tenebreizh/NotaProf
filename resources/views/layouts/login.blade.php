<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ config('app.name') }} </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href=" {{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('bower_components/font-awesome/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('bower_components/Ionicons/css/ionicons.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('dist/css/AdminLTE.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/iCheck/square/blue.css') }} ">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo text-center">
            <a href=" {{ route('home') }}">
                <img src=" {{ asset('img/notaprof.png') }} " width="50" height="50" alt="" /> 
                {{ config('app.name') }} 
            </a>
        </div>
        <div class="login-box-body">
            @yield('content')
        </div>
    </div>

    <script src=" {{ asset('bower_components/jquery/dist/jquery.min.js') }} "></script>
    <script src=" {{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('plugins/iCheck/icheck.min.js') }} "></script>
    <script>
        $(function () {
            $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>