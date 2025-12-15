@extends('plantilla')

@section('titulo', 'Este es el título de posts')

@section('contenido')

    <h2>Listado de posts</h2>

    @foreach($posts as $post)
        <div style="margin-bottom: 15px;">
            <h3>{{ $post->titulo }}</h3>
            <a href="{{ route('posts.show', $post->id) }}">
                <button>Ver</button>
            </a>
        </div>
    @endforeach

    {{ $posts->links() }}

@endsection
