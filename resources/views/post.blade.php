@extends('template')

@section('content')
<div class="max-w-3xl mx-auto">



    {{-- <title>{{ $post->title }}</title> --}}

    <h1 class="text-5-xl mb-8">{{ $post->title }}</h1>
    <p class="leading-loose text-lg text-gray-700">{{ $post->body }}</p>

    {{-- <a href="{{ url('blog') }}">Volver al listado</a> --}}
</div>
    
@endsection
