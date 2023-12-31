@extends('layouts.template')
@section('titulo','Proveedores')
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
                        <form class="d-flex" role="search" action="/proveedores/busqueda" method="GET">
                            <input class="form-control me-2 col-md-3" type="search" name="_nombre" placeholder="Buscar Proveedor" aria-label="Search">
                              <button class="btn btn-outline-success" type="submit">Buscar</button>
                          </form>
                      </div>
                  </div>
              </nav>
            </div>
            <div class="col-2">
              @include('partials.formulario_proveedor')
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#nuevoProveedor">Nuevo Proveedor</button>
            </div>
            <div class="col-2">
                <a href="/proveedores/tickets"><button type="button" class="btn btn-outline-primary">Ver tickets</button></a>
              </div>
          </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Proveedor</th>
                <th scope="col">RFC</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Giro</th>
                <th scope="col">...</th>

            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $p)
            <tr>
                <td scope="col">
                    <table>
                        <tr>
                            <td>
                                <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editarEmpresa{{$p->id_proveedor}}"><i class="bi bi-pencil-square"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarEmpresa{{$p->id_proveedor}}"><i class="bi bi-trash"></i></button>
                                
                            </td>
                        </tr>
                    </table>
                </td>
                <td scope="col">{{$p->Nombre}} {{$p->AP}} {{$p->AM}}</th>
                <td scope="col">{{$p->RFC}}</th>
                <td scope="col">{{$p->Telefono}}</th>
                <td scope="col">{{$p->Correo}}</th>
                <td scope="col">{{$p->Direccion}}</th>
                <td scope="col">{{$p->Giro}}</th>
                <td scope="col">
                    <form method="POST" action="/proveedores/{{$p->id_proveedor}}/ticket">
                        @csrf
                    <button type="submit"  class="btn btn-outline-primary">Nueva Orden</button>
                    </form>
                </td>

            </tr>
            @include('partials.modalproveedores')
            @endforeach
        </tbody>
        
    </table>
</div>
</body>



@endsection