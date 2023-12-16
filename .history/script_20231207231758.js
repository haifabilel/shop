// ==========header========
const header =document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scroll', window.scrollY > 0)
}
fixedNavbar();
window.addEventListener('scroll',fixedNavbar);
let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menu.addEventListener('click',function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
})
userBtn.addEventListener('click',function(){
    let userBox =document.querySelector('.user-box');
    userBox.classList.toggle('active');
})
// ==============arrow home===========
const leftArrow = document.querySelector('.left-arrow .bi-arrow-left-circle'),
rightArrow = document.querySelector('.right-arrow .bi-arrow-right-circle'),
slider = document.querySelector('slider');
// ==============scroll right===========
function scrollRight(){
    if (slider.scrollWidth - slider.clientWidth === slider.scrollLeft) {
        slider.scrollTo({
            left:0,
            behavior: "smooth"
        })
    }
}
// ==============scroll left===========
function scrollLeft(){
    slider.scrollBy({
        left: -window.
    })
}