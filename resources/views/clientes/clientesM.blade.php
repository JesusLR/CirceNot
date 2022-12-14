@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-body">
            <h5 class="mb-0">Panel de clientes</h5>
            {{-- <p class="text-sm mb-0">
              <div class="text-end ms-auto">
                <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewUser">
                  <i class="fas fa-plus pe-2"></i> Nuevo Usuario
                </button>
              </div>
            </p> --}}
            <input type="text" value="EditPersonaMoral" name="cClavePlantilla" id="cClavePlantilla" hidden>
          <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <table class="table table-striped" id="gridClientesM">
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



{{-- Fin Modal edit Cliente Fisico --}}

{{-- Fin seccion de modal --}}

@endsection
