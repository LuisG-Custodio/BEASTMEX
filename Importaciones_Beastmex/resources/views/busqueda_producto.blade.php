@extends('layouts.template')
@section('titulo','Productos')
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
                        <form class="d-flex" role="search" action="/productos/busqueda" method="GET">
                            <input class="form-control me-2 col-md-3" type="search" name="_nombre" placeholder="Nombre/Serie/Marca" aria-label="Search">
                              <button class="btn btn-outline-success" type="submit">Buscar</button>
                          </form>
                      </div>
                  </div>
              </nav>
            </div>
            <div class="col-4">
            @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2, 5]))   
              @include('partials.formulario_producto')
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#nuevoProducto">Nuevo Producto</button>
            @endif
            <button class="btn btn-outline-success mt-3 mb-3 ms-3" id="download-button">Descargar PDF</button>
            </div>
          </div>
          <div id="invoice">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2, 5]))   
                <th scope="col"></th>
                @endif
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
            <tr class="@if($i->Stock <= 2) table-danger table-bordered border-danger @endif">
                @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2, 5]))   
                <td scope="col" >
                    <table>
                        <tr>
                            <td>
                                <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editarProducto{{$i->id_producto}}"><i class="bi bi-pencil-square"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#eliminarProducto{{$i->id_producto}}"><i class="bi bi-trash"></i></button>
                                
                            </td>
                        </tr>
                    </table>
                </td>
                @endif
                <td scope="col">{{$i->Nombre}}</td>
                <td scope="col">{{$i->No_Serie}}</td>
                <td scope="col">{{$i->Marca}}</td>
                <td scope="col">{{number_format($i->Costo_compra, 2) }}</td>
                <td scope="col">{{number_format($i->Costo_compra * 1.55, 2) }}</td>
                <td scope="col">{{$i->Stock}}</td>
                <td scope="col">{{$i->pNombre}} {{$i->AP}} {{$i->AM}}</td>
                <td scope="col"><img src="{{Storage::url($i->Foto)}}" class="img-thumbnail rounded float-start" style="max-height: 100px;"></td>
            </tr>
             @include('partials.modalproductos')
            @endforeach
        </tbody>
    </table>
          </div>
</div>
</body>
<script>
    const button = document.getElementById('download-button');

    function generatePDF() {
        // Choose the element that your content will be rendered to.
        const element = document.getElementById('invoice');
        // Choose the element and save the PDF for your user.
        html2pdf().from(element).save();
    }

    button.addEventListener('click', generatePDF);
</script>

@endsection
