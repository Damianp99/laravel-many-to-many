@extends('layouts.app')
@section('content')
<section class="container">
    <h1 class="text-center">Modifica il tuo post</h1>
<form action="{{route('admin.posts.update',$post->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('includes.form')
</form>
</section>
@endsection