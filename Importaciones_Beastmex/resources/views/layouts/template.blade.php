<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    @vite(['resources/js/app.js'])
    <title>@yield('titulo')</title>
</head>
<body>
    
    @include('partials.alerta')
    @include('partials.nav')

    <h1 class="display-1 text-center text-info mt-4">@yield('titulo')</h1>
    @yield('contenido')
</body>
@include('partials.footer')
</html>