@extends('layouts.template')
@section('titulo','Reporte Ventas')
@section('contenido')

<style>
    body {
        background-color: #1977772c;
    }
    
    
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <select class="form-select" aria-label="Default select example">
                <option selected>Mes</option>
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-md-12">
            <div id="chart-container" class="mt-3">
                @include('partials.grafica')
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Producto</th>
                <th scope="col">Precio Venta/Compra</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Stock</th>
                <th scope="col">Total</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" class="text-center">1</th>
                <td>--</td>
                <td>--</td>
                <td>-</td>
                <td>--</td>
                <td>--</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection