<div class="row">
    @foreach ($categories as $category)
        <div class="col-lg-3">
            <h3> {{ $category->name }} </h3>
            <select name="{{ strtolower($category->name) }}" id="{{ strtolower($category->name) }}" multiple class="form-control">
                @foreach ($category->appreciations as $appreciation)
                    <option value="{{ $appreciation->content }}"> ({{ $appreciation->level }})  {{ $appreciation->content }} </option>
                @endforeach
            </select>
        </div>
    @endforeach
</div>