@extends('layouts.app')
@section('content')
<section class="container">
    <h1 class="text-center">Carica il tuo post</h1>
<form action="{{route('admin.posts.store')}}" method="POST">
    @csrf
    @include('includes.form')
</form>
</section>
@endsection