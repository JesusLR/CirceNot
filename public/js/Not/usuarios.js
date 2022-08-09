$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    $("#gridUsers").bootstrapTable({
        classes: "table-striped",
        uniqueId: "id",
        method: "post",
        contentType: "application/x-www-form-urlencoded",
        queryParams: function(p) {
            return {
                iIDUser: "",
            };
        },
        pagination: true,
        pageSize: 10,
        columns: [{
            field: "id",
            title: "id",
            visible: false,
        }, {
            field: "cNombreCompleto",
            title: "Nombre",
            width: "5%",
        },{
            field: "cAccion",
            title: "Acciones",
            formatter: "usuarioFormatter",
        }],
        onLoadSuccess: function(data) {},
    });
    $("#gridUsers").bootstrapTable("refresh");
})