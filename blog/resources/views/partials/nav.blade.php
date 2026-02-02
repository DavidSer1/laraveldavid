<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand text-white" href="{{ route('inicio') }}">
        Mi Proyecto
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav align-items-center w-100">


        <li class="nav-item">
          <a class="fw-bold nav-link text-white" href="{{ route('posts.index') }}">
            Listado de posts
          </a>
        </li>

        @auth
        <li class="nav-item">
          <a class="fw-bold nav-link text-white" href="{{ route('posts.create') }}">
            Creación de posts
          </a>
        </li>
        @endauth

        @if (isset($id))
        <li class="nav-item">
          <a class="fw-bold nav-link text-white" href="{{ route('posts.edit', $id) }}">
            Edición de posts
          </a>
        </li>
        @endif

    
        <li class="nav-item ms-auto d-flex align-items-center">

         
          @auth
          <span class="fw-bold text-white me-3">
            {{ auth()->user()->name }}
          </span>
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-outline-light btn-sm">
                  Cerrar sesión
              </button>
          </form>
          @endauth

        
          @guest
          <a class="fw-bold nav-link text-white" href="{{ route('login') }}">
              Login
          </a>
          @endguest

        </li>

      </ul>

    </div>
  </div>
</nav>



<div class="container mt-4">
    @yield('content')
    <div class="d-flex justify-content-end">
   <small class="text-muted">
        {{ fechaActual('d/m/Y') }}
    </small>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
