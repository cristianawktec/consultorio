<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Launch
 */

get_header(); 
?>
<?php if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) : ?>   
<div class="container">
     <div class="page_content inrpagecontent">
        <section class="site-main">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
						// Previous/next post navigation.
						the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => __( 'Back', 'skt-launch' ),
						'next_text' => __( 'Onward', 'skt-launch' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
                    </div><!-- blog-post -->
             </section>
      
        <?php get_sidebar();?>     
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php else: ?>
<section class="menu_page" id="blog">
  <div class="container">
    <div class="">
      <h2 class="section-title"><?php _e('Latest Post','skt-launch');?></h2>
      <?php
	  $p = 0;
	  $args = array('post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc', 'paged' => get_query_var('paged') );
	  $postquery = new WP_Query( $args );
	  while( $postquery->have_posts() ) : $postquery->the_post(); $p++; ?>
      
      <div class="blogposts <?php if( $p%2==0 ){?>lastcols<?php } ?>">
        <div class="blogthumbs"><a href="<?php the_permalink(); ?>">
           <?php if( has_post_thumbnail() ) { ?>
           <?php the_post_thumbnail(); ?>
           <?php } else {  ?>
           <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img_404.png" />
           <?php } ?></a></div>
           <div class="blogpostcontent"><a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
          <div class="date-news"> <span class="byadmin-home"> <?php echo get_the_author(); ?> &nbsp;</span> <span class="postdate-home"><?php echo get_the_time('M d, Y');?></span>
          <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <?php the_excerpt(); ?>
        </div>
       </div>
         <?php if( $p%2==0 ){?>
         <div class="clear"></div>
         <?php } ?>
        <?php endwhile; ?> 
		<?php
        // Previous/next post navigation.
        the_posts_pagination( array(
        'mid_size' => 2,
        'prev_text' => __( 'Back', 'skt-launch' ),
        'next_text' => __( 'Onward', 'skt-launch' ),
        ) ); 
        ?>   
      <div class="clear"></div>
      
    </div>
    <!-- middle-align -->
    <div class="clear"></div>
  </div>
  <!-- container --> 
</section> 	   
<div class="clear"></div>		
<?php endif; ?>
<?php get_footer(); ?>