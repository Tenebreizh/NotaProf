@foreach ($admins as $admin)
    <div class="modal fade" id="edit{{ $admin->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    <h4 class="modal-title"> {{ $admin->name }} </h4>
                </div>
                <form action=" {{ route('admins.update', ['id' => $admin->id]) }} " method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-body ">
                        <div class="form-group">
                            <label for="name">Nom: </label>
                            <input name="name" id="name" type="text" class="form-control" value="{{ $admin->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Email: </label>
                            <input name="email" id="email" type="email" class="form-control" placeholder="teacher@school.com" value="{{ $admin->email }}" disabled>
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
