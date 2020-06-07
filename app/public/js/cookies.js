document.getElementById("accept").addEventListener("click", setCookie);
document.getElementById("cookies_more").addEventListener("click", aboutCookies);

function setCookie() {
    document.cookie = 'grh56=yes; path=/';
    document.getElementById("cookie_bar").classList.add("none");
}

function read() {
    alert(document.cookie);
}

function aboutCookies() {
    window.location.href = "index.php?action=about_cookies";
}