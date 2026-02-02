@extends('plantilla')

@section('titulo', 'Login')

@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">

            <div class="card shadow-lg border-0 rounded-4 mt-5">
                <div class="card-body p-4">

                    <h3 class="text-center fw-bold mb-4">
                         Iniciar sesión
                    </h3>

                    @if(session('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                     
                        <div class="mb-3">
                            <label for="login" class="form-label fw-semibold">
                                Nombre de usuario
                            </label>
                            <input type="text"
                                   class="form-control form-control-lg"
                                   name="login"
                                   id="login"
                                   placeholder="Introduce tu nombre"
                                   required>
                        </div>

                  
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                Contraseña
                            </label>
                            <input type="password"
                                   class="form-control form-control-lg"
                                   name="password"
                                   id="password"
                                   placeholder="Introduce tu contraseña"
                                   required>
                        </div>

                   
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-dark btn-lg">
                                Entrar
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
