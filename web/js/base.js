const hamburgericon = document.querySelector('.hamburger-icon');
const hamburgerMenu = document.querySelector('.hamburger-menu');
hamburgericon.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('open');
    hamburgericon .classList.toggle('close');
});

$(function () {
    $(window).scroll(function () {
        var winH = $(window).height();
        var sAmount = $(window).scrollTop();
        $('.sFade').each(function () {
            var itemPosition = $(this).offset().top;
            if(sAmount > itemPosition - winH + 100) {
                $(this).addClass("fadeIn");
            }
        });
    });
});

(function ($) {
 
	'use strict';
    
    let scrollPosi = 0;
 
	$(window).scroll(function () {
		scrollPosi = $(document).scrollTop();
        
        $('body').stop(true, true).animate({
			'background-position-y': -scrollPosi / 5 + 'px'
		}, 100);
	});

 
})(jQuery);

