<?php



function lpp_f_admin_scripts_add() {
	// Adding scripts for admin view only
	$screen = get_current_screen();
	if($screen->post_type === 'landingpage_f') {
	wp_enqueue_script('jquery');
	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script('lpp_script_s',plugins_url('js/image-upload.js',__FILE__),array( 'jquery' ));
	wp_enqueue_script('lpp_script_fonts',plugins_url('js/g-font-family.js',__FILE__),array( 'jquery' ));
    wp_enqueue_script( 'media-upload' );
    wp_enqueue_script( 'my-script-handle', plugins_url('/js/lpp_color_picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    wp_enqueue_script( 'lpp_wp-color-picker-alpha', plugins_url('/js/alpha-picker.js', __FILE__ ), array( 'wp-color-picker' ), '1.2', false );
}
}

add_action('admin_enqueue_scripts', 'lpp_f_admin_scripts_add');


?>