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
                <th scope="col">No. de Serie</th>
                <th scope="col">Costo</th>
                <th scope="col">Precio de Venta</th>
                <th scope="col">Stock</th>
                <th scope="col">Fecha de ingreso</th>
                <th scope="col">Foto</th>
            </tr>
            <tr>
                <td scope="col">
                    <table>
                        <tr>
                            <td>
                                <button class="btn btn-outline-info btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                
                            </td>
                        </tr>
                    </table>
                </td>
                <td scope="col">Producto1</td>
                <td scope="col">XXX-XXX-0000</td>
                <td scope="col">100</td>
                <td scope="col">170</td>
                <td scope="col">100</td>
                <td scope="col">01/01/2023</td>
                <td scope="col"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png" class="img-thumbnail rounded float-start" style="max-height: 50px;"></td>
            </tr>
        </thead>
        
    </table>
</div>
</body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('f_producto')}}"><button type="button" class="btn btn-outline-success">Nuevo</button></a>
        </div>
    </div>
</div>
<br>
<br>
<br>

@endsection
