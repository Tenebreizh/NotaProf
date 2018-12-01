@extends('base')

@section('name')
    Administration
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @box(['color'=> 'primary'])
                @slot('title')
                    Gestion des appréciations
                    <a href=" {{ route('appreciations.reset') }} " class="btn btn-danger">
                        <i class="fas fa-redo-alt"></i>
                        Reset appréciations
                    </a>
                @endslot
                @slot('content')
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped table-hover" id="appreciations">
                                <thead>
                                    <th>Category</th>
                                    <th>Appreciation</th>
                                    <th>Level</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($appreciations as $appreciation)
                                        <tr>
                                            <td> {{ $appreciation->category->name }} </td>
                                            <td> {{ $appreciation->content }} </td>
                                            <td> {{ $appreciation->level }} </td>
                                            <td class="text-center">
                                                <form action="{{ route('appreciations.destroy', ['appreciation' => $appreciation]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    {{-- Go to edit page --}}
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#appreciation{{ $appreciation->id }}">
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

    @include('administration.appreciations.edit')

@endsection

@section('script')
<script>
    $('#appreciations').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        'columnDefs': [ { "orderable": false, "targets": -1 } ]
        });
</script>
@endsection