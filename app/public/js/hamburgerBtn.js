// onclick function to animate hamuregr button
let barOne = document.getElementById('bar1');
let barTwo = document.getElementById('bar2');
let barThree = document.getElementById('bar3');
let topNav = document.getElementById('top_menu');


function hamburgerBtn(){
    barOne.classList.toggle("bar_one");
    barTwo.classList.toggle("bar_two");
    barThree.classList.toggle("bar_three");
    topNav.classList.toggle("top_navmenu");

    

}