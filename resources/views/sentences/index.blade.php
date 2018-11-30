@extends('base')

@section('name')
    Phrases
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @box(['color'=> 'primary', 'title' => 'Gestion des appreciations'])
                @slot('title')
                    Vos phrases personnalisées
                    <a href=" {{ route('sentences.create') }} " class="btn btn-success">
                            <i class="fa fa-plus"></i> Créer une phrase
                        </a>
                @endslot
                @slot('content')
                    <div class="col-lg-12">
                        <table class="table table-striped table-hover" id="sentences">
                            <thead>
                                <th>Nom</th>
                                <th>Phrase</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($sentences as $sentence)
                                    <tr>
                                        <td> {{ $sentence->name }} </td>
                                        <td> {{ $sentence->content }} </td>
                                        <td class="text-center">
                                            <form action="{{ route('sentences.destroy', ['id' => $sentence->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                {{-- Go to edit page --}}
                                                <a href=" {{ route('sentences.edit', ['id' => $sentence->id]) }} " class="btn btn-success">
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
                @endslot
            @endbox
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#sentences').DataTable({
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