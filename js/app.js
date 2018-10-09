$(document).ready(function(){

    $(window).scroll(function(){

        var wScroll = $(window).scrollTop();
        var toTop = $('.toTop');

        if( wScroll > 160 ){
            toTop.fadeIn();
        }else{
            toTop.fadeOut();
        }


    });

    $(".toTop").click(function (event) {
        event.preventDefault();

        $('html,body').animate({
            scrollTop: $('.navigation').offset().top
        }, 1000);

    });

});