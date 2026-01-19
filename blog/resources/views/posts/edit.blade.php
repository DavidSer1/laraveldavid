@extends('plantilla')

@section('titulo', 'Edicion del fichero post')

@section('contenido')

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $post->titulo }}" required>
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido:</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="4" required>{{ $post->contenido }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Post</button>
    </form>


@endsection
