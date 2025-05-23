<?php
/**
 * The template for displaying search forms
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr( pll__( get_theme_mod( 'oceanic-search-placeholder-text', customizer_library_get_default( 'oceanic-search-placeholder-text' ) ) ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'oceanic' ); ?>" />
	<a class="search-submit">
		<i class="fa fa-search"></i>
	</a>
</form>