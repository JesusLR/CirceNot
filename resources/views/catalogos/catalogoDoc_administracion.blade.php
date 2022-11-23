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
                    {{-- Modal de plantilla --}}
                    <div class="modal fade bd-example-modal-lg" id="modalPlantillaUsuario{{$doc->iIDCatalogoDocumento}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Documento
                            </h5>
                          </div>
                          <div class="modal-body">
                            <input type="text" id="idPlantillaDB" hidden>
                                  <label class="mt-4">Documento</label>
                                  <form class="multisteps-form__form mb-8" method="POST" action="{{route('createPlantillaPDF')}}" accept-charset="UTF-8" enctype="multipart/form-data" id="createPlantillaPDFForm{{$doc->iIDCatalogoDocumento}}" novalidate>
                                    @csrf
                                    <textarea class="ckeditor" name='plantillaDocUser' id="plantillaDocUser" rows="8">{{$doc->cPlantilla}}</textarea>
                                    <input type="text" class="form-control" id="idPlantillaPDF" name="idPlantillaPDF" value ="{{$doc->iIDCatalogoDocumento}}" hidden>
                                </form>
                                </div>
                        <div class="modal-footer">
                            <button type="button" onclick="descargarPlantillaUsuario({{$doc->iIDCatalogoDocumento}})" id="btnDescargarPlantilla" class="btn btn-danger">Descargar</button>
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


@endsection
