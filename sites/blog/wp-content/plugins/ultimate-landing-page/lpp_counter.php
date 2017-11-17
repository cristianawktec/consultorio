<?php

 // 86400 = 1 day
$allowed = array( 
	'a' => array( // on allow a tags
	'href' => array() // and those anchors can only have href attribute
	)
);

if (!isset($_COOKIE['lpp_count']) && !is_user_logged_in()) {

	$current_count = get_post_meta($post->ID,'lpp_page_hit_counter',true);
	$new_count = $current_count + 1;
	update_post_meta( $post->ID, 'lpp_page_hit_counter', wp_kses("$new_count", $allowed ) );
	setcookie('lpp_count', '1', time() + (86400 * 30), "/");

}

if (!is_user_logged_in()) {
	$current_view_count = get_post_meta($post->ID,'lpp_page_views_counter',true);
	$new_view_count = $current_view_count + 1;
	update_post_meta( $post->ID, 'lpp_page_views_counter', wp_kses("$new_view_count", $allowed ) );

}

?>