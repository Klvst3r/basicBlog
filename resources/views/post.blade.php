@extends('template')

@section('content')

    <title>{{ $post->title }}</title>

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>

    <a href="{{ url('blog') }}">Volver al listado</a>

    
@endsection
