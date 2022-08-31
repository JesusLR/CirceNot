@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h5 class="mb-0">Administracion de usuarios</h5>
            <p class="text-sm mb-0">
              <div class="text-end ms-auto">
                <button type="button" class="btn btn-xs btn-primary mb-0" id="btnNewUser">
                  <i class="fas fa-plus pe-2"></i> Nuevo Usuario
                </button>
              </div>
            </p>
          </div>
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

  <!-- Modal -->
  {{-- MODAL DE USUARIOS --}}
<div class="modal fade bd-example-modal-lg" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario
        </h5>
      </div>
      <div class="modal-body">
        
        <div class="card mt-4" id="basic-info">
          <div class="card-header">
            <h5>Informacion Basica</h5>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-4">
                <label class="form-label">Nombre(s)
                </label>
                <div class="input-group">
                  <input id="userNombre" name="userNombre" class="form-control" type="text" placeholder="Juan" required="required">
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Apellido Paterno</label>
                <div class="input-group">
                  <input id="userApellidoP" name="userApellidoP" class="form-control" type="text" placeholder="Lopez" required="required">
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Apellido Materno</label>
                <div class="input-group">
                  <input id="userApellidoM" name="userApellidoM" class="form-control" type="text" placeholder="Perez" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 col-6">
                <label class="form-label mt-4">Usuario</label>
                <input id="userUsuario" name="userUsuario" class="form-control" type="text" placeholder="Juan.lopez" required="required">
              </div>
              <div class="col-sm-4 col-6">
                <label class="form-label mt-4">Permiso</label>
                <select class="form-control" name="userPermiso" id="userPermiso">
                  <option value="0">Selecciona una opcion</option>
                  <option value="1">Administrador</option>
                  <option value="2">Usuario</option>
                </select>
              </div>
              <div class="col-sm-4 col-6">
                <label class="form-label mt-4">Puesto</label>
                <select class="form-control" name="userPuesto" id="userPuesto">
                  <option value="0">Selecciona una opcion</option>
                  <option value="1">Notario</option>
                  <option value="2">Jefe</option>
                  <option value="3">Usuario</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="form-label mt-4">Email Personal</label>
                <div class="input-group">
                  <input id="userEmail" name="userEmail" class="form-control" type="email" placeholder="example@email.com">
                </div>
              </div>
              <div class="col-6">
                <label class="form-label mt-4">Email Laboral</label>
                <div class="input-group">
                  <input id="userEmailDos" name="userEmailDos" class="form-control" type="email" placeholder="example@email.com">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="form-label mt-4">Contraseña</label>
                <div class="input-group">
                  <input id="userPassword" name="userPassword" class="form-control" type="text" placeholder="***** ...">
                </div>
              </div>
              <div class="col-6">
                <label class="form-label mt-4">Numero de telefono</label>
                <div class="input-group">
                  <input id="userTEL" name="userTEL" class="form-control" type="number" placeholder="+40 735 631 620">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 align-self-center">
                <label class="form-label mt-4">CURP</label>
                <input class="form-control" id="userCURP" placeholder="CURP" />
              </div>
              <div class="col-md-6">
                <label class="form-label mt-4">RFC</label>
                <input class="form-control" id="userRFC" type="text" placeholder="RFC" />
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveUser" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
{{-- Fin modal de usuarios --}}

{{-- Modal editar usuario --}}
<div class="modal fade bd-example-modal-lg" id="editUsersModal" tabindex="-1" role="dialog" aria-labelledby="editUsersModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario
        </h5>
      </div>
      <div class="modal-body">
        
        <div class="card mt-4" id="basic-info">
          <div class="card-header">
            <h5>Informacion Basica</h5>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-4">
                <label class="form-label">Nombre(s)
                </label>
                <div class="input-group">
                  <input id="userNombreEdit" name="userNombreEdit" class="form-control" type="text" placeholder="Juan" required="required">
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Apellido Paterno</label>
                <div class="input-group">
                  <input id="userApellidoPEdit" name="userApellidoPEdit" class="form-control" type="text" placeholder="Lopez" required="required">
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Apellido Materno</label>
                <div class="input-group">
                  <input id="userApellidoMEdit" name="userApellidoMEdit" class="form-control" type="text" placeholder="Perez" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 col-6">
                <label class="form-label mt-4">Usuario</label>
                <input id="userUsuarioEdit" name="userUsuarioEdit" class="form-control" type="text" placeholder="Juan.lopez" required="required">
              </div>
              <div class="col-sm-4 col-6">
                <label class="form-label mt-4">Permiso</label>
                <select class="form-control" name="userPermisoEdit" id="userPermisoEdit">
                  <option value="0">Selecciona una opcion</option>
                  <option value="1">Administrador</option>
                  <option value="2">Usuario</option>
                </select>
              </div>
              <div class="col-sm-4 col-6">
                <label class="form-label mt-4">Puesto</label>
                <select class="form-control" name="userPuestoEdit" id="userPuestoEdit">
                  <option value="0">Selecciona una opcion</option>
                  <option value="1">Notario</option>
                  <option value="2">Jefe</option>
                  <option value="3">Usuario</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="form-label mt-4">Email Personal</label>
                <div class="input-group">
                  <input id="userEmailEdit" name="userEmailEdit" class="form-control" type="email" placeholder="example@email.com">
                </div>
              </div>
              <div class="col-6">
                <label class="form-label mt-4">Email Laboral</label>
                <div class="input-group">
                  <input id="userEmailDosEdit" name="userEmailDosEdit" class="form-control" type="email" placeholder="example@email.com">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="form-label mt-4">Contraseña</label>
                <div class="input-group">
                  <input id="userPasswordEdit" name="userPasswordEdit" class="form-control" type="text" placeholder="***** ...">
                </div>
              </div>
              <div class="col-6">
                <label class="form-label mt-4">Numero de telefono</label>
                <div class="input-group">
                  <input id="userTELEdit" name="userTELEdit" class="form-control" type="number" placeholder="+40 735 631 620">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 align-self-center">
                <label class="form-label mt-4">CURP</label>
                <input class="form-control" id="userCURPEdit" placeholder="CURP" />
              </div>
              <div class="col-md-6">
                <label class="form-label mt-4">RFC</label>
                <input class="form-control" id="userRFCEdit" type="text" placeholder="RFC" />
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnUpdateUser" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
{{-- fin modal editar usuario --}}
@endsection
