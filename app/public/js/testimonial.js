$(document).ready(function () {

    $(".testimony").click(function () {
        var id = $(this).attr("id");
        $("#" + id).slideUp(700, function () {
            $("#testimonial" + id).slideDown(1000)
        });
    });

    $(".testimony").click(function () {
        var id = $(this).attr("id");
        id1 = id.split("l");
        console.log()
        $("#" + id).slideUp(1000, function () {
            $("#" + id1[1]).slideDown(700)
        });
    });
});