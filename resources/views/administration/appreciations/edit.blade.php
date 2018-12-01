@foreach ($appreciations as $appreciation)
    <div class="modal fade" id="appreciation{{ $appreciation->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    <h4 class="modal-title"></h4>
                </div>
                <form action=" {{ route('appreciations.update', ['appreciation' => $appreciation]) }} " method="POST">
                    <input type="hidden" name="category" value="{{ $appreciation->category->id }}">
                    <input type="hidden" name="level" value="{{ $appreciation->level }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-body ">
                        <div class="form-group">
                            <label for="content">Contenu: </label>
                            <input name="content" id="content" type="text" class="form-control" value="{{ $appreciation->content }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Categorie: </label>
                            <select name="category" id="category" class="form-control">
                                <option selected disabled>{{ $appreciation->category->name }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
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
