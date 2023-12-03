@extends('layouts.template')
@section('titulo','Tickets de Compra')
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
                      <form class="d-flex" role="search">
                          <input class="form-control me-2 col-md-3" type="search" placeholder="Buscar Empleado" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Buscar</button>
                      </form>
                  </div>
              </div>
          </nav>
        </div>

      </div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">Proveedor</th>
            <th scope="col">Solicitante</th>
            <th scope="col">Fecha</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $t)
        <tr>
            <td scope="col">{{$t->NombreP}} {{$t->APP}} {{$t->AMP}}</th>
            <td scope="col">{{$t->Nombre}} {{$t->AP}} {{$t->AM}}</th>
            <td scope="col">{{$t->created_at}}</th>    
            <td scope="col"><a href="/proveedores/ticket/{{$t->id_ticketcompra}}/view"><button class="btn btn-outline-info btn-sm">Ver ticket</button></a></td>

        </tr>
        @endforeach
    </tbody>
    
</table>
</div>
</body>

  


@endsection