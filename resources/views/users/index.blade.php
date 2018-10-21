@extends('base')

@section('name')
    Utilisateurs
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Utilisateurs</h3>
                    {{-- <a href=" {{ route('sentences.create') }} " class="btn btn-success">
                        <i class="fa fa-plus"></i> Ajouter un utilisateur
                    </a> --}}

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
                        <i class="fa fa-plus"></i> Ajouter un utilisateur
                    </button>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped table-hover" id="users">
                                <thead>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td> {{ $user->name }} </td>
                                            <td> {{ $user->email }} </td>
                                            <td class="text-center">
                                                <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    {{-- Go to edit page --}}
                                                    <a href=" {{ route('users.edit', ['id' => $user->id]) }} " class="btn btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

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
                </div>
            </div>
        </div>
    </div>

    @include('users.create')
@endsection

@section('script')
    <script>
        $('#users').DataTable({
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