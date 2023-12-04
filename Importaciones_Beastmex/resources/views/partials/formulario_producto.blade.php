<!-- Modal Nuevo Producto -->
<div class="modal fade" id="nuevoProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/guardar_producto" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputNombreProducto" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="inputNombreProducto" name="_NombreProducto" value="{{ old('_NombreProducto') }}">
                            @if($errors->first('_NombreProducto'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('_NombreProducto') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputNumeroSerie" class="form-label">Número de Serie</label>
                            <input type="text" class="form-control" id="inputNumeroSerie" name="_NumeroSerie" value="{{ old('_NumeroSerie') }}">
                            @if($errors->first('_NumeroSerie'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('_NumeroSerie') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputMarca" class="form-label">Marca del Producto</label>
                            <input type="text" class="form-control" id="inputMarca" name="_Marca" value="{{ old('_Marca') }}">
                            @if($errors->first('_Marca'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('_Marca') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputCosto" class="form-label">Costo</label>
                            <input type="text" class="form-control" id="inputCosto" name="_Costo" value="{{ old('_Costo') }}">
                            @if($errors->first('_Costo'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('_Costo') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputStock" class="form-label">Stock</label>
                            <input type="text" class="form-control" id="inputStock" name="_Stock" value="{{ old('_Stock') }}">
                            @if($errors->first('_Stock'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('_Stock') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputNombreProveedor" class="form-label">Nombre del Proveedor</label>
                            <br>
                            <select name="_NombreProveedor" id="inputStock">
                                <option value="" @if (null == old('_NombreProveedor')) selected @endif>Selecciona una opción</option>
                                @foreach($proveedores as $p)
                                <option value="{{$p->id_proveedor}}" @if ($p->id_proveedor == old('_NombreProveedor')) selected @endif>{{$p->Nombre}} {{$p->AP}} {{$p->AM}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('_NombreProveedor'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('_NombreProveedor') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputFoto" class="form-label">Foto del Producto</label>
                            <input type="file" class="form-control" id="inputFoto" name="_Image" accept="image/*">
                            @if($errors->first('_Image'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('_Image') }}
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
                        <a href="/productos"><button type="button" class="btn btn-outline-danger mt-3" data-bs-dismiss="modal">Cancelar</button></a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
