$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
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
function titleFormatter(value, row) {
    var html = ""


            html = '<b>'+row.name+'</b>';


    return html;
}
