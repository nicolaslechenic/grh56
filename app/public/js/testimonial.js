$(document).ready(function () {

    $(".testimony").click(function () {
        var id = $(this).attr("id");
        var testId = "#testimonial" + id;
        alert(testId);
        $("#testimonial" + id).show();
    });
});