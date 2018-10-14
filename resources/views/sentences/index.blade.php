@extends('base')

@section('name')
    Phrases
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Créer votre phrase personnalisé</h3>
                </div>
                <div class="box-body">
                    @include('appreciations')
    
                    <br />
    
                    <form action="{{ route('sentences.store') }}" method="POST">
                        @csrf
                        <legend>Créez votre phrase</legend>
                        
                        <div class="form-group col-lg-2">
                            <label for="name"> Nom: </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Ecrire ici...">
                        </div>
                        
                        <div class="form-group col-lg-11">
                            <label for="target"> Phrase: </label>
                            <input type="text" name="content" id="target" class="form-control" placeholder="Ecrire ici...">
                        </div>
                        
                        <div class="form-group col-lg-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i>
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection