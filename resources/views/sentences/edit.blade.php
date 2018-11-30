@extends('base')

@section('name')
    Phrases
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @box(['color'=> 'primary'])
                @slot('title')
                    Mise à jour de: {{ $sentence->name }}
                @endslot
                @slot('content')
                    @include('appreciations')
    
                    <br />
    
                    <form action="{{ route('sentences.update', ['id' => $sentence->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <legend>Votre phrase</legend>
                        
                        <div class="form-group col-lg-2">
                            <label for="name"> Nom: </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Ecrire ici..." required value="{{ $sentence->name }}">
                        </div>
                        
                        <div class="form-group col-lg-11">
                            <label for="target"> Phrase: </label>
                            <input type="text" name="content" id="target" class="form-control" placeholder="Ecrire ici..." required value="{{ $sentence->content }}">
                        </div>
                        
                        <div class="form-group col-lg-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i>
                                Enregistrer
                            </button>
                        </div>
                    </form>
                @endslot
            @endbox
        </div>
    </div>
@endsection