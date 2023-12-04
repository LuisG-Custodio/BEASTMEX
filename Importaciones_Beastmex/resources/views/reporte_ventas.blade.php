@extends('layouts.template')
@section('titulo','Reporte Ventas')
@section('contenido')

<style>
    body {
        background-color: #1977772c;
    }
    
    
</style>
<div class="container mt-5">
    <nav class="navbar">
        <div class="container">
            <div class="search-form">
                <form class="d-flex" role="search" method="get" action="/ventas/busqueda">
                    <div class="input-group col-md-3">
                        <input class="form-control" type="month" name="_fecha" placeholder="Fecha" aria-label="Fecha">
                    </div>
                    <button class="btn btn-outline-success ms-3" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
        {{-- <div class="col-md-12">
            <div id="chart-container" class="mt-3">
                @include('partials.grafica')
            </div>
        </div> --}}
    </div>
</div>
<div class="container mt-5">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Precio Compra</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>

            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $v)
            <tr>
                <td>{{$v->Nombre}}</td>
                <td>{{$v->created_at}}</td>
                <td>{{number_format($v->Costo_compra * 1.55, 2) }}</td>
                <td>{{$v->Cantidad}}</td>
                <td>{{number_format($v->Costo_compra *1.55* $v->Cantidad, 2) }}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th scope="col">Total:</th>
                <td>{{number_format($total,2) }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection