@extends('base')

@section('name')
    Administrateurs
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Administrateurs</h3>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
                        <i class="fa fa-plus"></i> Ajouter un admin
                    </button>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped table-hover" id="admins">
                                <thead>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td> {{ $admin->name }} </td>
                                            <td> {{ $admin->email }} </td>
                                            <td class="text-center">
                                                <form action="{{ route('admins.destroy', ['id' => $admin->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    {{-- Go to edit page --}}
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $admin->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    {{-- Submit button for delete --}}
                                                    @if (!$loop->first)
                                                        <button class="btn btn-danger"> 
                                                            <i class="fa fa-trash-alt"></i>    
                                                        </button>
                                                    @endif
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

    @include('admins.create')
    @include('admins.edit')
@endsection

@section('script')
    <script>
        $('#admins').DataTable({
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