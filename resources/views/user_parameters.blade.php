@extends('base')

@section('name')
    {{ $user->name }} | Paramètres
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Paramètres</h3>
                </div>

                <div class="box-body">    
                    <div class="row">
                        <form action="{{ route('parameters.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')

                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                                    @if (!Auth::user()->avatar)
                                        <img src="{{ asset('img/default-avatar.png') }}" class="img-thumbnail">
                                    @else
                                        <img src="{{ asset(Auth::user()->avatar) }}" class="img-thumbnail">
                                    @endif
                                    
                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                    @if ($errors->has('avatar'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8">                            
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Nom:</label>
                                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" value=" {{ $user->email }} " disabled>
                                </div>
                                
                                {{--  
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="name">Mot de passe:</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                --}}
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"> Enregistrer </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection