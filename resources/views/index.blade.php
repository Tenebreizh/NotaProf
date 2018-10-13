@extends('base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                @include('appreciations')

                <br />

                <div class="row">
                    <div class="col-lg-10">
                        <label for="result">Appreciation: </label>
                        <input type="text" class="form-control" id="target" name="result">

                        <button class="btn btn-success tocopy" data-clipboard-target="#target">
                            <i class="fas fa-paste"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection