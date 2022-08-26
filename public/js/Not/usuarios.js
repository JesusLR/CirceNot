$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    $("#gridUsers").bootstrapTable({
        url: window.url + "/admin/gridUsers",
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
        }, {
            field: "cNombreCompleto",
            title: "Nombre",
            // width: "5%",
        },{
            field: "cAccion",
            title: "Acciones",
            formatter: "usuarioFormatter",
        }],
        onLoadSuccess: function(data) {},
    });
    // $("#gridUsers").bootstrapTable("refresh");
})