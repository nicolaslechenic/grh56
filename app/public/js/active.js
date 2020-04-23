/* get url, cut everything before hash, and assign index 1 to currentPageHref*/
let currentPagePath = window.location.href;
//returns an array
let currentPageString = currentPagePath.split("/");
let lastChildIndex = currentPageString.length - 1;
let lastChild = currentPageString[lastChildIndex];
let lastChildSplit = lastChild.split("=");
// getting action word
let currentPage = lastChildSplit[1];

window.onload = function load() {
  if (currentPage !== 'logout') {
    document.getElementById(currentPage).className += " active";
  } else {
    document.getElementById('home').className += " active";
  }
}