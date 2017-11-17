<?php
/**
 * @package SKT Launch
 */
?>
 <div class="blog_lists">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
        	<div class="post-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div><!-- post-thumb -->
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if ( 'post' == get_post_type() ) : ?>
                <div class="postmeta">
                    <div class="post-date"><?php echo get_the_date(); ?></div><!-- post-date -->
                    <div class="post-comment"> &nbsp;|&nbsp; <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></div>
                    <div class="post-categories"> &nbsp;|&nbsp; <?php the_category( esc_attr__( ', ', 'skt-launch' )); ?></div>                  
                </div><!-- postmeta -->
            <?php endif; ?>
        </header><!-- .entry-header -->
    
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
           	<?php the_excerpt(); ?>
            <p class="read-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More &raquo;','skt-launch'); ?></a></p>
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( esc_attr__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'skt-launch' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'skt-launch' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php endif; ?>
    </article><!-- #post-## -->
</div><!-- blog-post-repeat -->