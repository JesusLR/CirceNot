<div class="modal fade bd-example-modal-lg" id="editUsersModal" tabindex="-1" role="dialog" aria-labelledby="editUsersModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Usuario
          </h5>
        </div>
        <div class="modal-body">

          {{-- <div class="card mt-4" id="basic-info"> --}}
            <div class="card-header">
              <h5>Información Básica</h5>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="userStatus" checked="">
                <label class="form-check-label" for="userStatus">Estatus</label>
              </div>
            </div>
            {{-- <div class="card-body pt-0"> --}}
                <input id="iTipoUserEdit" type="text" hidden/>
              <div class="row">
                <div class="col-4">
                  <label class="form-label">Nombre(s)
                  </label>
                  <div class="input-group">
                    <input id="userNombreEdit" maxlength="255" name="userNombreEdit" class="form-control" type="text" placeholder="Juan" required="required">
                  </div>
                </div>
                <div class="col-4">
                  <label class="form-label">Primer Apellido</label>
                  <div class="input-group">
                    <input id="userApellidoPEdit" maxlength="255" name="userApellidoPEdit" class="form-control" type="text" placeholder="Lopez" required="required">
                  </div>
                </div>
                <div class="col-4">
                  <label class="form-label">Segundo Apellido</label>
                  <div class="input-group">
                    <input id="userApellidoMEdit" maxlength="255" name="userApellidoMEdit" class="form-control" type="text" placeholder="Perez" required="required">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 col-6">
                  <label class="form-label mt-4">Usuario</label>
                  <input id="userUsuarioEdit" maxlength="255" name="userUsuarioEdit" class="form-control" type="text" placeholder="Juan.lopez" required="required">
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
                    <input id="userEmailEdit" maxlength="255" name="userEmailEdit" class="form-control" type="email" placeholder="example@email.com">
                  </div>
                </div>
                <div class="col-6">
                  <label class="form-label mt-4">Email Laboral</label>
                  <div class="input-group">
                    <input id="userEmailDosEdit" maxlength="255" name="userEmailDosEdit" class="form-control" type="email" placeholder="example@email.com">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <label class="form-label mt-4">Contraseña</label>
                  <div class="input-group">
                    <input id="userPasswordEdit" maxlength="255" name="userPasswordEdit" class="form-control" type="text" placeholder="***** ...">
                  </div>
                </div>
                <div class="col-6">
                  <label class="form-label mt-4">Número de teléfono</label>
                  <div class="input-group">
                    <input id="userTELEdit" maxlength="10" onkeypress="return soloNumeros(event)" name="userTELEdit" class="form-control" type="text" placeholder="+40 735 631 620">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 align-self-center">
                  <label class="form-label mt-4">CURP</label>
                  <input class="form-control" maxlength="18" id="userCURPEdit" placeholder="CURP" />
                </div>
                <div class="col-md-6">
                  <label class="form-label mt-4">RFC</label>
                  <input class="form-control" maxlength="13" id="userRFCEdit" type="text" placeholder="RFC" />
                </div>
              </div>
            {{-- </div> --}}
          {{-- </div> --}}

        </div>
        <div class="modal-footer">
          <button type="button" id="btnUpdateUser" class="btn btn-primary">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
