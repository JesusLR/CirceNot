<li class="nav-item">
    <a data-bs-toggle="collapse" href="#catalogoPanel" class="nav-link " aria-controls="adminspanel" role="button" aria-expanded="false">
      <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Catalogos</span>
    </a>
    <div class="collapse " id="catalogoPanel">
      <ul class="nav ms-4">
        {{-- <li class="nav-item ">
          <a class="nav-link " href="{{route('catalogoDoc_vista')}}">
            <span class="sidenav-mini-icon"> D </span>
            <span class="sidenav-normal"> Documentos </span>
          </a>
        </li> --}}

        <li class="nav-item ">
            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
              <span class="sidenav-mini-icon"> V </span>
              <span class="sidenav-normal"> Documentos <b class="caret"></b></span>
            </a>
            <div class="collapse " id="vrExamples">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a class="nav-link " id="btnDocUno" href="{{route('catalogoDoc_Administracion')}}">
                    <span class="sidenav-mini-icon text-xs"> A </span>
                    <span class="sidenav-normal"> Administracion </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="btnDocDos" href="{{route('catalogoDoc_Contratos')}}">
                    <span class="sidenav-mini-icon text-xs"> C </span>
                    <span class="sidenav-normal"> Contratos </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
      </ul>
    </div>
  </li>