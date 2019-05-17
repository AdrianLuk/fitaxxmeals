<?php
/**
 * Template Name: Gallery
 * Template Post Type: post, page, aside, audio, chat, gallery, image, link, quote, status, video
 */
get_header(); ?>
    <div id="content" class="small-12 large-12 cell" role="main">
        <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<nav aria-label="You are here:" role="navigation"><ul class="breadcrumbs">','</ul></nav>'); } ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php $image_ids = get_field('gallery', false, false);
              $shortcode = '[' . 'gallery ids="' . implode(',', $image_ids) . '"]';
                    echo do_shortcode( $shortcode );
        ?>
			<?php get_template_part( 'content', 'page' ); ?>
			<?php //comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
<?php get_footer(); ?>