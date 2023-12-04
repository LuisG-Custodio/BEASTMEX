@extends('layouts.template')
@section('titulo','Tickets de Compra')
@section('contenido')

<style>
    body {
        background-color: #1977772c;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-8">
            <nav class="navbar">
                <div class="container">
                    <div class="search-form">
                        <form class="d-flex" role="search" method="get" action="/proveedores/tickets/busqueda">
                            <input class="form-control me-2 col-md-3" type="text" name="_nombre" placeholder="Buscar Empleado" aria-label="Search">
                            <div class="input-group col-md-3">
                                <input class="form-control" type="month" name="_fecha" placeholder="Fecha" aria-label="Fecha">
                            </div>
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Proveedor</th>
                <th scope="col">Solicitante</th>
                <th scope="col">Fecha</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $t)
            <tr>
                <td scope="col">{{$t->NombreP}} {{$t->APP}} {{$t->AMP}}</td>
                <td scope="col">{{$t->Nombre}} {{$t->AP}} {{$t->AM}}</td>
                <td scope="col">{{$t->created_at}}</td>    
                <td scope="col">
                    <a href="/proveedores/ticket/{{$t->id_ticketcompra}}/view">
                        <button class="btn btn-outline-info btn-sm">Ver ticket</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/proveedores"><button type="button" class="btn btn-outline-danger mt-3">Salir</button></a>
</div>
@endsection
