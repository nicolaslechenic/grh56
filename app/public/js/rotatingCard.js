$(document).ready(function () {
    $("#card1").mouseenter(function () {
        $(".card", this).css("transform", "rotateY(180deg)");
        $(".card", this).css("transition", "transform 1.2s");

    });
    $("#card1").mouseleave(function () {
        $(".card", this).css("transform", "rotateY(0deg)");
        $(".card", this).css("transition-delay", "0.8s");
    });

    $("#card2").mouseenter(function () {
        $(".card", this).css("transform", "rotateY(180deg)");
        $(".card", this).css("transition", "transform 1.2s");

    });
    $("#card2").mouseleave(function () {
        $(".card", this).css("transform", "rotateY(0deg)");
        $(".card", this).css("transition", "transform 1.2s");
    });

    $("#cardW1").mouseenter(function () {
        $(".card", this).css("transform", "rotateY(180deg)");
        $(".card", this).css("transition", "transform 1.2s");

    });

    $("#cardW1").mouseleave(function () {
        $(".card", this).css("transform", "rotateY(0deg)");
        $(".card", this).css("transition-delay", "0.8s");
    });

    $("#cardW2").mouseenter(function () {
        $(".card", this).css("transform", "rotateY(180deg)");
        $(".card", this).css("transition", "transform 1.2s");

    });

    $("#cardW2").mouseleave(function () {
        $(".card", this).css("transform", "rotateY(0deg)");
        $(".card", this).css("transition-delay", "0.8s");
    });
});