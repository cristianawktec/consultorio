<?php
function lpp_f_mail_chimp($post){
	global $post;



     $lpp_mailchimp_listid = get_post_meta($post->ID,'lpp_mailchimp_listid',true);
     $lpp_mailchimp_apikey = get_post_meta($post->ID,'lpp_mailchimp_apikey',true);
		
	 wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	?>
	<style type="text/css">
	#lppmail, #lpp_mailchimp_apikey,#lpp_mailchimp_listid{
		width:400px;
		height: 50px;
	}
	 </style>
	<input type='text' name='lpp_mailchimp_apikey' id='lpp_mailchimp_apikey' placeholder='Your Mailchimp API key' value='<?php echo $lpp_mailchimp_apikey; ?>'>

	<input type='text' name='lpp_mailchimp_listid' id='lpp_mailchimp_listid' placeholder='Your Mailchimp List ID' value='<?php echo $lpp_mailchimp_listid; ?>'>


	<?php

}


 ?>