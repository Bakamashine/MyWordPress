<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_oceanic_options() {
	// Theme defaults
	$primary_color = '#01B6AD';
	$secondary_color = '#019289';
    
    $body_font_color = '#4F4F4F';
    $heading_font_color = '#5E5E5E';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();
	
	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

    // Layout Settings
    $section = 'oceanic-layout';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Layout', 'oceanic' ),
        'priority' => '30'
    );
    
    $options['oceanic-layout-display-homepage-page-title'] = array(
    	'id' => 'oceanic-layout-display-homepage-page-title',
    	'label'   => __( 'Display page title on homepage', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    // Header Settings
    $section = 'oceanic-header';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Header', 'oceanic' ),
    	'priority' => '35'
    );
    
    $choices = array(
    	'oceanic-header-layout-standard' => 'Standard',
    	'oceanic-header-layout-centered' => 'Centered'
    );    
    $options['oceanic-header-layout'] = array(
    	'id' => 'oceanic-header-layout',
    	'label'   => __( 'Layout', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'oceanic-header-layout-standard'
    );
    
    $options['oceanic-show-header-top-bar'] = array(
    	'id' => 'oceanic-show-header-top-bar',
    	'label'   => __( 'Show Top Bar', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'description' => __( 'This will toggle the displaying of the top bar in the header when using the centered layout.', 'oceanic' ),
    	'default' => 1,
    );
    $options['oceanic-header-info-text'] = array(
    	'id' => 'oceanic-header-info-text',
    	'label'   => __( 'Info Text', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( '<em>CALL US</em>: 555-OCEANIC', 'oceanic')
    );
    $options['oceanic-header-shop-links'] = array(
    	'id' => 'oceanic-header-shop-links',
    	'label'   => __( 'Shop Links', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
		'description' => __( 'Display the My Account and Checkout links when WooCommerce is active.', 'oceanic' )
    );
    
    // Mobile Menu Settings
    $section = 'oceanic-mobile-menu';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Mobile Menu', 'oceanic' ),
    	'priority' => '35'
    );
        
    // Slider Settings
    $section = 'oceanic-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider', 'oceanic' ),
        'priority' => '35'
    );
    
    $choices = array(
        'oceanic-slider-default' => 'Default Slider',
        'oceanic-meta-slider' => 'Slider Plugin',
        'oceanic-no-slider' => 'None'
    );
    $options['oceanic-slider-type'] = array(
        'id' => 'oceanic-slider-type',
        'label'   => __( 'Choose a Slider', 'oceanic' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'oceanic-slider-default'
    );
    $options['oceanic-slider-cats'] = array(
        'id' => 'oceanic-slider-cats',
        'label'   => __( 'Slider Categories', 'oceanic' ),
        'section' => $section,
        'type'    => 'dropdown-categories',
        'description' => __( 'Select the categories of the posts you want to display in the slider. The featured image will be the slide image and the post content will display over it. Hold down the Ctrl (windows) / Command (Mac) button to select multiple categories.', 'oceanic' )
    );
    $options['oceanic-slider-transition-speed'] = array(
    	'id' => 'oceanic-slider-transition-speed',
    	'label'   => __( 'Transition Speed', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 450,
    	'description' => __( 'The speed it takes to transition between slides in milliseconds. 1000 milliseconds equals 1 second.', 'oceanic' )
    );
    
    $options['oceanic-meta-slider-shortcode'] = array(
        'id' => 'oceanic-meta-slider-shortcode',
        'label'   => __( 'Slider Shortcode', 'oceanic' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the shortcode given by the slider plugin you\'re using.', 'oceanic' )
    );

	// Colors
    $section = 'colors';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Colors', 'oceanic' ),
    	'priority' => '25'
    );    

	$options['oceanic-main-color'] = array(
		'id' => 'oceanic-main-color',
		'label'   => __( 'Primary Color', 'oceanic' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);
	$options['oceanic-main-color-hover'] = array(
		'id' => 'oceanic-main-color-hover',
		'label'   => __( 'Secondary Color', 'oceanic' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

    // Styling Settings
    $panel = 'oceanic-styling';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Styling', 'oceanic' ),
        'priority' => '30'
    );

    	// Links - Sub-section
	    $section = 'oceanic-styling-links';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Links', 'oceanic' ),
	    	'panel' => $panel
	    );
	    
	    $options['oceanic-content-links-have-underlines'] = array(
	    	'id' => 'oceanic-content-links-have-underlines',
	    	'label'   => __( 'Underline', 'oceanic' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 0
	    );
	
	    // Page Builders - Sub-section
	    $section = 'oceanic-styling-page-builders';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Page Builders', 'oceanic' ),
	    	'panel' => $panel
	    );
	    
	    $options['oceanic-page-builders-use-theme-styles'] = array(
	    	'id' => 'oceanic-page-builders-use-theme-styles',
	    	'label'   => __( 'Use theme styles', 'oceanic' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1,
	    	'description' => ''
	    );
	    
	    // Plugins - Sub-section
	    $section = 'oceanic-styling-plugins';
	    
	    $sections[] = array(
    		'id' => $section,
    		'title' => __( 'Plugins', 'oceanic' ),
    		'panel' => $panel,
    		'description' => __( 'Oceanic adds custom styling to support external plugins:', 'oceanic' )
	    );
	    
	    /*
	    $options['oceanic-bbpress-use-theme-styles'] = array(
    		'id' => 'oceanic-bbpress-use-theme-styles',
    		'label'   => __( 'BBPress', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'checkbox',
    		'default' => 1,
    		'description' => ''
	    );
	    */
	    
	    $options['oceanic-bookingpress-use-theme-styles'] = array(
    		'id' => 'oceanic-bookingpress-use-theme-styles',
    		'label'   => __( 'BookingPress', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'checkbox',
    		'default' => 1,
    		'description' => ''
	    );
	    
	// Font Settings
	$section = 'oceanic-fonts';
    $font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Fonts', 'oceanic' ),
		'priority' => '25'
	);

	$options['oceanic-heading-font'] = array(
		'id' => 'oceanic-heading-font',
		'label'   => __( 'Heading Font', 'oceanic' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Raleway'
	);
	$options['oceanic-heading-font-color'] = array(
		'id' => 'oceanic-heading-font-color',
		'label'   => __( 'Heading Font Color', 'oceanic' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $heading_font_color,
	);
	
    $options['oceanic-body-font'] = array(
        'id' => 'oceanic-body-font',
        'label'   => __( 'Body Font', 'oceanic' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Open Sans'
    );
    $options['oceanic-body-font-color'] = array(
        'id' => 'oceanic-body-font-color',
        'label'   => __( 'Body Font Color', 'oceanic' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_font_color,
    );
    
    // Blog Settings
    $section = 'oceanic-blog';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog', 'oceanic' ),
        'priority' => '50'
    );
    
    $options['oceanic-blog-excerpt-length'] = array(
    	'id' => 'oceanic-blog-excerpt-length',
    	'label'   => __( 'Excerpt Length', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 55
    );
    
    $options['oceanic-blog-read-more-text'] = array(
    	'id' => 'oceanic-blog-read-more-text',
    	'label'   => __( 'Read More Text', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 'Read More'
    );
    
	// WooCommerce
	if ( oceanic_is_woocommerce_activated() ) {
		
	    // WooCommerce
	    $panel = 'woocommerce';
	    
	    $panels[] = array(
	    	'id' => $panel,
	    	'title' => __( 'WooCommerce', 'oceanic' ),
	    	'priority' => '35'
	    );    

	    	// Header
		    $section = 'woocommerce-header';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Header', 'oceanic' ),
		    	'priority' => '0',
		    	'panel' => $panel
		    );
		    
			$options['oceanic-woocommerce-header-cart-auto-update'] = array(
		    	'id' => 'oceanic-woocommerce-header-cart-auto-update',
		    	'label'   => __( 'Auto Update Header Cart', 'oceanic' ),
		    	'description' => __( 'This will auto-update the header cart as products are added or removed. <strong>Please note:</strong> If you are running a multilingual site then you should disable this setting for the header cart translations to function correctly', 'oceanic' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 1
		    );

	    	// Product Catalog
		    $section = 'woocommerce_product_catalog';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product Catalog', 'oceanic' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
	    
		    $options['oceanic-layout-woocommerce-shop-full-width'] = array(
		    	'id' => 'oceanic-layout-woocommerce-shop-full-width',
		    	'label'   => __( 'Full width', 'oceanic' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => '0',
		    	'default' => 0
		    );

		    $options['oceanic-woocommerce-shop-display-thumbnail-loader-animation'] = array(
		    	'id' => 'oceanic-woocommerce-shop-display-thumbnail-loader-animation',
		    	'label'   => __( 'Display a loader animation on thumbnails', 'oceanic' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => 0,
		    	'default' => 1
		    );
		    
		    $options['oceanic-woocommerce-products-per-page'] = array(
		    	'id' => 'oceanic-woocommerce-products-per-page',
		    	'label'   => __( 'Products per page', 'oceanic' ),
		    	'section' => $section,
		    	'type'    => 'text',
		    	'default' => get_option('posts_per_page'),
		    	'description' => __( 'How many products should be shown per page?', 'oceanic' )
		    );
		    
	    	// Product
		    $section = 'woocommerce-product';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product', 'oceanic' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
		    
		    $options['oceanic-layout-woocommerce-product-full-width'] = array(
		    	'id' => 'oceanic-layout-woocommerce-product-full-width',
		    	'label'   => __( 'Full width', 'oceanic' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 0
		    );
		    
		    $options['oceanic-woocommerce-product-image-zoom'] = array(
		    	'id' => 'oceanic-woocommerce-product-image-zoom',
		    	'label'   => __( 'Enable zoom on product image', 'oceanic' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 1,
		    );

	    	// Product category / tag page
		    $section = 'woocommerce-category-tag-page';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product Category and Tag Page', 'oceanic' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
	    
		    $options['oceanic-layout-woocommerce-category-tag-page-full-width'] = array(
		    	'id' => 'oceanic-layout-woocommerce-category-tag-page-full-width',
		    	'label'   => __( 'Full width', 'oceanic' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => '0',
		    	'default' => get_theme_mod( 'oceanic-layout-woocommerce-shop-full-width', 0 )
		    );		    
		    
	}
    
    // Social Settings
    $section = 'oceanic-social';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Media Links', 'oceanic' ),
        'priority' => '35'
    );
    
    $options['oceanic-social-email'] = array(
   		'id' => 'oceanic-social-email',
   		'label'   => __( 'Email Address', 'oceanic' ),
   		'section' => $section,
   		'type'    => 'text'
    );
    $options['oceanic-social-skype'] = array(
   		'id' => 'oceanic-social-skype',
   		'label'   => __( 'Skype Name', 'oceanic' ),
   		'section' => $section,
   		'type'    => 'text'
    );
    
    $options['oceanic-social-tumblr'] = array(
   		'id' => 'oceanic-social-tumblr',
   		'label'   => __( 'Tumblr', 'oceanic' ),
   		'section' => $section,
   		'type'    => 'text'
    );
    $options['oceanic-social-flickr'] = array(
   		'id' => 'oceanic-social-flickr',
   		'label'   => __( 'Flickr', 'oceanic' ),
   		'section' => $section,
   		'type'    => 'text'
    );
    
    // Search Settings
    $section = 'oceanic-search';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Search', 'oceanic' ),
    	'priority' => '35'
    );
    
    $options['oceanic-search-placeholder-text'] = array(
   		'id' => 'oceanic-search-placeholder-text',
   		'label'   => __( 'Default Search Field Text', 'oceanic' ),
   		'section' => $section,
   		'type'    => 'text',
  		'default' => __( 'Search...', 'oceanic' )
    );
    
    $options['oceanic-website-text-no-search-results-heading'] = array(
    	'id' => 'oceanic-website-text-no-search-results-heading',
    	'label'   => __( 'No Search Results Heading', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'Nothing Found!', 'oceanic' )
    );
    
    $options['oceanic-website-text-no-search-results-text'] = array(
    	'id' => 'oceanic-website-text-no-search-results-text',
    	'label'   => __( 'No Search Results', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'textarea',
    	'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'oceanic'),
    	'description' => __( 'Enter the default text for when no search results are found', 'oceanic' )
    );
    
    // Site Text Settings
    $section = 'oceanic-404-page';

    $sections[] = array(
        'id' => $section,
        'title' => __( '404 Page', 'oceanic' ),
        'priority' => '50'
    );
    $options['oceanic-website-error-head'] = array(
        'id' => 'oceanic-website-error-head',
        'label'   => __( 'Heading', 'oceanic' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'oceanic'),
        'description' => __( 'Enter the heading for the 404 error page', 'oceanic' )
    );
    $options['oceanic-website-error-msg'] = array(
        'id' => 'oceanic-website-error-msg',
        'label'   => __( 'Message', 'oceanic' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'oceanic'),
        'description' => __( 'Enter the default text for the 404 error page (Page not found)', 'oceanic' )
    );

    // Footer Settings
    $section = 'oceanic-footer';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Footer', 'oceanic' ),
   		'priority' => '50'
    );
    
	// Header Image
	$section = 'header_image';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Header Image', 'oceanic' ),
		'priority' => '35'
	);
	
	/*
    $options['oceanic-slider-enabled-warning'] = array(
    	'id' => 'oceanic-slider-enabled-warning',
    	'label'   => __( 'Please note: The header image will not display on your site as the slider is currently enabled. To make the header image visible you will first need to disable the <a href="#oceanic-slider" rel="tc-section">slider</a>.', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'warning',
    	'priority' => 0
    );
	*/
	
    $options['oceanic-header-image-text'] = array(
		'id' => 'oceanic-header-image-text',
        'label'   => __( 'Text', 'oceanic' ),
        'section' => $section,
        'type'    => 'textarea',
    	'default' => 'The ocean stirs the heart,<br />inspires the imagination<br />and brings eternal joy<br />to the soul.',
    	//'description' => esc_html( __( 'Use <h2></h2> tags around heading text and <p></p> tags around body text.', 'oceanic' ) )
    );    
    
    // Gutenberg Settings
    $section = 'oceanic-gutenberg';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Gutenberg', 'oceanic' ),
    	'priority' => '50'
    );
    
    $options['oceanic-gutenberg-enable-block-based-widgets'] = array(
    	'id' => 'oceanic-gutenberg-enable-block-based-widgets',
    	'label'   => __( 'Enable block-based widgets editor', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    // Media Settings
    $section = 'oceanic-media';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Media', 'oceanic' ),
    	'priority' => '50'
    );
    
    $options['oceanic-media-crisp-images'] = array(
    	'id' => 'oceanic-media-crisp-images',
    	'label'   => __( 'Crisp images', 'oceanic' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    	'description' => __( '<p>This will remove the default anti-aliasing done to scaled images by browsers creating a more crisp image.</p>', 'oceanic' )
    );    
    
	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_oceanic_options' );
