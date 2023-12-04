<!-- Modal Nuevo Cliente -->
<div class="modal fade" id="nuevoCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/guardar_cliente" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputNombreEmpresa" class="form-label">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="inputNombreEmpresa" name="_NombreEmpresa" value="{{ old('_NombreEmpresa') }}">
                            @if($errors->first('_NombreEmpresa'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('_NombreEmpresa') }}
                            </div>
                            @endif
                        </div>
                
                        <div class="col-md-6">
                            <label for="inputAP" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="inputAP" name="_AP" value="{{ old('_AP') }}">
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
                            <input type="text" class="form-control" id="inputAM" name="_AM" value="{{ old('_AM') }}">
                            @if($errors->first('_AM'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('_AM') }}
                            </div>
                            @endif
                        </div>
                
                        <div class="col-md-6">
                            <label for="inputRFC" class="form-label">RFC</label>
                            <input type="text" class="form-control" id="inputRFC" name="_RFC" value="{{ old('_RFC') }}">
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
                            <input type="text" class="form-control" id="inputTelefono" name="_Telefono" value="{{ old('_Telefono') }}">
                            @if($errors->first('_Telefono'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('_Telefono') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputCorreo" class="form-label">Correo de Contacto</label>
                            <input type="text" class="form-control" id="inputCorreo" name="_Correo" value="{{ old('_Correo') }}">
                            @if($errors->first('_Correo'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('_Correo') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="inputDireccion" class="form-label">Dirección de la Empresa</label>
                            <textarea class="form-control" wrap="hard" id="inputDireccion" rows="3" name="_Direccion">{{ old('_Direccion') }}</textarea>
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
                        <button type="submit" class="btn btn-outline-success mt-3">Registrar</button>
                    </div>
                    <div class="col">
                        <a href="/clientes"><button type="button" class="btn btn-outline-danger mt-3" data-bs-dismiss="modal">Cancelar</button></a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
