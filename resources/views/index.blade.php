@extends('base')

@section('name')
    Home
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Notaprof</h3>
                </div>

                <div class="box-body">
                    @include('appreciations')

                    <hr />

                    @include('sentences')
    
                    <br />
    
                    <div class="row">
                        <div class="col-lg-10">
                            <input type="text" class="form-control mx-2" id="target" name="result" placeholder="Vos choix apparaîtront ici...">
                        </div>
                        <div class="col-lg-2">
                            <label for=""></label>
                            <button class="btn btn-success tocopy" data-clipboard-target="#target" title="Copier">
                                <i class="fas fa-paste"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection