@extends('plantilla')

@section('titulo', 'Detalle del post')

@section('contenido')
<div class="container my-5">
    <div class="card rounded-4 border-0 shadow-sm">
      
        <div class="card-header d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4 border-0">
            <h2 class="mb-0">Detalle del Post</h2>
           
        </div>

      
        <div class="card-body px-4 py-4">
            {{-- Nombre del usuario --}}
            <div class="mb-3">
                <label for="usuario" class="form-label fw-bold">Usuario</label>
                <input type="text" class="form-control" id="usuario" 
                       value="{{ $post->usuario ? $post->usuario->name : 'No asignado' }}" 
                       disabled>
            </div>

            {{-- Rol del usuario --}}
            <div class="mb-3">
                <label for="rol" class="form-label fw-bold">Rol</label>
                <input type="text" class="form-control" id="rol" 
                       value="{{ $post->usuario && $post->usuario->rol ? $post->usuario->rol : 'Usuario' }}" 
                       disabled>
            </div>

            {{-- Título --}}
            <div class="mb-3">
                <label for="titulo" class="form-label fw-bold">Título</label>
                <input type="text" class="form-control" id="titulo" value="{{ $post->titulo }}" disabled>
            </div>

            {{-- Contenido --}}
            <div class="mb-3">
                <label for="contenido" class="form-label fw-bold">Contenido</label>
                <textarea class="form-control" id="contenido" rows="6" disabled>{{ $post->contenido }}</textarea>
            </div>

            {{-- Fecha --}}
            <div class="mb-3">
                <label for="fecha" class="form-label fw-bold">Creado el</label>
                <input type="text" class="form-control" id="fecha" value="{{ $post->created_at->format('d/m/Y H:i') }}" disabled>
            </div>
        </div>

        {{-- Footer con botón volver --}}
        <div class="card-footer bg-white d-flex justify-content-end px-4 py-3 border-0">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-lg">
                <i class="bi bi-arrow-left-circle me-2"></i> Volver al listado
            </a>
        </div>
    </div>
</div>
@endsection
