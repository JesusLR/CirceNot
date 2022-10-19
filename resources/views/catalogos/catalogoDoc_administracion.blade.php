@extends('layouts.app')

@section('content')
<script src="{{ asset('js/Not/documentos.js') }}" ></script>
<input type="text" id="docAdminPlant" value="1" hidden>

          <div class="row mt-4">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                  <h5 class="mb-1">Catalogo de Documentos Administracion</h5>
                  {{-- <h4 class="">Administracion</h4> --}}
                </div>
                <div class="card-body p-3">
                  <div class="row">

                    <div class="row" id="divDocumentoUno">
                      @foreach($docs as $doc)
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
                      <div class="card card-blog card-plain">
                        <div class="position-relative">
                          <a class="d-block shadow-xl border-radius-xl">
                            <img src="{{ asset('img/img_documents.jpg') }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                          </a>
                        </div>
                        <div class="card-body px-1 pb-0">
                          <a href="javascript:;">
                            <h5>
                             {{$doc->cNombre}}
                            </h5>
                          </a>
                          <p class="mb-4 text-sm">
                            {{$doc->cDescripcion}}
                          </p>
                          <div class="d-flex align-items-center justify-content-between">
                            <button type="button" data-toggle="modal" data-target="#modalPlantillaUsuario{{$doc->iIDCatalogoDocumento}}" class="btn btn-outline-primary btn-sm mb-0">Ver plantilla</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="modalPlantillaUsuario{{$doc->iIDCatalogoDocumento}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Documento
                            </h5>
                          </div>
                          <div class="modal-body">
                                  <label class="mt-4">Documento</label>
                                  <textarea class="ckeditor" name='plantillaDocUser{{$doc->iIDCatalogoDocumento}}' id="plantillaDocUser{{$doc->iIDCatalogoDocumento}}" rows="3">{{$doc->cPlantilla}}</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- Fin modal plantilla --}}
                    @endforeach
                    {{-- <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                      <div class="card h-100 card-plain border">
                        <div class="card-body d-flex flex-column justify-content-center text-center">
                          <a href="javascript:;">
                            <i class="fa fa-plus text-secondary mb-3"></i>
                            <h5 class=" text-secondary"> New project </h5>
                          </a>
                        </div>
                      </div>
                    </div> --}}


                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Modal de plantilla --}}


@endsection
