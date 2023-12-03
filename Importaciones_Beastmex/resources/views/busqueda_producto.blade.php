@extends('layouts.template')
@section('titulo','Almacen')
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
              @include('partials.formulario_producto')
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#nuevoProducto">Nuevo</button>
            </div>
          </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Producto</th>
                <th scope="col">No. de Serie</th>
                <th scope="col">Marca</th>
                <th scope="col">Compra</th>
                <th scope="col">Venta</th>
                <th scope="col">Stock</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Foto</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach($productos as $i)
            <tr>
                <td scope="col">
                    <table>
                        <tr>
                            <td>
                                <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editarProducto{{$i->id_proveedor}}"><i class="bi bi-pencil-square"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#eliminarProducto{{$i->id_proveedor}}"><i class="bi bi-trash"></i></button>
                                
                            </td>
                        </tr>
                    </table>
                </td>
                <td scope="col">{{$i->Nombre}}</td>
                <td scope="col">{{$i->No_Serie}}</td>
                <td scope="col">{{$i->Marca}}</td>
                <td scope="col">{{number_format($i->Costo_compra, 2) }}</td>
                <td scope="col">{{number_format($i->Costo_compra * 1.55, 2) }}</td>
                <td scope="col">{{$i->Stock}}</td>
                <td scope="col">{{$i->pNombre}} {{$i->AP}} {{$i->AM}}</td>
                <td scope="col"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png" class="img-thumbnail rounded float-start" style="max-height: 50px;"></td>
            </tr>
             @include('partials.modalproductos')
            @endforeach
        </tbody>
    </table>
</div>
</body>


@endsection
