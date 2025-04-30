<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Oceanic
 */
?><!DOCTYPE html><!-- Oceanic -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'oceanic' ); ?></a>

<header id="masthead" class="site-header border-bottom<?php echo ( get_theme_mod( 'oceanic-header-layout', false ) == 'oceanic-header-layout-centered' ) ? ' oceanic-header-layout-centered' : ' oceanic-header-layout-standard'; ?>" role="banner">
    
    <?php
    if ( get_theme_mod( 'oceanic-header-layout', false ) == 'oceanic-header-layout-centered' ) {
		get_template_part( 'library/template-parts/header-centered' );
	} else {
		get_template_part( 'library/template-parts/header-standard' );
	}
    ?>

</header><!-- #masthead -->

<?php
if ( is_front_page() ) {
	if ( get_theme_mod( 'oceanic-slider-type', false ) != 'oceanic-no-slider' ) {
		get_template_part( 'library/template-parts/slider' );
	} else if ( get_header_image() ) {
		get_template_part( 'library/template-parts/header-image' );
	}
}
?>

<div id="content" class="site-content site-container <?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? 'content-no-sidebar' : 'content-has-sidebar'; ?>">
	<a name="site-content"></a>