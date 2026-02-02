@extends('plantilla')

@section('titulo', 'Listado de Posts')

@section('contenido') 

<div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Posts</h2>
    @auth
    <div class="d-flex justify-content-end mb-3">
    <a href="{{ url('/posts/create') }}" class="btn btn-success">
         Crear post
    </a>
</div>
   @endauth

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Título</th>
                             <th>Contenido</th>
                               <th>Usuario</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->titulo }}</td>
                            <td>{{ $post->contenido }}</td>
                             <td>{{ $post->usuario ? $post->usuario->name : 'No asignado' }}</td>
                          
          <td class="text-center">
    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm me-1">
        Ver
    </a>

    @auth
        @if(auth()->id() === $post->usuario_id)
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm me-1">
                Editar
            </a>

            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('¿Seguro que quieres borrar este post?')">
                    Borrar
                </button>
            </form>
        @endif
    @endauth
</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
