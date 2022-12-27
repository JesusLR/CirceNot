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
                                        <button class="multisteps-form__progress-btn js-active" type="button"
                                            title="Notaria"><span>Información General</span></button>
                                        <button class="multisteps-form__progress-btn" type="button"
                                            title="Profile">Expediente</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--form panels-->
                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <form class="multisteps-form__form mb-8" method="POST" action="{{ route('createCliente') }}"
                                accept-charset="UTF-8" enctype="multipart/form-data" id="formNewCliente" novalidate>
                                @csrf
                                <!--single form panel-->
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                    data-animation="FadeIn">
                                    <h5 class="font-weight-bolder mb-0">Clientes</h5>
                                    <p class="mb-0 text-sm">Registrar información de nuevo cliente o prospecto</p>
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
                                                        <input id="clienteNombre" maxlength="255" name="clienteNombre"
                                                            class="form-control" type="text" placeholder="Juan"
                                                           >
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Primer Apellido</label>
                                                    <div class="input-group">
                                                        <input id="clienteApellidoP" maxlength="255" name="clienteApellidoP"
                                                            class="form-control" type="text" placeholder="Lopez"
                                                           >
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Segundo Apellido</label>
                                                    <div class="input-group">
                                                        <input id="clienteApellidoM" maxlength="255" name="clienteApellidoM"
                                                            class="form-control" type="text" placeholder="Perez"
                                                           >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-6">
                                                    <label class="form-label">Email Personal</label>
                                                    <div class="input-group">
                                                        <input id="clienteEmail" maxlength="255" name="clienteEmail"
                                                            class="form-control" type="email"
                                                            placeholder="example@email.com">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Número Telefónico</label>
                                                    <div class="input-group">
                                                        <input id="clienteTel" maxlength="10"
                                                            onkeypress="return soloNumeros(event)" name="clienteTel"
                                                            class="form-control" type="text"
                                                            placeholder="969 000 0000">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Número Celular</label>
                                                    <div class="input-group">
                                                        <input id="clienteCel" name="clienteCel" maxlength="10"
                                                            onkeypress="return soloNumeros(event)" class="form-control"
                                                            type="text" placeholder="999 100 0000">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-4">
                                                    <label class="form-label">CURP</label>
                                                    <input class="form-control" maxlength="18" id="clienteCURP"
                                                        name="clienteCURP" type="text" placeholder="CURP" />
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">RFC</label>
                                                    <input class="form-control" maxlength="13" id="clienteRFC"
                                                        name="clienteRFC" type="text" placeholder="RFC" />
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Ocupación</label>
                                                    <input class="form-control" maxlength="255" id="clienteOcupacion"
                                                        name="clienteOcupacion" type="text" placeholder="Lic..." />
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-3">
                                                    <label class="form-label">País de Nacimiento</label>
                                                    <input class="form-control" maxlength="255" id="clienteNac"
                                                        name="clienteNac" type="text" placeholder="Mexico" />
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Estado Civil</label>
                                                    <input class="form-control" maxlength="255" id="clienteCivil"
                                                        name="clienteCivil" type="text"
                                                        placeholder="Soltero/Casado" />
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Nombre completo del cónyugue</label>
                                                    <input class="form-control" maxlength="255" id="clienteCony"
                                                        name="clienteCony" type="text"
                                                        placeholder="Maria Lopez Sanchez" />
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <h5>Domicilio Actual</h5>
                                            </div>

                                            <div class="row mt-1">
                                                <div class="col-3">
                                                    <label class="form-label">Calle</label>
                                                    <input class="form-control" maxlength="255" id="clienteCalle"
                                                        name="clienteCalle" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Núm. Ext.</label>
                                                    <input class="form-control" maxlength="255" id="clienteNumEx"
                                                        name="clienteNumEx" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Núm. Int</label>
                                                    <input class="form-control" maxlength="255" id="clienteNumInt"
                                                        name="clienteNumInt" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Código Postal</label>
                                                    <input class="form-control" maxlength="5"
                                                        onkeypress="return soloNumeros(event)" id="clienteCp"
                                                        name="clienteCp" type="text" placeholder="..." />
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-4">
                                                    <label class="form-label">Colonia</label>
                                                    <input class="form-control" maxlength="255" id="clienteColonia"
                                                        name="clienteColonia" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Ciudad</label>
                                                    <input class="form-control" maxlength="255" id="clienteCiudad"
                                                        name="clienteCiudad" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Estado</label>
                                                    <input class="form-control" maxlength="255" id="clienteEstado"
                                                        name="clienteEstado" type="text" placeholder="..." />
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <h5>Domicilio Fiscal</h5>
                                            </div>

                                            <div class="row mt-1">
                                                <div class="col-3">
                                                    <label class="form-label">Calle</label>
                                                    <input class="form-control" maxlength="255" id="clienteCalleFisc"
                                                        name="clienteCalleFisc" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Núm. Ext.</label>
                                                    <input class="form-control" maxlength="255" id="clienteNumExFisc"
                                                        name="clienteNumExFisc" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Núm. Int</label>
                                                    <input class="form-control" maxlength="255" id="clienteNumIntFisc"
                                                        name="clienteNumIntFisc" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Código Postal</label>
                                                    <input class="form-control" maxlength="5"
                                                        onkeypress="return soloNumeros(event)" id="clienteCpFisc"
                                                        name="clienteCpFisc" type="text" placeholder="..." />
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-4">
                                                    <label class="form-label">Colonia</label>
                                                    <input class="form-control" maxlength="255" id="clienteColoniaFisc"
                                                        name="clienteColoniaFisc" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Ciudad</label>
                                                    <input class="form-control" maxlength="255" id="clienteCiudadFisc"
                                                        name="clienteCiudadFisc" type="text" placeholder="..." />
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Estado</label>
                                                    <input class="form-control" maxlength="255" id="clienteEstadoFisc"
                                                        name="clienteEstadoFisc" type="text" placeholder="..." />
                                                </div>
                                            </div>
                                        </div>

                                        <div id="infoClienteMoral">
                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <label class="form-label">Razon Social
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="clienteRazonSocial" maxlength="255"
                                                            name="clienteRazonSocial" class="form-control" type="text"
                                                            placeholder="Empresa S.A. de C.V.">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-4">
                                                    <label class="form-label">Correo Electronico
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="clienteCorreoM" maxlength="255" name="clienteCorreoM"
                                                            class="form-control" type="text"
                                                            placeholder="example@hotmail.com">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Número Telefonico
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="telClienteM" maxlength="10" name="telClienteM"
                                                            class="form-control" type="text"
                                                            placeholder="969 123 4567">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Número Celular
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="celClienteM" maxlength="10"
                                                            onkeypress="return soloNumeros(event)" name="celClienteM"
                                                            class="form-control" type="text"
                                                            placeholder="999 123 4567">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-6">
                                                    <label class="form-label">Domicilio Fiscal
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="clienteDomicilioM" maxlength="255"
                                                            name="clienteDomicilioM" class="form-control" type="text"
                                                            placeholder="Merida, Yucatan">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Entidad Federativa
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="clienteEntidadM" maxlength="255"
                                                            name="clienteEntidadM" class="form-control" type="text"
                                                            placeholder="MEXICO">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Código Postal
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="clientCodigoPostM"
                                                            onkeypress="return soloNumeros(event)" maxlength="5"
                                                            name="clientCodigoPostM" class="form-control" type="text"
                                                            placeholder="97300">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-6">
                                                    <label class="form-label">RFC
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="clienteRFCM" maxlength="13" name="clienteRFCM"
                                                            class="form-control" type="text" placeholder="..."
                                                           >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Regimen Fiscal
                                                    </label>
                                                    <div class="input-group">
                                                        <input id="clienteRegimenM" maxlength="255"
                                                            name="clienteRegimenM" class="form-control" type="text"
                                                            placeholder="...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <label class="form-label">Representante Legal
                                                    </label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="clienteRepresentanteM"
                                                            id="clienteRepresentanteM">
                                                            <option value="0">Selecciona una opcion</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="button-row d-flex mt-4">
                                            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button"
                                                title="Next">Siguiente</button>
                                        </div>

                                    </div>
                                </div>

                                <!--single form panel-->
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                    data-animation="FadeIn">
                                    <h5 class="font-weight-bolder">Protocolo</h5>
                                    <div class="multisteps-form__content">

                                        <div id="infoClienteFisicaExpediente">
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-12">
                                                    <label>Identificación oficial</label>
                                                    <div class="form-control dropzone">
                                                        <div class="fallback">
                                                            <input name="clienteIdentificacionF"
                                                                id="clienteIdentificacionF" type="file" multiple />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-12">
                                                    <label>Acta de Nacimiento</label>
                                                    <div class="form-control dropzone">
                                                        <div class="fallback">
                                                            <input name="clienteActaF" id="clienteActaF" type="file"
                                                                multiple />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-12">
                                                    <label>Comprobante Domiciliario</label>
                                                    <div class="form-control dropzone">
                                                        <div class="fallback">
                                                            <input name="clienteComprobanteF" id="clienteComprobanteF"
                                                                type="file" multiple />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-12">
                                                    <label>Otros Documentos</label>
                                                    <div class="form-control dropzone">
                                                        <div class="fallback">
                                                            <input name="clienteVencimientoF" id="clienteVencimientoF"
                                                                type="file" multiple />
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
                                                            <input name="cleinteActaConstM" id="cleinteActaConstM"
                                                                type="file" multiple />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-12">
                                                    <label>Documentacion de representacion legal</label>
                                                    <div class="form-control dropzone">
                                                        <div class="fallback">
                                                            <input name="clienteRepresentacionDocM"
                                                                id="clienteRepresentacionDocM" type="file" multiple />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="button-row d-flex mt-4">
                                            <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                title="Anterior">Anterior</button>
                                            <button class="btn bg-gradient-dark ms-auto mb-0" type="submit"
                                                title="Send" id="saveInfoCliente">Guardar</button>
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
