@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <div class="row mt-4">
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Presupuesto</h5>
                        <div class="row">
                            <div class="col-md-5">
                                <select class="form-control" name="idClient" id="idClient">
                                    <option value="0">--Seleccione Cliente--</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->iIDClienteF }}">
                                            {{ $cliente->cNombre ." " .$cliente->cApellidoMat." ".$cliente->cApellidoPat}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class = "col-md-5">
                                <a>Vigencia(Dias Naturales):</a>
                                <input type="text" class="form-control" id="vigencia" name="vigencia" value = 15>


                            </div>
                            <label class="form-label">Servicios disponibles:</label>

                            <div class="col-md-5">
                                <select class="form-control" name="typeServices" id="typeServices">
                                    <option value="0">--Seleccione Servicio--</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">

                                <button id="btnAgregarS" class="btn bg-gradient-light mb-0 js-btn-prev">
                                    <span class="btn-inner--text">Agregar</span>
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>

                                </button>
                            </div>

                            <div class="col-md-3">
                            </div>
                        </div>
                        <div class="card-header">
                            <h5 class="mb-0">Servicios:</h5>
                            {{-- <p class="text-sm mb-0">
                <div class="text-end ms-auto">
                  <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewUser">
                    <i class="fas fa-plus pe-2"></i> Nuevo Usuario
                  </button>
                </div>
              </p> --}}
                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped" id="gridServicios">
                            </table>
                        </div>
                        <br>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Honorarios</h5>
                        <a>Honorarios:</a>
                        <input type="text" class="form-control" id="honorarios" name="honorarios" value = 0>
                        <a>SubTotal:</a>
                        <input type="text" class="form-control" id="subHonorarios" name="subHonorarios" readonly>
                        <a>IVA:</a>
                        <input type="text" class="form-control" id="IVAHonorarios" name="IVAHonorarios" readonly>
                        <a>Total:</a>
                        <input type="text" class="form-control" id="totalHonorarios" name="totalHonorarios" readonly>
                        <br>
                        <h5 class="font-weight-bolder">Gastos</h5>
                        <a>Subtotal Servicios:</a>
                        <input type="text" class="form-control" id="subTotalPrice" name="subTotalPrice" readonly>
                        {{-- <a>Total Honorarios:</a>
                        <input type="text" class="form-control" id="totalHonorarios2" name="totalHonorarios" readonly> --}}
                        <br>
                        <h5 class="font-weight-bolder">Totales</h5>
                        <a>Totales:</a>
                        <input type="text" class="form-control" id="totales" name="totalHonorarios" readonly>
                        <br>
                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send" id="saveInfoPresupuesto">Guardar</button>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
