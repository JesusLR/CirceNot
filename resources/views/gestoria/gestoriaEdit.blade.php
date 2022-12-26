@extends('layouts.app')

@section('content')
    {{-- @include('clientes.mesages') --}}
    <style>
        input[type="text"] {
            text-transform: uppercase;
        }

        textarea {
            text-transform: uppercase;
            max-height: 110px !important;
        }


        /*Time line */
    </style>
    <div class="container-fluid py-4">
        {{-- @include('admin.mesages') --}}
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
                <form class="multisteps-form__form mb-8" method="POST" action="{{route('update_Gestoria')}}" accept-charset="UTF-8" enctype="multipart/form-data" id="formInfoNotariaEdit" novalidate>
                    @csrf
                    <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder mb-0">Notaría</h5>
                    <p class="mb-0 text-sm">Editar la información General de la notaría</p>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label class="@error('nomNotariaEdit') border-danger text-danger @enderror">Nombre de la notaría</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('nomNotariaEdit') is-invalid @enderror"  value="{{$gestoria->cNombreGestoria}}" name="nomNotariaEdit" id="nomNotariaEdit" type="text" placeholder="Nombre" />
                                {{-- @error('nomNotariaEdit')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror --}}
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label class="@error('numNotariaEdit') border-danger text-danger @enderror">Número de notaría</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('numNotariaEdit') is-invalid @enderror" value="{{ $gestoria->iNumGestoria }}" name="numNotariaEdit" id="numNotariaEdit" type="number" placeholder="... " />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                          <label class="@error('domicilioNotariaEdit') border-danger text-danger @enderror">Domicilio</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('domicilioNotariaEdit') is-invalid @enderror" name="domicilioNotariaEdit" id="domicilioNotariaEdit" type="text" value="{{ $gestoria->cDomicilioGestoria }}" placeholder="Calle... " />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label class="@error('emailNotariaEdit') border-danger text-danger @enderror">Correo electrónico</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('emailNotariaEdit') is-invalid @enderror" value="{{ $gestoria->cEmailGestoria }}" name="emailNotariaEdit" id="emailNotariaEdit" type="email" placeholder="Correo" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label class="@error('telNotariaEdit') border-danger text-danger @enderror">Teléfono</label>
                          <input class="multisteps-form__input form-control @error('telNotariaEdit') is-invalid @enderror" value="{{ $gestoria->iTelGestoria }}" maxlength="10" onkeypress="return soloNumeros(event)" name="telNotariaEdit" id="telNotariaEdit" type="text" placeholder="Teléfono" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                            <label class="@error('logoNotariaEdit') border-danger text-danger @enderror">Logotipo</label>
                            <div class="form-control dropzone @error('logoNotariaEdit') is-invalid @enderror">
                                <div class="fallback">
                                    <input name="logoNotariaEdit" id="logoNotariaEdit" type="file" multiple />
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
                                <input class="form-check-input" type="checkbox" name="checkProtocoloAbiertoEdit" id="checkProtocoloAbiertoEdit">
                                <label class="custom-control-label" for="checkProtocoloAbiertoEdit">Protocolo Abierto</label>
                            </div>
                            <input type="text" id="valCheckHiddenPA" value="{{$gestoria->lPA}}" hidden>
                        </div>
                      </div>
                      {{-- Apartado protocolo abierto --}}
                      <div class="row mt-3" id="divProtocoloAbiertoEdit">
                        <div class="col-12 col-sm-6">
                          <label>Libro</label>
                          <input maxlength="255" value="{{$gestoria->cPA_Libro}}" class="multisteps-form__input form-control" name="numLibroProtocoloEdit" id="numLibroProtocoloEdit" type="text" placeholder="Libro..." />
                        </div>
                        <div class="col-12 col-sm-6 ">
                          <label>Acta</label>
                          <input maxlength="255" value="{{$gestoria->cPA_Acta}}" class="multisteps-form__input form-control" name="numActaProtocoloEdit" id="numActaProtocoloEdit" type="text" placeholder="Acta..." />
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <label>Foja Inicial</label>
                            <input maxlength="11" value="{{$gestoria->iPA_FojaInic}}" class="multisteps-form__input form-control" name="numFojaIniProtocoloEdit" id="numFojaIniProtocoloEdit" type="number" placeholder="0..." />
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <label>Foja Final</label>
                            <input maxlength="11" value="{{$gestoria->iPA_FojaFin}}" class="multisteps-form__input form-control" name="numFojaFinProtocoloEdit" id="numFojaFinProtocoloEdit" type="number" placeholder="0..." />
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
                          <label class="@error('nomNotarioEdit') border-danger text-danger @enderror">Nombre(s)</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('nomNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->cNombreTitular}}" id="nomNotarioEdit" name="nomNotarioEdit" type="text" placeholder="Nombre(s)" />
                        </div>
                        <div class="col-3">
                          <label class="@error('apellitoPatNotarioEdit') border-danger text-danger @enderror">Primer Apellido</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('apellitoPatNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->cApellidoPatTitular}}" id="apellitoPatNotarioEdit" name="apellitoPatNotarioEdit" type="text" placeholder="Lopez" />
                        </div>
                        <div class="col-3">
                          <label class="@error('apellitoMatNotarioEdit') border-danger text-danger @enderror">Segundo Apellido</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('apellitoMatNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->cApellidoMatTitular}}" id="apellitoMatNotarioEdit" name="apellitoMatNotarioEdit" type="text" placeholder="Perez" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12">
                          <label class="@error('direccionNotarioEdit') border-danger text-danger @enderror">Dirección</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('direccionNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->cDireccion}}" name="direccionNotarioEdit" id="direccionNotarioEdit" type="text" placeholder="Calle..." />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-6">
                          <label class="@error('correoNotarioEdit') border-danger text-danger @enderror">Correo</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('correoNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->cCorreo}}" name="correoNotarioEdit" id="correoNotarioEdit" type="text" placeholder="example@hotmail.com" />
                        </div>
                        <div class="col-3">
                            <label class="@error('telNotarioEdit') border-danger text-danger @enderror">Teléfono a 10 dígitos</label>
                            <input maxlength="10" class="multisteps-form__input form-control @error('telNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->iTelefono}}" onkeypress="return soloNumeros(event)" maxlength="10" name="telNotarioEdit" id="telNotarioEdit" type="text" placeholder="Teléfono" />
                        </div>
                        <div class="col-3">
                            <label class="@error('celNotarioEdit') border-danger text-danger @enderror">Celular a 10 dígitos</label>
                            <input maxlength="10" class="multisteps-form__input form-control @error('celNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->iCelular}}" onkeypress="return soloNumeros(event)" maxlength="10" name="celNotarioEdit" id="celNotarioEdit" type="text" placeholder="Teléfono" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12">
                          <label class="@error('profesionNotarioEdit') border-danger text-danger @enderror">Profesion</label>
                          <input maxlength="255" class="multisteps-form__input form-control @error('profesionNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->cProfesionTitular}}" name="profesionNotarioEdit" id="profesionNotarioEdit" type="text" placeholder="Lic..." />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-6">
                          <label class="@error('curpNotarioEdit') border-danger text-danger @enderror">CURP</label>
                          <input maxlength="18" class="multisteps-form__input form-control @error('curpNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->cCURP}}" name="curpNotarioEdit" id="curpNotarioEdit" type="text" placeholder="..." />
                        </div>
                        <div class="col-6">
                            <label class="@error('rfcNotarioEdit') border-danger text-danger @enderror">RFC</label>
                            <input maxlength="13" class="multisteps-form__input form-control @error('rfcNotarioEdit') is-invalid @enderror" value="{{$gestoriaPatente->cRFC}}" name="rfcNotarioEdit" id="rfcNotarioEdit" type="text" placeholder="..." />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-3">
                            <label class="@error('fechaNombNotarioEdit') border-danger text-danger @enderror">Fecha de nombramiento</label>
                            <input class="multisteps-form__input form-control @error('fechaNombNotarioEdit') is-invalid @enderror" value="" name="fechaNombNotarioEdit" id="fechaNombNotarioEdit" type="date" placeholder="..." />
                        </div>
                        <div class="col-12">
                          <label class="@error('fileNombramientoNotarioEdit') border-danger text-danger @enderror">Nombramiento</label>
                          <div  class="form-control dropzone @error('fileNombramientoNotarioEdit') is-invalid @enderror">
                            <div class="fallback">
                                <input name="fileNombramientoNotarioEdit" id="fileNombramientoNotarioEdit" type="file" required multiple />
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                          <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Anterior</button>
                          <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send" id="saveInfoNotariaEdit">Guardar</button>
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

    <script>
        $(document).ready(function() {
            $lPA = $('#valCheckHiddenPA').val()
            if($lPA == 1){
                $('#checkProtocoloAbiertoEdit').prop('checked', true);
                $('#checkProtocoloAbiertoEdit').val(1)
                $("#divProtocoloAbiertoEdit").show();
            }else{
                $('#checkProtocoloAbiertoEdit').prop('checked',false);
                $('#checkProtocoloAbiertoEdit').val(0)
                $("#divProtocoloAbiertoEdit").hide();
            }
        })

        $('#checkProtocoloAbiertoEdit').on('change', function () {
            if($('#checkProtocoloAbiertoEdit').prop('checked') == true){
                $("#divProtocoloAbiertoEdit").show();
            }else{
                $("#divProtocoloAbiertoEdit").hide();
            }
        });

    </script>
@endsection
