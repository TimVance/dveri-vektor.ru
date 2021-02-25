$(function(){
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {
            $('.head_bot_block').addClass('stickytop');
        }
        else {
            $('.head_bot_block').removeClass('stickytop');
        }
    });
});