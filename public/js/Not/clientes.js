$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    $.ajax({
        url: "/consultarRepresentantes",
        type: "get",
        dataType: "json",
        async: true,
        cache: false,
        success: function (r) {
            console.log($('#cClavePlantilla').val())
            plantilla = $('#cClavePlantilla').val();
            r.forEach(function(lst) {
                if(plantilla == 'createCliente'){
                    document.getElementById("clienteRepresentanteM").innerHTML += "<option value='" + lst.iIDClienteF + "'>" + lst.cNombre + ' ' + lst.cApellidoPat + ' ' + lst.cApellidoMat + "</option>"
                }else if(plantilla == 'EditPersonaMoral' || plantilla == 'EditPersonaMoralProspecto'){
                    document.getElementById("clienteRepresentanteMEdit").innerHTML += "<option value='" + lst.iIDClienteF + "'>" + lst.cNombre + ' ' + lst.cApellidoPat + ' ' + lst.cApellidoMat + "</option>"
                }
            })
        },
        error: function (err) {
        },
    });

    $("#gridClientesF").bootstrapTable({
        url: "/consultarRepresentantes",
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
            field: "iIDClienteF",
            title: "iIDClienteF",
            visible: false,
        }, {
            field: "cNombreCompleto",
            title: "Nombre",
            formatter: "nombreGridFisFormatter"
        },{
            field: "cRFC",
            title: "RFC",
            // formatter: "usuarioPermisoFormatter"
        },{
            field: "cEmail",
            title: "Email",
            // formatter: "usuarioPuestoFormatter"
        },{
            field: "lActivo",
            title: "Estatus",
            formatter: "clienteFisStatusFormatter",
        },{
            field: "cAccion",
            title: "Acciones",
            formatter: "clienteFisFormatter",
        }],
        onLoadSuccess: function(data) {},
    });

    $("#gridClientesM").bootstrapTable({
        url: "/consultarClientesM",
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
            field: "iIDClienteM",
            title: "iIDClienteM",
            visible: false,
        }, {
            field: "cRazonSocial",
            title: "Nombre",
            // formatter: "nombreGridMorFormatter"
        },{
            field: "cRFC",
            title: "RFC",
            // formatter: "usuarioPermisoFormatter"
        },{
            field: "cEmail",
            title: "Email",
            // formatter: "usuarioPuestoFormatter"
        },{
            field: "lActivo",
            title: "Estatus",
            formatter: "clienteMorStatusFormatter",
        },{
            field: "cAccion",
            title: "Acciones",
            formatter: "clienteMorFormatter",
        }],
        onLoadSuccess: function(data) {},
    });

    $("#gridProspectosF").bootstrapTable({
        url: "/consultarProspectosFisic",
        classes: "table-striped",
        uniqueId: "id",
        method: "post",
        contentType: "application/x-www-form-urlencoded",
        pagination: true,
        pageSize: 10,
        columns: [{
            field: "id",
            title: "id",
            visible: false,
        },{
            field: "iIDClienteF",
            title: "iIDClienteF",
            visible: false,
        }, {
            field: "cNombreCompleto",
            title: "Nombre",
            formatter: "nombreGridFisFormatter"
        },{
            field: "cRFC",
            title: "RFC",
            // formatter: "usuarioPermisoFormatter"
        },{
            field: "cEmail",
            title: "Email",
            // formatter: "usuarioPuestoFormatter"
        },{
            field: "lActivo",
            title: "Estatus",
            formatter: "clienteFisStatusFormatter",
        },{
            field: "cAccion",
            title: "Acciones",
            formatter: "clienteFisFormatter",
        }],
        onLoadSuccess: function(data) {},
    });

    $("#gridProspectosM").bootstrapTable({
        url: "/consultarProspectosM",
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
            field: "iIDClienteM",
            title: "iIDClienteM",
            visible: false,
        }, {
            field: "cRazonSocial",
            title: "Nombre",
            // formatter: "nombreGridMorFormatter"
        },{
            field: "cRFC",
            title: "RFC",
            // formatter: "usuarioPermisoFormatter"
        },{
            field: "cEmail",
            title: "Email",
            // formatter: "usuarioPuestoFormatter"
        },{
            field: "lActivo",
            title: "Estatus",
            formatter: "clienteMorStatusFormatter",
        },{
            field: "cAccion",
            title: "Acciones",
            formatter: "clienteMorFormatter",
        }],
        onLoadSuccess: function(data) {},
    });

    $('#clienteTipo').val(1);
    $("#infoClienteFisica").show();
    $("#infoClienteFisicaExpediente").show();
    $("#infoClienteMoral").hide();
    $("#infoClienteMoralExpediente").hide();
})

function nombreGridFisFormatter(value, row) {
    var html = ""

    html = row.cNombre + ' ' + row.cApellidoPat+ ' ' + row.cApellidoMat;
    
    return html;
}

function clienteFisStatusFormatter(value, row) {
    var html = ""
    
        if(row.lActivo == 1){
            html = '<span class="badge badge-sm badge-success">Activo</span>';
        }else{
            html = '<span class="badge badge-sm badge-danger">Inactivo</span>';
        }

    return html;
}

function clienteFisFormatter(value, row) {
    var html = ""

    // html = '<a href="javascript:;" onclick="infoUser('+row.iIDClienteF+')" data-bs-toggle="tooltip" data-bs-original-title="Tarjeta de presentacion">'+
    //         ' <i class="fas fa-eye text-secondary"></i>'+
    //         '</a>'+
            html = '<a href="javascript:;" onclick="editClienteF('+row.iIDClienteF+')" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Cliente">'+
                        '<i class="fas fa-user-edit text-secondary"></i>'+
                    '</a>';
    
    return html;
}

function clienteMorFormatter(value, row) {
    var html = ""

    // html = '<a href="javascript:;" onclick="infoUser('+row.iIDClienteF+')" data-bs-toggle="tooltip" data-bs-original-title="Tarjeta de presentacion">'+
    //         ' <i class="fas fa-eye text-secondary"></i>'+
    //         '</a>'+
            html = '<a href="javascript:;" onclick="editClienteM('+row.iIDClienteM+')" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Cliente">'+
                        '<i class="fas fa-user-edit text-secondary"></i>'+
                    '</a>';
    
    return html;
}

function clienteMorStatusFormatter(value, row) {
    var html = ""
    
        if(row.lActivo == 1){
            html = '<span class="badge badge-sm badge-success">Activo</span>';
        }else{
            html = '<span class="badge badge-sm badge-danger">Inactivo</span>';
        }

    return html;
}

$('#clienteTipo').on('change', function () {
    if($('#clienteTipo').val() == 1){
        $("#infoClienteFisica").show();
        $("#infoClienteFisicaExpediente").show();
        $("#infoClienteMoral").hide();
        $("#infoClienteMoralExpediente").hide();
    }else if($('#clienteTipo').val() == 2){
        $("#infoClienteFisica").hide();
        $("#infoClienteFisicaExpediente").hide();
        $("#infoClienteMoral").show();
        $("#infoClienteMoralExpediente").show();

    }else{
        $("#infoClienteFisica").hide();
        $("#infoClienteFisicaExpediente").hide();
        $("#infoClienteMoral").hide();
    }
});

function editClienteF(id){
    
    $.ajax({
        url: "/editClienteF",
        type: "post",
        dataType: "json",
        data: {
            iIDClienteF : id,
        },
        success: function (r) {
            $('#clienteEstatusFisicEdit').val(r[0].iTipo);
            $('#clienteNombreEdit').val(r[0].cNombre);
            $('#clienteApellidoPEdit').val(r[0].cApellidoPat);
            $('#clienteApellidoMEdit').val(r[0].cApellidoMat);
            $('#clienteEmailEdit').val(r[0].cEmail);
            $('#clienteTelEdit').val(r[0].iTel);
            $('#clienteCelEdit').val(r[0].iCel);
            $('#clienteCURPEdit').val(r[0].cCURP);
            $('#clienteRFCEdit').val(r[0].cRFC);
            $('#clienteOcupacionEdit').val(r[0].cOcupacion);
            $('#clienteNacEdit').val(r[0].cPaisNacimiento);
            $('#clienteCivilEdit').val(r[0].cEstadoCivil);
            $('#clienteConyEdit').val(r[0].cNombreConyugue);
            $('#clienteCalleEdit').val(r[0].iCalle1);
            $('#clienteNumExEdit').val(r[0].iNumExt1);
            $('#clienteNumIntEdit').val(r[0].iNumInt1);
            $('#clienteCpEdit').val(r[0].cCodPost1);
            $('#clienteColoniaEdit').val(r[0].cColonia1);
            $('#clienteCiudadEdit').val(r[0].cCiudad1);
            $('#clienteEstadoEdit').val(r[0].cEstado1);
            $('#clienteCalleFiscEdit').val(r[0].iCalle2);
            $('#clienteNumExFiscEdit').val(r[0].iNumExt2);
            $('#clienteNumIntFiscEdit').val(r[0].iNumInt2);
            $('#clienteCpFiscEdit').val(r[0].cCodPost2);
            $('#clienteColoniaFiscEdit').val(r[0].cColonia2);
            $('#clienteCiudadFiscEdit').val(r[0].cCiudad2);
            $('#clienteEstadoFiscEdit').val(r[0].cEstado2);
            
            $('#btnEditClienteFis').val(id);

            $('#modalEditClienteF').modal('show');
    },
        error: function (err) {
            
        },
    });
}

function updateClienteF(id){
    
    
    $.ajax({
        url: "/updateClienteF",
        type: "post",
        dataType: "json",
        data: {
            iIDClienteF : id,
            cNombe : $('#clienteNombreEdit').val(),
            cApellidoP : $('#clienteApellidoPEdit').val(),
            cApellidoM : $('#clienteApellidoMEdit').val(),
            cEmail : $('#clienteEmailEdit').val(),
            iTel : $('#clienteTelEdit').val(),
            iCel : $('#clienteCelEdit').val(),
            cCURP : $('#clienteCURPEdit').val(),
            cRFC : $('#clienteRFCEdit').val(),
            cOcupacion : $('#clienteOcupacionEdit').val(),
            cNac :  $('#clienteNacEdit').val(),
            cCivil : $('#clienteCivilEdit').val(),
            cConyugue : $('#clienteConyEdit').val(),
            cCalle : $('#clienteCalleEdit').val(),
            cNumExt : $('#clienteNumExEdit').val(),
            cNumInt : $('#clienteNumIntEdit').val(),
            cCP : $('#clienteCpEdit').val(),
            cColonia : $('#clienteColoniaEdit').val(),
            cCiudad : $('#clienteCiudadEdit').val(),
            cEstado : $('#clienteEstadoEdit').val(),
            cCalle2 : $('#clienteCalleFiscEdit').val(),
            cNumExt2 : $('#clienteNumExFiscEdit').val(),
            cNumInt2 : $('#clienteNumIntFiscEdit').val(),
            cCP2 : $('#clienteCpFiscEdit').val(),
            cColonia2 : $('#clienteColoniaFiscEdit').val(),
            cCiudad2 : $('#clienteCiudadFiscEdit').val(),
            cEstado2 : $('#clienteEstadoFiscEdit').val(),
            iTipo : $('#clienteEstatusFisicEdit').val(),
        },
        success: function (r) {

            if(r.lSuccess){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: r.cMensaje,
                    showConfirmButton: false,
                    timer: 3000
                  })
                  $("#gridClientesF").bootstrapTable("refresh");
                  $("#gridProspectosF").bootstrapTable("refresh");
                  $('#modalEditClienteF').modal('hide');
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: r.cMensaje,
                    showConfirmButton: false,
                    timer: 3000
                  })
            }
    },
        error: function (err) {
            
        },
    });
}

$("#btnEditClienteFis").click(function() {
    // alert($('#btnEditClienteFis').val())
    var id = $('#btnEditClienteFis').val();
    updateClienteF(id);
});

function editClienteM(id){
    $.ajax({
        url: "/editClienteM",
        type: "post",
        dataType: "json",
        data: {
            iIDClienteM : id,
        },
        success: function (r) {
            $('#clienteEstatusMorEdit').val(r[0].iTipo);
            $('#clienteRazonSocialEdit').val(r[0].cRazonSocial);
            $('#clienteCorreoMEdit').val(r[0].cEmail);
            $('#telClienteMEdit').val(r[0].iTel);
            $('#celClienteMEdit').val(r[0].iCel);
            $('#clienteDomicilioMEdit').val(r[0].cDomicilioFiscal);
            $('#clienteEntidadMEdit').val(r[0].cEntidad);
            $('#clientCodigoPostMEdit').val(r[0].cCodigoPost);
            $('#clienteRFCMEdit').val(r[0].cRFC);
            $('#clienteRegimenMEdit').val(r[0].cRegimenFisc);
            $('#clienteRepresentanteMEdit').val(r[0].iIDClienteF);
        
            $('#btnEditClienteMor').val(id);

            $('#modalEditClienteM').modal('show');
    },
        error: function (err) {
            
        },
    });
}

function updateClienteM(id){
    $.ajax({
        url: "/updateClienteM",
        type: "post",
        dataType: "json",
        data: {
            iIDClienteM : id,
            cRazonSocial : $('#clienteRazonSocialEdit').val(),
            cEmail : $('#clienteCorreoMEdit').val(),
            iTel : $('#telClienteMEdit').val(),
            iCel : $('#celClienteMEdit').val(),
            cRFC : $('#clienteRFCMEdit').val(),
            cDomicilio : $('#clienteDomicilioMEdit').val(),
            cEntidad :  $('#clienteEntidadMEdit').val(),
            cCP : $('#clientCodigoPostMEdit').val(),
            cRegimenFisc : $('#clienteRegimenMEdit').val(),
            iRepresentante : $('#clienteRepresentanteMEdit').val(),
            iTipo : $('#clienteEstatusMorEdit').val(),
        },
        success: function (r) {

            if(r.lSuccess){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: r.cMensaje,
                    showConfirmButton: false,
                    timer: 3000
                  })
                  $("#gridClientesM").bootstrapTable("refresh");
                  $("#gridProspectosM").bootstrapTable("refresh");
                  $('#modalEditClienteM').modal('hide');
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: r.cMensaje,
                    showConfirmButton: false,
                    timer: 3000
                  })
            }
    },
        error: function (err) {
            
        },
    });
}

$("#btnEditClienteMor").click(function() {
    // alert($('#btnEditClienteFis').val())
    var id = $('#btnEditClienteMor').val();
    updateClienteM(id);
});