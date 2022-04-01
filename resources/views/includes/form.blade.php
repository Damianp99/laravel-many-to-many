<div class="row">
<div class="form-group col-10">
    <label for="title">Titolo</label>
    <input type="title" class="form-control" id="title" name="title" placeholder="Titolo" value="{{$post->title}}" >
</div>
<div class="form-group col-2">
    <label for="category">Categoria</label>
    <select class="form-control" id="category" name="category_id">
        @forelse ($categories as $category)
            <option value="{{ $category->id }}">
                {{$category->label}}
            </option>
        @empty
            <option value="">Nessuna Categoria</option>
        @endforelse
    </select>
</div>
<div class="form-group col-12">
    <label for="image">Immagine</label>
    <input type="url" class="form-control" id="image" name="image" placeholder="Immagine" value="{{$post->image}}">
</div>
<div class="form-group col-12">
    <label for="description">Descrizione </label>
    <textarea class="form-control" id="description" name="description" rows="3">{{$post->description}}</textarea>
</div>

{{-- check box and button --}}
<div class="col-12 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center justify-content-center">
        @foreach ($tags as $tag)
        <div class="form-check mx-3">
            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
             id="tag-{{ $tag->id }}" name="tags[]" @if (in_array($tag->id, old('tags', $post_tag_ids ?? []))) checked @endif>
            <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->label }}</label>
        </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-sm btn-success">Pubblica</button>
</div>
</div>