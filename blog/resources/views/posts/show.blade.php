@extends('plantilla')

@section('titulo', 'Detalle del post')

@section('contenido')

    <h2>{{ $post->titulo }}</h2>

    <p>{{ $post->contenido }}</p>

    <p><strong>Creado el:</strong> {{ $post->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('posts.index') }}">
        <button>Volver al listado</button>
    </a>

@endsection
