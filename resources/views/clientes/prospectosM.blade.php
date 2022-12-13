@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-body">
            <h5 class="mb-0">Panel de prospectos</h5>
            {{-- <p class="text-sm mb-0">
              <div class="text-end ms-auto">
                <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewUser">
                  <i class="fas fa-plus pe-2"></i> Nuevo Usuario
                </button>
              </div>
            </p> --}}
            <input type="text" value="EditPersonaMoralProspecto" name="cClavePlantilla" id="cClavePlantilla" hidden>
            <div class="row" style="margin-bottom: 20px;">
              <div class="col-md-12">
                  <table class="table table-striped" id="gridProspectosM">
                  </table>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>

  </div>


{{-- Seccion de modal --}}

{{-- Modal edit Cliente Fisico --}}

<div class="modal fade bd-example-modal-lg" id="modalEditClienteM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
      </div>
      <div class="modal-body">

        {{-- <div id="infoClienteMoral"> --}}
            <div class="row mt-3">
                <div class="col-12">
                    <label class="form-label">Estatus del cliente</label>
                    <select class="form-control" name="clienteEstatusMorEdit" id="clienteEstatusMorEdit">
                        <option value="0">Selecciona una opcion</option>
                        <option value="1">Cliente</option>
                        <option value="2">Prospecto</option>
                        <option value="3">Interesado</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                  <label class="form-label">Razon Social
                  </label>
                  <div class="input-group">
                    <input id="clienteRazonSocialEdit" name="clienteRazonSocialEdit" class="form-control" type="text" placeholder="Empresa S.A. de C.V." required="required">
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-4">
                  <label class="form-label">Correo Electronico
                  </label>
                  <div class="input-group">
                    <input id="clienteCorreoMEdit" name="clienteCorreoMEdit" class="form-control" type="text" placeholder="example@hotmail.com" required="required">
                  </div>
                </div>
                <div class="col-4">
                  <label class="form-label">Numero Telefonico
                  </label>
                  <div class="input-group">
                    <input id="telClienteMEdit" name="telClienteMEdit" class="form-control" type="text" placeholder="969 123 4567" required="required">
                  </div>
                </div>
                <div class="col-4">
                  <label class="form-label">Numero Celular
                  </label>
                  <div class="input-group">
                    <input id="celClienteMEdit" name="celClienteMEdit" class="form-control" type="text" placeholder="999 123 4567" required="required">
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-6">
                  <label class="form-label">Domicilio Fiscal
                  </label>
                  <div class="input-group">
                    <input id="clienteDomicilioMEdit" name="clienteDomicilioMEdit" class="form-control" type="text" placeholder="Merida, Yucatan" required="required">
                  </div>
                </div>
                <div class="col-3">
                  <label class="form-label">Entidad Federativa
                  </label>
                  <div class="input-group">
                    <input id="clienteEntidadMEdit" name="clienteEntidadMEdit" class="form-control" type="text" placeholder="MEXICO" required="required">
                  </div>
                </div>
                <div class="col-3">
                  <label class="form-label">Codigo Postal
                  </label>
                  <div class="input-group">
                    <input id="clientCodigoPostMEdit" name="clientCodigoPostMEdit" class="form-control" type="number" placeholder="97300" required="required">
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-6">
                  <label class="form-label">RFC
                  </label>
                  <div class="input-group">
                    <input id="clienteRFCMEdit" name="clienteRFCMEdit" class="form-control" type="text" placeholder="..." required="required">
                  </div>
                </div>
                <div class="col-6">
                  <label class="form-label">Regimen Fiscal
                  </label>
                  <div class="input-group">
                    <input id="clienteRegimenMEdit" name="clienteRegimenMEdit" class="form-control" type="text" placeholder="..." required="required">
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-12">
                  <label class="form-label">Representante Legal
                  </label>
                  <div class="input-group">
                    <select class="form-control" name="clienteRepresentanteMEdit" id="clienteRepresentanteMEdit">
                      <option value="0">Selecciona una opcion</option>
                  </select>
                  </div>
                </div>
              </div>
      {{-- </div> --}}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnEditClienteMor" >Guardar</button>
      </div>
    </div>
  </div>
</div>

{{-- Fin Modal edit Cliente Fisico --}}

{{-- Fin seccion de modal --}}

@endsection
