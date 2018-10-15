<div class="row">
    <div class="col-lg-3">
        <h3> Vos phrases personnalisées </h3>
        <select name="sentences" id="sentences" multiple class="form-control" size="10">
            @if (count($sentences) == 0)
                <option disabled>Vous n'avez aucune phrases personnalisées</option>
            @else
                @foreach ($sentences as $sentence)
                    <option value="{{ $sentence->content }}"> {{ $sentence->name }} </option>
                @endforeach
            @endif
        </select>
    </div>
</div>