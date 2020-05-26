$(document).ready(function () {

    // getting string from html
    var quote = $("#plugin").text().split("")

    //clear text in html
    $("#plugin").text("")

    // create separate span for each letter
    quote.forEach(function (i) {
        var letter = $("<span class='quote'>").text(i);
        $("#plugin").append(letter);
    });
    var i = 1
    $(document).find(".quote").each(function () {
        var l = $(this)
        setTimeout(function () {
            l.animate({
                "opacity": 1
            }, 250);
        }, i * 100);
        i++
    });
})