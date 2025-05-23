<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package oceanic
 */
?>

<section class="no-results not-found">
	<?php if ( is_search() ) : ?>
	<header class="page-header">
		<h1 class="page-title"><?php echo wp_kses_post( pll__( get_theme_mod( 'oceanic-website-text-no-search-results-heading', customizer_library_get_default( 'oceanic-website-text-no-search-results-heading' ) ) ) ); ?></h1>
	</header><!-- .page-header -->
	<?php endif ?>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
				<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'oceanic' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
			</p>

		<?php elseif ( is_search() ) : ?>

			<p>
            	<?php echo wp_kses_post( pll__( get_theme_mod( 'oceanic-website-text-no-search-results-text', customizer_library_get_default( 'oceanic-website-text-no-search-results-text' ) ) ) ); ?>
            </p>

		<?php else : ?>

			<p>
				<?php echo wp_kses_post( get_theme_mod( 'oceanic-website-nosearch-msg', 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ) ) ?>
			</p>

		<?php endif; ?>
        
	</div><!-- .page-content -->
    <div class="clearboth"></div>
    
    <div class="button no-results-btn search-btn"><?php _e( 'Search Again', 'oceanic' ); ?></div>
    
</section><!-- .no-results -->
