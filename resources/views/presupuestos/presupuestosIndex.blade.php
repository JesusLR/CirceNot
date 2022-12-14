@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                        <!-- Card header -->
                <div class="card-body">
                        <h5 class="mb-0">Panel de Presupuestos</h5>

                        {{-- <p class="text-sm mb-0">
                        <div class="text-end ms-auto">
                            <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewUser">
                            <i class="fas fa-plus pe-2"></i> Nuevo Usuario
                            </button>
                        </div>
                        </p> --}}

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-12">
                            <table class="table table-striped" id="gridPresupuestos">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <form class="multisteps-form__form mb-8" method="POST" action="{{route('createPDFpresupuesto')}}" accept-charset="UTF-8" enctype="multipart/form-data" id="formPDFPresupuesto" novalidate>
    @csrf
    <input type="text" class="form-control" id="idPresupuestoPDF" name="idPresupuestoPDF" value ="" hidden>
  </form>
@endsection
