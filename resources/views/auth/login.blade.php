<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ env('APP_NAME') }} </title>
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
                {{ env('APP_NAME') }} 
            </a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Connectez-vous</p>

            <form action=" {{ route('login') }} " method="POST">
                @csrf

                {{-- Email --}}
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> 
                    @endif
                </div>

                {{-- Password --}}
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span> 
                    @endif
                </div>

                {{-- Remember me & Connection --}}
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
                    </div>
                </div>

            </form>

            {{-- <a href="{{ route('password.request') }}"> J'ai oublié mon mot de passe</a><br> --}}
            @if (!App\User::admin_exist())
                <a href=" {{ route('register') }} " class="text-center"> S'enregistrer </a>
            @endif

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