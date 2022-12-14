$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    $("#gridUsers").bootstrapTable({
        url: "/admin/gridUsers",
        classes: "table-striped",
        uniqueId: "id",
        method: "get",
        contentType: "application/x-www-form-urlencoded",
        pagination: true,
        pageSize: 10,
        columns: [{
            field: "id",
            title: "id",
            visible: false,
        },{
            field: "iIDPersonaAutorizada",
            title: "iIDPersonaAutorizada",
            visible: false,
        }, {
            field: "cNombre",
            title: "Usuario",
            formatter: "usuarioNombreFormatter"
        },{
            field: "iIDPermiso",
            title: "Permiso",
            formatter: "usuarioPermisoFormatter"
        },{
            field: "iIDPuesto",
            title: "Puesto",
            formatter: "usuarioPuestoFormatter"
        },{
            field: "lActivo",
            title: "Estatus",
            formatter: "usuarioStatusFormatter",
        },{
            field: "cAccion",
            title: "Acciones",
            formatter: "usuarioFormatter",
        }],
        onLoadSuccess: function(data) {},
    });
    // $("#gridUsers").bootstrapTable("refresh");
    // $('#userPermiso').select2({
    //     placeholder: "--Seleccionar predio--",
    //     language: {
    //         noResults: function() {
    //             return "No se han cargado predios";
    //         },
    //         searching: function() {
    //             return "Buscando..";
    //         },
    //     },
    // });
})

function usuarioNombreFormatter(value, row) {
    var html;
    var nombre;
    nombre = row.cNombre + ' ' + row.cPrimerApellido + ' ' + row.cSegundoApellido;
    html = '<div class="d-flex flex-column justify-content-center">' +
    '<h6 class="mb-0 text-xs">'+nombre+'</h6>'+
    '<p class="text-xs text-secondary mb-0">'+row.cUsuario+'</p>'+
    '</div>';

    return html;
}

function usuarioPermisoFormatter(value, row) {
    var html;
    if(row.iIDPermiso == 1){
        html = 'Administrador';
    }else{
        html = 'Usuario';
    }
    return html;
}

function usuarioPuestoFormatter(value, row) {
    var html;
    if(row.iIDPuesto == 1){
        html = 'Notario';
    }else if(row.iIDPuesto == 2){
        html = 'Jefe';
    }else{
        html = 'Usuario';
    }
    return html;
}

function usuarioStatusFormatter(value, row) {
    var html;
    if(row.lActivo == 1){
        html = '<span class="badge badge-sm badge-success">Activo</span>';
    }else{
        html = '<span class="badge badge-sm badge-danger">Inactivo</span>';
    }
    return html;
}

function usuarioFormatter(value, row) {
    var html;

    html = '<a href="javascript:;" onclick="infoUser('+row.iIDPersonaAutorizada+')" data-bs-toggle="tooltip" data-bs-original-title="Tarjeta de presentacion">'+
           ' <i class="fas fa-eye text-secondary"></i>'+
        '</a>'+
        '<a href="javascript:;" onclick="editUser('+row.iIDPersonaAutorizada+')" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Usuario">'+
            '<i class="fas fa-user-edit text-secondary"></i>'+
        '</a>';
    // <td class="text-sm">
    //     {/* <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
    //         <i class="fas fa-eye text-secondary"></i>
    //     </a>
    //     {/* <a href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
    //         <i class="fas fa-user-edit text-secondary"></i>
    //     </a>
    //     <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
    //         <i class="fas fa-trash text-secondary"></i>
    //     </a> */}
    // </td> */}
    return html;
}

$("#btnNewUser").click(function() {
    $('#userNombre').val("");
    $('#userApellidoP').val("");
    $('#userApellidoM').val("");
    $('#userEmail').val("");
    $('#userEmailDos').val("");
    $('#userPermiso').val(0);
    $('#userPuesto').val(0);
    $('#userUsuario').val("");
    $('#userTEL').val("");
    $('#userPassword').val("");
    $('#userCURP').val("");
    $('#userRFC').val("");
    $('#usersModal').modal('show');

    $('#userNombre').removeClass( "is-valid" )
    $('#userNombre').removeClass( "is-invalid" )
    $('#userApellidoP').removeClass( "is-valid" )
    $('#userApellidoP').removeClass( "is-invalid" )
    $('#userApellidoM').removeClass( "is-valid" )
    $('#userApellidoM').removeClass( "is-invalid" )
    $('#userEmail').removeClass( "is-valid" )
    $('#userEmail').removeClass( "is-invalid" )
    $('#userEmailDos').removeClass( "is-valid" )
    $('#userEmailDos').removeClass( "is-invalid" )
    $('#userPermiso').removeClass( "is-valid" )
    $('#userPermiso').removeClass( "is-invalid" )
    $('#userPuesto').removeClass( "is-valid" )
    $('#userPuesto').removeClass( "is-invalid" )
    $('#userUsuario').removeClass( "is-valid" )
    $('#userUsuario').removeClass( "is-invalid" )
    $('#userTEL').removeClass( "is-valid" )
    $('#userTEL').removeClass( "is-invalid" )
    $('#userPassword').removeClass( "is-valid" )
    $('#userPassword').removeClass( "is-invalid" )
    $('#userCURP').removeClass( "is-valid" )
    $('#userCURP').removeClass( "is-invalid" )
    $('#userRFC').removeClass( "is-valid" )
    $('#userRFC').removeClass( "is-invalid" )
});

$("#btnSaveUser").click(function() {
    createUser();
});

$("#btnUpdateUser").click(function() {
    updateUser();
});


function createUser(){
    nombre = $('#userNombre').val();
    apellidoP = $('#userApellidoP').val();
    apellidoM = $('#userApellidoM').val();
    email = $('#userEmail').val();
    email2 = $('#userEmailDos').val();
    permiso = $('#userPermiso').val();
    puesto = $('#userPuesto').val();
    usuario = $('#userUsuario').val();
    telefono = $('#userTEL').val();
    password = $('#userPassword').val();
    curp = $('#userCURP').val();
    rfc = $('#userRFC').val();
    sts = true;

    if(nombre == "" ){
          $('#userNombre').removeClass( "is-valid" ).addClass('is-invalid');
        sts = false;
    }else{
        $('#userNombre').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(apellidoP == "" ){
        $('#userApellidoP').removeClass( "is-valid" ).addClass('is-invalid');
      sts = false;
    }else{
        $('#userApellidoP').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(apellidoM == "" ){
        $('#userApellidoM').removeClass( "is-valid" ).addClass('is-invalid');
      sts = false;
    }else{
        $('#userApellidoM').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(email == "" ){
        $('#userEmail').removeClass( "is-valid" ).addClass('is-invalid');
      sts = false;
    }else{
        $('#userEmail').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(email2 == "" ){
        $('#userEmailDos').removeClass( "is-valid" ).addClass('is-invalid');
        sts = false;
    }else{
        $('#userEmailDos').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(permiso == 0 ){
        $('#userPermiso').removeClass( "is-valid" ).addClass('is-invalid');
        sts = false;
    }else{
        $('#userPermiso').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(puesto == 0 ){
        $('#userPuesto').removeClass( "is-valid" ).addClass('is-invalid');
        sts = false;
    }else{
        $('#userPuesto').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(usuario == "" ){
        $('#userUsuario').removeClass( "is-valid" ).addClass('is-invalid');
        sts = false;
    }else{
        $('#userUsuario').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(telefono == "" || telefono == 0){
        $('#userTEL').removeClass( "is-valid" ).addClass('is-invalid');
        sts = false;
    }else{
        $('#userTEL').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(password == "" ){
        $('#userPassword').removeClass( "is-valid" ).addClass('is-invalid');
        sts = false;
    }else{
        $('#userPassword').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(curp == "" ){
        $('#userCURP').removeClass( "is-valid" ).addClass('is-invalid');
        sts = false;
    }else{
        $('#userCURP').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(rfc == "" ){
        $('#userRFC').removeClass( "is-valid" ).addClass('is-invalid');
        sts = false;
    }else{
        $('#userRFC').removeClass( "is-invalid" ).addClass('is-valid');
    }

    if(sts == false){
            swal.fire({
                title: "Aviso",
                icon: 'error',
                text: "No se han llenado todos los campos obligatorios, revisar campos resaltados",
                type: "error",
                showConfirmButton: true,
                confirmButtonClass: "btn btn-danger btn-round",
                confirmButtonText: "Aceptar",
                buttonsStyling: false,
            });
            return false;
    }

    $.ajax({
        url: "/admin/createUser",
        type: "post",
        dataType: "json",
        data: {
            nombre : nombre,
            apellidoP : apellidoP,
            apellidoM : apellidoM,
            email : email,
            email2 : email2,
            permiso : permiso,
            puesto : puesto,
            usuario : usuario,
            telefono : telefono,
            password : password,
            curp : curp,
            rfc : rfc
        },
        success: function (r) {
            console.log(r)
            if(r.lSuccess){
                $('#usersModal').modal('hide');
                swal.fire({
                    title: "Exito",
                    icon: 'success',
                    text: r.cMensaje,
                    type: "success",
                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-success btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });
                $("#gridUsers").bootstrapTable("refresh");
            }else{
                swal.fire({
                    title: "Aviso",
                    icon: 'error',
                    text: r.cMensaje,
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-danger btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });
            }
            // alert('Bienvenido '+ email);
    },
        error: function (err) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Ocurrio un problema con el procedimiento',
                showConfirmButton: false,
                timer: 3000
            })
        },
    });
}

function soloNumeros(e) {
    var key = window.event ? e.which : e.keyCode;
    if (key < 48 || key > 57) {
        e.preventDefault();
    }
}

function infoUser(iIDPersonaAutorizada){
    $.ajax({
        url: "/admin/editUser",
        type: "post",
        dataType: "json",
        data: {
            iIDPersonaAutorizada:iIDPersonaAutorizada,
        },
        success: function (r) {
            console.log(r.cNombre)
            // $('#btnUpdateUser').val(r.iIDPersonaAutorizada);
            var nombre = r.cNombre + ' ' + r.cPrimerApellido + ' ' + r.cSegundoApellido;
            console.log(nombre)
            $('#idNomUserInfo').html(nombre);
            // $('#idNomUserInfo').val(r.cPrimerApellido);
            // $('#userApellidoMEdit').val(r.cSegundoApellido);
            $('#UserEmailInfo').html(r.email);
            $('#UserEmailDosInfo').html(r.emailDos);
            $('#UserPermisoInfo').html(r.iIDPermiso);
            $('#UserPuestoInfo').html(r.iIDPuesto);
            $('#UserInfo').html(r.cUsuario);
            $('#UserTelInfo').html(r.iTelefono);
            // $('#userPasswordEdit').val(r.password);
            $('#UserCURPInfo').html(r.cCURP);
            $('#UserRFCInfo').html(r.cRFC);
            $('#modalInfoUser').modal('show');
    },
        error: function (err) {

        },
    });
}

function editUser(iIDPersonaAutorizada){
    $.ajax({
        url: "/admin/editUser",
        type: "post",
        dataType: "json",
        data: {
            iIDPersonaAutorizada:iIDPersonaAutorizada,
        },
        success: function (r) {
            console.log(r.cNombre)
            if(r.lActivo == 1){
                $('#userStatus').prop('checked', true);
            }else{
                $('#userStatus').prop('checked', false);
            }
            $('#btnUpdateUser').val(r.iIDPersonaAutorizada);
            $('#userNombreEdit').val(r.cNombre);
            $('#userApellidoPEdit').val(r.cPrimerApellido);
            $('#userApellidoMEdit').val(r.cSegundoApellido);
            $('#userEmailEdit').val(r.email);
            $('#userEmailDosEdit').val(r.emailDos);
            $('#userPermisoEdit').val(r.iIDPermiso);
            $('#userPuestoEdit').val(r.iIDPuesto);
            $('#userUsuarioEdit').val(r.cUsuario);
            $('#userTELEdit').val(r.iTelefono);
            $('#userPasswordEdit').val(r.password);
            $('#userCURPEdit').val(r.cCURP);
            $('#userRFCEdit').val(r.cRFC);
            $('#editUsersModal').modal('show');
    },
        error: function (err) {

        },
    });
}

function updateUser(){
    var sts;
    iIDPersonaAutorizada =  $('#btnUpdateUser').val();
    nombre = $('#userNombreEdit').val();
    apellidoP = $('#userApellidoPEdit').val();
    apellidoM = $('#userApellidoMEdit').val();
    email = $('#userEmailEdit').val();
    email2 = $('#userEmailDosEdit').val();
    permiso = $('#userPermisoEdit').val();
    puesto = $('#userPuestoEdit').val();
    usuario = $('#userUsuarioEdit').val();
    telefono = $('#userTELEdit').val();
    password = $('#userPasswordEdit').val();
    curp = $('#userCURPEdit').val();
    rfc = $('#userRFCEdit').val();

    if($('#userStatus').prop('checked')){
        sts = 1;
    }else{
        sts = 0;
    }

    // validacionCreateUser(nombre, apellidoP, apellidoM, email, email2, permiso, puesto, usuario, telefono, password, curp, rfc);

    $.ajax({
        url: "/admin/updateUser",
        type: "post",
        dataType: "json",
        data: {
            iIDPersonaAutorizada: iIDPersonaAutorizada,
            nombre : nombre,
            apellidoP : apellidoP,
            apellidoM : apellidoM,
            email : email,
            email2 : email2,
            permiso : permiso,
            puesto : puesto,
            usuario : usuario,
            telefono : telefono,
            password : password,
            curp : curp,
            rfc : rfc,
            sts: sts,
        },
        success: function (r) {
            // alert('Bienvenido '+ email);
            $('#editUsersModal').modal('hide');
            swal.fire({
                title: "Exito",
                icon: 'success',
                text: r.cMensaje,
                type: "success",
                showConfirmButton: true,
                confirmButtonClass: "btn btn-success btn-round",
                confirmButtonText: "Aceptar",
                buttonsStyling: false,
            });
              $("#gridUsers").bootstrapTable("refresh");
    },
        error: function (err) {

        },
    });
}

// function validacionCreateUser(nombre, apellidoP, apellidoM, email, email2, permiso, puesto, usuario, telefono, password, curp, rfc){
//     sts = true;
//     if(nombre == "" ){
//         // Swal.fire({
//         //     position: 'top-end',
//         //     icon: 'error',
//         //     title: 'La informacion del usuario no puede estar vacia',
//         //     showConfirmButton: false,
//         //     timer: 3000
//         //   })
//           $('#userNombre').addClass('has-danger');
//         sts = false;
//     }

//     if(apellidoM == ""){
//         // Swal.fire({
//         //     position: 'top-end',
//         //     icon: 'error',
//         //     title: 'La informacion del usuario no puede estar vacia',
//         //     showConfirmButton: false,
//         //     timer: 3000
//         //   })
//           $('#userApellidoM').addClass('has-danger');
//         sts = false;
//     }

//     if(apellidoP == ""){
//         // Swal.fire({
//         //     position: 'top-end',
//         //     icon: 'error',
//         //     title: 'La informacion del usuario no puede estar vacia',
//         //     showConfirmButton: false,
//         //     timer: 3000
//         //   })
//           $('#userApellidoP').addClass('has-danger');
//         sts = false;
//     }

//     // if(usuario == "" ){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Debe ingresar un nombre de usuario',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     // return false;
//     // }

//     // if(permiso == 0){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Debe asignarle un permiso al usuario',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(puesto == 0){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Debe asignarle un puesto al usuario',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(email == "" || email2 == "" ){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Los campos del email no pueden estar vacios',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(telefono == "" ){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Debe ingresar un numero de telefono',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(telefono.length < 10){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Debe ingresar un numero de telefono valido',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(password.length < 6){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'La contraseña debe tener al menos 6 caracteres',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(password == ""){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Ingresar una contraseña para el usuario',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(curp.length < 18){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Debe ingresar una CURP valida',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(curp == ""){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Debe ingresar el CURP del usuario',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(curp.length < 10){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Debe ingresar un CURP validO',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }

//     // if(rfc == ""){
//     //     Swal.fire({
//     //         position: 'top-end',
//     //         icon: 'error',
//     //         title: 'Debe ingresar el RFC del usuario',
//     //         showConfirmButton: false,
//     //         timer: 3000
//     //       })
//     //     return false;
//     // }
//     return sts;
// }
