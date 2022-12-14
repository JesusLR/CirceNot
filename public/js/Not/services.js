$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    // $("#formService").data("validator").resetForm();

    $("#formNewCliente").validate({
        ignore: [],
        errorPlacement: function () { },
        invalidHandler: function () {
            setTimeout(function () {
                $(".nav-pills a small.required").remove();
                var lPrimero = false;
                var cTab = "";
                var validatePane = $(
                    ".tab-content.tab-validate .tab-pane:has(input.error)"
                ).each(function () {
                    var id = $(this).attr("id");
                    if (lPrimero == false) {
                        lPrimero = true;
                        cTab = id;
                    }
                    $(".nav-pills")
                        .find('a[href^="#' + id + '"]')
                        .append(' <small class="required">***</small>');
                });
                $('a[href="#' + cTab + '"]').tab("show");
            });
        },
        rules: {

            nameService: { required: true },
            description: { required: true },
            typeService: { required: true },
            servicePrice: { required: true },


        },
        messages: {

            nameService: "* Debe Ingresar el nombre del servicio",
            description: " * Debe Ingresar Una Descripcion",
            typeService: " * Seleccione un tipo de servicio",
            servicePrice: " * Ingresar el costo",

        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            element.siblings("label").append(error);
        },
        submitHandler: function () {
             saveServiceform();
            console.log("validado");
            return false;
        },
    });

    $("#saveInfoService").click(function () {

        $("#formService").submit();

    });



    $("#gridServices").bootstrapTable({
        url: "/getServices",
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

        }, {
            field: "Description",
            title: "Descripcion",
            formatter: "descriptionFormatter",

        },{
            field: "Price",
            title: "Precio",
            // formatter: "usuarioPermisoFormatter"

        },{
            field: "lActivo",
            title: "Estatus",
            formatter: "clienteFisStatusFormatter",
        },{
            field: "cAccion",
            title: "Opciones",
            formatter: "clienteFisFormatter",
        }],
        onLoadSuccess: function(data) {},
    });


})
function descriptionFormatter(value, row) {
    if (value.length > 20) {
        return value.substr(0, 20) + '...';
    } else {
        return value;
    }
}
function saveServiceform(){

    if($("#typeService").val() == 0){
        Swal.fire({
            // position: 'top-end',
            icon: 'warning',
            title: "Seleccione un tipo de servicio",
            showConfirmButton: true,
            timer: 3000
      });

    }else{
    var captura = new FormData();




    captura.append("nameService", $("#nameService").val());
    captura.append("description", $("#description").val());
    captura.append("typeService", $("#typeService").val());
    captura.append(
        "servicePrice",
        Number($("#servicePrice").val()).toFixed(2)
    );




    $.ajax({
        url:  "/createService",
        type: "post",
        dataType: "json",
        async: true,
        cache: false,
        enctype: "multipart/form-data",
        contentType: false,
        processData: false,
        data: captura,
        beforeSend: function () {
            Swal.fire({
                title: "CirceNot",
                text: "Guardando Informacion...",
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: () => {
                    swal.showLoading();
                },
            });
        },
        success: function (data) {
            swal.close();
            //$("#iIDPrecaptura").val(data.iIDPrecaptura);
            if (data.lSuccess) {

                 Swal.fire({
                    title: "CirceNot",
                    text: "Informacion Guardada.",
                    type: "success",
                    allowOutsideClick: false,
                }).then(function () {
                    location.href = "ServiceIndex";
                });
            } else {
                 Swal.fire({
                    title: "Advertencia",
                    text: data.cMensaje,
                    type: "warning",
                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-success btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });
                return false;
            }
        },
        error: function (err) {
            swal.close();
            Swal.fire({
                title: "Error",
                text: "Problemas con procedimiento.",
                type: "warning",
                showConfirmButton: true,
                confirmButtonClass: "btn btn-success btn-round",
                confirmButtonText: "Aceptar",
                buttonsStyling: false,
            });
        },
    });
}

}
function titleFormatter(value, row) {
    var html = ""


            html = '<b>'+row.name+'</b>';


    return html;
}
