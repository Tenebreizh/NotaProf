@extends('layouts.login')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <p class="login-box-msg">Mot de passe oublié</p>

    <form action="{{ route('password.email') }}" method="POST">
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