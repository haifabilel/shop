const header =document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scroll', window.pageYOffset > 0)
}
fixedNavbar();
window.addEventListener('scroll',fixedNavbar);
let menu = document.querySelector('#menu-btn');
let userBttn = document.querySelector('#user-btn');

menu.addEventListener('click',function(){
    let nav = document.querySelector('navbar');
    nav.classList.toggle('active');
})
us