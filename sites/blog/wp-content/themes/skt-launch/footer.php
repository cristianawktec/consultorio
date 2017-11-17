<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Launch
 */
?>
<div class="copyright-wrapper">
  <div class="inner">
    <div class="footer-menu">
      <p>&nbsp;</p>
    </div>
    <!-- footer-menu -->
    <div class="footer-social">
      <p></p>
      <div class="clear"></div>
      <div class="social-icons"><?php if ( '' !== get_theme_mod( 'fb_link' ) ) { ?>
                    <a title="facebook" class="fa fa-facebook fa-1g" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>"></a> 
                    <?php } ?>
                    
                    <?php if ( '' !== get_theme_mod( 'twitt_link' ) ) { ?>
                    <a title="twitter" class="fa fa-twitter fa-1g" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>"></a>
                    <?php } ?> 
                    
                    <?php if ( '' !== get_theme_mod('gplus_link') ) { ?>
                    <a title="google-plus" class="fa fa-google-plus fa-1g" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>"></a>
                    <?php }?>
                    
                    <?php if ( '' !== get_theme_mod('linked_link') ) { ?> 
                    <a title="linkedin" class="fa fa-linkedin fa-1g" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>"></a>
                    <?php } ?></div>
      <div class="clear"></div>
      <p></p>
    </div>
    <!-- footer-social -->
    
    <div class="copyright">
      <p><?php printf( esc_html__( 'Design %1$s %2$s', 'skt-launch' ), 'by', '<a href="'.esc_url(SKT_URL).'">SKT Themes</a>' ); ?></p>
    </div>
    <!-- copyright -->
    <div class="clear"></div>
  </div>
  <!-- inner --> 
</div> 
<?php wp_footer(); ?>
</body>
</html>