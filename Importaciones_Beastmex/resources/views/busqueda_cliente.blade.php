@extends('layouts.template')
@section('titulo','Clientes')
@section('contenido')

<style>
body {
    background-color: #1977772c;
}


</style>
<div class="container">
    <div class="row">
        <div class="col-8">
          <nav class="navbar">
              <div class="container">
                  <div class="search-form">
                    <form class="d-flex" role="search" action="/clientes/busqueda" method="GET">
                        <input class="form-control me-2 col-md-3" type="search" name="_nombre" placeholder="Buscar Cliente" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Buscar</button>
                      </form>
                  </div>
              </div>
          </nav>
        </div>
        <div class="col-2">
          @include('partials.formulario_cliente')
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#nuevoCliente">Nuevo Cliente</button>
        </div>
        <div class="col-2">
            <a href="/clientes/tickets"><button type="button" class="btn btn-outline-primary">Ver tickets</button></a>
          </div>
      </div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Cliente</th>
            <th scope="col">RFC</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Dirección</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $c)
        <tr>
            <td scope="col">
                <table>
                    <tr>
                        <td>
                            <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editarEmpresa{{$c->id_cliente}}"><i class="bi bi-pencil-square"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarEmpresa{{$c->id_cliente}}"><i class="bi bi-trash"></i></button>
                            
                        </td>
                    </tr>
                </table>
            </td>
            <td scope="col">{{$c->Nombre}} {{$c->AP}} {{$c->AM}}</th>
            <td scope="col">{{$c->RFC}}</th>
            <td scope="col">{{$c->Telefono}}</th>
            <td scope="col">{{$c->Correo}}</th>
            <td scope="col">{{$c->Direccion}}</th>
                <td scope="col">
                    <form method="POST" action="/clientes/{{$c->id_cliente}}/ticket">
                        @csrf
                    <button type="submit"  class="btn btn-outline-primary">Nueva Orden</button>
                    </form>
                </td>

        </tr>
        @include('partials.modalclientes')
        @endforeach
    </tbody>
    
</table>
</div>
</body>

  


@endsection