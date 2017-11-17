jQuery(function ($) {
			 

				var $newdiv1 = $( "<a href='http://web-settler.com/ultimate-landing-page'target='_blank' style='text-decoration:none; color:#fff; '><div class='lpp_banner' style='width:1090px; height:260px; background:#F5D76E;'><h2 style='background:#efc434;padding:15px 0 15px 0; text-align:center;text-decoration:none; font-family:sans-serif; font-weight:100; font-size:33px;color:#fff;'>Get Premium Version</h2><ul style='text-align:left;line-height:1.3;background:#87D37C;width:50%; font-family:sans-serif; font-weight:100; font-size:23px;margin-top:-27px;padding:20px 0 30px 40px;float:left;' ><li>Beautiful 10 Templates</li><li>SEO for better search engine Ranking</li><li>Mail Chimp Subcribe forms Integration</li><li>Send Email Newslettlers.</li><li>Custom Styling and javascript</li></ul><ul style='line-height:1.3;background:#2ECC71;width:40%; text-align:left;font-family:sans-serif; font-weight:100; font-size:23px;margin-top:-248px;padding:20px 0 30px 70px;float:right;' ><li>Maxizmize Sales and conversion rates</li><li>More search engine traffic</li><li>More Subscribers more traffc</li><li>Automated Email Newsletter delivery.</li><li> Completely Customizable Landing Pages</li></ul>" );

				 
				$( "#wpbody-content" ).prepend( $newdiv1);


	  $( ".lpp_banner" ).hover(function() {

	  	 $( ".lpp_banner" ).css({
	  	 	opacity: '0.8'
	  	 });

	  	
	  }, function() {

	  	$( ".lpp_banner" ).css({
	  	 	opacity: '1'
	  	 });
	  	
	  });



//end
});