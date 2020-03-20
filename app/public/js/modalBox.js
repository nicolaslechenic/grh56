$(document).ready(function () {
    $("#connect").click(function () {
        $("#modal_box").show();
    });
    $("#create_account").click(function () {
        $("#modal_box").hide();
        setTimeout(function () {
            $("#signin_box").show();
        }, 200);
    })
    $(".fa").click(function () {
        $("#modal_box").hide();
        $("#signin_box").hide();
    });
});