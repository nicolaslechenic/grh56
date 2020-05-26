$(document).ready(function () {
    $(".fade_in").each(function (i) {
        $(this).delay(600 * i).fadeIn(1300);
    })

})