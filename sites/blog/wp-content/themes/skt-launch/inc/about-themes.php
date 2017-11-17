<?php
/**
 * SKT Launch About Theme
 *
 * @package SKT Launch
 */
 
//about theme info
add_action( 'admin_menu', 'skt_launch_abouttheme' );
function skt_launch_abouttheme() {    	
	add_theme_page( __('About Theme', 'skt-launch'), __('About Theme', 'skt-launch'), 'edit_theme_options', 'skt_launch_guide', 'skt_launch_mostrar_guide');   
} 

//guidline for about theme
function skt_launch_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_attr_e('About Theme Info', 'skt-launch'); ?>
		   </div>
          <p><?php esc_attr_e('SKT Launch can be used to launch any product, eBook, theme, app, or serve as a landing page for product website, ecommerce site, ebook website. Is simple, flexible and adaptable multipurpose responsive WordPress theme.  Caters to author, e-book, product, app, landing, portfolio and business and corporate websites. WooCommerce, Nextgen gallery, WordPress SEO and Contact form 7 compatible. Compatibility with qTranslate-X for multilingual and translation ready theme.','skt-launch'); ?></p>
		  <a href="<?php echo SKT_PRO_THEME_URL; ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo SKT_LIVE_DEMO; ?>" target="_blank"><?php esc_attr_e('Live Demo', 'skt-launch'); ?></a> | 
				<a href="<?php echo SKT_PRO_THEME_URL; ?>"><?php esc_attr_e('Buy Pro', 'skt-launch'); ?></a> | 
				<a href="<?php echo SKT_THEME_DOC; ?>" target="_blank"><?php esc_attr_e('Documentation', 'skt-launch'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo SKT_THEME_URL; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>