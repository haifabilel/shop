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
slider = document.querySelector('.slider');
// ==============scroll right===========
function scrollRight(){
    if (slider.scrollWidth - slider.clientWidth === slider.scrollLeft) {
        slider.scrollTo({
            left:0,
            behavior: "smooth"
        });
    }else{
        slider.scrollBy({
            left: window.innerWidth,
            behavior: "smooth"
        })
    }
}
// ==============scroll left===========
function scrollLeft(){
    slider.scrollBy({
        left: -window.innerWidth,
        behavior:"smooth"
    })
}
let timerId = setInterval(scrollRight,7000);
// ==============Reset time to scroll===========
function resetTimer(){
    clearInterval(timerId);
    timerId = setInterval(scrollRight,7000);
}
// ==============scroll event===========
slider.addEventListener('click',function(ev){
    if(ev.target === leftArrow){
        scrollLeft();
        resetTimer();
    }
})
slider.addEventListener('click',function(ev){
    if(ev.target === rightArrow){
        scrollRight();
        resetTimer();
    }
})

// ==============slider reviews===========
let slides = document.querySelectorAll('.testimonial-item');
let index = 0;

function nextSlide(){
    slides[index].classList.remove('active');
    
}
