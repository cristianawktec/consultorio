<?php


function lpp_visitor_count($post){

	$current_count = get_post_meta($post->ID,'lpp_page_hit_counter',true);
	$current_view_count = get_post_meta($post->ID,'lpp_page_views_counter',true);
    if (empty($current_count)) {
        $current_count = 0;
	}
	if (empty($current_view_count)) {
        $current_view_count = 0;
	}

	?>

	<h2>This Landing Page have :</h2>
	<div style='padding: 7px 10px 8px 31px;background: #fff;border: 1px solid #D2D2D2;border-radius: 3px;width: 20%; min-width:200px;font-weight: bold;' ><h2> <b> <?php echo esc_attr($current_count); ?> - Visits </b> </h2></div>
	<br>
	<div style='padding: 7px 10px 8px 31px;background: #fff;border: 1px solid #D2D2D2;border-radius: 3px;width: 20%; min-width:200px;font-weight: bold;' ><h2> <b> <?php echo esc_attr($current_view_count); ?> - Page Views </b> </h2></div>

	<?php 
}


 ?>