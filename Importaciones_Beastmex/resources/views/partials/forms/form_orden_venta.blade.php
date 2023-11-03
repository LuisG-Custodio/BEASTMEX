<form action="" method="POST">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label for="inputCliente" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="inputCliente" name="_Cliente" required>
        </div>
        <div class="col-md-6">
            <label for="inputFechaEntrega" class="form-label">Fecha de Entrega Deseada</label>
            <input type="date" class="form-control" id="inputFechaEntrega" name="_FechaEntrega" required>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="inputProducto" class="form-label">Producto a Comprar</label>
            <input type="text" class="form-control" id="inputProducto" name="_Producto" required>
        </div>
        <div class="col-md-6">
            <label for="inputCantidad" class="form-label">Cantidad a Comprar</label>
            <input type="number" class="form-control" id="inputCantidad" name="_Cantidad" required>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-12">
            <label for="inputNotas" class="form-label">Notas Adicionales</label>
            <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas"></textarea>
        </div>
    </div>
</form>
