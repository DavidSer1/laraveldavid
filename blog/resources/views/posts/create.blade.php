@extends('plantilla')

@section('titulo', 'Creacio de posts')

@section('contenido')
    <h2 class="text-center">Creacion del fichero </h2>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
   <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control " value="{{ old('titulo') }}" id="titulo" name="titulo" required>
       @if ($errors->has('titulo'))
<div class="text-danger">
{{ $errors->first('titulo') }}
</div>
@endif
         
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido:</label>
            <textarea class="form-control @error('contenido') is-invalid @enderror" id="contenido" name="contenido" rows="6" required> {{ old('contenido') }}</textarea>
            @if ($errors->has('contenido'))
<div class="text-danger">
{{ $errors->first('contenido') }}
</div>
@endif


        </div>
        <div class="d-flex justify-content-end ">
  <button type="submit" class="btn btn-primary ">Crear Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary ">Cancelar</a>
        </div>

      
    </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
 

@endsection
