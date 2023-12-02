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
                                 <!-- Botón con Modal -->
                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#editar">
                                    Editar
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                 <!-- Botón con Modal -->
                                <!-- Botón con Modal -->
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#borrar">
                                    Borrar
                                </button>
                            </td>
                        </tr>
                    </table>
                </td>
                <tr>
                    
            @foreach ($allclientes as $item)
                
                <td scope="col">{{$item->cliente}}</th>
                <td scope="col">{{$item->rfc}}</th>
                <td scope="col">{{$item->telefono}}</th>
                <td scope="col">{{$item->correo}}</th>
                <td scope="col">{{$item->direccion}}</th>
                <td scope="col">{{$item->notas}}</th>
                <td scope="col"><!-- Botón con Modal -->
                    <a href="{{route('f_orden_venta')}}"><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#nuevaOrden">
                        Nueva Orden
                    </button></th></a>
                @include('partials.modal')
            @endforeach 
        
            
        </thead>
        
    </table>
</div>
</body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Botón con Modal -->
            <a href="{{route('f_cliente')}}"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#nuevoCliente">
                Nuevo
            </button></a>
        </div>
    </div>
</div>
<br>
<br>
<br>
  


@endsection