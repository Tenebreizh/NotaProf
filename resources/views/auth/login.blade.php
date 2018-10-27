@extends('layouts.login')

@section('content')
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

        <a href="{{ route('password.request') }}">J'ai oublié mon mot de passe</a><br>
        @if (!App\User::admin_exist())
            <a href=" {{ route('register') }} " class="text-center">S'enregistrer </a>
        @endif
@endsection
