@extends('layouts.template')

@section('titulo', 'Almacen')

@section('contenido')

<style>
body {
    background-color: #1977772c;
}


</style>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="search-form">
                <form class="d-flex" role="search">
                    <input class="form-control me-2 col-md-3" type="search" placeholder="Buscar Producto" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Producto</th>
                <th scope="col">Costo</th>
                <th scope="col">Precio de Venta</th>
                <th scope="col">Stock</th>
                <th scope="col">Fecha de ingreso</th>
                <th scope="col">Foto</th>
                <th scope="col">...</th>

            </tr>
        </thead>
        
    </table>
</div>
</body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-outline-success">Nuevo</button>
        </div>
    </div>
</div>
<br>
<br>
<br>

@endsection
