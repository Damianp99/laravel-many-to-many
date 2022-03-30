@extends('layouts.app')
@section('content')
<section class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>LISTA DEI POST</h1>
        <a href="{{route('admin.posts.create')}}" class="btn  btn-primary">Crea un Post</a>
    </div>
   
    <ul class="list-unstyled">
        
        @foreach ($posts as $post)
        <li class="my-3 ">
            <div class="card p-3">
                <h3>{{$post->title}}</h3>
                <p>{{$post->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge badge-pill badge-{{$post->category->color}}">
                        {{$post->category->label}}
                    </span>
                     <div class="d-flex">
                        <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-sm btn-success"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-sm btn-warning mx-3"><i class="fa-solid fa-pencil"></i></a>
                        <form action="{{route('admin.posts.destroy',$post->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>          
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</section>
@endsection