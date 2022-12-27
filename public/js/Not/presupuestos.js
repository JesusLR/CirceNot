$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    $("#btnAgregarS").on('click', function () {
        selectPresupuesto();
    });
    $("#saveInfoPresupuesto").on('click', function () {
        guardarPresupuesto();
    });

    $("#honorarios").change(function () {

        calcularHonorarios();


    });

    $("#gridPresupuestos").bootstrapTable({
        url: "/getPresupuestos",
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
            field: "cNombre",
            title: "Nombre",
            // formatter: "nombreGridFisFormatter",

        },{
            field: "folio",
            title: "Folio",
            // formatter: "usuarioPermisoFormatter"

        },{
            field: "totales",
            title: "Total",
            // formatter: "usuarioPermisoFormatter"

        },{
            field: "lActivo",
            title: "Estatus",
            formatter: "clienteFisStatusFormatter",
        },{
            field: "cAccion",
            title: "Opciones",
            formatter: "presupuestoFormatter",
        }],
        onLoadSuccess: function(data) {},
    });


    $("#gridServicios").bootstrapTable({
        // url: "/getServices",
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
            field: "name",
            title: "Servicio",
            formatter: "titleFormatter",

        },{
            field: "Price",
            title: "Importe",
            // formatter: "usuarioPermisoFormatter"

        },{
            field: "cAccion",
            title: "Opciones",
            formatter: "EditAccionFormatter",
        }],
        onLoadSuccess: function(data) {},
    });


})

function EditAccionFormatter(value, row) {
    // console.log(row);
    var html = "";
    html = '<a href="javascript:;" onclick="eliminarProducto('+row.id+')" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Cliente">'+
                        '<i class="fas fa-trash text-secondary"></i>'+
                    '</a>';
    // html =
    //     '<a href="javascript:void(0);" onclick="eliminarProducto(' +
    //     row.id +
    //     ')" class="btn btn-round btn-danger btn-icon btn-sm" rel="tooltip" data-toggle="tooltip" title="Eliminar"><i class="ni ni-fat-remove"></i></a>&nbsp;' +
    //     "<script>$('[data-toggle=" +
    //     '"' +
    //     "tooltip" +
    //     '"' +
    //     "]').tooltip() </script>";
    return html;
}

function eliminarProducto(id) {
    // console.log(id);
    $(".tooltip").hide();
    $("#gridServicios").bootstrapTable("removeByUniqueId", id);

    let total = $("#gridServicios").bootstrapTable("getData");
                    let precioTotal = 0;
                    total.forEach(function (lst) {


                        precioTotal = (lst.Price + precioTotal);
                    });
                    $("#subTotalPrice").val(Number(precioTotal).toFixed(2));
                    let totales = "0";
                    totales = Number($("#totalHonorarios").val())+  Number(precioTotal);
                    $("#totales").val(Number(totales).toFixed(2));

                    calcularHonorarios()

}
function descriptionFormatter(value, row) {
    if (value.length > 20) {
        return value.substr(0, 20) + '...';
    } else {
        return value;
    }
}
function titleFormatter(value, row) {
    var html = ""


            html = '<b>'+row.name+'</b>';


    return html;
}
function presupuestoFormatter(value, row) {
    var html = ""

    // html = '<a href="javascript:;" onclick="infoUser('+row.iIDClienteF+')" data-bs-toggle="tooltip" data-bs-original-title="Tarjeta de presentacion">'+
    //         ' <i class="fas fa-eye text-secondary"></i>'+
    //         '</a>'+
            // html = '<a href="javascript:;" onclick="editClienteF('+row.iIDClienteF+')" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Cliente">'+
            //             '<i class="fas fa-user-edit text-secondary"></i>'+
            //         '</a>';
            html += '<a href="javascript:;" onclick="pdfPresupuesto('+row.id+')" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Cliente">'+
                    '<i class="fa fa-print text-secondary"></i>'+
                '</a>';

    return html;
}

function selectPresupuesto() {
    if ($("#typeServices").val() == 0) {
        swal.fire({
            title: "Aviso",
            text: "Seleccione un Servicio",
            type: "warning",
            showConfirmButton: true,
            confirmButtonClass: "btn btn-success btn-round",
            confirmButtonText: "Aceptar",
            buttonsStyling: false,
        });
        return false;
    }
    $.ajax({
        url: "/getServicesById",
        type: "post",
        dataType: "json",
        data: {
            idService: $("#typeServices").val()
        },
        beforeSend: function () {
            swal.fire({
                title: "Presupuesto",
                text: "Agregando Servicio",
                allowEscapeKey: false,
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                },
            });
        },

        success: function (r) {

            swal.close();
             console.log(r);
            if (r.length > 0) {

                // let table = $("#gridServicios").bootstrapTable("getData");

                    var num = $("#gridServicios").bootstrapTable("getData").length;
                    r.forEach(function (servicio) {
                        $("#gridServicios").bootstrapTable("insertRow", {
                            index: num + 1,
                            row: {
                                id: num + 1,
                                id_service:servicio.id,
                                name: servicio.name,
                                Price:servicio.Price,


                            },
                        });

                    });

                    let total = $("#gridServicios").bootstrapTable("getData");
                    let precioTotal = 0;
                    total.forEach(function (lst) {


                        precioTotal = (lst.Price + precioTotal);
                    });
                    $("#subTotalPrice").val(Number(precioTotal).toFixed(2));
                    let totales = "0";
                    totales = Number($("#totalHonorarios").val())+  Number(precioTotal);
                    $("#totales").val(Number(totales).toFixed(2));



                $("#typeServices").val(0);

            } else {
                swal.fire({
                    icon: "info",
                    title: "Busqueda fallida",
                    text: "No se encontro el servicio ",

                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-primary btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });
                $("#search_product").val("");
            }




        },
        error: function (err) {
            NProgress.done();
            swal.close();
            alert("Problemas con procedimiento.");
        },
    });

}
function pdfPresupuesto(idPresupuestoPDF) {
    $("#idPresupuestoPDF").val(idPresupuestoPDF);
    console.log( $("#idPresupuestoPDF").val());
    $("#formPDFPresupuesto").submit();




}
function guardarPresupuesto() {
    console.log($("#idClient").val());
    if ($("#idClient").val() == 0) {
        swal.fire({
            title: "Aviso",
            text: "Seleccione un Cliente",
            type: "warning",
            showConfirmButton: true,
            confirmButtonClass: "btn btn-success btn-round",
            confirmButtonText: "Aceptar",
            buttonsStyling: false,
        });
        return false;
    }
    if ($("#gridServicios").bootstrapTable("getData").length == 0) {
        swal.fire({
            title: "Aviso",
            text: "No se agregaron servicios",
            type: "warning",
            showConfirmButton: true,
            confirmButtonClass: "btn btn-success btn-round",
            confirmButtonText: "Aceptar",
            buttonsStyling: false,
        });
        return false;
    }
    if ($("#honorarios").val() == 0) {
        swal.fire({
            title: "Aviso",
            text: "No se ingreso los honorarios",
            type: "warning",
            showConfirmButton: true,
            confirmButtonClass: "btn btn-success btn-round",
            confirmButtonText: "Aceptar",
            buttonsStyling: false,
        });
        return false;
    }
    if ($("#vigencia").val() <= 0) {
        swal.fire({
            title: "Aviso",
            text: "Ingrese Vigencia Valida",
            type: "warning",
            showConfirmButton: true,
            confirmButtonClass: "btn btn-success btn-round",
            confirmButtonText: "Aceptar",
            buttonsStyling: false,
        });
        return false;
    }


    $.ajax({
        url: "/createPresupuesto",
        type: "post",
        dataType: "json",
        data: {
            idClient: $("#idClient").val(),
            totales: $("#totales").val(),
            honorarios: $("#honorarios").val(),
            ivaHonorarios: $("#IVAHonorarios").val(),
            totalHonorarios: $("#totalHonorarios").val(),
            subtotalServicios: $("#subTotalPrice").val(),
            vigencia: $("#vigencia").val(),
            presupuesto:$("#gridServicios").bootstrapTable("getData"),

        },
        beforeSend: function () {
            swal.fire({
                title: "Presupuesto",
                text: "Agregando Servicio",
                allowEscapeKey: false,
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                },
            });
        },

        success: function (r) {

            swal.close();
             console.log(r);
            if (r.lSuccess) {

                swal.fire({
                    icon: "info",
                    title: "Presupuesto Folio: "+r.folioPresupuesto,
                    text: "se guardo el presupuesto con éxito",

                    showCancelButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#FF8400",
                    confirmButtonText: "¡Aceptar!",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.value != undefined) {
                        $("#idClient").val(0);
                        $("#typeServices").val(0);
                        $("#subHonorarios").val("");
                        $("#totales").val("");
                        $("#honorarios").val(0);
                        $("#IVAHonorarios").val("");
                        $("#totalHonorarios").val("");
                        $("#subTotalPrice").val("");
                        location.href = "presupuestosIndex";
                    }
                });







            } else {
                swal.fire({
                    icon: "info",
                    title: "Error",
                    text: "No se pudo guardar el presupuesto",

                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-primary btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });
                $("#search_product").val("");
            }




        },
        error: function (err) {
            NProgress.done();
            swal.close();
            alert("Problemas con procedimiento.");
        },
    });

}
function calcularHonorarios() {
    let iva = "0";
    let totalh = "0";
    let totales = "0";

    if ($("#honorarios").val().length > 0) {

             iva = Number($("#honorarios").val())*.15;
             $("#IVAHonorarios").val(Number(iva).toFixed(2));
             $("#subHonorarios").val(Number($("#honorarios").val()).toFixed(2));
             totalh = Number(iva) + Number($("#honorarios").val());
             $("#totalHonorarios").val(Number(totalh).toFixed(2));
             $("#totalHonorarios2").val(Number(totalh).toFixed(2));
             totales = Number(totalh)+  Number($("#subTotalPrice").val());
             $("#totales").val(Number(totales).toFixed(2));




}}
function reset() {
    $("#gridServicios").bootstrapTable("removeAll");
    $("#gridServicios").bootstrapTable("refresh");

}
