@extends('layouts.template')
@section('titulo','Empleados')
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
                        <input class="form-control me-2 col-md-3" type="search" placeholder="Buscar Empleado" aria-label="Search">
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
                    <th scope="col">Nombre</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">...</th>
                </tr>
                <tr>
                    <td scope="col">
                        <table>
                            <tr>
                                <td>
                                    <button class="btn btn-outline-info btn-sm"><i class="bi bi-pencil-square"></i></button>
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td scope="col">Empleado1</td>
                    <td scope="col">XAXX010101000</td>
                    <td scope="col">4425698756</td>
                    <td scope="col">empleado@email.com</td>
                    <td scope="col">Gerente</td>
                    <td scope="col">
                        <button class="btn btn-outline-warning btn-sm">Cambiar</button>
                    </td>
                    <td scope="col">Calle #X Col. Colonia C.P. 00000 Estado, País</td>
                    <td scope="col">...</td>
                </tr>
            </thead>
            
        </table>
    </div>
    </body>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('f_empleado')}}"><button type="button" class="btn btn-outline-success">Nuevo</button></a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

@endsection