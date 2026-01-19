@extends('plantilla')

@section('titulo', 'Creacio de posts')

@section('contenido')
    <h2>Creacion del fichero </h2>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido:</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Post</button>
    </form>

@endsection
