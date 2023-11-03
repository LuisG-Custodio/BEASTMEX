<form action="" method="POST">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label for="inputNombre" class="form-label">Nombre de la Empresa</label>
            <input type="text" class="form-control" id="inputNombreEmpresa" name="_NombreEmpresa" required>
        </div>
        <div class="col-md-6">
            <label for="inputTelefono" class="form-label">RFC</label>
            <input type="text" class="form-control" id="inputRFC" name="_RFC" required>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="inputTelefono" class="form-label">Teléfono de Contacto</label>
            <input type="text" class="form-control" id="inputTelefono" name="_Telefono" required>
        </div>
        <div class="col-md-6">
            <label for="inputCorreo" class="form-label">Correo de Contacto</label>
            <input type="email" class="form-control" id="inputCorreo" name="_Correo" required>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-12">
            <label for="inputDireccion" class="form-label">Dirección de la Empresa</label>
            <textarea class="form-control" wrap="hard" id="inputDireccion" rows="3" name="_Direccion"></textarea>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-12">
            <label for="inputNotas" class="form-label">Notas Adicionales</label>
            <textarea class="form-control" wrap="hard" id="inputNotas" rows="3" name="_Notas"></textarea>
        </div>
    </div>
</form>
