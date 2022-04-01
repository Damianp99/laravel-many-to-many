@extends('layouts.app')
@section('content')
<div class="card container">
    <h1>{{$post->title}}</h1>
    <p>{{$post->description}}</p>
    @forelse ($post->tags as $tag)
        <p class="bagde rounded py-1 px-2 mx-2 text-center"
        style="background-color: {{ $tag->color }}">{{ $tag->label }}</p>
    @empty <p>Nessun tag</p>
    @endforelse
    <img src="{{$post->image}}" alt="no-image">
    <div class="d-flex align-items-center justify-content-between py-2">
        <span>{{$post->created_at}}</span>
        <a href="{{route('admin.posts.index')}}" class="btn btn-sm btn-info"><i class="fa-solid fa-circle-chevron-left"></i></a>
    </div>
   
</div>
@endsection