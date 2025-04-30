<?php
if ( get_theme_mod( 'oceanic-slider-type', false ) == 'oceanic-no-slider' ) {
?>
	<!-- No Slider -->
<?php
} else if ( get_theme_mod( 'oceanic-slider-type', false ) == 'oceanic-meta-slider' ) {
    
    $slider_code = '';
    if ( get_theme_mod( 'oceanic-meta-slider-shortcode', false ) ) {
        $slider_code = get_theme_mod( 'oceanic-meta-slider-shortcode' );
    }
    
    echo do_shortcode( sanitize_text_field( $slider_code ) );
    
} else {
    
	$slider_categories = get_theme_mod( 'oceanic-slider-cats', customizer_library_get_default( 'oceanic-slider-cats' ) );
	
	if ( !is_array($slider_categories) ) {
		$slider_categories = array();
	}
    
    if ( $slider_categories ) {
        
			$slider_query = new WP_Query( 'cat=' . implode(',', $slider_cat_ids) . '&posts_per_page=-1&orderby=date&order=DESC&id=slider' );
	        
	        if ( $slider_query->have_posts() ) {
	        ?>
	
				<div class="home-slider-wrap home-slider-remove">
					<div class="home-slider-prev">
						<i class="fa fa-angle-left"></i>
					</div>
					<div class="home-slider-next">
						<i class="fa fa-angle-right"></i>
					</div>
				
					<div class="home-slider">

						<?php
						while ( $slider_query->have_posts() ) : $slider_query->the_post();
						?>
				                    
						<div>
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'full', array( 'class' => '' ) );
							}
							?>
				                            
							<div class="overlay"><?php the_content(); ?></div>
						</div>
				                    
						<?php
						endwhile;
						?>

					</div>
					
					<div class="home-slider-pager"></div>
					
				</div>
	
		<?php
			}
			wp_reset_query();
	
    } else {
   	?>
        
        <div class="home-slider-wrap home-slider-remove">
            <div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
            <div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
                
            <div class="home-slider">
                
                <div>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/library/images/demo/slider-default01.jpg" alt="<?php esc_attr_e('Demo Slide One', 'oceanic'); ?>" />
                    <div class="overlay">
                        <?php _e( 'The ocean stirs the heart,<br />inspires the imagination<br />and brings eternal joy<br />to the soul.', 'oceanic' ); ?>
                    </div>
                </div>
                
                <div>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/library/images/demo/slider-default02.jpg" alt="<?php esc_attr_e('Demo Slide Two', 'oceanic'); ?>" />
                    <div class="overlay">
                        <?php _e( 'On the beach, you can live in bliss.', 'oceanic' ); ?>
                    </div>
                </div>
                
            </div>
            <div class="home-slider-pager"></div>
        </div>

    <?php
    }

}
