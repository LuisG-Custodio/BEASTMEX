@extends('layouts.template')
@section('titulo','Empleados')
@section('contenido')

<style>
    body {
        background-color: #1977772c;
    }
    
    
    </style>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-8">
                  <nav class="navbar">
                      <div class="container">
                          <div class="search-form">
                            <form class="d-flex" role="search" action="/empleados/busqueda" method="GET">
                                <input class="form-control me-2 col-md-3" type="search" name="_nombre" placeholder="Buscar Empleado" aria-label="Search">
                                  <button class="btn btn-outline-success" type="submit">Buscar</button>
                              </form>
                          </div>
                      </div>
                  </nav>
                </div>
                <div class="col-4">
                  @include('partials.formulario_empleado')
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#nuevoEmpleado">Nuevo Empleado</button>
                </div>
              </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Dirección</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($empleados as $e)
                    <td scope="col">
                        <table>
                            <tr>
                                <td>
                                    <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editarEmpleado{{$e->id_empleado}}"><i class="bi bi-pencil-square"></i></button>
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarEmpleado{{$e->id_empleado}}"><i class="bi bi-trash"></i></button>
                                    
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td scope="col">{{$e->Nombre}} {{$e->AP}} {{$e->AM}}</td>
                    <td scope="col">{{$e->RFC}}</td>
                    <td scope="col">{{$e->Telefono}}</td>
                    <td scope="col">{{$e->Correo}}</td>
                    <td scope="col">{{$e->rol_nombre}}</td>
                    <td scope="col">
                        <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#cambiarcontrasena{{$e->id_empleado}}"">Cambiar</button>
                    </td>
                    <td scope="col">{{$e->Direccion}}</td>
                    @include('partials.modalempleados')
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>

    </body>
    
    
    <br>
    <br>
    <br>

@endsection