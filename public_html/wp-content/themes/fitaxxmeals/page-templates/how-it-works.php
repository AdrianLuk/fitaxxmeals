<?php
/**
 * Template Name: How It Works
 * Template Post Type: post, page, aside, audio, chat, gallery, image, link, quote, status, video
 */
get_header(); ?>
    <div id="content" class="small-12 large-12 cell" role="main">
        <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<nav aria-label="You are here:" role="navigation"><ul class="breadcrumbs">','</ul></nav>'); } ?>
        <?php while ( have_posts() ) : the_post();
            if( have_rows('hiw_instructions') ):
                while( have_rows('hiw_instructions') ): the_row();
                    // vars
                    $icon = get_sub_field('hiw_icon');
                    $title = get_sub_field('step_title');
                    $steps = get_sub_field('step_instructions'); ?>
                    <div class="tbl-con">
                        <div class="how-title">
                            <div class="icon-circle">
                                <img src="<?php echo $icon ?>" class="how-icon">
                            </div>
                            <h2 class="subhead-caps"><?php echo $title ?></h2>
                        </div>
                        <div class="how-steps">
                            <p><?php echo $steps ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
			<?php get_template_part( 'content', 'page' ); ?>
			<?php //comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
<?php get_footer(); ?>