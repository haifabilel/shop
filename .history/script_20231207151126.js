const header =document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scroll', window.pageYOffset)
}