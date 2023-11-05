@extends('layouts.template')
@section('titulo','Clientes')
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
                    <input class="form-control me-2 col-md-3" type="search" placeholder="Buscar Proveedor" aria-label="Search">
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
                <th scope="col">Cliente</th>
                <th scope="col">RFC</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Notas</th>
                <th scope="col">...</th>

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
                <td scope="col">Cliente1</th>
                <td scope="col">XAXX010101000</th>
                <td scope="col">4425698756</th>
                <td scope="col">cliente@email.com</th>
                <td scope="col">Calle #X Col. Colonia C.P. 00000 Estado, País</th>
                <td scope="col">Notas</th>
                <td scope="col"><a href="{{route('f_orden_venta')}}"><button class="btn btn-outline-primary">Nueva Orden</button></th></a>

            </tr>
        </thead>
        
    </table>
</div>
</body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('f_cliente')}}"><button type="button" class="btn btn-outline-success">Nuevo</button></a>
        </div>
    </div>
</div>
<br>
<br>
<br>
  


@endsection