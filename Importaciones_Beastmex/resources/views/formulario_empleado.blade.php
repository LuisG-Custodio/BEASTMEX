@extends('layouts.template')

@section('titulo', 'Nuevo Empleado')

@section('contenido')
<style>
    body {
        background-color: #1977772c;
    }
</style>
<div class="container mt-5">
    <form action="/guardar_empleado" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputNombreEmpresa" class="form-label">Nombre del Empleado</label>
                <input type="text" class="form-control" id="inputNombreEmpresa" name="_NombreEmpleado" value="{{ old('_NombreEmpleado') }}">
                @if($errors->first('_NombreEmpleado'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('_NombreEmpleado') }}
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
                <label for="inputTelefono" class="form-label">Teléfono de Contacto</label>
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
            <div class="col-md-6">
                <label for="inputPuesto" class="form-label">Puesto</label>
                <input type="text" class="form-control" id="inputPuesto" name="_Puesto" value="{{ old('_Puesto') }}">
                @if($errors->first('_Puesto'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('_Puesto') }}
                </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="inputContrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="inputContrasena" name="_Contrasena">
                @if($errors->first('_Contrasena'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('_Contrasena') }}
                </div>
                @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-12">
                <label for="inputDireccion" class="form-label">Dirección</label>
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
                <a href="/empleados"><button type="button" class="btn btn-outline-danger mt-3">Cancelar</button></a>
            </div>
        </div>
    </form>
</div>
@endsection
