<!-- Modal CLIENTES -->
<div class="modal fade" id="nuevoCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action={{route('home.store')}} method="POST">
                @csrf 
                @method('PUT') 
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputNombre" class="form-label">Nombre de la Empresa</label>
                        <input type="text" class="form-control" id="inputNombreEmpresa" name="_NombreEmpresa" value="{{old('_NombreEmpresa')}}">
                        @if($errors->first('_NombreEmpresa'))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('_NombreEmpresa')}}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputRFC" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="inputRFC" name="_RFC" value="{{old('_RFC')}}">
                        @if($errors->first('_RFC'))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('_RFC')}}
                            </div>
                        @endif
                    </div>
                </div>
            
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputTelefono" class="form-label">Teléfono de Contacto</label>
                        <input type="text" class="form-control" id="inputTelefono" name="_Telefono" value="{{old('_Telefono')}}">
                        @if($errors->first('_Telefono'))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('_Telefono')}}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputCorreo" class="form-label">Correo de Contacto</label>
                        <input type="text" class="form-control" id="inputCorreo" name="_Correo" value="{{old('_Correo')}}">
                        @if($errors->first('_Correo'))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('_Correo')}}
                            </div>
                        @endif
                    </div>
                </div>
            
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="inputDireccion" class="form-label">Dirección de la Empresa</label>
                        <textarea class="form-control" wrap="hard" id="inputDireccion" rows="3" name="_Direccion">{{old('_Direccion')}}</textarea>
                        @if($errors->first('_Direccion'))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('_Direccion')}}
                            </div>
                        @endif
                    </div>
                </div>
            
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="inputNotas" class="form-label">Notas Adicionales</label>
                        <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas">{{old('_Notas')}}</textarea>
                        @if($errors->first('_Notas'))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('_Notas')}}
                            </div>
                        @endif
                    </div>
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
            <div class="row row-cols-auto">
                <div class="col">
                    <button type="submit" class="btn btn-outline-success mt-3">Registrar</button>
                </div>
                <div class="col">
                    <a href="/clientes"><button type="button" class="btn btn-outline-danger mt-3">Cancelar</button></a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>


{{-- Modal Nueva Orden --}}
<div class="modal fade" id="nuevaOrden" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Venta</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/guardar_orden_venta" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputCliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="inputCliente" name="_Cliente" value="Cliente1" >
                        @if($errors->first('_Cliente'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('_Cliente') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputFechaEntrega" class="form-label">Fecha de Entrega Deseada</label>
                        <input type="date" class="form-control" id="inputFechaEntrega" name="_FechaEntrega" value="{{ old('_FechaEntrega') }}">
                        @if($errors->first('_FechaEntrega'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('_FechaEntrega') }}
                            </div>
                        @endif
                    </div>
                </div>
        
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputProducto" class="form-label">Producto a Comprar</label>
                        <input type="text" class="form-control" id="inputProducto" name="_Producto" value="{{ old('_Producto') }}">
                        @if($errors->first('_Producto'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('_Producto') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputCantidad" class="form-label">Cantidad a Comprar</label>
                        <input type="number" class="form-control" id="inputCantidad" name="_Cantidad" value="{{ old('_Cantidad') }}">
                        @if($errors->first('_Cantidad'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('_Cantidad') }}
                            </div>
                        @endif
                    </div>
                </div>
        
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="inputNotas" class="form-label">Notas Adicionales</label>
                        <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas">{{ old('_Notas') }}</textarea>
                        @if($errors->first('_Notas'))
                            <div class "alert alert-danger" role="alert">
                                {{ $errors->first('_Notas') }}
                            </div>
                        @endif
                    </div>
                </div>
        
            </form>
        </div>
        <div class="modal-footer">
            <div class="row row-cols-auto">
                <div class="col">
                    <button type="submit" class="btn btn-outline-success mt-3">Registrar</button>
                </div>
                <div class="col">
                    <a href="/clientes"><button type="button" class="btn btn-outline-danger mt-3">Cancelar</button></a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Editar --}}
<div class="modal fade" id="update{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <form  method="POST" action="{{route('home.update',$item->id)}}">
                    @csrf 
                    @method('PUT') 
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputNombre" class="form-label">Nombre de la Empresa</label>
                            <input type="text" class="form-control" id="inputNombreEmpresa" name="_NombreEmpresa" value="{{$item->cliente}}">
                            @if($errors->first('_NombreEmpresa'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_NombreEmpresa')}}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputRFC" class="form-label">RFC</label>
                            <input type="text" class="form-control" id="inputRFC" name="_RFC" value="{{$item->rfc}}">
                            @if($errors->first('_RFC'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_RFC')}}
                                </div>
                            @endif
                        </div>
                    </div>
                
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputTelefono" class="form-label">Teléfono de Contacto</label>
                            <input type="text" class="form-control" id="inputTelefono" name="_Telefono" value="{{$item->telefono}}">
                            @if($errors->first('_Telefono'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_Telefono')}}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputCorreo" class="form-label">Correo de Contacto</label>
                            <input type="text" class="form-control" id="inputCorreo" name="_Correo" value="{{$item->correo}}">
                            @if($errors->first('_Correo'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_Correo')}}
                                </div>
                            @endif
                        </div>
                    </div>
                
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="inputDireccion" class="form-label">Dirección de la Empresa</label>
                            <textarea class="form-control" wrap="hard" id="inputDireccion" rows="3" name="_Direccion">value="{{$item->direccion}}</textarea>
                            @if($errors->first('_Direccion'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_Direccion')}}
                                </div>
                            @endif
                        </div>
                    </div>
                
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="inputNotas" class="form-label">Notas Adicionales</label>
                            <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas">value="{{$item->notas}}</textarea>
                            @if($errors->first('_Notas'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_Notas')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div>
        <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success mt-3">Editar</button>
                <a href="/clientes"><button type="button" class="btn btn-outline-danger mt-3">Cancelar</button></a>
            
        </div>
      </div>
    </div>
  </div>

    {{-- Modal Borrar --}}
 <div class="modal fade" id="de{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <form  method="POST" action="{{route('home.destroy',$item->id)}}">
                    @csrf 
                    @method('DELETE')  
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputNombre" class="form-label">Nombre de la Empresa</label>
                            <input type="text" class="form-control" id="inputNombreEmpresa" name="_NombreEmpresa" value="{{$item->cliente}}">
                            @if($errors->first('_NombreEmpresa'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_NombreEmpresa')}}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputRFC" class="form-label">RFC</label>
                            <input type="text" class="form-control" id="inputRFC" name="_RFC" value="{{$item->rfc}}">
                            @if($errors->first('_RFC'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_RFC')}}
                                </div>
                            @endif
                        </div>
                    </div>
                
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputTelefono" class="form-label">Teléfono de Contacto</label>
                            <input type="text" class="form-control" id="inputTelefono" name="_Telefono" value="{{$item->telefono}}">
                            @if($errors->first('_Telefono'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_Telefono')}}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputCorreo" class="form-label">Correo de Contacto</label>
                            <input type="text" class="form-control" id="inputCorreo" name="_Correo" value="{{$item->correo}}">
                            @if($errors->first('_Correo'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_Correo')}}
                                </div>
                            @endif
                        </div>
                    </div>
                
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="inputDireccion" class="form-label">Dirección de la Empresa</label>
                            <textarea class="form-control" wrap="hard" id="inputDireccion" rows="3" name="_Direccion">value="{{$item->direccion}}</textarea>
                            @if($errors->first('_Direccion'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_Direccion')}}
                                </div>
                            @endif
                        </div>
                    </div>
                
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="inputNotas" class="form-label">Notas Adicionales</label>
                            <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas">value="{{$item->notas}}</textarea>
                            @if($errors->first('_Notas'))
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first('_Notas')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div>
        <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success mt-3">Borrar</button>
                <a href="/clientes"><button type="button" class="btn btn-outline-danger mt-3">Cancelar</button></a>
            
        </div>
      </div>
    </div>
  </div>