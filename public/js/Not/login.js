$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });
})

// $("#btnAceptLogin").click(function() {
//     email = $('#userInputLog').val();
//     password = $('#passInputLog').val();
    
//     $.ajax({
//         url: "/admin/loginPanel",
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