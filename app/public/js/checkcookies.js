$(document).ready(function () {
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookies = decodedCookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        if (cookies[i].includes("grh56")) {
            document.getElementById("cookie_bar").classList.add("none");
        }
    }

})