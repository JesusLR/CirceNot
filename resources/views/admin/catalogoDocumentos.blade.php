@extends('layouts.app')

@section('content')
<script src="{{ asset('js/Not/documentos.js') }}" ></script>
@include('catalogos.mesages')

<div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h5 class="mb-0">Administracion de documentos</h5>
            <p class="text-sm mb-0">
              <div class="text-end ms-auto">
                <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewDoc" onclick="modalDocumentos()">
                  <i class="fas fa-plus pe-2"></i> Nuevo Documento
                </button>
              </div>
            </p>
          </div>
          <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <table class="table table-striped" id="gridDocs">
                </table>
            </div>
        </div>
        </div>
      </div>
    </div>

  </div>

  <div class="modal fade bd-example-modal-lg" id="docsModal" tabindex="-1" role="dialog" aria-labelledby="docsModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Documento
          </h5>
        </div>
        <div class="modal-body">
          
            {{-- <div class="card card-body mt-4"> --}}
                {{-- <h6 class="mb-0">New Project</h6> --}}
                <p class="text-sm mb-0">Crear nuevo documento</p>
                <hr class="horizontal dark my-3">
                <form class="form-control dropzone" id="dropzone" method="POST" action="{{route('createDoc')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                    <label for="projectName" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="docNombre" id="docNombre">
                {{-- <div class="row mt-4">
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label>
                        Private Project
                      </label>
                      <p class="form-text text-muted text-xs ms-1">
                        If you are available for hire outside of the current situation, you can encourage others to hire you.
                      </p>
                      <div class="form-check form-switch ms-1">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onclick="notify(this)" data-type="warning" data-content="Once a project is made private, you cannot revert it to a public project." data-title="Warning" data-icon="ni ni-bell-55">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <label class="mt-4">Descripcion</label>
                <textarea class="form-control" name='descripcionDoc' id="descripcionDoc" rows="3"></textarea>
                {{-- <div class="row">
                  <div class="col-6">
                    <label class="form-label">Start Date</label>
                    <input class="form-control datetimepicker" type="text" placeholder="Please select start date" data-input>
                  </div>
                  <div class="col-6">
                    <label class="form-label">End Date</label>
                    <input class="form-control datetimepicker" type="text" placeholder="Please select end date" data-input>
                  </div>
                </div> --}}
                <label class="mt-4 form-label">Archivo</label>
                
                  <div class="fallback">
                    <input name="fileDoc" id="fileDoc" type="file" multiple />
                  </div>

                  <br>

                  <button type="submit" id="btnSaveDoc" class="btn btn-primary btn-sm float-right">Guardar</button>
                </form>
              {{-- </div> --}}

        </div>
        {{-- <div class="modal-footer">
          <button type="button" id="btnSaveDoc" class="btn btn-primary">Guardar</button>
        </div> --}}
      </div>
    </div>
  </div>

@endsection