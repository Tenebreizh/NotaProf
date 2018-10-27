@extends('layouts.login')

@section('content')
    <p class="login-box-msg">Nouveau mot de passe</p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        {{-- Email --}}
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email" class="form-group">Email:</label>
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
            <label for="password" class="form-group">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span> 
            @endif
        </div>

        {{-- Confirm Password --}}
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password-confirm" class="form-group">Confirmer le mot de passe:</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Mot de passe" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        {{-- Reset button --}}
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary btn-flat">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
@endsection
