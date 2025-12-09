<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo')</title>
</head>
<body>

  
    @include('partials.nav')

    <header>
        <h1>@yield('titulo')</h1>
        <hr>
    </header>

    <main>
        @yield('contenido')
    </main>

</body>
</html>
