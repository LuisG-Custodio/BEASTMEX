<!-- Modal Editar Proveedor -->
<div class="modal fade" id="editarEmpresa{{$c->id_cliente}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Proveedor</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="/clientes/{{$c->id_cliente}}/update" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row g-3">
                      <div class="col-md-6">
                          <label for="inputNombreEmpresa" class="form-label">Nombre del Cliente</label>
                          <input type="text" class="form-control" id="inputNombreEmpresa" name="_NombreEmpresa" value="{{$c->Nombre}}">
                          @if($errors->first('_NombreEmpresa'))
                          <div class="alert alert-danger" role="alert">
                              {{ $errors->first('_NombreEmpresa') }}
                          </div>
                          @endif
                      </div>
              
                      <div class="col-md-6">
                          <label for="inputAP" class="form-label">Apellido Paterno</label>
                          <input type="text" class="form-control" id="inputAP" name="_AP" value="{{$c->AP}}">
                          @if($errors->first('_AP'))
                          <div class="alert alert-danger" role="alert">
                              {{ $errors->first('_AP') }}
                          </div>
                          @endif
                      </div>
                  </div>
  
                  <div class="row g-3">
                      <div class="col-md-6">
                          <label for="inputAM" class="form-label">Apellido Materno</label>
                          <input type="text" class="form-control" id="inputAM" name="_AM" value="{{$c->AM}}">
                          @if($errors->first('_AM'))
                          <div class="alert alert-danger" role="alert">
                              {{ $errors->first('_AM') }}
                          </div>
                          @endif
                      </div>
              
                      <div class="col-md-6">
                          <label for="inputRFC" class="form-label">RFC</label>
                          <input type="text" class="form-control" id="inputRFC" name="_RFC" value="{{$c->RFC}}">
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
                          <input type="text" class="form-control" id="inputTelefono" name="_Telefono" value="{{$c->Telefono}}">
                          @if($errors->first('_Telefono'))
                          <div class="alert alert-danger" role="alert">
                              {{ $errors->first('_Telefono') }}
                          </div>
                          @endif
                      </div>
              
                      <div class="col-md-6">
                          <label for="inputCorreo" class="form-label">Correo de Contacto</label>
                          <input type="text" class="form-control" id="inputCorreo" name="_Correo" value="{{$c->Correo}}">
                          @if($errors->first('_Correo'))
                          <div class="alert alert-danger" role="alert">
                              {{ $errors->first('_Correo') }}
                          </div>
                          @endif
                      </div>
                  </div>
              
                  <div class="row g-3">
                      <div class="col-md-12">
                          <label for="inputDireccion" class="form-label">Dirección</label>
                          <textarea class="form-control" wrap="hard" id="inputDireccion" rows="3" name="_Direccion">{{$c->Direccion}}</textarea>
                          @if($errors->first('_Direccion'))
                          <div class="alert alert-danger" role="alert">
                              {{ $errors->first('_Direccion') }}
                          </div>
                          @endif
                      </div>
                  </div>
              
          </div>
          <div class="modal-footer">
              <div class="row row-cols-auto">
                  <div class="col">
                      <button type="submit" class="btn btn-outline-success mt-3">Actualizar</button>
                  </form>
                  </div>
                  <div class="col">
                      <button type="button" class="btn btn-outline-danger mt-3" data-bs-dismiss="modal">Cancelar</button>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  
  
  

<!-- Modal Eliminar Empleado -->
<div class="modal fade" id="eliminarEmpresa{{$c->id_cliente}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de que desea eliminar al cliente {{$c->Nombre}}?</p>
            </div>
            <div class="modal-footer">
                <div class="row row-cols-auto">
                    <div class="col">
                        <form action="/clientes/{{$c->id_cliente}}/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger mt-3">Eliminar</button>
                        </form>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-secondary mt-3" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
