<nav class="navbar" style="background-color: #03363d; height: 60px;" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BEASTMEX</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="background-color: #03363d; width: 120px;">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('/* apodoInicio */')?'text-success-emphasis':'' }}" aria-current="page" href="/Inicio">Departamentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('/* apodoRegistro */')?'text-success-emphasis':'' }} " href="/Registro">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('/* apodoRegistro */')?'text-success-emphasis':'' }} " href="/Registro">Usuarios</a>
              </li>
          </ul>
        </div>
      </div>
  </nav>
  