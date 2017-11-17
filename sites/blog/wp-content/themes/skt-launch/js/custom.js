jQuery(window).load(function() {
		if(jQuery('#slider') > 0) {
        jQuery('.nivoSlider').nivoSlider({
        	effect:'fade',
    });
		} else {
			jQuery('#slider').nivoSlider({
        	effect:'fade',
    });
		}
});
	

// NAVIGATION CALLBACK
var ww = jQuery(window).width();
jQuery(document).ready(function() { 
	jQuery(".nav li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	})
	jQuery(".toggleMenu").click(function(e) { 
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".nav").slideToggle('fast');
	});
	adjustMenu();
})

// navigation orientation resize callbak
jQuery(window).bind('resize orientationchange', function() {
	ww = jQuery(window).width();
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 989) {
		jQuery(".toggleMenu").css("display", "block");
		if (!jQuery(".toggleMenu").hasClass("active")) {
			jQuery(".nav").hide();
		} else {
			jQuery(".nav").show();
		}
		jQuery(".nav li").unbind('mouseenter mouseleave');
	} else {
		jQuery(".toggleMenu").css("display", "none");
		jQuery(".nav").show();
		jQuery(".nav li").removeClass("hover");
		jQuery(".nav li a").unbind('click');
		jQuery(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
		});
	}
}

jQuery(window).scroll(function() {
 		jQuery('.about-author').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+600) {
				jQuery(this).addClass("fadeInUp");
			}
		});		
		
		jQuery('.threebox').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInDown");
			}
		});
		 
		jQuery('.home-contact-join').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInUp");
			}
		});		
	});
	
	jQuery(document).ready(function() {
  	jQuery('.srchicon').click(function() {
			jQuery('.searchtop').toggle();
			jQuery('.topsocial').toggle();
		});	
});


jQuery(window).scroll( function(){
	var wwd = jQuery(window).width();
	if( wwd > 939 ){
		fixedHeader(); 	// fix header on page scroll
	}
});

// function to fix header on page scroll / load
var fixedHeader = function(){
	var hdrHt = jQuery('div.header').height();
	var scrPos = jQuery(window).scrollTop();
	var aBarHt = jQuery('#wpadminbar').height();
 
	if( scrPos > (hdrHt+35)/3 ){
		jQuery('div.header').addClass('fixed');
		jQuery('div.header').next();
	}else{
		jQuery('div.header').removeClass('fixed');
		jQuery('div.header').next();
	}
}

	jQuery(document).ready(function() {
		jQuery.noConflict();
        jQuery('.logo h1, .slide_info h2, h2.section-title').each(function(index, element) {
            var heading = jQuery(element);
            var word_array, last_word, first_part;

            word_array = heading.html().split(/\s+/); // split on spaces
            last_word = word_array.pop();             // pop the last word
            first_part = word_array.join(' ');        // rejoin the first words together

            heading.html([first_part, ' <span>', last_word, '</span>'].join(''));
        });
});
