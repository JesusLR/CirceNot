<div class="modal fade bd-example-modal-lg" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario
                </h5>
            </div>
            <div class="modal-body">

                {{-- <div class="card mt-4" id="basic-info"> --}}
                <div class="card-header">
                    <h5>Información Básica</h5>
                </div>
                {{-- <div class="card-body pt-0"> --}}
                <div class="row">
                    <div class="col-4">
                        <label class="form-label">Nombre(s)
                        </label>
                        <div class="input-group">
                            <input id="userNombre" maxlength="255" name="userNombre" class="form-control" type="text"
                                placeholder="Juan" required="required">
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Primer Apellido</label>
                        <div class="input-group">
                            <input id="userApellidoP" maxlength="255" name="userApellidoP" class="form-control"
                                type="text" placeholder="Lopez" required="required">
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Segundo Apellido</label>
                        <div class="input-group">
                            <input id="userApellidoM" maxlength="255" name="userApellidoM" class="form-control"
                                type="text" placeholder="Perez" required="required">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-6">
                        <label class="form-label mt-4">Usuario</label>
                        <input id="userUsuario" maxlength="255" name="userUsuario" class="form-control" type="text"
                            placeholder="Juan.lopez" required="required">
                    </div>
                    <div class="col-sm-4 col-6">
                        <label class="form-label mt-4">Permiso</label>
                        <select class="form-control" name="userPermiso" id="userPermiso">
                            <option value="0">Selecciona una opcion</option>
                            @foreach ($roles as $rol )
                            <option value="{{$rol->id}}">{{$rol->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4 col-6">
                        <label class="form-label mt-4">Puesto/Permiso</label>
                        <select class="form-control" name="userPuesto" id="userPuesto">
                            <option value="0">Selecciona una opcion</option>
                            @foreach ($permisos as $permiso)
                            <option value="{{$permiso->id}}">{{$permiso->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label mt-4">Email Personal</label>
                        <div class="input-group">
                            <input id="userEmail" name="userEmail" maxlength="255" class="form-control" type="email"
                                placeholder="example@email.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label mt-4">Email Laboral</label>
                        <div class="input-group">
                            <input id="userEmailDos" name="userEmailDos" maxlength="255" class="form-control"
                                type="email" placeholder="example@email.com">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label mt-4">Contraseña</label>
                        <div class="input-group">
                            <input id="userPassword" maxlength="255" name="userPassword" class="form-control"
                                type="text" placeholder="***** ...">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label mt-4">Número de teléfono</label>
                        <div class="input-group">
                            <input id="userTEL" onkeypress="return soloNumeros(event)" name="userTEL"
                                class="form-control" type="text" maxlength="10" placeholder="+40 735 631 620">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <label class="form-label mt-4">CURP</label>
                        <input class="form-control" maxlength="18" id="userCURP" type="text"
                            placeholder="CURP" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mt-4">RFC</label>
                        <input class="form-control" maxlength="13" id="userRFC" type="text"
                            placeholder="RFC" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveUser" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
