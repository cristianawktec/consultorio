<?php 
/*
Plugin Name: Ultimate Landing Page
Description: Create Beautiful Landing Pages in minutes
Author: Web-Settler
Plugin URI: http://web-settler.com/ultimate-landing-page/
Author URI: http://web-settler.com/contact/
Version: 3.0.7
Donate link: http://web-settler.com/ultimate-landing-page/ 
License : GPL v2
*/

/********
* Created By : Umar Bajwa
* Contact : http://web-settler.com/contact/
* Support: http://web-settler.com/ulp-support/
* Email : umar@web-setter.com
********/

include 'lpp_settings.php';
include 'lpp_cs_post_type.php';
include 'lpp_scripts.php';

function ulf_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="edit.php?post_type=landingpage_f">' . __( 'Dashboard' ) . '</a>';
    $support_link = '<a href="http://web-settler.com/free-support/">' . __( 'Support' ) . '</a>';
    array_push( $links, $settings_link );
    array_push( $links, $support_link );
  	return $links;
}
$lpp_plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$lpp_plugin", 'ulf_plugin_add_settings_link' );


?>