function signUp() {
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
            if (response == 'registred') {
                window.location.href = 'index.php?action=student';
            }
        }
    })
}