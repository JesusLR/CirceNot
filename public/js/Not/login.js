$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });

    // $("#btnAceptLoginAutorizado").click(function() {
    //     email = $('#userInputLogAutorizado').val();
    //     password = $('#passInputLogAutorizado').val();

    //     $.ajax({
    //         url: "/inicio-sesion",
    //         type: "POST",
    //         dataType: "json",
    //         data: {
    //             email: email,
    //             password: password,
    //         },
    //         dataType: "json",
    //         success: function (r) {
    //             // alert('Bienvenido '+ email);
    //     },
    //         error: function (err) {

    //         },
    //     });

    // });
})
