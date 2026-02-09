@extends('plantilla')



@section('contenido') 

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
   <h2 class="text-center mb-4">Listado de Posts</h2>
        </div>
    </div>
 
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
        <div class="col-1"></div>
                <div class="col-md-10">
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

    @if(auth()->id() === $post->usuario_id || auth()->user()->rol === 'admin')
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm me-1">
            Editar
        </a>
    @endif


    @if(auth()->user()->rol === 'admin')
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

            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-1"></div>

    </div>
</div>

@endsection
