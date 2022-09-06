@extends('layouts.app')

@section('content')
<script src="{{ asset('js/Not/documentos.js') }}" ></script>

<div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h5 class="mb-0">Catalogo de documentos Administrativos</h5>
            <p class="text-sm mb-0">
              {{-- <div class="text-end ms-auto">
                <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewDoc" onclick="modalDocumentos()">
                  <i class="fas fa-plus pe-2"></i> Nuevo Documento
                </button>
              </div> --}}
            </p>
          </div>
          <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                {{-- <table class="table table-striped" id="gridDocs">
                </table> --}}
            </div>
        </div>
        </div>
      </div>
    </div>

  </div>

@endsection