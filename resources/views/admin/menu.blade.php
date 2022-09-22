<li class="nav-item">
    <a data-bs-toggle="collapse" href="#adminpanel" class="nav-link " aria-controls="adminspanel" role="button" aria-expanded="false">
      <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">ADMINISTRADOR</span>
    </a>
    <div class="collapse " id="adminpanel">
      <ul class="nav ms-4">
        <li class="nav-item ">
          <a class="nav-link " href="{{route('administracion_usuarios')}}">
            <span class="sidenav-mini-icon"> U </span>
            <span class="sidenav-normal"> Usuarios </span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="{{route('administracion_documentos')}}">
            <span class="sidenav-mini-icon"> D </span>
            <span class="sidenav-normal"> Catalogo de documentos </span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="{{route('administracion_gestoria')}}">
            <span class="sidenav-mini-icon"> G </span>
            <span class="sidenav-normal"> Gestionar Gestoria </span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="../../../pages/dashboards/smart-home.html">
            <span class="sidenav-mini-icon"> S </span>
            <span class="sidenav-normal"> Smart Home </span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
            <span class="sidenav-mini-icon"> V </span>
            <span class="sidenav-normal"> Virtual Reality <b class="caret"></b></span>
          </a>
          <div class="collapse " id="vrExamples">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a class="nav-link " href="../../../pages/dashboards/vr/vr-default.html">
                  <span class="sidenav-mini-icon text-xs"> V </span>
                  <span class="sidenav-normal"> VR Default </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="../../../pages/dashboards/vr/vr-info.html">
                  <span class="sidenav-mini-icon text-xs"> V </span>
                  <span class="sidenav-normal"> VR Info </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="../../../pages/dashboards/crm.html">
            <span class="sidenav-mini-icon"> C </span>
            <span class="sidenav-normal"> CRM </span>
          </a>
        </li>
      </ul>
    </div>
  </li>