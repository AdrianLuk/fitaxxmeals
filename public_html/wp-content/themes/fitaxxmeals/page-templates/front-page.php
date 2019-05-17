<?php
/**
 * Template Name: Front Page Template
 */
get_header(); ?>

	<div id="content" class="small-12 large-12 cell" role="main">
        <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<nav aria-label="You are here:" role="navigation"><ul class="breadcrumbs">','</ul></nav>'); } ?>
		<?php while ( have_posts() ) : the_post(); ?>
        <div class="instructions">
        <h2 class="blue-caps"><?php the_field( 'hiw_title' ); ?></h2>
        <ul class="slides">
            <?php if( have_rows('how_it_works') ):
                while( have_rows('how_it_works') ): the_row(); 

                // vars
                $step = get_sub_field('step_number');
                $title = get_sub_field('instruction_title');
                $instructions = get_sub_field('instructions');

                ?>

                <li class="slide">
                    <h2 class="subhead-num"><?php echo $step ?></h2>
                    <h2 class="subhead-caps"><?php echo $title ?></h2>
                    <p style="text-align: center;"><?php echo $instructions ?></p>
                </li>

            <?php endwhile; ?>

            </ul>
            <div class="btns">
                <?php while( have_rows('hiw_buttons') ): the_row(); 

                    // vars
                    $whitebtn= get_sub_field('white_btn_hiw');
                    $bluebtn = get_sub_field('blue_btn');
                ?>
                    <a href="<?php echo $whitebtn ?>"><button class="white">Learn More</button></a>
                    <a href="<?php echo $bluebtn ?>"><button class="blue">Order Now</button></a>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="ftmeals">
            <h2 class="blue-caps"><?php the_field('ft_meal') ?></h2>
        </div>
        <div class="home-bio">
            <div class="profile-pic">
                <img src="<?php the_field('profile_picture'); ?>">
            </div>
            <div class="profile-bio">
                <h2 class="blue-caps"><?php the_field('about_title') ?></h2>
                <p><?php the_field('mini_biography') ?></p>
                    <a href="<?php the_field('about_btn') ?>">
                        <button class="white">
                        <?php the_field('about-text_btn') ?>
                        </button>
                    </a>
            </div>
        </div>
        <?php endif; ?>
			<?php get_template_part( 'content', 'home' ); ?>
			<?php comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
<?php get_footer(); ?>