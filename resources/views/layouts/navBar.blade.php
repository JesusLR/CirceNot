<nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        {{-- <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
          <a class="text-white" href="javascript:;">
            <i class="ni ni-box-2"></i>
          </a>
        </li>
        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">DataTables</li>
      </ol>
      <h6 class="font-weight-bolder mb-0 text-white">DataTables</h6>
    </nav> --}}
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link p-0">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                {{-- <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div> --}}
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    @if (Auth::guard('admin')->check())
                        <form method="POST" action="{{ route('admin_logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light mt-3">Cerrar sesión</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('usuario_logout') }}">
                            @csrf
                            <button type="submit" class="btn text-white btn-light mt-3">Cerrar sesión</button>
                        </form>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
