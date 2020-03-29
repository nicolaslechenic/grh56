// checking if user emil exists without reloading page
// $(document).ready(function () {
//     $('#signup_button').on('click', function () {
//         console.log('ajax');
//         let signup_email = $('#sign_up_email').val();
//         $.ajax({
//             url: 'index.php',
//             type: 'POST',
//             data: {
//                 signup: 1, //key for checking if request exists
//                 emailAjax: signup_email,
//             },
//             success: function (response) {
//                 if (response == "ok") {
//                     window.location = 'indexSignUp.php';
//                     console.log('login rerout')
//                 } else {
//                     $("#upEmailRequired").html(response);
//                 }
//             },
//         });
//     })
// })