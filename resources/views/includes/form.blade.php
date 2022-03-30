<div class="row">
<div class="form-group col-10">
    <label for="title">Titolo</label>
    <input type="title" class="form-control" id="title" name="title" placeholder="Titolo" value="{{$post->title}}" >
</div>
<div class="form-group col-2">
    <label for="category">Categoria</label>
    <select class="form-control" id="category" name="category_id">
      <option>Nessuna Categoria</option>
      @foreach ($categories as $category)
      <option value="{{ $category->id }}">
        {{$category->label}}
      </option>
      @endforeach
    </select>
</div>
<div class="form-group col-12">
    <label for="image">Immagine</label>
    <input type="url" class="form-control" id="image" name="image" placeholder="Immagine" value="{{$post->image}}">
</div>
<div class="form-group col-12">
    <label for="description">Example textarea</label>
    <textarea class="form-control" id="description" name="description" rows="3">{{$post->description}}</textarea>
</div>
<div class="col-12 d-flex justify-content-end align-items-center">
    <button type="submit" class="btn btn-sm btn-success">Pubblica</button>
</div>
</div>