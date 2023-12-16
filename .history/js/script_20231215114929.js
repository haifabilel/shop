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

// ----------------star rating-----------------

// executer le button review
var rating_data = 0;

var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-primary');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-primary');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-primary');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"reviews.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

