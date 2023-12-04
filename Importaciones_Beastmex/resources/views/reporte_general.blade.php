@extends('layouts.template')
@section('titulo','Reporte General')
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
                <form class="d-flex" role="search" method="get" action="/reporte_general/busqueda">
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
                <th scope="col">Compra/Venta</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal Compra</th>
                <th scope="col">Subtotal Venta</th>

            </tr>
        </thead>
        <tbody>
            @foreach($general_data as $g)
            <tr>
                <td>{{$g->Nombre}}</td>
                <td>{{$g->created_at}}</td>
                <td>{{number_format($g->Costo_compra, 2) }}</td>
                <td>{{$g->Cantidad}}</td>
                <td>
                    @if($g->Costo_compra <= 0)
                    {{number_format($g->Costo_compra*$g->Cantidad, 2) }}
                    @endif
                </td>
                <td>
                    @if($g->Costo_compra >= 0)
                    {{number_format($g->Costo_compra*$g->Cantidad, 2) }}
                    @endif    
                </td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th scope="col">Subtotales:</th>
                <td>{{number_format($total_compra,2) }}</td>
                <td>{{number_format($total_venta,2) }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th scope="col">Total:</th>
                <td colspan="2" class="text-center">{{number_format($total_compra + $total_venta,2) }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection