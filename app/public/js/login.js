$(document).ready(function () {
    $('#login_button').on('click', function () {
        var login_email = $('#log_in_email').val();
        var login_password = $('#log_in_password').val();

        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: {
                signin: 1, //setting a key for checking if  
                emailAjax: login_email,
                passwordAjax: login_password
            },
            success: function (response) {
                if (response == "ok") {
                    window.location = 'indexLogin.php';
                } else {
                    $("#wrongEmailPass").html(response);

                }
            },
        });
    })
})