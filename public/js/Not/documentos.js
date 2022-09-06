$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    $("#gridDocs").bootstrapTable({
        url: "/admin/gridDocs",
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
            field: "iIDCatalogoDocumento",
            title: "iIDDocumento",
            visible: false,
        }, {
            field: "cNombre",
            title: "Nombre",
        },{
            field: "cDescripcion",
            title: "Descripcion",
            // formatter: "usuarioPermisoFormatter"
        },{
            field: "accionews",
            title: "Acciones",
            formatter: "docFormatter"
        }
         ],
        onLoadSuccess: function(data) {},
    });

})

function docFormatter(value, row) {
    var html;
    
    html = '<a href="javascript:;" class="mx-3" onclick="verDoc('+row.iIDCatalogoDocumento+')" data-bs-toggle="tooltip" data-bs-original-title="Ver Documento">' +
            '<i class="fas fa-file"></i>'+
            '</a>';

    return html;
}


function verDoc(id){
    // alert(id)
    $.fancybox.open({
        src: window.url + "/admin/consultarDocumento/" + id,
        type: 'iframe',
        iframe: {
            css: {
                height: '100%',
                width: '90%'
            }
        },
        //baseClass: "fancybox-custom-layout",
        infobar: false,
        touch: {
            vertical: false
        },
        buttons: ["close"],
        animationEffect: "fade",
        transitionEffect: "fade",
        preventCaptionOverlap: false,
        idleTime: false,
        gutter: 0,
        // Customize caption area
        caption: function (instance) {
            return '';
        }
    });
}

function modalDocumentos(){
    $('#docNombre').val('');
    $('#descripcionDoc').val('');
    $('#fileDoc').val(null);
    $('#docsModal').modal('show');
}
