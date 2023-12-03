<nav class="navbar" style="background-color: #03363d; height: 60px;" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('n_home')}}">BEASTMEX</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="background-color: #03363d; width: 120px;">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('/* apodoRegistro */')?'text-success-emphasis':'' }} " href="/Registro">Usuarios</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Departamentos
                </a>
                <ul class="dropdown-menu">
                  @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2, 3]))
                  <li><a class="dropdown-item" href="/proveedores">Compras</a></li>
                  @endif
                  @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2, 5]))
                  <li><a class="dropdown-item" href="/productos">Almacén</a></li>
                  @endif
                  @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2, 4]))
                  <li><a class="dropdown-item" href="/clientes">Ventas</a></li>
                  @endif
                  @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2]))
                  <li><a class="dropdown-item" href="/empleados">Gerencia</a></li>
                  @endif
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Reportes
                </a>
                <ul class="dropdown-menu">
                  @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2, 4]))
                  <li><a class="dropdown-item" href="{{route('n_ventas')}}">Ventas</a></li>
                  @endif
                  @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2, 3]))
                  <li><a class="dropdown-item" href="{{route('n_compras')}}">Compras</a></li>
                  @endif
                  @if(session()->has('id_rol') && in_array(session('id_rol'), [1, 2]))
                  <li><a class="dropdown-item" href="{{route('n_general')}}">General</a></li>
                  @endif
                </ul>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li class="nav-item">
                <a class="nav-link" href="/cerrar_sesion">Cerrar Sesion</a>
              </li>
          </ul>
        </div>
      </div>
  </nav>
  