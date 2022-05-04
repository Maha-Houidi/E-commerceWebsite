const nav = document.querySelector('.navigation');
var myNav = document.getElementById('mynav');
window.onscroll = function () { 
    var top=window.scrollY;
    console.log(top);
    if (top> 20) {
        nav.classList.add("nav-colored");
        nav.classList.remove("nav-transparent");
    } 
    else {
        nav.classList.add("nav-transparent");
        nav.classList.remove("nav-colored");
    }
};