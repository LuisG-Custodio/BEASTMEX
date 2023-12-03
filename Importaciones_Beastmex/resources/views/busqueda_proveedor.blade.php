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
                          <form class="d-flex" role="search">
                              <input class="form-control me-2 col-md-3" type="search" placeholder="Buscar Empleado" aria-label="Search">
                              <button class="btn btn-outline-success" type="submit">Buscar</button>
                          </form>
                      </div>
                  </div>
              </nav>
            </div>
            <div class="col-4">
              @include('partials.formulario_proveedor')
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#nuevoProveedor">Nuevos</button>
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
                    <td scope="col"><a href="{{route('f_orden_compra')}}"><button class="btn btn-outline-primary">Nueva Orden</button></th></a>

            </tr>
            @include('partials.modalproveedores')
            @endforeach
        </tbody>
        
    </table>
</div>
</body>



@endsection