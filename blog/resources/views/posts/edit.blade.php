@extends('plantilla')

@section('titulo', 'Edicion del fichero post')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-2"></div>

        <div class="col-8">
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
           <div class="d-flex justify-content-end gap-2">
        <button type="submit" class="btn btn-primary">Actualizar Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary ">Cancelar</a>
        </div>
    </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>




@endsection
