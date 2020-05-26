// animation for testimonies. 
$(document).ready(function () {
    $(".testimony").click(function () {
        var id = $(this).attr("id");
        $("#" + id).animate({
            height: '350px'
        }).fadeOut(1000, function () {
            $("#testimonial" + id).fadeIn(1000)
        })

    })
    $(".hidden_testimonies").click(function () {
        var id = $(this).attr("id");
        var id1 = id.split("l");
        $("#" + id).fadeOut(1000, function () {
            $("#" + id1[1]).animate({
                height: '200'
            }).fadeIn(1000)

        })
    });
});