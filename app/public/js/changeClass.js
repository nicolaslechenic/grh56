// if "js" is enebled for the user browser, changing classes in order to display 
//  fadeIn animation (menuFadeIn.js, plugin.js, pageFadeIn.js)
$(document).ready(function () {
    $('.fade').each(function () {
        $(this).addClass('fade_in').removeClass('fade');
    })
    $('.fade_menu').each(function () {
        $(this).addClass('fade_in_menu').removeClass('fade_menu');
    })
    $('body').removeClass('none');
})