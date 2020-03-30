//checking if user emil exists without reloading page
$(document).ready(function () {
    $('#signup_button').on('click', function () {
        console.log('ajax');
        let signup_email = $('#sign_up_email').val();
        $.ajax({
            url: 'indexUser.php',
            type: 'POST',
            data: {
                signup: 1, //key for checking if request exists
                email: signup_email,
            },
            success: function (response) {
                if (response == "ok") {
                    let signup_name = $('#sign_up_name').val();
                    let signup_surname = $('#sign_up_surname').val();
                    let signup_email = $('#sign_up_email').val();
                    let signup_password = $('#sign_up_password').val();
                    $.ajax({
                        url: 'indexSignUp.php',
                        type: 'POST',
                        data: {
                            name: signup_name,
                            surname: signup_surname,
                            email: signup_email,
                            password: signup_password
                        },
                        success: function (response) {
                            if (response == 'registred')
                                window.location = 'indexLogin.php';
                        }
                    })
                } else {
                    $("#upEmailRequired").html(response);
                }
            },
        });
    })
})