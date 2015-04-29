$(function() {

    $('.dialogOpen').click(function(){
        $('#dialogContainer').css('display',' block');
        $('#dialogContainer').css('-moz-animation-name',' dialogContainerOpen');
        $('#dialogContainer').css('animation-name',' dialogContainerOpen');
        $('#dialogContainer').fadeIn(600);
    });

    $('#mailDialogClose').click(function(){
        $('#mailDialogContainer').css('-webkit-animation-name',' dialogClose');
        $('#mailDialogContainer').css('-moz-animation-name',' dialogClose');
        $('#mailDialogContainer').css('animation-name',' dialogClose');
        $('#mailDialogContainer').fadeOut(600);
    });

});



/*--scroll--*/

$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                    }, 1000);
                    return false;
            }
        }
    });

    $('[data-spy="scroll"]').each(function () {
        var $spy = $(this).scrollspy('refresh')
    });
});
