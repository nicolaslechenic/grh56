$(document).ready(function () {
    $('#login_button').on('click', function () {
        var login_email = $('#log_in_email').val();
        var login_password = $('#log_in_password').val();

        $.ajax({
            url: 'indexUser.php',
            type: 'POST',
            data: {
                signin: 1, //setting a key for checking signIn/signUp in indexUser.php
                email: login_email,
                password: login_password
            },
            success: function (response) {
                if (response === "user") {
                    window.location.href = 'index.php?action=student';
                } else if (response === "admin") {
                    window.location.href = 'index.php?admin';
                } else {
                    $("#wrongEmailPass").html(response);

                }
            },
        });
    })
})