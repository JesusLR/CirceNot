@extends('layouts.app')

@section('content')
@include('clientes.mesages')
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
  <input type="text" value="createCliente" name="cClavePlantilla" id="cClavePlantilla" hidden>
    <div class="row mb-5">
      <div class="col-12">
        <div class="multisteps-form mb-5">
          <!--progress bar-->
          <div class="row">
            <div class="col-12 col-lg-8 mx-auto my-4">
              <div class="card">
                <div class="card-body">
                  <div class="multisteps-form__progress">
                    <button class="multisteps-form__progress-btn js-active" type="button" title="Notaria"><span>Informacion General</span></button>
                    <button class="multisteps-form__progress-btn" type="button" title="Profile">Expediente</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-8 m-auto">
              <form class="multisteps-form__form mb-8" method="POST" action="{{route('createCliente')}}" accept-charset="UTF-8" enctype="multipart/form-data" id="formNewCliente" novalidate>
                  @csrf
                  <!--single form panel-->
                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                  <h5 class="font-weight-bolder mb-0">Notaria</h5>
                  <p class="mb-0 text-sm">Informacion General de la notaria</p>
                  <div class="multisteps-form__content">
                    <div class="row mt-3">
                        <div class="col-sm-6 col-6">
                            <label class="form-label">Tipo de cliente</label>
                            <select class="form-control" name="clienteTipo" id="clienteTipo">
                                <option value="0">Selecciona una opcion</option>
                                <option value="1">Fisica</option>
                                <option value="2">Moral</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-6">
                            <label class="form-label">Estatus del cliente</label>
                            <select class="form-control" name="clienteEstatus" id="clienteEstatus">
                                <option value="0">Selecciona una opcion</option>
                                <option value="1">Cliente</option>
                                <option value="2">Prospecto</option>
                                <option value="3">Interesado</option>
                            </select>
                        </div>
                    </div>

                    <div id="infoClienteFisica">
                        <div class="row mt-3">
                            <div class="col-4">
                              <label class="form-label">Nombre(s)
                              </label>
                              <div class="input-group">
                                <input id="clienteNombre" name="clienteNombre" class="form-control" type="text" placeholder="Juan" required="required">
                              </div>
                            </div>
                            <div class="col-4">
                              <label class="form-label">Apellido Paterno</label>
                              <div class="input-group">
                                <input id="clienteApellidoP" name="clienteApellidoP" class="form-control" type="text" placeholder="Lopez" required="required">
                              </div>
                            </div>
                            <div class="col-4">
                              <label class="form-label">Apellido Materno</label>
                              <div class="input-group">
                                <input id="clienteApellidoM" name="clienteApellidoM" class="form-control" type="text" placeholder="Perez" required="required">
                              </div>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label">Email Personal</label>
                                <div class="input-group">
                                  <input id="clienteEmail" name="clienteEmail" class="form-control" type="email" placeholder="example@email.com">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label">Numero Telefonico</label>
                                <div class="input-group">
                                  <input id="clienteTel" name="clienteTel" class="form-control" type="number" placeholder="969 000 0000">
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label">Numero Celular</label>
                                <div class="input-group">
                                  <input id="clienteCel" name="clienteCel" class="form-control" type="number" placeholder="999 100 0000">
                                </div>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-4">
                              <label class="form-label">CURP</label>
                              <input class="form-control" id="clienteCURP" name="clienteCURP" type="text" placeholder="CURP" />
                            </div>
                            <div class="col-4">
                              <label class="form-label">RFC</label>
                              <input class="form-control" id="clienteRFC" name="clienteRFC" type="text" placeholder="RFC" />
                            </div>
                            <div class="col-4">
                                <label class="form-label">Ocupacion</label>
                                <input class="form-control" id="clienteOcupacion" name="clienteOcupacion" type="text" placeholder="Lic..." />
                              </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-3">
                                <label class="form-label">Pais de Nacimiento</label>
                                <input class="form-control" id="clienteNac" name="clienteNac" type="text" placeholder="Mexico" />
                              </div>
                            <div class="col-3">
                              <label class="form-label">Estado Civil</label>
                              <input class="form-control" id="clienteCivil" name="clienteCivil" type="text" placeholder="Soltero/Casado" />
                            </div>
                            <div class="col-6">
                              <label class="form-label">Nombre completo del conyugue</label>
                              <input class="form-control" id="clienteCony" name="clienteCony" type="text" placeholder="Maria Lopez Sanchez" />
                            </div>
                          </div>

                          <div class="row mt-3">
                            <h5>Domicilio Actual</h5>
                          </div>

                          <div class="row mt-1">
                            <div class="col-3">
                                <label class="form-label">Calle</label>
                                <input class="form-control" id="clienteCalle" name="clienteCalle" type="text" placeholder="..." />
                              </div>
                            <div class="col-3">
                              <label class="form-label">Num. Ext.</label>
                              <input class="form-control" id="clienteNumEx" name="clienteNumEx" type="text" placeholder="..." />
                            </div>
                            <div class="col-3">
                              <label class="form-label">Num. Int</label>
                              <input class="form-control" id="clienteNumInt" name="clienteNumInt" type="text" placeholder="..." />
                            </div>
                            <div class="col-3">
                              <label class="form-label">Codigo Postal</label>
                              <input class="form-control" id="clienteCp" name="clienteCp" type="text" placeholder="..." />
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-4">
                                <label class="form-label">Colonia</label>
                                <input class="form-control" id="clienteColonia" name="clienteColonia" type="text" placeholder="..." />
                            </div>
                            <div class="col-4">
                              <label class="form-label">Ciudad</label>
                              <input class="form-control" id="clienteCiudad" name="clienteCiudad" type="text" placeholder="..." />
                            </div>
                            <div class="col-4">
                              <label class="form-label">Estado</label>
                              <input class="form-control" id="clienteEstado" name="clienteEstado" type="text" placeholder="..." />
                            </div>
                          </div>

                          <div class="row mt-3">
                            <h5>Domicilio Fiscal</h5>
                          </div>

                          <div class="row mt-1">
                            <div class="col-3">
                                <label class="form-label">Calle</label>
                                <input class="form-control" id="clienteCalleFisc" name="clienteCalleFisc" type="text" placeholder="..." />
                              </div>
                            <div class="col-3">
                              <label class="form-label">Num. Ext.</label>
                              <input class="form-control" id="clienteNumExFisc" name="clienteNumExFisc" type="text" placeholder="..." />
                            </div>
                            <div class="col-3">
                              <label class="form-label">Num. Int</label>
                              <input class="form-control" id="clienteNumIntFisc" name="clienteNumIntFisc" type="text" placeholder="..." />
                            </div>
                            <div class="col-3">
                              <label class="form-label">Codigo Postal</label>
                              <input class="form-control" id="clienteCpFisc" name="clienteCpFisc" type="text" placeholder="..." />
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-4">
                                <label class="form-label">Colonia</label>
                                <input class="form-control" id="clienteColoniaFisc" name="clienteColoniaFisc" type="text" placeholder="..." />
                            </div>
                            <div class="col-4">
                              <label class="form-label">Ciudad</label>
                              <input class="form-control" id="clienteCiudadFisc" name="clienteCiudadFisc" type="text" placeholder="..." />
                            </div>
                            <div class="col-4">
                              <label class="form-label">Estado</label>
                              <input class="form-control" id="clienteEstadoFisc" name="clienteEstadoFisc" type="text" placeholder="..." />
                            </div>
                          </div>
                    </div>

                    <div id="infoClienteMoral">
                        <div class="row mt-3">
                            <div class="col-12">
                              <label class="form-label">Razon Social
                              </label>
                              <div class="input-group">
                                <input id="clienteRazonSocial" name="clienteRazonSocial" class="form-control" type="text" placeholder="Empresa S.A. de C.V." required="required">
                              </div>
                            </div>
                          </div>
                          
                          <div class="row mt-3">
                            <div class="col-4">
                              <label class="form-label">Correo Electronico
                              </label>
                              <div class="input-group">
                                <input id="clienteCorreoM" name="clienteCorreoM" class="form-control" type="text" placeholder="example@hotmail.com" required="required">
                              </div>
                            </div>
                            <div class="col-4">
                              <label class="form-label">Numero Telefonico
                              </label>
                              <div class="input-group">
                                <input id="telClienteM" name="telClienteM" class="form-control" type="text" placeholder="969 123 4567" required="required">
                              </div>
                            </div>
                            <div class="col-4">
                              <label class="form-label">Numero Celular
                              </label>
                              <div class="input-group">
                                <input id="celClienteM" name="celClienteM" class="form-control" type="text" placeholder="999 123 4567" required="required">
                              </div>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-6">
                              <label class="form-label">Domicilio Fiscal
                              </label>
                              <div class="input-group">
                                <input id="clienteDomicilioM" name="clienteDomicilioM" class="form-control" type="text" placeholder="Merida, Yucatan" required="required">
                              </div>
                            </div>
                            <div class="col-3">
                              <label class="form-label">Entidad Federativa
                              </label>
                              <div class="input-group">
                                <input id="clienteEntidadM" name="clienteEntidadM" class="form-control" type="text" placeholder="MEXICO" required="required">
                              </div>
                            </div>
                            <div class="col-3">
                              <label class="form-label">Codigo Postal
                              </label>
                              <div class="input-group">
                                <input id="clientCodigoPostM" name="clientCodigoPostM" class="form-control" type="number" placeholder="97300" required="required">
                              </div>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-6">
                              <label class="form-label">RFC
                              </label>
                              <div class="input-group">
                                <input id="clienteRFCM" name="clienteRFCM" class="form-control" type="text" placeholder="..." required="required">
                              </div>
                            </div>
                            <div class="col-6">
                              <label class="form-label">Regimen Fiscal
                              </label>
                              <div class="input-group">
                                <input id="clienteRegimenM" name="clienteRegimenM" class="form-control" type="text" placeholder="..." required="required">
                              </div>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12">
                              <label class="form-label">Representante Legal
                              </label>
                              <div class="input-group">
                                <select class="form-control" name="clienteRepresentanteM" id="clienteRepresentanteM">
                                  <option value="0">Selecciona una opcion</option>
                              </select>
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
                    
                    <div id="infoClienteFisicaExpediente">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                            <label>Identificacion Oficial</label>
                            <div class="form-control dropzone">
                                <div class="fallback">
                                    <input name="clienteIdentificacionF" id="clienteIdentificacionF" type="file" multiple />
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                            <label>Acta de Nacimiento</label>
                            <div class="form-control dropzone">
                                <div class="fallback">
                                    <input name="clienteActaF" id="clienteActaF" type="file" multiple />
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                            <label>Comprobante Domiciliario</label>
                            <div class="form-control dropzone">
                                <div class="fallback">
                                    <input name="clienteComprobanteF" id="clienteComprobanteF" type="file" multiple />
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                            <label>Fecha de vencimiento del documento</label>
                            <div class="form-control dropzone">
                                <div class="fallback">
                                    <input name="clienteVencimientoF" id="clienteVencimientoF" type="file" multiple />
                                </div>
                            </div>
                        </div>
                      </div>

                  </div>

                  <div id="infoClienteMoralExpediente">
                    <div class="row mt-3">
                      <div class="col-12 col-sm-12">
                          <label>Acta Constitutiva</label>
                          <div class="form-control dropzone">
                              <div class="fallback">
                                  <input name="cleinteActaConstM" id="cleinteActaConstM" type="file" multiple />
                              </div>
                          </div>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-12 col-sm-12">
                          <label>Documentacion de representacion legal</label>
                          <div class="form-control dropzone">
                              <div class="fallback">
                                  <input name="clienteRepresentacionDocM" id="clienteRepresentacionDocM" type="file" multiple />
                              </div>
                          </div>
                      </div>
                    </div>

                </div>

                    <div class="button-row d-flex mt-4">
                      <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Anterior">Anterior</button>
                      <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send" id="saveInfoCliente">Guardar</button>
                    </div>
                  </div>
                </div>


              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
