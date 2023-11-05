@extends('layouts.template')
@section('titulo','Nuevo Proveedor')
@section('contenido')

<style>
    body {
        background-color: #1977772c;
    }
</style>
<div class="container mt-5">
    <form action="/guardar_proveedor" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputNombre" class="form-label">Nombre de la Empresa</label>
                <input type="text" class="form-control" id="inputNombreEmpresa" name="_NombreEmpresa" value="{{ old('_NombreEmpresa') }}">
                @if($errors->first('_NombreEmpresa'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_NombreEmpresa') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputRFC" class="form-label">RFC</label>
                <input type="text" class="form-control" id="inputRFC" name="_RFC" value="{{ old('_RFC') }}">
                @if($errors->first('_RFC'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_RFC') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for "inputTelefono" class="form-label">Teléfono de Contacto</label>
                <input type="text" class="form-control" id="inputTelefono" name="_Telefono" value="{{ old('_Telefono') }}">
                @if($errors->first('_Telefono'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Telefono') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputCorreo" class="form-label">Correo de Contacto</label>
                <input type="text" class="form-control" id="inputCorreo" name="_Correo" value="{{ old('_Correo') }}">
                @if($errors->first('_Correo'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Correo') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-12">
                <label for="inputDireccion" class="form-label">Dirección de la Empresa</label>
                <textarea class="form-control" wrap="hard" id="inputDireccion" rows="3" name="_Direccion">{{ old('_Direccion') }}</textarea>
                @if($errors->first('_Direccion'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Direccion') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-12">
                <label for="inputProductos" class="form-label">Descripción de Productos Ofrecidos</label>
                <textarea class="form-control" wrap="hard" id="inputProductos" rows="3" name="_Productos">{{ old('_Productos') }}</textarea>
                @if($errors->first('_Productos'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Productos') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-12">
                <label for="inputNotas" class="form-label">Notas Adicionales</label>
                <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas">{{ old('_Notas') }}</textarea>
            </div>
        </div>

        <div class="row row-cols-auto">
            <div class="col">
                <button type="submit" class="btn btn-outline-success mt-3">Registrar</button>
            </div>
            <div class="col">
                <a href="/proveedores"><button type="button" class="btn btn-outline-danger mt-3">Cancelar</button></a>
            </div>
        </div>
    </form>
</div>

@endsection
