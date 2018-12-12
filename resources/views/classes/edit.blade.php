@foreach ($classes as $class)
    <div class="modal fade" id="edit{{ $class->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    <h4 class="modal-title"> {{ $class->name }} </h4>
                </div>
                <form action=" {{ route('classes.update', ['class' => $class->id]) }} " method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-body ">
                        <div class="form-group">
                            <label for="name">Nom: </label>
                            <input name="name" id="name" type="text" class="form-control" value="{{ $class->name }}" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
