<nav class="navbar bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BEASTMEX</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('n_home')?'text-success-emphasis':'' }}" aria-current="page" href="/"> Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Reportes
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item {{ request()->routeIs('n_general') ? 'text-success-emphasis' : '' }}" href="/repore_general">General</a>
                  <a class="dropdown-item {{ request()->routeIs('n_compras') ? 'text-success-emphasis' : '' }}" href="/compras">Compras</a>
                  <a class="dropdown-item {{ request()->routeIs('n_ventas') ? 'text-success-emphasis' : '' }}" href="/ventas">Ventas</a>
              </div>
          </li>
          
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('n_empleados')?'text-success-emphasis':'' }} " href="/empleados"> Empleados</a>
              </li>
          </ul>
        </div>
      </div>
  </nav>