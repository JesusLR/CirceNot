$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    $("#divProtocoloAbierto").hide();
})

$('#checkProtocoloAbierto').on('change', function () {
    if($('#checkProtocoloAbierto').prop('checked') == true){
        $("#divProtocoloAbierto").show();
    }else{
        $("#divProtocoloAbierto").hide();
    }
});