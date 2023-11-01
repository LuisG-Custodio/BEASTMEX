<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>@yield('titulo')</title>
</head>
<body>
    @yield('contenido')
    
    @include('partials.nav')

    <h1 class="display-1 text-center text-info mt-4">@yield('titulo')</h1>
    
</body>
@include('partials.footer')
</html>