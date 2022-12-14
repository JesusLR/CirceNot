    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href="#" target="_blank">
            <img src="/img/circeNotLogo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Circe Notarial</span>
          </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
          <ul class="navbar-nav">

            @include('admin.menu')

            @include('catalogos.menu')

            @include('clientes.menu')

            @include('servicios.menu')

            {{-- @include('admin.menu') ACA SE PUEDE INCLUIR TRO APARTADO DEL MENU --}}

          </ul>
        </div>
        <div class="sidenav-footer mx-3 my-3">
          <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-60 mx-auto" src="/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
              <div class="docs-info">
                <h6 class="mb-0">¿Necesitas ayuda?</h6>
                <p class="text-xs font-weight-bold mb-0">¡Por favor, contáctanos!</p>
              </div>
            </div>
          </div>
          <a href="https://www.whatsapp.com/?lang=es" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Contacto</a>
        </div>
      </aside>

