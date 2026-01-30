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
        <input
            type="text"
            class="form-control @error('titulo') is-invalid @enderror"
            id="titulo"
            name="titulo"
            value="{{ old('titulo', $post->titulo) }}"
            required
        >

        @error('titulo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="contenido" class="form-label">Contenido:</label>
        <textarea
            class="form-control @error('contenido') is-invalid @enderror"
            id="contenido"
            name="contenido"
            rows="4"
            required
        >{{ old('contenido', $post->contenido) }}</textarea>

        @error('contenido')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-end gap-2">
        <button type="submit" class="btn btn-primary">Actualizar Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

        </div>
        <div class="col-2"></div>
    </div>
</div>




@endsection
