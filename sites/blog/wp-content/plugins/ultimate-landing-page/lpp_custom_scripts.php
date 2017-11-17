<?php



function lpp_f_custom_css($post){

	// letting users to add custom js code and css styling
	$lpp_custom_styling = get_post_meta($post->ID,'lpp_custom_styling',true);
	$lpp_custom_js = get_post_meta($post->ID,'lpp_custom_js',true);

	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>
<h2>CSS :</h2>
<textarea style='width:400px; height:150px;' name='lpp_custom_styling' value='<?php echo $lpp_custom_styling; ?>' placeholder='Enter your custom styling here.'>
<?php echo $lpp_custom_styling; ?>
</textarea>
<h2>JS :</h2>
<textarea style='width:400px; height:150px;' name='lpp_custom_js' value='<?php echo $lpp_custom_js; ?>' placeholder='Enter your custom javascript here.'>
<?php echo $lpp_custom_js; ?>
</textarea>

<div style='width:95%;margin-left:2.5%; text-align:center; background:#e3e3e3;height:60px;border-left:5px solid #a7d142;'>
 <?php submit_button('Update');?>
</div>

<?php

}






?>