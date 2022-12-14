@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-body">
                        <h5 class="mb-0">Panel de clientes</h5>
                        <p class="text-sm mb-0">
                        <div class="ms-auto">

                            <div class="row mt-3 justify-content-between">
                                <div class="col-3">
                                    <label class="form-label">Nombre</label>
                                        <input id="clienteBuscadorNombre" name="clienteBuscadorNombre" class="form-control" type="text"
                                            placeholder="Nombre de ususario">
                                </div>
                                <div class="col-2">
                                    <label class="form-label">Tipo de persona</label>
                                    <select class="form-control" name="filtroTipoPersonaGrid"
                                        id="filtroTipoPersonaGrid">
                                        <option value="0">Selecciona una opcion</option>
                                        <option value="1" selected>Fisica</option>
                                        <option value="2">Moral</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label class="form-label">Tipo de cliente</label>
                                    <select class="form-control" name="filtroTipoClienteGrid"
                                        id="filtroTipoClienteGrid">
                                        <option value="0">Selecciona una opcion</option>
                                        <option value="1" selected>Cliente</option>
                                        <option value="2">Prospecto</option>
                                        <option value="3">Interesado</option>
                                    </select>
                                </div>
                                <div class="col-2 align-self-end">
                                    <button class="btn btn-xs btn-primary mb-0" id="btnBusquedaCliente">
                                        <i class="fas fa-search pe-2"></i>Buscar
                                    </button>

                                </div>
                                <div class="col-2 align-self-end">
                                    <a href="{{ route('nuevo_cliente') }}" class="btn btn-xs btn-primary mb-0" id="btnNewCliente">
                                        <i class="fas fa-plus pe-2"></i>Nuevo Cliente
                                    </a>
                                </div>
                            </div>


                        </div>
                        </p>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-12">
                                <table class="table table-striped" id="gridClientes">
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

    <div class="modal fade bd-example-modal-lg" id="modalEditClienteF" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input id="clienteNombreEdit" name="clienteNombreEdit" class="form-control"
                                        type="text" placeholder="Juan" required="required">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Primer Apellido</label>
                                <div class="input-group">
                                    <input id="clienteApellidoPEdit" name="clienteApellidoPEdit" class="form-control"
                                        type="text" placeholder="Lopez" required="required">
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Segundo Apellido</label>
                                <div class="input-group">
                                    <input id="clienteApellidoMEdit" name="clienteApellidoMEdit" class="form-control"
                                        type="text" placeholder="Perez" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label">Email Personal</label>
                                <div class="input-group">
                                    <input id="clienteEmailEdit" name="clienteEmailEdit" class="form-control" type="email"
                                        placeholder="example@email.com">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label">Numero Telefonico</label>
                                <div class="input-group">
                                    <input id="clienteTelEdit" name="clienteTelEdit" class="form-control" type="number"
                                        placeholder="969 000 0000">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label">Numero Celular</label>
                                <div class="input-group">
                                    <input id="clienteCelEdit" name="clienteCelEdit" class="form-control" type="number"
                                        placeholder="999 100 0000">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label class="form-label">CURP</label>
                                <input class="form-control" id="clienteCURPEdit" name="clienteCURPEdit" type="text"
                                    placeholder="CURP" />
                            </div>
                            <div class="col-4">
                                <label class="form-label">RFC</label>
                                <input class="form-control" id="clienteRFCEdit" name="clienteRFCEdit" type="text"
                                    placeholder="RFC" />
                            </div>
                            <div class="col-4">
                                <label class="form-label">Ocupacion</label>
                                <input class="form-control" id="clienteOcupacionEdit" name="clienteOcupacionEdit"
                                    type="text" placeholder="Lic..." />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <label class="form-label">Pais de Nacimiento</label>
                                <input class="form-control" id="clienteNacEdit" name="clienteNacEdit" type="text"
                                    placeholder="Mexico" />
                            </div>
                            <div class="col-3">
                                <label class="form-label">Estado Civil</label>
                                <input class="form-control" id="clienteCivilEdit" name="clienteCivilEdit" type="text"
                                    placeholder="Soltero/Casado" />
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nombre completo del conyugue</label>
                                <input class="form-control" id="clienteConyEdit" name="clienteConyEdit" type="text"
                                    placeholder="Maria Lopez Sanchez" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <h5>Domicilio Actual</h5>
                        </div>

                        <div class="row mt-1">
                            <div class="col-3">
                                <label class="form-label">Calle</label>
                                <input class="form-control" id="clienteCalleEdit" name="clienteCalleEdit" type="text"
                                    placeholder="..." />
                            </div>
                            <div class="col-3">
                                <label class="form-label">Num. Ext.</label>
                                <input class="form-control" id="clienteNumExEdit" name="clienteNumExEdit" type="text"
                                    placeholder="..." />
                            </div>
                            <div class="col-3">
                                <label class="form-label">Num. Int</label>
                                <input class="form-control" id="clienteNumIntEdit" name="clienteNumIntEdit"
                                    type="text" placeholder="..." />
                            </div>
                            <div class="col-3">
                                <label class="form-label">Codigo Postal</label>
                                <input class="form-control" id="clienteCpEdit" name="clienteCpEdit" type="text"
                                    placeholder="..." />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <label class="form-label">Colonia</label>
                                <input class="form-control" id="clienteColoniaEdit" name="clienteColoniaEdit"
                                    type="text" placeholder="..." />
                            </div>
                            <div class="col-4">
                                <label class="form-label">Ciudad</label>
                                <input class="form-control" id="clienteCiudadEdit" name="clienteCiudadEdit"
                                    type="text" placeholder="..." />
                            </div>
                            <div class="col-4">
                                <label class="form-label">Estado</label>
                                <input class="form-control" id="clienteEstadoEdit" name="clienteEstadoEdit"
                                    type="text" placeholder="..." />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <h5>Domicilio Fiscal</h5>
                        </div>

                        <div class="row mt-1">
                            <div class="col-3">
                                <label class="form-label">Calle</label>
                                <input class="form-control" id="clienteCalleFiscEdit" name="clienteCalleFiscEdit"
                                    type="text" placeholder="..." />
                            </div>
                            <div class="col-3">
                                <label class="form-label">Num. Ext.</label>
                                <input class="form-control" id="clienteNumExFiscEdit" name="clienteNumExFiscEdit"
                                    type="text" placeholder="..." />
                            </div>
                            <div class="col-3">
                                <label class="form-label">Num. Int</label>
                                <input class="form-control" id="clienteNumIntFiscEdit" name="clienteNumIntFiscEdit"
                                    type="text" placeholder="..." />
                            </div>
                            <div class="col-3">
                                <label class="form-label">Codigo Postal</label>
                                <input class="form-control" id="clienteCpFiscEdit" name="clienteCpFiscEdit"
                                    type="text" placeholder="..." />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <label class="form-label">Colonia</label>
                                <input class="form-control" id="clienteColoniaFiscEdit" name="clienteColoniaFiscEdit"
                                    type="text" placeholder="..." />
                            </div>
                            <div class="col-4">
                                <label class="form-label">Ciudad</label>
                                <input class="form-control" id="clienteCiudadFiscEdit" name="clienteCiudadFiscEdit"
                                    type="text" placeholder="..." />
                            </div>
                            <div class="col-4">
                                <label class="form-label">Estado</label>
                                <input class="form-control" id="clienteEstadoFiscEdit" name="clienteEstadoFiscEdit"
                                    type="text" placeholder="..." />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnEditClienteFis">Guardar</button>
                </div>
            </div>
        </div>
    </div>

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
