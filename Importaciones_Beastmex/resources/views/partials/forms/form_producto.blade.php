<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label for="inputNombreProducto" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="inputNombreProducto" name="_NombreProducto" required>
        </div>
        <div class="col-md-6">
            <label for="inputNumeroSerie" class="form-label">Número de Serie</label>
            <input type="text" class="form-control" id="inputNumeroSerie" name="_NumeroSerie" required>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="inputMarca" class="form-label">Marca del Producto</label>
            <input type="text" class="form-control" id="inputMarca" name="_Marca" required>
        </div>
        <div class="col-md-6">
            <label for="inputNombre" class="form-label">Nombre del Proveedor</label>
            <input type="text" class="form-control" id="inputNombreProveedor" name="_NombreProveedor" required>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="inputFoto" class="form-label">Foto del Producto</label>
            <input type="file" class="form-control" id="inputFoto" name="productImage" accept="image/*" required>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-12">
            <label for="inputNotas" class="form-label">Notas Adicionales</label>
            <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas"></textarea>
        </div>
    </div>
</form>
