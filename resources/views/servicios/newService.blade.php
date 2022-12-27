@extends('layouts.app')

@section('content')
@include('servicios.mesages')
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
<div class="container-fluid">
  <input type="text" value="createService" name="cService" id="cService" hidden>
    <div class="row mb-5">
      <div class="col-12">
        <div class="multisteps-form mb-5">
          <!--progress bar-->
          <div class="row">
            <div class="col-12 col-lg-8 mx-auto my-4">
              <div class="card">
                <div class="card-body">
                  <div class="multisteps-form__progress">
                    <button class="multisteps-form__progress-btn js-active" type="button" title="Servicios"><span>Información General</span></button>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-8 m-auto">
              <form   class="multisteps-form__form mb-8" accept-charset="UTF-8" enctype="multipart/form-data" id="formNewService" >
                  <!--single form panel-->
                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                  <h5 class="font-weight-bolder mb-0">Servicio</h5>
                  <p class="mb-0 text-sm">Información General del servicio</p>
                  <div class="multisteps-form__content">

                    <div id="infoClienteFisica">
                        <div class="row mt-3">
                            <div class="col-10">
                              <label class="form-label">Nombre del servicio
                              </label>
                              <div class="input-group">
                                <input id="nameService" maxlength="150" name="nameService" class="form-control" type="text" placeholder="Nombre del servicio" required="required">
                              </div>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-10">
                                <label class="form-label">Descripción</label>
                                <div class="input-group">
                                  <input id="description" maxlength="250" name="description" class="form-control" type="text" placeholder="Descripción">
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <label class="form-label">Tipo de servicio</label>
                                <select class="form-control" name="typeService" id="typeService">
                                    <option value="0">Selecciona una opcion</option>
                                    <option value="1">Certificación de documentos</option>
                                    <option value="2">Contratos</option>
                                    <option value="3">Poderes</option>
                                    <option value="4">Asamblea</option>
                                    <option value="5">Actas Notariales</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Costo</label>
                                <input class="form-control" id="servicePrice" name="servicePrice" type="number" placeholder="$" />
                              </div>

                          </div>
                        </form>
                          <div class="button-row d-flex mt-4">
                            <button class="btn bg-gradient-dark ms-auto mb-0"  title="Send" id="saveInfoService">Guardar</button>
                        </div>


                    </div>


                  </div>

                </div>
              </div>


                  </div>
                </div>



            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
