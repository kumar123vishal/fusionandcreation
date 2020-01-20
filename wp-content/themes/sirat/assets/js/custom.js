jQuery(function($){
 "use strict";
   jQuery('.main-menu > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function menu_openNav() {
	document.getElementById("mySidenav").style.top ="0";
}
function menu_closeNav() {
  document.getElementById("mySidenav").style.top = "-110%";
}


//Search Box
function search_open() {
	jQuery(".serach_outer").slideDown(1000);
}
function search_close() {
	jQuery(".serach_outer").slideUp(1000);
}

(function( $ ) {

	jQuery(document).ready(function () {
		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		        $('.scrollup').fadeIn();
		    } else {
		        $('.scrollup').fadeOut();
		    }
		});
		$('.scrollup').click(function () {
		    $("html, body").animate({
		        scrollTop: 0
		    }, 600);
		    return false;
		});
	});

	// makes sure the whole site is loaded
	jQuery(window).load(function() {
        // will first fade out the loading animation
	    jQuery("#status").fadeOut();
	        // will fade out the whole DIV that covers the website.
	    jQuery("#preloader").delay(1000).fadeOut("slow");
	})

	$(window).scroll(function(){
	  var sticky = $('.header-sticky'),
	      scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('header-fixed');
	  else sticky.removeClass('header-fixed');
	});

})( jQuery );

