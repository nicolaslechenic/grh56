$(document).ready(function () {
    $('#login_button').on('click', function () {
        var login_email = $('#log_in_email').val();
        var login_password = $('#log_in_password').val();

        if (login_email == "" || login_password == "") {
            // function error
        } else {
            // sending data to through index router
            $.ajax({
                url: 'index.php',
                type: 'POST',
                data: {
                    data: 1,
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
        }

    })
})