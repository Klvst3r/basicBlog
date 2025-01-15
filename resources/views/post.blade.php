@extends('template')

@section('content')

    <title>{{ $post['title'] }}</title>

    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>
    <a href="{{ url('blog') }}">Volver al listado</a>

    
@endsection
