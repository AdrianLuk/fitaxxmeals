<?php //Text and nav centered
 if( get_theme_mod( 'wpforge_footer_position','center' ) == 'center') { ?>
        <div class="ftnav small-12 large-12 cell">
            <?php if ( has_nav_menu('secondary')  ) : // Only display menu in the footer if one is assigned ?>
                <?php wp_nav_menu( array(
                    'theme_location' => 'secondary',
                    'container'       => 'div',
                    'container_class' => 'table mbl',
                    'menu_class' => 'menu navcntr',
                    'fallback_cb' => false
                ) ); ?>
            <?php endif; ?>
            <?php if ( has_nav_menu( 'social' ) ) : ?>
	<div class="social_wrap small-12 large-12 text-center">
		<nav id="social-navigation" class="social-navigation" role="navigation">
			<?php wp_nav_menu( array(
					'theme_location' => 'social',
                    'container'       => 'div',
                    'container_class' => 'table mbl',
                    'menu_class' => 'menu navcntr',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) ); ?>
		</nav><!-- .social-navigation -->
	</div><!-- .social_wrap -->
<?php endif; ?>
        </div><!-- .columns -->    
        <div id="ftxt" class="site-info small-12 large-12 cell text-center">
            <?php if( get_theme_mod( 'wpforge_footer_text' ) ) { ?>
                <p><?php echo wp_kses_post(get_theme_mod( 'wpforge_footer_text')); ?></p>
            <?php } else { ?>
                 <p><?php _e( 'Powered by', 'wp-forge' ); ?> <a href="<?php echo esc_url(__('https://themeawesome.com/responsive-wordpress-theme/','wp-forge')); ?>" rel="follow" target="_blank" title="<?php _e( 'A Responsive WordPress Theme', 'wp-forge' ); ?>"><?php _e( 'WP-Forge', 'wp-forge' ); ?></a> &amp; <a href="<?php echo esc_url(__('http://wordpress.org/','wp-forge')); ?>" target="_blank" title="<?php _e( 'WordPress', 'wp-forge' ); ?>"><?php _e( 'WordPress', 'wp-forge' ); ?></a></p>
            <?php } // end if ?>
        </div><!-- .site-info -->
<?php } // end if ?>