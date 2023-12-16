const header =document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scroll', window.pageYOffset > 0)
}
fixedNavbar();
window.addEventListener('scroll',fixedNavbar);
let menu = document.querySelector('#menu-btn');
let userNtn = document.querySelector('#user-btn');

menu.addEventListener('click')