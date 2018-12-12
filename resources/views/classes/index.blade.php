@extends('base')

@section('name')
    Classes
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @box(['color'=> 'primary'])
                @slot('title')
                    Classes
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
                        <i class="fa fa-plus"></i> Ajouter une classe
                    </button>
                @endslot
                @slot('content')
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped table-hover" id="classes">
                                <thead>
                                    <th>Nom</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $classe)
                                        <tr>
                                            <td> {{ $classe->name }} </td>
                                            <td class="text-center">
                                                <form action="{{-- {{ route('users.destroy', ['id' => $user->id]) }} --}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    {{-- Go to edit page --}}
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $classe->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    {{-- Submit button for delete --}}
                                                    <button class="btn btn-danger"> 
                                                        <i class="fa fa-trash-alt"></i>    
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endslot
            @endbox
        </div>
    </div>
@endsection

@include('classes.create')

@section('script')
    <script>
        $('#classes').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : true,
            "columnDefs": [ { "orderable": false, "targets": -1 } ]
            })
    </script>
@endsection