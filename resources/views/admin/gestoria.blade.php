<!--
=========================================================
* Argon Dashboard 2 PRO - v2.0.5
=========================================================

* Product Page:  https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../../assets/img/favicon.png">
  <title>
    CIRCENOT
  </title>
       <!--AJAX and JQuery-->
   {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
   <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   {{-- select2 --}}
  {{-- //  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
  {{-- //  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
   {{-- Sweet Alerts --}}
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('css/argon-dashboard.css?v=2.0.5')}}" rel="stylesheet" />
  <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('css/fancybox-custom.css') }}" rel="stylesheet"/>

    <!-- Scripts -->
    <script src="{{ asset('js/Not/usuarios.js') }}" defer></script>
    <script src="{{ asset('js/Not/gestoria.js') }}" defer></script>
    <script src="{{ asset('js/plugins/jquery.fancybox.min.js') }}" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css">
    <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
    {{-- <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        input[type="text"] {
            text-transform: uppercase;
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  <main class="main-content position-relative border-radius-lg ">

    <div class="container-fluid py-4">
        @include('admin.mesages')
      <div class="row mb-5">
        <div class="col-12">
          <div class="multisteps-form mb-5">
            <!--progress bar-->
            <div class="row">
              <div class="col-12 col-lg-8 mx-auto my-4">
                <div class="card">
                  <div class="card-body">
                    <div class="multisteps-form__progress">
                      <button class="multisteps-form__progress-btn js-active" type="button" title="Notaria"><span>Notaría</span>
                      </button>
                      <button class="multisteps-form__progress-btn" type="button" title="Protocolo">Protocolo</button>
                      <button class="multisteps-form__progress-btn" type="button" title="Protocolo">Notario</button>
                      {{-- <button class="multisteps-form__progress-btn" type="button" title="Profile">Profile</button> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" method="POST" action="{{route('createGestoria')}}" accept-charset="UTF-8" enctype="multipart/form-data" id="formInfoNotaria" novalidate>
                    @csrf
                    <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder mb-0">Notaría</h5>
                    <p class="mb-0 text-sm">Información General de la notaría</p>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label class="@error('nomNotaria') border-danger text-danger @enderror">Nombre de la notaría</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('nomNotaria') is-invalid @enderror" value="{{ old('nomNotaria') }}" name="nomNotaria" id="nomNotaria" type="text" placeholder="Nombre" />
                                {{-- @error('nomNotaria')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror --}}
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label class="@error('numNotaria') border-danger text-danger @enderror">Número de notaría</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('numNotaria') is-invalid @enderror" value="{{ old('numNotaria') }}" name="numNotaria" id="numNotaria" type="number" placeholder="... " />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                          <label class="@error('domicilioNotaria') border-danger text-danger @enderror">Domicilio</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('domicilioNotaria') is-invalid @enderror" name="domicilioNotaria" id="domicilioNotaria" type="text" value="{{ old('domicilioNotaria') }}" placeholder="Calle... " />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label class="@error('emailNotaria') border-danger text-danger @enderror">Correo electrónico</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('emailNotaria') is-invalid @enderror" value="{{ old('emailNotaria') }}" name="emailNotaria" id="emailNotaria" type="email" placeholder="Correo" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label class="@error('telNotaria') border-danger text-danger @enderror">Teléfono</label>
                          <input class="multisteps-form__input form-control @error('telNotaria') is-invalid @enderror" value="{{ old('telNotaria') }}" maxlength="10" onkeypress="return soloNumeros(event)" name="telNotaria" id="telNotaria" type="text" placeholder="Teléfono" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                            <label class="@error('logoNotaria') border-danger text-danger @enderror">Logotipo</label>
                            <div class="form-control dropzone @error('logoNotaria') is-invalid @enderror">
                                <div class="fallback">
                                    <input value="{{ old('logoNotaria') }}" name="logoNotaria" id="logoNotaria" type="file" multiple />
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Siguiente</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Protocolo</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="0" name="checkProtocoloAbierto" id="checkProtocoloAbierto">
                                <label class="custom-control-label" for="checkProtocoloAbierto">Protocolo Abierto</label>
                            </div>
                        </div>
                      </div>
                      {{-- Apartado protocolo abierto --}}
                      <div class="row mt-3" id="divProtocoloAbierto">
                        <div class="col-12 col-sm-6">
                          <label>Libro</label>
                          <input maxlength="255" value="{{ old('numLibroProtocolo') }}" class="multisteps-form__input form-control" name="numLibroProtocolo" id="numLibroProtocolo" type="text" placeholder="Libro..." />
                        </div>
                        <div class="col-12 col-sm-6 ">
                          <label>Acta</label>
                          <input maxlength="255" value="{{ old('numActaProtocolo') }}" class="multisteps-form__input form-control" name="numActaProtocolo" id="numActaProtocolo" type="text" placeholder="Acta..." />
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <label>Foja Inicial</label>
                            <input maxlength="11" value="{{ old('numFojaIniProtocolo') }}" class="multisteps-form__input form-control" name="numFojaIniProtocolo" id="numFojaIniProtocolo" type="number" placeholder="0..." />
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <label>Foja Final</label>
                            <input maxlength="11" value="{{ old('numFojaFinProtocolo') }}" class="multisteps-form__input form-control" name="numFojaFinProtocolo" id="numFojaFinProtocolo" type="number" placeholder="0..." />
                        </div>
                      </div>
                      {{-- fin apartado protocolo abierto --}}
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Anterior</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Siguiente</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Notario</h5>
                    <p class="mb-0 text-sm">Información general del notario titular</p>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-6">
                          <label class="@error('nomNotario') border-danger text-danger @enderror">Nombre(s)</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('nomNotario') is-invalid @enderror" value="{{ old('nomNotario') }}" id="nomNotario" name="nomNotario" type="text" placeholder="Nombre(s)" />
                        </div>
                        <div class="col-3">
                          <label class="@error('apellitoPatNotario') border-danger text-danger @enderror">Primer Apellido</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('apellitoPatNotario') is-invalid @enderror" value="{{ old('apellitoPatNotario') }}" id="apellitoPatNotario" name="apellitoPatNotario" type="text" placeholder="Lopez" />
                        </div>
                        <div class="col-3">
                          <label class="@error('apellitoMatNotario') border-danger text-danger @enderror">Segundo Apellido</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('apellitoMatNotario') is-invalid @enderror" value="{{ old('apellitoMatNotario') }}" id="apellitoMatNotario" name="apellitoMatNotario" type="text" placeholder="Perez" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12">
                          <label class="@error('direccionNotario') border-danger text-danger @enderror">Dirección</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('direccionNotario') is-invalid @enderror" value="{{ old('direccionNotario') }}" name="direccionNotario" id="direccionNotario" type="text" placeholder="Calle..." />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-6">
                          <label class="@error('correoNotario') border-danger text-danger @enderror">Correo</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('correoNotario') is-invalid @enderror" value="{{ old('correoNotario') }}" name="correoNotario" id="correoNotario" type="text" placeholder="example@hotmail.com" />
                        </div>
                        <div class="col-3">
                            <label class="@error('telNotario') border-danger text-danger @enderror">Teléfono a 10 dígitos</label>
                            <input maxlength="10" class="multisteps-form__input form-control @error('telNotario') is-invalid @enderror" value="{{ old('telNotario') }}" onkeypress="return soloNumeros(event)" maxlength="10" name="telNotario" id="telNotario" type="text" placeholder="Teléfono" />
                        </div>
                        <div class="col-3">
                            <label class="@error('celNotario') border-danger text-danger @enderror">Celular a 10 dígitos</label>
                            <input maxlength="10" class="multisteps-form__input form-control @error('celNotario') is-invalid @enderror" value="{{ old('celNotario') }}" onkeypress="return soloNumeros(event)" maxlength="10" name="celNotario" id="celNotario" type="text" placeholder="Teléfono" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12">
                          <label class="@error('profesionNotario') border-danger text-danger @enderror">Profesion</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('profesionNotario') is-invalid @enderror" value="{{ old('profesionNotario') }}" name="profesionNotario" id="profesionNotario" type="text" placeholder="Lic..." />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-6">
                          <label class="@error('curpNotario') border-danger text-danger @enderror">CURP</label>
                          <input maxlength="18" class="multisteps-form__input form-control @error('curpNotario') is-invalid @enderror" value="{{ old('curpNotario') }}" name="curpNotario" id="curpNotario" type="text" placeholder="..." />
                        </div>
                        <div class="col-6">
                            <label class="@error('rfcNotario') border-danger text-danger @enderror">RFC</label>
                            <input maxlength="13" class="multisteps-form__input form-control @error('rfcNotario') is-invalid @enderror" value="{{ old('rfcNotario') }}" name="rfcNotario" id="rfcNotario" type="text" placeholder="..." />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-3">
                            <label class="@error('fechaNombNotario') border-danger text-danger @enderror">Fecha de nombramiento</label>
                            <input class="multisteps-form__input form-control @error('fechaNombNotario') is-invalid @enderror" value="{{ old('fechaNombNotario') }}" name="fechaNombNotario" id="fechaNombNotario" type="date" placeholder="..." />
                        </div>
                        <div class="col-12">
                          <label class="@error('fileNombramientoNotario') border-danger text-danger @enderror">Nombramiento</label>
                          <div  class="form-control dropzone @error('fileNombramientoNotario') is-invalid @enderror">
                            <div class="fallback">
                                <input name="fileNombramientoNotario" id="fileNombramientoNotario" type="file" required multiple />
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                          <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Anterior</button>
                          <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send" id="saveInfoNotaria">Guardar</button>
                          {{-- <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  {{-- <div class="card multisteps-form__panel p-3 border-radius-xl bg-white h-100" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Profile</h5>
                    <div class="multisteps-form__content mt-3">
                      <div class="row">
                        <div class="col-12">
                          <label>Public Email</label>
                          <input class="multisteps-form__input form-control" type="text" placeholder="Use an address you don't use frequently." />
                        </div>
                        <div class="col-12 mt-3">
                          <label>Bio</label>
                          <textarea class="multisteps-form__textarea form-control" rows="5" placeholder="Say a few words about who you are or what you're working on."></textarea>
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Send">Send</button>
                      </div>
                    </div>
                  </div> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  <script src="{{asset('js/core/popper.min.js')}}"></script>
  <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
  {{-- <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script> --}}
  <script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
  <!-- Kanban scripts -->
  <script src="{{asset('js/plugins/dragula/dragula.min.js')}}"></script>
  <script src="{{asset('js/plugins/jkanban/jkanban.js')}}"></script>
  <script src="{{ asset('js/plugins/multistep-form.js') }}" ></script>
  <script src="{{ asset('js/plugins/dropzone.min.js') }}" ></script>
  <script src="{{ asset('js/core/bootstrap.bundle.min.js') }}" ></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}" ></script>
  <script src="{{ asset('js/core/popper.min.js') }}" ></script>
  <script src="{{ asset('js/plugins/chartjs.min.js') }}" ></script>
  <script src="{{ asset('js/plugins/fullcalendar.min.js') }}" ></script>
  <script src="{{ asset('js/plugins/moment.min.js') }}" ></script>
  <script src="{{ asset('js/plugins/threejs.js') }}" ></script>
  <script src="{{ asset('js/plugins/quill.min.js') }}" ></script>
  <script src="{{ asset('js/plugins/amcharts/core.js') }}" ></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/argon-dashboard.min.js?v=2.0.5')}}"></script>
</body>

</html>
