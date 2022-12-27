$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    /**
    * Bootstrap table
    */
    $('#profileTable').bootstrapTable({
        url: '/perfiles/gridProfiles',
        method: 'POST',
        contentType: "application/x-www-form-urlencoded",
        classes: "table-striped",
        search: true,
        pagination: true,
        pageSize: 10,
        columns: [{
            field: "name",
            title: "Perfil",
        }, {
            field: "",
            title: "Acciones",
            formatter: "accionesFormatter"
        }]
    });
});
function accionesFormatter(value, row) {
    html = '';
    html += `<button type="button" onclick="getPermissions(${row.id})" class="btn bg-gradient-warning" data-bs-toggle="tooltip" data-bs-placement="top"  data-bs-title="Editar permisos"><i class="fas fa-lock"></i></button>`
    return html;
}

function editPermisos(id) {
    Swal.fire({
        title: 'Permisos',
        text: `Permisos del perfil ${id}`,
    });
}
function getPermissions(id) {
    Swal.fire({
        title: 'Recuperando información',
        text: 'Espere un momento, por favor.',
        icon: 'info',
        didOpen: () => {
            Swal.showLoading();
            window.location.href = `/perfiles/editar-permiso/${id}`
        }
    });
}
function swalMensaje(title, icon, text) {
    Swal.fire({
        title: title,
        icon: icon,
        text: text,
    });
}
