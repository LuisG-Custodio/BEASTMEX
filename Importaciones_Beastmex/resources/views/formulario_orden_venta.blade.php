@extends('layouts.template')
@section('titulo','Nueva Venta')
@section('contenido')

<style>
    body {
        background-color: #1977772c;
    }
</style>
<div class="container mt-5">
    <form action="/guardar_orden_venta" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputCliente" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="inputCliente" name="_Cliente" value="Cliente1" >
                @if($errors->first('_Cliente'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Cliente') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputFechaEntrega" class="form-label">Fecha de Entrega Deseada</label>
                <input type="date" class="form-control" id="inputFechaEntrega" name="_FechaEntrega" value="{{ old('_FechaEntrega') }}">
                @if($errors->first('_FechaEntrega'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_FechaEntrega') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputProducto" class="form-label">Producto a Comprar</label>
                <input type="text" class="form-control" id="inputProducto" name="_Producto" value="{{ old('_Producto') }}">
                @if($errors->first('_Producto'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Producto') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputCantidad" class="form-label">Cantidad a Comprar</label>
                <input type="number" class="form-control" id="inputCantidad" name="_Cantidad" value="{{ old('_Cantidad') }}">
                @if($errors->first('_Cantidad'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Cantidad') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-12">
                <label for="inputNotas" class="form-label">Notas Adicionales</label>
                <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas">{{ old('_Notas') }}</textarea>
                @if($errors->first('_Notas'))
                    <div class "alert alert-danger" role="alert">
                        {{ $errors->first('_Notas') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row row-cols-auto">
            <div class="col">
                <button type="submit" class="btn btn-outline-success mt-3">Registrar</button>
            </div>
            <div class="col">
                <a href="/clientes"><button type="button" class="btn btn-outline-danger mt-3">Cancelar</button></a>
            </div>
        </div>
    </form>
</div>

@endsection
