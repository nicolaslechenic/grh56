$("#publish_button").click(function () {
    $("#bothRequired").text("");

    if ($("#lesson_week1").val() == "" || $("#lesson_week2").val() == "") {
        $("#bothRequired").text("Both fields required");
        event.stopImmediatePropagation();
    } else {
        window.location.href = "indexAdmin.php?action=lessonWeek";
    }
})