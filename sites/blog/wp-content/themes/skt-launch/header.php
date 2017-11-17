<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Launch
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>
<div class="signin_wrap">
    <div class="container">
        <div class="left"><span><?php if( '' !== get_theme_mod('contact_mail')){?><i class="fa fa-envelope-o"></i> <?php echo esc_attr(get_theme_mod('contact_mail','demo@companyname.com')); ?><?php } ?></span>
        </div>
        <div class="right">
            <?php if( '' !== get_theme_mod( 'contact_no')){ ?>
            <div class="phnobadiv"><i class="fa fa-phone"></i>
                <?php echo esc_attr( get_theme_mod( 'contact_no', '+1 800 234 568', 'skt-launch' )); ?>
            </div>
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
    <!-- container -->
</div>
<!--end signin_wrap-->

<div class="header">
    <div class="header-inner">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <h1><?php bloginfo('name'); ?></h1>
                <span><?php bloginfo( 'description' ); ?></span>
            </a>
        </div>
        <div class="toggle">
            <a class="toggleMenu" href="#">
                <?php _e( 'Menu', 'skt-launch'); ?>
            </a>
        </div>
        <div class="nav">
            <?php wp_nav_menu( array( 'theme_location'=> 'primary') ); ?>
        </div>
        <!-- nav -->
        <div class="clear"></div>
    </div>
    <!-- header-inner -->
</div>
<!-- header -->
<?php 
if ( is_front_page() && is_home() ) { 
?>
<?php 
}
elseif ( is_front_page() ) { 
?>
<section id="home_slider">
  <?php
			$sldimages = ''; 
			$sldimages = array(
						'1' => get_template_directory_uri().'/images/slides/slider1.jpg',
						'2' => get_template_directory_uri().'/images/slides/slider2.jpg',
						'3' => get_template_directory_uri().'/images/slides/slider3.jpg',
			); ?>
  <?php
			$slAr = array();
			$m = 0;
			for ($i=1; $i<4; $i++) {
				if ( get_theme_mod('slide_image'.$i, $sldimages[$i]) != "" ) {
					$imgSrc 	= get_theme_mod('slide_image'.$i, $sldimages[$i]);
					$imgTitle	= get_theme_mod('slide_title'.$i);
					$imgDesc	= get_theme_mod('slide_desc'.$i);
					$imgLink	= get_theme_mod('slide_link'.$i);
					if ( strlen($imgSrc) > 2 ) {
						$slAr[$m]['image_src'] = get_theme_mod('slide_image'.$i, $sldimages[$i]);
						$slAr[$m]['image_title'] = get_theme_mod('slide_title'.$i);
						$slAr[$m]['image_desc'] = get_theme_mod('slide_desc'.$i);
						$slAr[$m]['image_link'] = get_theme_mod('slide_link'.$i);
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php 
                foreach( $slAr as $sv ){
                    $n++; ?>
      <img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php echo esc_attr('#slidecaption'.$n) ; ?>" />
      <?php
                    $slideno[] = $n;
                }
                ?>
    </div>
    <?php
                foreach( $slideno as $sln ){ ?>
    <div id="slidecaption<?php echo esc_attr($sln); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo esc_attr(get_theme_mod('slide_title'.$sln, __('Welcome To Our Website','skt-launch'))); ?></h2>
        <p>
          <?php  echo esc_attr(get_theme_mod('slide_desc'.$sln, __('Quisque blandit dolor risus, sed dapibus dui facilisis sed. Donec eu porta elit. Aliquam porta sollicitudin ante, acntum orci mattis et. Phasellus ac nibh eleifend, sagittis purus nec, elementum massa. Quisque tincidunt sapien a sem porttitor, id convallis dolor','skt-launch'))); ?>
        </p>
        <a class="read-more" href="<?php echo esc_url(get_theme_mod('slide_link'.$sln,'#link'.$sln)); ?>">
        <?php esc_attr_e('Read More', 'skt-launch'); ?>
        </a> </div>
    </div>
    <?php 
                } ?>
  </div>
  <div class="clear"></div>
  <?php 
			}
            ?>
</section>
<div class="clear"></div>
<section class="menu_page" id="about-author">
  <div class="container">
    <div class="">
	<?php 
    if( get_theme_mod('authorpage-setting')) { 
    $queryauthor = new WP_query('page_id='.get_theme_mod('authorpage-setting' ,true)); 
    while( $queryauthor->have_posts() ) : $queryauthor->the_post();
    ?> 
    <div class="about-author "><?php the_post_thumbnail( array (181, 181)); ?></div>
    <h2 class="section-title"><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <?php endwhile; wp_reset_query(); ?>
    <?php } else { ?>
      <div class="about-author"><img src="<?php echo get_template_directory_uri(); ?>/images/about-the-author.png" alt="about" /> </div>
      <h2 class="section-title"><?php _e('About The Author','skt-launch');?></h2>
      <img src="<?php echo get_template_directory_uri(); ?>/images/about-the-author-left.png" alt="about" class="alignleft" />
      <div class="one_half_last">
        <h3><?php _e('Nilson Wooge','skt-launch');?></h3>
        <p><?php _e('Cras aliquet, tellus a dignissim aliquam, nibh erat vulputate justo, in posuere tortor mi a nisi. Quisque orci dolor, suscipit vel dapibus in, ultricies nec est. Donec eget velit non purus laoreet interdum in quis augue. Suspendisse laoreet odio nisl, non vulputate nisl sagittis sit amet. Vestibulum cursus interdum leo','skt-launch'); ?></p>
        <p><?php _e('Vivamus pretium porttitor nibh eu viverra. Integer ac dui in libero vulputate interdum. Curabitur dictum ex non sapien lacinia rutrum. Fusce dignissim nisl sed eros condimentum, nec gravida mi suscipit.','skt-launch');?></p>
        <h3><?php _e('Where to Buy','skt-launch');?></h3>
        <div class="client_banner">
          <div class="client "><a target="_blank" href="<?php esc_url('#');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/buy-logo1.png"></a></div>
          <div class="client "><a target="_blank" href="<?php esc_url('#');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/buy-logo2.png"></a></div>
          <div class="client "><a target="_blank" href="<?php esc_url('#');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/buy-logo3.png"></a></div>
          <div class="client "><a target="_blank" href="<?php esc_url('#');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/buy-logo4.png"></a></div>
          <div class="client "><a target="_blank" href="<?php esc_url('#');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/buy-logo5.png"></a></div>
          <div class="client "><a target="_blank" href="<?php esc_url('#');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/buy-logo6.png"></a></div>
          <div class="client last"><a target="_blank" href="<?php esc_url('#');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/buy-logo7.png"></a></div>
        </div>
        <p><a href="<?php esc_url('#');?>" class="read-more"><?php _e('BUY EBOOK','skt-launch');?></a></p>
      </div>
      <?php } ?>  
    </div>
    <!-- middle-align -->
    <div class="clear"></div>
  </div>
  <!-- container --> 
</section>
<section class="menu_page bookbg" id="books">
  <div class="container">
    <div class="">
      <h2 class="section-title"><?php _e('Book Features','skt-launch');?></h2>
      <div class="you-can-offer-me">
	  <?php 
	  	 for($tbx=1; $tbx<4; $tbx++) {
		 if( get_theme_mod('page-setting'.$tbx)) { 
		 $threeboxquery = new WP_query('page_id='.get_theme_mod('page-setting'.$tbx,true)); 
		 while( $threeboxquery->have_posts() ) : $threeboxquery->the_post(); ?>
<div class="threebox <?php if($tbx%3==0){ ?>last_column<?php } ?>">
          <div class="feature-image-book"><?php the_post_thumbnail(); ?></div>
          <h5><?php the_title(); ?></h5>
          <?php echo wp_kses_post(sktlaunch_content(30)); ?>
          <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More','skt-launch');?></a> </div>
        <?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php }else{ ?>
        <div class="threebox <?php if($tbx%3==0){ ?>last_column<?php } ?>">
          <div class="feature-image-book"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon_<?php echo esc_attr($tbx); ?>.png"></div>
          <h5><?php _e('Features Box','skt-launch');?> <?php echo esc_attr($tbx); ?></h5>
          <p><?php _e('Cras aliquet, tellus a dignissim aliquam, nibh erat vulputate justo, in posuere tortor mi a nisi. Quisque orci dolor, suscipit vel dapibus in, ultricies nec est.','skt-launch');?></p>
          <a class="read-more" href="<?php esc_url('#');?>"><?php _e('Read More','skt-launch');?></a> </div>
<?php
}
}
?>          
          
      </div>
    </div>
    <!-- middle-align -->
    <div class="clear"></div>
  </div>
  <!-- container --> 
</section> 
<?php
}
elseif ( is_home() ) {	
?>
<?php
}
?>