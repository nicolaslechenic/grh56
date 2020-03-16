/* get url, cut everything before hash, and assign index 1 to currentPageHref*/
let currentPagePath = window.location.href;
let currentPageString = currentPagePath.split("/");
let lastChildIndex = currentPageString.length-1;
let lastChild = currentPageString[lastChildIndex];
let lastChildSplit =lastChild.split(".");
let currentPage = lastChildSplit[0];
console.log(currentPage);
window.onload = function load()
{
  if (currentPage !== 'index')
  {
    
    console.log('else')
  document.getElementById(currentPage).className += " active";
  }
  else
  {
    //console.log('index');
    document.getElementById(currentPage).className += " active";
  }
}
