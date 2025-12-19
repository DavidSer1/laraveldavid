@extends('plantilla')

@section('titulo', 'Listado de Posts')

@section('contenido') 

<div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Posts</h2>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Título</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->titulo }}</td>
                            <td class="text-center">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary  px-2">
                                    Ver
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button>Borrar</button>
                                </form>
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
