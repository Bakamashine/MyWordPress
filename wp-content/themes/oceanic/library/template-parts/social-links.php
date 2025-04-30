<?php
if ( get_theme_mod( 'oceanic-font-awesome-version', customizer_library_get_default( 'oceanic-font-awesome-version' ) ) == '4.7.0' ) {
	$font_awesome_code = 'otb-fa';
	$font_awesome_brand_code = 'otb-fa';
	$font_awesome_custom_icon_style_code = 'otb-fa';
	$font_awesome_icon_prefix = 'otb-';
} else {
	$font_awesome_code = 'fa';
	$font_awesome_brand_code = 'fab';
	$font_awesome_custom_icon_style_code = get_theme_mod( 'oceanic-social-custom-icon-style-code', customizer_library_get_default( 'oceanic-social-custom-icon-style-code' ) );
	$font_awesome_icon_prefix = '';
}
?>

<ul class="social-links">
<?php
if( get_theme_mod( 'oceanic-social-email', '' ) != '' ) :
    echo '<li><a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'oceanic-social-email' ), 1 ) ) . '" target="_blank" rel="noopener" title="' . esc_attr( __( 'Send us an email', 'oceanic' ) ) . '" class="social-email"><i class="' .$font_awesome_code. ' ' .$font_awesome_icon_prefix. 'fa-envelope-o"></i></a></li>';
endif;

if( get_theme_mod( 'oceanic-social-skype', '' ) != '' ) :
    echo '<li><a href="skype:' . esc_html( get_theme_mod( 'oceanic-social-skype' ) ) . '?userinfo" rel="noopener" title="' . esc_attr( __( 'Contact us on Skype', 'oceanic' ) ) . '" class="social-skype"><i class="' .$font_awesome_brand_code. ' ' .$font_awesome_icon_prefix. 'fa-skype"></i></a></li>';
endif;

if( get_theme_mod( 'oceanic-social-tumblr', '' ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'oceanic-social-tumblr' ) ) . '" target="_blank" rel="noopener" title="' . esc_attr( __( 'Find us on Tumblr', 'oceanic' ) ) . '" class="social-tumblr"><i class="' .$font_awesome_brand_code. ' ' .$font_awesome_icon_prefix. 'fa-tumblr"></i></a></li>';
endif;

if( get_theme_mod( 'oceanic-social-flickr', '' ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'oceanic-social-flickr' ) ) . '" target="_blank" rel="noopener" title="' . esc_attr( __( 'Find us on Flickr', 'oceanic' ) ) . '" class="social-flickr"><i class="' .$font_awesome_brand_code. ' ' .$font_awesome_icon_prefix. 'fa-flickr"></i></a></li>';
endif;

if( get_theme_mod( 'oceanic-header-search', true ) ) :
	echo '<li><a class="search-btn"><i class="' .$font_awesome_code. ' ' .$font_awesome_icon_prefix. 'fa-search"></i></a></li>';
endif;
?>
</ul>