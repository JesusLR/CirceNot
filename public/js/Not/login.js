$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
    });
})

$("#btnAceptLogin").click(function() {
    email = $('#userInputLog').val();
    password = $('#passInputLog').val();
    
    $.ajax({
        // headers: {
        //     "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        // },
        url: "/login",
        type: "POST",
        dataType: "json",
        data: {
            email: email,
            password: password,
        },
        dataType: "json",
        success: function (r) {
            window.location.href = "/home";
    },
        error: function (err) {
            
        },
    });

});