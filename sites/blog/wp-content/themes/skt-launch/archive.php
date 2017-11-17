<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SKT Launch
 */

get_header(); ?>

<div class="container">
     <div class="page_content inrpagecontent">
        <section class="site-main">
			<?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <h1 class="entry-title">
                        <?php
                            if ( is_category() ) :
                                single_cat_title();

                            elseif ( is_tag() ) :
                                single_tag_title__('Tag:', 'skt-launch');

                            elseif ( is_author() ) :
                                /* Queue the first post, that way we know
                                 * what author we're dealing with (if that is the case).
                                */
                                the_post();
                                printf( esc_attr__( 'Author: %s', 'skt-launch' ), '<span class="vcard">' . get_the_author() . '</span>' );
                                /* Since we called the_post() above, we need to
                                 * rewind the loop back to the beginning that way
                                 * we can run the loop properly, in full.
                                 */
                                rewind_posts();

                            elseif ( is_day() ) :
                                printf( esc_attr__( 'Day: %s', 'skt-launch' ), '<span>' . get_the_date() . '</span>' );
    
                            elseif ( is_month() ) :
                                printf( esc_attr__( 'Month: %s', 'skt-launch' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
    
                            elseif ( is_year() ) :
                                printf( esc_attr__( 'Year: %s', 'skt-launch' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
    
                            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                esc_html_e( 'Asides', 'skt-launch' );
    
                            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                esc_html_e( 'Images', 'skt-launch');
    
                            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                esc_html_e( 'Videos', 'skt-launch' );
    
                            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                esc_html_e( 'Quotes', 'skt-launch' );
    
                            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                esc_html_e( 'Links', 'skt-launch' );
    
                            else :
                                esc_html_e( 'Archives', 'skt-launch' );
    
                            endif;
                        ?>
                    </h1>
                    <?php
                        // Show an optional term description.
                        $term_description = term_description();
                        if ( ! empty( $term_description ) ) :
                            printf( '<div class="taxonomy-description">%s</div>', esc_attr($term_description) );
                        endif;
                    ?>
                </header><!-- .page-header -->
				<div class="blog-post">
					<?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php endwhile; ?>
                </div>
                <?php 
				// Previous/next post navigation.
				the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => __( 'Back', 'skt-launch' ),
				'next_text' => __( 'Onward', 'skt-launch' ),
				) ); 
				 ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'archive' ); ?>
            <?php endif; ?>
        </section>
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->
	
<?php get_footer(); ?>