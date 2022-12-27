@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-body">
            <h5 class="mb-0">Panel de servicios</h5>
            {{-- <p class="text-sm mb-0">
              <div class="text-end ms-auto">
                <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewUser">
                  <i class="fas fa-plus pe-2"></i> Nuevo Usuario
                </button>
              </div>
            </p> --}}

          <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <table class="table table-striped" id="gridServices">
                </table>
            </div>
        </div>
    </div>
        </div>
      </div>
    </div>

  </div>





    {{-- Modal editar usuario --}}
<div class="modal fade bd-example-modal-lg" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Servicio
        </h5>
      </div> --}}
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-lg-12 m-auto">

                <h5 class="font-weight-bolder mb-0">Servicio</h5>
                <p class="mb-0 text-sm">Información General del servicio</p>
                <input type="text" value="" name="idServiceE" id="idServiceE" hidden>
                <div class="multisteps-form__content">

                  <div id="infoClienteFisica">
                      <div class="row mt-3">
                          <div class="col-10">
                            <label class="form-label">Nombre del servicio
                            </label>
                            <div class="input-group">
                              <input id="nameServiceE" maxlength="150" name="nameService" class="form-control" type="text" placeholder="Nombre del servicio" required="required">
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-10">
                              <label class="form-label">Descripción</label>
                              <div class="input-group">
                                <input id="descriptionE" maxlength="250" name="descriptionE" class="form-control" type="text" placeholder="Descripción">
                              </div>
                          </div>
                          <div class="col-sm-6 col-6">
                              <label class="form-label">Tipo de servicio</label>
                              <select class="form-control" name="typeServiceE" id="typeServiceE">
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
                              <input class="form-control" id="servicePriceE" name="servicePrice" type="number" placeholder="$" />
                            </div>

                        </div>
                      {{-- </form>
                        <div class="button-row d-flex mt-4">
                          <button class="btn bg-gradient-dark ms-auto mb-0"  title="Send" id="saveInfoService">Guardar</button>
                      </div> --}}


                  </div>




              </div>
            </div>


                </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnUpdateService" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
{{-- fin modal editar usuario --}}




@endsection
