@extends('layouts.template')
@section('titulo','Nuevo Producto')
@section('contenido')

<style>
    body {
        background-color: #1977772c;
    }
</style>
<div class="container mt-5">
    <form action="/guardar_producto" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputNombreProducto" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="inputNombreProducto" name="_NombreProducto" value="{{ old('_NombreProducto') }}">
                @if($errors->first('_NombreProducto'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_NombreProducto') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputNumeroSerie" class="form-label">Número de Serie</label>
                <input type="text" class="form-control" id="inputNumeroSerie" name="_NumeroSerie" value="{{ old('_NumeroSerie') }}">
                @if($errors->first('_NumeroSerie'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_NumeroSerie') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputMarca" class="form-label">Marca del Producto</label>
                <input type="text" class="form-control" id="inputMarca" name="_Marca" value="{{ old('_Marca') }}">
                @if($errors->first('_Marca'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Marca') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputNombreProveedor" class="form-label">Nombre del Proveedor</label>
                <input type="text" class="form-control" id="inputNombreProveedor" name="_NombreProveedor" value="{{ old('_NombreProveedor') }}">
                @if($errors->first('_NombreProveedor'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_NombreProveedor') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputFoto" class="form-label">Foto del Producto</label>
                <input type="file" class="form-control" id="inputFoto" name="_Image" accept="image/*">
                @if($errors->first('_Image'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Image') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-12">
                <label for="inputNotas" class="form-label">Notas Adicionales</label>
                <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas">{{ old('_Notas') }}</textarea>
                @if($errors->first('_Notas'))
                    <div class="alert alert-danger" role="alert">
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
                <a href="/productos"><button type="button" class="btn btn-outline-danger mt-3">Cancelar</button></a>
            </div>
        </div>
    </form>
</div>

@endsection
