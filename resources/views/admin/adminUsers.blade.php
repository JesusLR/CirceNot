@extends('layouts.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-body">
                        <h5 class="mb-0">Administración de usuarios</h5>
                        <p class="text-sm mb-0">
                        <div class="text-end ms-auto">
                            <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewUser">
                                <i class="fas fa-plus pe-2"></i> Nuevo Usuaio
                            </button>
                        </div>
                        </p>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-12">
                                <table class="table table-striped" id="gridUsers">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- MODAL DE USUARIOS --}}
    @include('admin.modal.crearUsuarioModal')
    {{-- Fin modal de usuarios --}}

    {{-- Modal editar usuario --}}
    @include('admin.modal.editarUsuarioModal')
    {{-- fin modal editar usuario --}}

    <!-- Modal info usuario-->
    @include('admin.modal.infoUsuarioModal')
    {{-- Fin modal info usuario --}}
@endsection
