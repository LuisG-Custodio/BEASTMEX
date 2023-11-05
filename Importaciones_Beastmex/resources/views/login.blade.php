<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>

      .card-body, .form-label, .form-control, .form-check-label, .btn {
          font-family: Arial, sans-serif; 
      }
  </style>
</head>
<body style="background-color: #1977772c">
    @if($errors->any())
    <script>
        Swal.fire(
            'Error',
            'Usuario y/o contraseña incorrectos',
            'error'
        )
    </script>
    
    @endif
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
    <div class="container mt-2 col-md-2">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">LOG-IN</h1>
                <form method="POST" action="/verificacion_login">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="_email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="_contrasena">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-outline-secondary w-100">Iniciar Sesion</button>
                    </div>
                  </form>

            </div>
        </div>
    </div>
</body>
</html>

