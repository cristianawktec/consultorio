<?php
function lpp_f_seo_set($post){

	 global $post;

	 

	 $lpp_seo_title = get_post_meta($post->ID,'lpp_seo_title',true);

	 $lpp_seo_site_url = get_post_meta($post->ID,'lpp_seo_site_url',true);

	 $lpp_seo_keywords = get_post_meta($post->ID,'lpp_seo_keywords',true);

	 $lpp_seo_meta_description = get_post_meta($post->ID,'lpp_seo_meta_description',true);



// * NONCE to save data to custom post types db.
	 wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	 ?>

		<style type="text/css">
	.formLayout_2
    {
        padding: 10px;
        width: 950px;
        margin: 10px;
        height: 350px;
    }
    
    .formLayout_2 label 
    {
        display: block;
        width: 595px;
        float: left;
        margin-bottom: 20px;
        margin-left: 20px;
    }
    .formLayout_2 input{
         display: block;
        float: left;
        margin-bottom: 20px;
        width: 400px;
        float: left;

    }
 
    .formLayout_2 label
    {
        text-align: right;
        padding-right: 20px;
        font-size: 16px;
        font-weight: bold;
    }
 
    br
    {
        clear: left;
    }
	</style>

	<div class='formLayout_2'>
		<input type='text' name='lpp_seo_title' placeholder='SEO Title :' value='<?php echo $lpp_seo_title; ?>'>
		<br>

		<input type='text' name='lpp_seo_keywords' placeholder='SEO Keywords seperated by commas:' value='<?php echo $lpp_seo_keywords; ?>'>
		<br>

		<textarea type='text' style='height:200px; width:350px; float:left;' name='lpp_seo_meta_description' placeholder='Meta Description :' value='<?php echo $lpp_seo_meta_description; ?>'><?php echo $lpp_seo_meta_description; ?></textarea>
		<br>

        <input type='hidden' name='lpp_seo_keywords' placeholder='SEO Keywords seperated by commas:' value='<?php echo $lpp_seo_keywords; ?>'>

	</div>


	<div style='width:95%;margin-left:2.5%; text-align:center; background:#e3e3e3;height:60px;border-left:5px solid #a7d142;'>
		<?php submit_button('Update');?>	
	</div>







<?php

}







?>