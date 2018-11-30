@extends('base')

@section('name')
    Administration
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @box(['color'=> 'primary', 'title' => 'Gestion des appreciations'])
                @slot('content')
                    Body
                @endslot
            @endbox
        </div>
    </div>
@endsection