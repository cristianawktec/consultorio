jQuery(window).load(function($) { 
	//Loader
	jQuery('#preloader').fadeOut('2000');
	jQuery('body').css('overflow', 'auto');
	// End of Loader  
	
	// Banner 1 Animations
	var animation1 = setInterval(function(){ 
		jQuery('.header1 #heading1').css('visibility', 'visible').addClass('animated  fadeInDown');
		clearInterval(animation1); 
	}, 1600); 
	var animation2 = setInterval(function(){  
		jQuery('.header1 #heading2').css('visibility', 'visible').addClass('animated  fadeInDown');
		clearInterval(animation2); 
	}, 2000); 
	var animation3 = setInterval(function(){  
		jQuery('.header1 .banner-text p').css('visibility', 'visible').addClass('animated  fadeInDown');
		clearInterval(animation3); 
	}, 2400);
	var animation4 = setInterval(function(){ 
		jQuery('.header1 .banner-form').css('visibility', 'visible').addClass('animated  fadeInUp');
		clearInterval(animation4); 
	}, 3000); 
	var animation5 = setInterval(function(){ 
		jQuery('.header1 .logo, .header1 .call').css('visibility', 'visible').addClass('animated  fadeInDown');	
		clearInterval(animation5); 
	}, 3800);
	// End of Banner 1 Animations
	
	// Banner 2 Animations
	var animation6 = setInterval(function(){ 
		jQuery('.header2 #heading1').css('visibility', 'visible').addClass('animated  fadeInDown');	
		clearInterval(animation6); 
	}, 1000);
	var animation7 = setInterval(function(){ 
		jQuery('.header2 #heading2').css('visibility', 'visible').addClass('animated  fadeInDown');
		clearInterval(animation7); 
	}, 1500);
	var animation8 = setInterval(function(){ 
		jQuery('.header2 .banner-text p').css('visibility', 'visible').addClass('animated  fadeInDown');
		clearInterval(animation8); 
	}, 2000);
	var animation9 = setInterval(function(){ 
		jQuery('.header2 .banner-text .btn').css('visibility', 'visible').addClass('animated  fadeInDown');
		clearInterval(animation9); 
	}, 3000);
	var animation10 = setInterval(function(){ 
		jQuery('.header2 span.arrow').css('visibility', 'visible').addClass('animated  fadeIn');
		clearInterval(animation10); 
	}, 3500);
	var animation11 = setInterval(function(){ 
		jQuery('.header2 .logo, .header2 .call').css('visibility', 'visible').addClass('animated  fadeInDown');	
		clearInterval(animation11); 
	}, 4300);
	// End of Banner 2 Animations

	// Buttons ScrollToTop Animations
	jQuery(".watch-video-text .cta1, #opening-hour-section .cta1").click(function() {
		jQuery('html, body').animate({
			scrollTop: jQuery("html, body").offset().top
		}, 2000);
	});
	jQuery(".header2 .banner-text .btn, .watch-video-text .cta2, #opening-hour-section .cta2").click(function() {
		jQuery('html, body').animate({
			scrollTop: jQuery("#get-Appointment-section").offset().top
		}, 2000);
	});
	// End of Buttons ScrollToTop Animations 
}); 	
 
jQuery(document).ready(function($) {
	var windowWidth  = $(window).width();
	if(windowWidth > 1024){ 
		headerHt(); 
		$(window).resize(function() {  
			headerHt()
		});   
		// End of Header height   
	}  
	// Validations
	$("#theform").validate({
		rules: {     
			name: {required: true},
			email: {required: true, email: true},
			phone: {required: true, digits: true}
		},
		tooltip_options: {
			name: {trigger:'focus'},
			email: {trigger:'focus'},			
			phone: {trigger:'focus'}			
		},
		submitHandler: function(form) { 
			$("#validity_label").html('<div class="alert alert-success">No errors.  Like a boss.</div>');
		},
		invalidHandler: function(form, validator) {
			$("#validity_label").html('<div class="alert alert-error">There be '+validator.numberOfInvalids()+' error'+(validator.numberOfInvalids()>1?'s':'')+' here.  OH NOES!!!!!</div>');
		}
	});
	$("#newsletter-form").validate({
		rules: {     
			newsletter: {required: true, email: true}
		},
		tooltip_options: {
			newsletter: {trigger:'focus'}
		},
		submitHandler: function(form) { 
			$("#validity_label").html('<div class="alert alert-success">No errors.  Like a boss.</div>');
		},
		invalidHandler: function(form, validator) {
			$("#validity_label").html('<div class="alert alert-error">There be '+validator.numberOfInvalids()+' error'+(validator.numberOfInvalids()>1?'s':'')+' here.  OH NOES!!!!!</div>');
		}
	});	
	// End of Validations
});
 
// Header height
function headerHt(){
	var documentHeight = $(window).height();
	$('header.header2').css('height',documentHeight);
};
// End of Header height