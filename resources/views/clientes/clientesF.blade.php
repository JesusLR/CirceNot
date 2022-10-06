@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h5 class="mb-0">Panel de clientes</h5>
            {{-- <p class="text-sm mb-0">
              <div class="text-end ms-auto">
                <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewUser">
                  <i class="fas fa-plus pe-2"></i> Nuevo Usuario
                </button>
              </div>
            </p> --}}
          </div>
          <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <table class="table table-striped" id="gridClientesF">
                </table>
            </div>
        </div>
        </div>
      </div>
    </div>

  </div>

   
{{-- Seccion de modal --}}

{{-- Modal edit Cliente Fisico --}}

<div class="modal fade bd-example-modal-lg" id="modalEditClienteF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
      </div>
      <div class="modal-body">
         
        <div id="infoClienteFisica">
          <div class="row mt-3">
            <div class="col-12">
                <label class="form-label">Estatus del cliente</label>
                <select class="form-control" name="clienteEstatusFisicEdit" id="clienteEstatusFisicEdit">
                    <option value="0">Selecciona una opcion</option>
                    <option value="1">Cliente</option>
                    <option value="2">Prospecto</option>
                    <option value="3">Interesado</option>
                </select>
            </div>
        </div>
          <div class="row mt-3">
              <div class="col-4">
                <label class="form-label">Nombre(s)
                </label>
                <div class="input-group">
                  <input id="clienteNombreEdit" name="clienteNombreEdit" class="form-control" type="text" placeholder="Juan" required="required">
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Apellido Paterno</label>
                <div class="input-group">
                  <input id="clienteApellidoPEdit" name="clienteApellidoPEdit" class="form-control" type="text" placeholder="Lopez" required="required">
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Apellido Materno</label>
                <div class="input-group">
                  <input id="clienteApellidoMEdit" name="clienteApellidoMEdit" class="form-control" type="text" placeholder="Perez" required="required">
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6">
                  <label class="form-label">Email Personal</label>
                  <div class="input-group">
                    <input id="clienteEmailEdit" name="clienteEmailEdit" class="form-control" type="email" placeholder="example@email.com">
                  </div>
              </div>
              <div class="col-3">
                  <label class="form-label">Numero Telefonico</label>
                  <div class="input-group">
                    <input id="clienteTelEdit" name="clienteTelEdit" class="form-control" type="number" placeholder="969 000 0000">
                  </div>
              </div>
              <div class="col-3">
                  <label class="form-label">Numero Celular</label>
                  <div class="input-group">
                    <input id="clienteCelEdit" name="clienteCelEdit" class="form-control" type="number" placeholder="999 100 0000">
                  </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-4">
                <label class="form-label">CURP</label>
                <input class="form-control" id="clienteCURPEdit" name="clienteCURPEdit" type="text" placeholder="CURP" />
              </div>
              <div class="col-4">
                <label class="form-label">RFC</label>
                <input class="form-control" id="clienteRFCEdit" name="clienteRFCEdit" type="text" placeholder="RFC" />
              </div>
              <div class="col-4">
                  <label class="form-label">Ocupacion</label>
                  <input class="form-control" id="clienteOcupacionEdit" name="clienteOcupacionEdit" type="text" placeholder="Lic..." />
                </div>
            </div>
            <div class="row mt-3">
              <div class="col-3">
                  <label class="form-label">Pais de Nacimiento</label>
                  <input class="form-control" id="clienteNacEdit" name="clienteNacEdit" type="text" placeholder="Mexico" />
                </div>
              <div class="col-3">
                <label class="form-label">Estado Civil</label>
                <input class="form-control" id="clienteCivilEdit" name="clienteCivilEdit" type="text" placeholder="Soltero/Casado" />
              </div>
              <div class="col-6">
                <label class="form-label">Nombre completo del conyugue</label>
                <input class="form-control" id="clienteConyEdit" name="clienteConyEdit" type="text" placeholder="Maria Lopez Sanchez" />
              </div>
            </div>

            <div class="row mt-3">
              <h5>Domicilio Actual</h5>
            </div>

            <div class="row mt-1">
              <div class="col-3">
                  <label class="form-label">Calle</label>
                  <input class="form-control" id="clienteCalleEdit" name="clienteCalleEdit" type="text" placeholder="..." />
                </div>
              <div class="col-3">
                <label class="form-label">Num. Ext.</label>
                <input class="form-control" id="clienteNumExEdit" name="clienteNumExEdit" type="text" placeholder="..." />
              </div>
              <div class="col-3">
                <label class="form-label">Num. Int</label>
                <input class="form-control" id="clienteNumIntEdit" name="clienteNumIntEdit" type="text" placeholder="..." />
              </div>
              <div class="col-3">
                <label class="form-label">Codigo Postal</label>
                <input class="form-control" id="clienteCpEdit" name="clienteCpEdit" type="text" placeholder="..." />
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-4">
                  <label class="form-label">Colonia</label>
                  <input class="form-control" id="clienteColoniaEdit" name="clienteColoniaEdit" type="text" placeholder="..." />
              </div>
              <div class="col-4">
                <label class="form-label">Ciudad</label>
                <input class="form-control" id="clienteCiudadEdit" name="clienteCiudadEdit" type="text" placeholder="..." />
              </div>
              <div class="col-4">
                <label class="form-label">Estado</label>
                <input class="form-control" id="clienteEstadoEdit" name="clienteEstadoEdit" type="text" placeholder="..." />
              </div>
            </div>

            <div class="row mt-3">
              <h5>Domicilio Fiscal</h5>
            </div>

            <div class="row mt-1">
              <div class="col-3">
                  <label class="form-label">Calle</label>
                  <input class="form-control" id="clienteCalleFiscEdit" name="clienteCalleFiscEdit" type="text" placeholder="..." />
                </div>
              <div class="col-3">
                <label class="form-label">Num. Ext.</label>
                <input class="form-control" id="clienteNumExFiscEdit" name="clienteNumExFiscEdit" type="text" placeholder="..." />
              </div>
              <div class="col-3">
                <label class="form-label">Num. Int</label>
                <input class="form-control" id="clienteNumIntFiscEdit" name="clienteNumIntFiscEdit" type="text" placeholder="..." />
              </div>
              <div class="col-3">
                <label class="form-label">Codigo Postal</label>
                <input class="form-control" id="clienteCpFiscEdit" name="clienteCpFiscEdit" type="text" placeholder="..." />
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-4">
                  <label class="form-label">Colonia</label>
                  <input class="form-control" id="clienteColoniaFiscEdit" name="clienteColoniaFiscEdit" type="text" placeholder="..." />
              </div>
              <div class="col-4">
                <label class="form-label">Ciudad</label>
                <input class="form-control" id="clienteCiudadFiscEdit" name="clienteCiudadFiscEdit" type="text" placeholder="..." />
              </div>
              <div class="col-4">
                <label class="form-label">Estado</label>
                <input class="form-control" id="clienteEstadoFiscEdit" name="clienteEstadoFiscEdit" type="text" placeholder="..." />
              </div>
            </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnEditClienteFis" >Guardar</button>
      </div>
    </div>
  </div>
</div>

{{-- Fin Modal edit Cliente Fisico --}}

{{-- Fin seccion de modal --}}
  
@endsection
