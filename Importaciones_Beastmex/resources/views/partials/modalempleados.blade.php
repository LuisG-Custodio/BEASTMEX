<!-- Modal Editar Empleado -->
<div class="modal fade" id="editarEmpleado{{$e->id_empleado}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Empleado</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/empleado/{{$e->id_empleado}}/update" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputNombreEmpresa" class="form-label">Nombre del Empleado</label>
                        <input type="text" class="form-control" id="inputNombreEmpresa" name="_NombreEmpleado" value="{{ $e->Nombre }}">
                        @if($errors->first('_NombreEmpleado'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('_NombreEmpleado') }}
                        </div>
                        @endif
                    </div>
            
                    <div class="col-md-6">
                        <label for="inputAP" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="inputAP" name="_AP" value="{{ $e->AP }}">
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
                        <input type="text" class="form-control" id="inputAM" name="_AM" value="{{ $e->AM }}">
                        @if($errors->first('_AM'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('_AM') }}
                        </div>
                        @endif
                    </div>
            
                    <div class="col-md-6">
                        <label for="inputRFC" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="inputRFC" name="_RFC" value="{{ $e->RFC }}">
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
                        <input type="text" class="form-control" id="inputTelefono" name="_Telefono" value="{{ $e->Telefono }}">
                        @if($errors->first('_Telefono'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('_Telefono') }}
                        </div>
                        @endif
                    </div>
            
                    <div class="col-md-6">
                        <label for="inputCorreo" class="form-label">Correo de Contacto</label>
                        <input type="text" class="form-control" id="inputCorreo" name="_Correo" value="{{ $e->Correo }}">
                        @if($errors->first('_Correo'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('_Correo') }}
                        </div>
                        @endif
                    </div>
                </div>
            
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputPuesto" class="form-label">Puesto</label>
                        <br>
                        <select name="_Puesto" id="inputPuesto">
                            <option value="" >Selecciona una opción</option>
                            @foreach($puestos as $p)
                            <option value="{{$p->id_rol}}" @if ($p->id_rol == $e->id_rol) selected @endif>{{$p->Nombre}}</option>
                            @endforeach
                          </select>
                        @if($errors->first('_Puesto'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('_Puesto') }}
                        </div>
                        @endif
                    </div>
                </div>    
            
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="inputDireccion" class="form-label">Dirección</label>
                        <textarea class="form-control" wrap="hard" id="inputDireccion" rows="3" name="_Direccion">{{ $e->Direccion }}</textarea>
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
<div class="modal fade" id="eliminarEmpleado{{$e->id_empleado}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de que desea eliminar al empleado {{$e->Nombre}}?</p>
            </div>
            <div class="modal-footer">
                <div class="row row-cols-auto">
                    <div class="col">
                        <form action="/empleado/{{$e->id_empleado}}/delete" method="POST">
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

<!-- Modal Cambiar Contraseña -->
<div class="modal fade" id="cambiarcontrasena{{$e->id_empleado}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/empleado/{{$e->id_empleado}}/contrasena" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="newPassword" name="_Contrasena">
                        @if($errors->first('_Contrasena'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('_Contrasena') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirmar Nueva Contraseña</label>
                        <input type="password" class="form-control" id="confirmPassword" name="_cContrasena">
                        @if($errors->first('_cContrasena'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('_cContrasena') }}
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-outline-warning mt-3">Cambiar Contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>
