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
            // formatter: "usuarioPermisoFormatter"
        },{
            field: "iIDPuesto",
            title: "Puesto",
            // formatter: "usuarioPuestoFormatter"
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
    $('#userPermiso').val("");
    $('#userPuesto').val("");
    $('#userUsuario').val("");
    $('#userTEL').val("");
    $('#userPassword').val("");
    $('#userCURP').val("");
    $('#userRFC').val("");
    $('#usersModal').modal('show');
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
            // alert('Bienvenido '+ email);
            $('#usersModal').modal('hide');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: r.cMensaje,
                showConfirmButton: false,
                timer: 3000
              })
              $("#gridUsers").bootstrapTable("refresh");
    },
        error: function (err) {
            
        },
    });
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
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: r.cMensaje,
                showConfirmButton: false,
                timer: 3000
              })
              $("#gridUsers").bootstrapTable("refresh");
    },
        error: function (err) {
            
        },
    });
}