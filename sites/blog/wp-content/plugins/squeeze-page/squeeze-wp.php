<?php

/**
 * SqueezeWP
 *
 * @author    Jair Rebello <jair.rebello@gmail.com>
 * @link      https://squeezewp.com
 * @copyright 2014 7 Desenvolvimento
 *
 * @wordpress-plugin
 * Plugin Name:       SqueezeWP
 * Plugin URI:        https://squeezewp.com
 * Description:       Plugin Wordpress para a criação de Páginas de captura Fantásticas
 * Version:           2.4.5
 * Author:            Jair Rebello
 * Author URI:        http://7desenvolvimento.com
 * Text Domain:       squeeze-page
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
} // end if

require_once( plugin_dir_path(__FILE__) . 'class-squeeze-page.php' );

require_once(plugin_dir_path(__FILE__) . 'inc/squeeze-wp-funcoes.php');
require_once(plugin_dir_path(__FILE__) . 'inc/metabox.php');
require_once(plugin_dir_path(__FILE__) . 'inc/duplicate/duplicate-post.php');

register_activation_hook(__FILE__, array('SqueezeWP', 'db_install'));



require ('plugin_update_check.php');
$MyUpdateChecker = new PluginUpdateChecker_2_0 (
   'https://kernl.us/api/v1/updates/57430b09f23ab8563143128a/',
   __FILE__,
   'squeeze-page',
   1
);
// $MyUpdateChecker->purchaseCode = "somePurchaseCode";  <---- optional!
// $MyUpdateChecker->remoteGetTimeout = 5; <--- optional

add_action('admin_init', 'admin_load_scripts');

add_action('admin_footer', 'admin_footer_load');

function admin_footer_load(){
    $js_file = plugins_url('js/functions.js', __FILE__);
    wp_enqueue_script('functions', $js_file, array('jquery'));
}

function admin_load_scripts() {
    $css_file = plugins_url('css/css-admin.css', __FILE__);
    $datetime = plugins_url('js/jquery.datetimepicker.js', __FILE__);
    //$bootstrap = plugins_url( 'bootstrap/css/bootstrap.min.css', __FILE__ );
    //$theme_bootstrap = plugins_url( 'bootstrap/bootstrap-theme.min.css', __FILE__ );
    wp_enqueue_script('datetime', $datetime, array('jquery'));
    wp_enqueue_style('css_admin', $css_file);
    //wp_enqueue_style('bootstrap', $bootstrap); 
    //wp_enqueue_style('theme_bootstrap', $theme_bootstrap);
}

add_action('plugins_loaded', array('SqueezeWP', 'get_instance'));
