<li class="nav-item">
    <a data-bs-toggle="collapse" href="#Servicespanel" class="nav-link " aria-controls="adminspanel" role="button" aria-expanded="false">
      <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
        <i class="ni ni-archive-2 text-success text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Servicios</span>
    </a>
    <div class="collapse " id="Servicespanel">
      <ul class="nav ms-4">
        <li class="nav-item ">
          <a class="nav-link " href="{{route('new_service')}}">
            <span class="sidenav-mini-icon"> N </span>
            <span class="sidenav-normal"> Nuevo </span>
          </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " id="btnServicios" href="{{route('service_index')}}">
                <span class="sidenav-mini-icon text-xs"> A </span>
                <span class="sidenav-normal"> Servicios </span>
              </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " id="btnPresupuesto" href="{{route('newPresupuesto')}}">
                <span class="sidenav-mini-icon text-xs"> A </span>
                <span class="sidenav-normal"> Crear Presupuesto </span>
              </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " id="btnPresupuesto" href="{{route('presupuestosIndex')}}">
                <span class="sidenav-mini-icon text-xs"> A </span>
                <span class="sidenav-normal"> Presupuestos </span>
              </a>
          </li>





      </ul>
    </div>
  </li>
