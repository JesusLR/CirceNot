$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    $.ajax({
        url: "/docUsers",
        type: "post",
        dataType: "json",
        data: {
            iIDCategoria: 1,
        },
        success: function (r) {
            if(r.lSuccess){
                var html = '';
                r.data.forEach(function (lst) {
                   html += '<div class="col-lg-6 col-md-6 col-12">'+
                            '<div class="card  mb-8">'+
                                '<div class="card-body p-3">'+
                                '<div class="row">'+
                                    '<div class="col-8">'+
                                    '<div class="numbers">'+
                                        '<p class="text-sm mb-0 text-uppercase font-weight-bold">Documento</p>'+
                                        '<h5 class="font-weight-bolder">'+
                                        ' ' +lst.cNombre+''+
                                        '</h5>'+
                                        '<p class="mb-0">'+
                                        ''+lst.cDescripcion+''+
                                        '</p>'+
                                    '</div>'+
                                    '</div>'+
                                    '<div class="col-4 text-end">'+
                                    '<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">'+
                                        '<i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>'+
                                    '</div>'+
                                    '</div>'+
                                '</div>'+
                                '</div>'+
                                '</div>'+
                            '</div>';                    
                });
                $('#divDocumentoUno').html(html);
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: r.cMensaje,
                    showConfirmButton: false,
                    timer: 3000
              })
            }
            
    },
        error: function (err) {
            
        },
    });

    // $('#categoriaDoc').select2({
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
            field: "iIDCategoria",
            title: "Categoria"
        },{
            field: "cDescripcion",
            title: "Descripcion",
            // formatter: "usuarioPermisoFormatter"
        },{
            field: "lActivo",
            title: "Estatus",
            formatter: "stsDocFormatter"
        },{
            field: "acciones",
            title: "Acciones",
            formatter: "docFormatter"
        }
         ],
        onLoadSuccess: function(data) {},
    });

})

function docFormatter(value, row) {
    var html = '';
    
    html += '<a href="javascript:;" class="mx-3" onclick="verDoc('+row.iIDCatalogoDocumento+')" data-bs-toggle="tooltip" data-bs-original-title="Ver Documento">' +
            '<i class="fas fa-file"></i>'+
            '</a>';

    html += '<a href="javascript:;" class="mx-3" onclick="confirmDeleteDoc('+row.iIDCatalogoDocumento+')" data-bs-toggle="tooltip" data-bs-original-title="Eliminar Documento">' +
            '<i class="fas fa-trash"></i>'+
            '</a>';

    return html;
}

function stsDocFormatter(value, row) {
    var html;
    if(row.lActivo == 1){
        html = '<span class="badge badge-sm badge-success" onclick="stsDoc('+row.iIDCatalogoDocumento+','+row.lActivo+')">Activo</span>';
    }else{
        html = '<span class="badge badge-sm badge-danger" onclick="stsDoc('+row.iIDCatalogoDocumento+','+row.lActivo+')">Inactivo</span>';
    }

    return html;
}

function stsDoc(id,sts){
    $.ajax({
        url: "/admin/stsDoc",
        type: "post",
        dataType: "json",
        data: {
            iIDCatalogoDocumento: id,
            sts : sts,
        },
        success: function (r) {
            if(r.lSuccess){
                $("#gridDocs").bootstrapTable("refresh");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: r.cMensaje,
                    showConfirmButton: false,
                    timer: 3000
              })
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
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

function confirmDeleteDoc(id){
    Swal.fire({
        title: 'Quieres eliminar este documento?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Aceptar',
        denyButtonText: `Cancelar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          deleteDoc(id);
        } 
      })
}

function deleteDoc(id){
    $.ajax({
        url: "/admin/deleteDoc",
        type: "post",
        dataType: "json",
        data: {
            iIDCatalogoDocumento: id,
        },
        success: function (r) {
            if(r.lSuccess){
                $("#gridDocs").bootstrapTable("refresh");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: r.cMensaje,
                    showConfirmButton: false,
                    timer: 3000
              })
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
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
    $('#categoriaDoc').val(0);
    $('#docsModal').modal('show');
}

// $("#btnDocUno").click(function() {
//     alert('hola')
//     $.ajax({
//         url: "/docUsers",
//         type: "post",
//         dataType: "json",
//         data: {
//             iIDCategoria: 1,
//         },
//         success: function (r) {
//             if(r.lSuccess){
//                 var html = '';
//                 r.data.forEach(function (lst) {
//                    html += '<div class="col-lg-3 col-md-6 col-12">'+
//                             '<div class="card  mb-4">'+
//                                 '<div class="card-body p-3">'+
//                                 '<div class="row">'+
//                                     '<div class="col-8">'+
//                                     '<div class="numbers">'+
//                                         '<p class="text-sm mb-0 text-uppercase font-weight-bold">Todays Money</p>'+
//                                         '<h5 class="font-weight-bolder">'+
//                                         '$53,000'+
//                                         '</h5>'+
//                                         '<p class="mb-0">'+
//                                         '<span class="text-success text-sm font-weight-bolder">+55%</span>'+
//                                         'since yesterday'+
//                                         '</p>'+
//                                     '</div>'+
//                                     '</div>'+
//                                     '<div class="col-4 text-end">'+
//                                     '<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">'+
//                                         '<i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>'+
//                                     '</div>'+
//                                     '</div>'+
//                                 '</div>'+
//                                 '</div>'+
//                                 '</div>'+
//                             '</div>';                    
//                 });
//                 $('#divDocumentoUno').html(html);
//             }else{
//                 Swal.fire({
//                     position: 'top-end',
//                     icon: 'warning',
//                     title: r.cMensaje,
//                     showConfirmButton: false,
//                     timer: 3000
//               })
//             }
            
//     },
//         error: function (err) {
            
//         },
//     });
// });