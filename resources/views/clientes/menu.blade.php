<li class="nav-item">
    <a data-bs-toggle="collapse" href="#clientespanel" class="nav-link " aria-controls="adminspanel" role="button" aria-expanded="false">
      <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Clientes</span>
    </a>

    <div class="collapse " id="clientespanel">
      <ul class="nav ms-4">
        {{-- <li class="nav-item ">
          <a class="nav-link " href="{{route('nuevo_cliente')}}">
            <span class="sidenav-mini-icon"> N </span>
            <span class="sidenav-normal"> Nuevo </span>
          </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link " id="btnClientesF" href="{{route('clientes_fisico_vista')}}">
              <span class="sidenav-mini-icon text-xs"> A </span>
              <span class="sidenav-normal"> Panel de clientes </span>
            </a>
          </li>

        {{-- <li class="nav-item ">
          <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#collapseClienteF">
            <span class="sidenav-mini-icon"> C </span>
            <span class="sidenav-normal"> Personas Físicas <b class="caret"></b></span>
          </a>
          <div class="collapseClienteF " id="collapseClienteF">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a class="nav-link " id="btnClientesF" href="{{route('clientes_fisico_vista')}}">
                  <span class="sidenav-mini-icon text-xs"> A </span>
                  <span class="sidenav-normal"> Clientes </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="btnProspectosF" href="{{route('prospectos_fisico_vista')}}">
                  <span class="sidenav-mini-icon text-xs"> C </span>
                  <span class="sidenav-normal"> Prospectos </span>
                </a>
              </li>
            </ul>
          </div>
        </li> --}}

        {{-- <li class="nav-item ">
          <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#collapseClienteM">
            <span class="sidenav-mini-icon"> C </span>
            <span class="sidenav-normal"> Personas Morales <b class="caret"></b></span>
          </a>
          <div class="collapseClienteM " id="collapseClienteM">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a class="nav-link " id="btnClientesF" href="{{route('clientes_moral_vista')}}">
                  <span class="sidenav-mini-icon text-xs"> A </span>
                  <span class="sidenav-normal"> Clientes </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="btnProspectosF" href="{{route('prospectos_moral_vista')}}">
                  <span class="sidenav-mini-icon text-xs"> C </span>
                  <span class="sidenav-normal"> Prospectos </span>
                </a>
              </li>
            </ul>
          </div>
        </li> --}}

      </ul>
    </div>
  </li>
