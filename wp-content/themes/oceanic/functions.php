<?php
/**
 * oceanic functions and definitions
 *
 * @package oceanic
 */
define( 'OCEANIC_THEME_VERSION' , '1.0.60' );

if ( ! function_exists( 'oceanic_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function oceanic_theme_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}
	
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' );
	add_editor_style( $font_url );

	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,400,300' );
	add_editor_style( $font_url );
	
	add_editor_style('/library/css/editor-style.css');

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on oceanic, use a find and replace
	 * to change 'oceanic' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'oceanic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'oceanic_blog_img_side', 352, 230, true );
    }

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'oceanic' ),
        'footer' => __( 'Footer Menu', 'oceanic' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'navigation-widgets'
		)
	);

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	/*
	 * Setup Custom Logo Support for theme
	* Supported from WordPress version 4.5 onwards
	* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
	*/
	if ( function_exists( 'has_custom_logo' ) ) {
		add_theme_support( 'custom-logo' );
	}	
	
	// The custom header is used if no slider is enabled
	add_theme_support( 'custom-header', array(
        'default-image' => get_template_directory_uri() . '/library/images/headers/default.jpg',
		'width'         => 1663,
		'height'        => 709,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'oceanic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    add_theme_support( 'title-tag' );
	
	// Toggle WordPress 5.8+ block-based widgets
	if ( !get_theme_mod( 'oceanic-gutenberg-enable-block-based-widgets', customizer_library_get_default( 'oceanic-gutenberg-enable-block-based-widgets' ) ) ) {
		remove_theme_support( 'widgets-block-editor' );
	}
    
 	add_theme_support( 'woocommerce', array(
 		'gallery_thumbnail_image_width' => 300
 	) );
	
	if ( get_theme_mod( 'oceanic-woocommerce-product-image-zoom', true ) ) {	
		add_theme_support( 'wc-product-gallery-zoom' );
	}
	
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-spacing' );
}
endif; // oceanic_theme_setup
add_action( 'after_setup_theme', 'oceanic_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function oceanic_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'oceanic' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar(array(
		'name' => __( 'Oceanic Footer', 'oceanic' ),
		'id' => 'oceanic-site-footer',
        'description' => __( 'The footer will divide into however many widgets are put here.', 'oceanic' )
	));
}
add_action( 'widgets_init', 'oceanic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oceanic_theme_scripts() {
    wp_enqueue_style( 'oceanic-google-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), OCEANIC_THEME_VERSION );
    wp_enqueue_style( 'oceanic-google-heading-font-default', '//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,400,300', array(), OCEANIC_THEME_VERSION );
    
    if ( get_theme_mod( 'oceanic-font-awesome-version', customizer_library_get_default( 'oceanic-font-awesome-version' ) ) == '4.7.0' ) {
    	wp_enqueue_style( 'oceanic-font-awesome-oceanic-font-awesome', get_template_directory_uri().'/library/fonts/otb-font-awesome/css/otb-font-awesome.css', array(), '4.7.0' );
    	wp_enqueue_style( 'oceanic-font-awesome-font-awesome-min', get_template_directory_uri().'/library/fonts/otb-font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
    } else if ( get_theme_mod( 'oceanic-font-awesome-version', customizer_library_get_default( 'oceanic-font-awesome-version' ) ) == '5.5.0' ) {
    	wp_enqueue_style( 'oceanic-font-awesome', '//use.fontawesome.com/releases/v5.5.0/css/all.css', array(), '5.5.0' );
    } else {
    	wp_enqueue_style( 'oceanic-font-awesome', '//use.fontawesome.com/releases/v6.5.1/css/all.css', array(), '6.5.1' );
    }
    
	wp_enqueue_style( 'oceanic-style', get_stylesheet_uri(), array(), OCEANIC_THEME_VERSION );
	
	if ( oceanic_is_woocommerce_activated() ) {	
		wp_enqueue_style( 'oceanic-woocommerce-style', get_template_directory_uri().'/library/css/woocommerce-custom.css', array(), OCEANIC_THEME_VERSION );
	}
	
	if ( get_theme_mod( 'oceanic-header-layout', false ) == 'oceanic-header-layout-centered' ) {
		wp_enqueue_style( 'oceanic-header-centered-style', get_template_directory_uri().'/library/css/header-centered.css', array(), OCEANIC_THEME_VERSION );
	} else {
		wp_enqueue_style( 'oceanic-header-standard-style', get_template_directory_uri().'/library/css/header-standard.css', array(), OCEANIC_THEME_VERSION );
	}

	wp_enqueue_script( 'oceanic-navigation', get_template_directory_uri() . '/library/js/navigation.js', array(), OCEANIC_THEME_VERSION, true );
	wp_enqueue_script( 'oceanic-caroufredSel', get_template_directory_uri() . '/library/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), OCEANIC_THEME_VERSION, true );
	
	wp_enqueue_script( 'oceanic-custom', get_template_directory_uri() . '/library/js/custom.js', array('jquery'), OCEANIC_THEME_VERSION, true );

    $oceanic_client_side_variables = array(
    	'sliderTransitionSpeed' => intval( get_theme_mod( 'oceanic-slider-transition-speed', customizer_library_get_default( 'oceanic-slider-transition-speed' ) ) )
    );
	
	wp_localize_script( 'oceanic-custom', 'oceanic', $oceanic_client_side_variables );
	
	wp_enqueue_script( 'oceanic-skip-link-focus-fix', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), OCEANIC_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'oceanic_theme_scripts' );

function oceanic_admin_scripts( $hook ) {
	wp_enqueue_style( 'oceanic-admin', get_template_directory_uri().'/library/css/admin.css', array(), OCEANIC_THEME_VERSION );
}
add_action( 'admin_enqueue_scripts', 'oceanic_admin_scripts' );

function oceanic_review_notice() {
	$user_id = get_current_user_id();
	$message = 'Thank you for using Oceanic! I hope you\'re enjoying the theme, please consider <a href="https://wordpress.org/support/theme/oceanic/reviews/#new-post" target="_blank">rating it on wordpress.org</a> :)';
	
	if ( !get_user_meta( $user_id, 'oceanic_review_notice_dismissed' ) ) {
		$class = 'notice notice-success is-dismissible';
		printf( '<div class="%1$s"><p>%2$s</p><p><a href="?oceanic-review-notice-dismissed">Dismiss this notice</a></p></div>', esc_attr( $class ), $message );
	}
}
$today = new DateTime( date( 'Y-m-d' ) );
$activate  = new DateTime( date( get_theme_mod( 'otb_oceanic_activated' ) ) );
if ( $activate->diff($today)->d >= 14 ) {
	add_action( 'admin_notices', 'oceanic_review_notice' );
}

function oceanic_review_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['oceanic-review-notice-dismissed'] ) ) {
		add_user_meta( $user_id, 'oceanic_review_notice_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'oceanic_review_notice_dismissed' );

/**
 * Load Gutenberg stylesheet.
*/
function oceanic_gutenberg_assets() {
	wp_enqueue_style( 'oceanic-gutenberg-editor', get_theme_file_uri( '/library/css/gutenberg-editor-style.css' ), false, OCEANIC_THEME_VERSION );
	
	// Output inline styles based on theme customizer selections
	require get_template_directory() . '/library/includes/gutenberg-editor-styles.php';
}
add_action( 'enqueue_block_editor_assets', 'oceanic_gutenberg_assets' );

// Recommended plugins installer
require_once get_template_directory() . '/library/includes/class-tgm-plugin-activation.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/library/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/library/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/library/includes/jetpack.php';

// Helper library for the theme customizer.
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/customizer/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/customizer/mods.php';

// Include TRT Customize Pro library
require_once( get_template_directory() . '/trt-customize-pro/class-customize.php' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function oceanic_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'oceanic_pingback_header' );

function oceanic_allowed_tags() {
	global $allowedtags;
	$allowedtags["h1"] = array();
	$allowedtags["h2"] = array();
	$allowedtags["h3"] = array();
	$allowedtags["h4"] = array();
	$allowedtags["h5"] = array();
	$allowedtags["h6"] = array();
	$allowedtags["p"] = array();
	$allowedtags["br"] = array();
	$allowedtags["a"] = array(
			'href' => true,
			'class' => true
	);
	$allowedtags["i"] = array(
			'class' => true
	);
}
add_action('init', 'oceanic_allowed_tags', 10);

function oceanic_register_required_plugins() {
	
	$plugins = array(
		array(
			'name'      => __( 'Super Simple Slider', 'oceanic' ),
			'slug'      => 'super-simple-slider',
			'required'  => false
		),
		array(
			'name'      => __( 'You can quote me on that', 'oceanic' ),
			'slug'      => 'you-can-quote-me-on-that',
			'required'  => false
		),
		array(
			'name'      => __( 'WooCommerce', 'oceanic' ),
			'slug'      => 'woocommerce',
			'required'  => false
		),
		array(
			'name'      => __( 'Elementor', 'oceanic' ),
			'slug'      => 'elementor',
			'required'  => false
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'oceanic' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false
		),
		array(
			'name'      => __( 'SiteOrigin Widgets Bundle', 'oceanic' ),
			'slug'      => 'so-widgets-bundle',
			'required'  => false
		),
		array(
			'name'      => __( 'WPForms', 'oceanic' ),
			'slug'      => 'wpforms-lite',
			'required'  => false
		),
		array(
			'name'      => __( 'Recent Posts Widget Extended', 'oceanic' ),
			'slug'      => 'recent-posts-widget-extended',
			'required'  => false
		),
		array(
			'name'      => __( 'Beam me up Scotty', 'oceanic' ),
			'slug'      => 'beam-me-up-scotty',
			'required'  => false
		),
		array(
			'name'      => __( 'Same but Different - Related Posts by Taxonomy', 'oceanic' ),
			'slug'      => 'same-but-different',
			'required'  => false
		),
		array(
			'name'      => __( 'BookingPress', 'oceanic' ),
			'slug'      => 'bookingpress-appointment-booking',
			'required'  => false
		)
	);

	$config = array(
		'id'           => 'oceanic',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => get_stylesheet_directory() .'/library/plugins/', // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                    // Automatically activate plugins after installation or not.
		'message'      => ''                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'oceanic_register_required_plugins' );

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'oceanic_is_woocommerce_activated' ) ) :
    
function oceanic_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

endif; // oceanic_is_woocommerce_activated

if ( oceanic_is_woocommerce_activated() ) {
    require get_template_directory() . '/library/includes/woocommerce-inc.php';
}

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'oceanic-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'oceanic-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '<div class="hiddenUntilLoadedImageContainer loading">';
	}
}, 9 );

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'oceanic-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'oceanic-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '</div>';
	}
}, 11 );

// Set the number or products per page
function oceanic_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = get_theme_mod( 'oceanic-woocommerce-products-per-page' );
	
	return $cols;
}
add_filter( 'loop_shop_per_page', 'oceanic_loop_shop_per_page', 20 );

if (!function_exists('oceanic_woocommerce_product_thumbnails_columns')) {
	function oceanic_woocommerce_product_thumbnails_columns() {
		return 3;
	}
}
add_filter ( 'woocommerce_product_thumbnails_columns', 'oceanic_woocommerce_product_thumbnails_columns' );

/**
 * Replace Read more buttons for out of stock items
 */
// Display an Out of Stock label on out of stock products
add_action( 'woocommerce_after_shop_loop_item_title', 'oceanic_out_of_stock_notice', 10 );
function oceanic_out_of_stock_notice() {
    global $product;
    if ( !$product->is_in_stock() ) {
		echo '<p class="stock out-of-stock">';
		echo __( 'Out of Stock', 'oceanic' );
		echo '</p>';
    }
}

// Add CSS class to body by filter
function oceanic_add_body_class( $classes ) {
	$classes[] = 'font-awesome-' . get_theme_mod( 'oceanic-font-awesome-version', customizer_library_get_default( 'oceanic-font-awesome-version' ) );
	
	if( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}
	
	if ( get_theme_mod( 'oceanic-media-crisp-images', customizer_library_get_default( 'oceanic-media-crisp-images' ) ) ) {
		$classes[] = 'crisp-images';
	}
	
	if ( get_theme_mod( 'oceanic-content-links-have-underlines', customizer_library_get_default( 'oceanic-content-links-have-underlines' ) ) ) {
		$classes[] = 'content-links-have-underlines';
	}
	
	if ( get_theme_mod( 'oceanic-page-builders-use-theme-styles', customizer_library_get_default( 'oceanic-page-builders-use-theme-styles' ) ) ) {
		$classes[] = 'oceanic-page-builders-use-theme-styles';
	}
	
	/*
	if ( get_theme_mod( 'oceanic-bbpress-use-theme-styles', customizer_library_get_default( 'oceanic-bbpress-use-theme-styles' ) ) ) {
		$classes[] = 'oceanic-bbpress-use-theme-styles';
	}
	*/
	
	if ( get_theme_mod( 'oceanic-bookingpress-use-theme-styles', customizer_library_get_default( 'oceanic-bookingpress-use-theme-styles' ) ) ) {
		$classes[] = 'oceanic-bookingpress-use-theme-styles';
	}
	
	if ( oceanic_is_woocommerce_activated() && is_shop() && get_theme_mod( 'oceanic-layout-woocommerce-shop-full-width', customizer_library_get_default( 'oceanic-layout-woocommerce-shop-full-width' ) ) ) {
		$classes[] = 'oceanic-shop-full-width';
	}

	if ( oceanic_is_woocommerce_activated() && is_product() && get_theme_mod( 'oceanic-layout-woocommerce-product-full-width', customizer_library_get_default( 'oceanic-layout-woocommerce-product-full-width' ) ) ) {
		$classes[] = 'oceanic-product-full-width';
	}
	
	if ( oceanic_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'oceanic-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'oceanic-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$classes[] = 'oceanic-shop-full-width';
	}
	
	if ( oceanic_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}

	return $classes;
}
add_filter( 'body_class', 'oceanic_add_body_class' );

function oceanic_admin_notice() {
	$user_id = get_current_user_id();

	$message = array (
			'id' => 1,
			'heading' => 'Demo Content',
			'text' => '<strong>Oceanic Premium</strong> now allows you to import the demo content created with <a href="https://www.outtheboxthemes.com/go/elementor/" target="_blank"><strong>Elementor</strong></a> seen on the Oceanic demo site.',
			'link' => 'https://www.outtheboxthemes.com/go/theme-notification-oceanic-demo-content/'
	);

	if ( !empty( $message['text'] ) && !get_user_meta( $user_id, 'oceanic_admin_notice_' .$message['id']. '_dismissed' ) ) {
		$class = 'notice otb-notice notice-success is-dismissible';
		printf( '<div class="%1$s"><img src="https://www.outtheboxthemes.com/wp-content/uploads/2018/02/logo-charcoal.png" class="logo" /><h3>%2$s</h3><p>%3$s</p><p style="margin:0;"><a class="button button-primary" href="%4$s" target="_blank">Read More</a> <a class="button button-dismiss" href="?oceanic-admin-notice-dismissed&oceanic-admin-notice-id=%5$s">Dismiss</a></p></div>', esc_attr( $class ), $message['heading'], $message['text'], $message['link'], $message['id'] );
	}
}

//if ( date('Y-m-d') <= '2023-02-14' ) {
add_action( 'admin_notices', 'oceanic_admin_notice' );
//}

function oceanic_admin_notice_dismissed() {
	$user_id = get_current_user_id();
	if ( isset( $_GET['oceanic-admin-notice-dismissed'] ) ) {
		$oceanic_admin_notice_id = $_GET['oceanic-admin-notice-id'];
		add_user_meta( $user_id, 'oceanic_admin_notice_' .$oceanic_admin_notice_id. '_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'oceanic_admin_notice_dismissed' );

/**
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
endif;

function oceanic_excerpt_length( $length ) {
	if ( is_admin() || ( !is_home() && !is_category() && !is_tag() && !is_search() ) ) {
		return $length;
	} else {
		return intval( get_theme_mod( 'oceanic-blog-excerpt-length', customizer_library_get_default( 'oceanic-blog-excerpt-length' ) ) );
	}
}
add_filter( 'excerpt_length', 'oceanic_excerpt_length', 999 );

function oceanic_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	} else {
		return ' <a class="read-more" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . wp_kses_post( pll__( get_theme_mod( 'oceanic-blog-read-more-text', customizer_library_get_default( 'oceanic-blog-read-more-text' ) ) ) ) . '</a>';
	}
}
add_filter( 'excerpt_more', 'oceanic_excerpt_more' );

/**
 * Adjust is_home query if oceanic-slider-cats is set
 */
function oceanic_set_blog_queries( $query ) {
    
    $slider_cats = get_theme_mod( 'oceanic-slider-cats', '' );
    
	if ( $slider_cats != '' ) {
		$slider_cats = explode(',', esc_html( $slider_cats ));
		$slider_cat_ids = array();

		$is_front_page = ( $query->get('page_id') == get_option('page_on_front') || is_front_page() );
		
		if ( count($slider_cats) > 0 ) {
		    for ($i=0; $i<count($slider_cats); ++$i) {
		    	$cat_id = get_cat_ID( $slider_cats[$i] );
		    	if ($cat_id > 0) $slider_cat_ids[$i] = $cat_id;
		    }
		    
		    if ( count($slider_cat_ids) > 0) {
		        // do not alter the query on wp-admin pages and only alter it if it's the main query
		        if ( !is_admin() && !$is_front_page || $is_front_page && $query->get('id') != 'slider' ){
	                $query->set( 'category__not_in', $slider_cat_ids );
		        }
		    }
		}
	}
	    
}
add_action( 'pre_get_posts', 'oceanic_set_blog_queries' );

function filter_recent_posts_widget_parameters( $params ) {

	$slider_cats = get_theme_mod( 'oceanic-slider-cats', false );

	if ( $slider_cats ) {
		$slider_cats = explode(',', esc_html( $slider_cats ));
		$slider_cat_ids = array();
		 
		for ($i=0; $i<count($slider_cats); ++$i) {
			$cat_id = get_cat_ID( $slider_cats[$i] );
			if ($cat_id > 0) $slider_cat_ids[$i] = $cat_id;
		}
		 
		if ( count($slider_cat_ids) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			$params['category__not_in'] = $slider_cat_ids;
		}
	}
	
	return $params;
}
add_filter('widget_posts_args','filter_recent_posts_widget_parameters');

/**
 * Adjust the widget categories query if oceanic-slider-cats is set
 */
function oceanic_set_widget_categories_args($args){
	$slider_cats = get_theme_mod( 'oceanic-slider-cats', false );
	
	if ( $slider_cats ) {
		$slider_cats = explode(',', esc_html( $slider_cats ));
		$slider_cat_ids = array();
		 
		for ($i=0; $i<count($slider_cats); ++$i) {
			$cat_id = get_cat_ID( $slider_cats[$i] );
			if ($cat_id > 0) $slider_cat_ids[$i] = $cat_id;
		}
		 
		if ( count($slider_cat_ids) > 0) {
			$exclude = implode(',', $slider_cat_ids);
			$args['exclude'] = $exclude;
		}
	}

	return $args;
}
add_filter('widget_categories_args', 'oceanic_set_widget_categories_args');

function oceanic_set_widget_categories_dropdown_arg($args){
	$slider_cats = get_theme_mod( 'oceanic-slider-cats', false );
	
	if ( $slider_cats ) {
		$slider_cats = explode(',', esc_html( $slider_cats ));
		$slider_cat_ids = array();
			
		for ($i=0; $i<count($slider_cats); ++$i) {
			$cat_id = get_cat_ID( $slider_cats[$i] );
			if ($cat_id > 0) $slider_cat_ids[$i] = $cat_id;
		}
			
		if ( count($slider_cat_ids) > 0) {
			$exclude = implode(',', $slider_cat_ids);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter('widget_categories_dropdown_args', 'oceanic_set_widget_categories_dropdown_arg');

/**
 * Premium Upgrade Page
 */
include get_template_directory() . '/upgrade/upgrade.php';

/**
 * Determine if Custom Post Type
 * usage: if ( is_this_a_custom_post_type() )
 	*
 	* References/Modified from:
 	* @link https://codex.wordpress.org/Function_Reference/get_post_types
 	* @link http://wordpress.stackexchange.com/users/73/toscho <== love this person!
 	* @link http://wordpress.stackexchange.com/a/95906/64742
 	*/
function oceanic_is_this_a_custom_post_type( $post = NULL ) {
	$all_custom_post_types = get_post_types( array ( '_builtin' => false ) );

 	//* there are no custom post types
 	if ( empty ( $all_custom_post_types ) ) return false;

 	$custom_types      = array_keys( $all_custom_post_types );
 	$current_post_type = get_post_type( $post );

 	//* could not detect current type
 	if ( ! $current_post_type )
 		return false;

	return in_array( $current_post_type, $custom_types );
}

 /**
  * Remove blog menu link class 'current_page_parent' when on an unrelated CPT
  * or search results page
  * or 404 page
  * dep: is_this_a_custom_post_type() function
  * modified from: https://gist.github.com/ajithrn/1f059b2201d66f647b69
  */
function oceanic_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link( $classes, $item, $args ) {
	if ( oceanic_is_this_a_custom_post_type() || is_search() || is_404() ) {
		$blog_page_id = intval( get_option('page_for_posts') );

		if ( $blog_page_id != 0 && $item->object_id == $blog_page_id ) {
			unset( $classes[array_search( 'current_page_parent', $classes )] );
		}

	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'oceanic_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link', 10, 3 );

if ( function_exists( 'pll_register_string' ) ) {
	/**
	* Register some string from the customizer to be translated with Polylang
	*/
	function oceanic_pll_register_string() {
		// Header
		pll_register_string( 'oceanic-header-info-text', get_theme_mod( 'oceanic-header-info-text', customizer_library_get_default( 'oceanic-header-info-text' ) ), 'oceanic', false );
		
		// Header media
		pll_register_string( 'oceanic-header-image-text', get_theme_mod( 'oceanic-header-image-text', customizer_library_get_default( 'oceanic-header-image-text' ) ), 'oceanic', true );
		
		// Search
		pll_register_string( 'oceanic-search-placeholder-text', get_theme_mod( 'oceanic-search-placeholder-text', customizer_library_get_default( 'oceanic-search-placeholder-text' ) ), 'oceanic', false );
		pll_register_string( 'oceanic-website-text-no-search-results-heading', get_theme_mod( 'oceanic-website-text-no-search-results-heading', customizer_library_get_default( 'oceanic-website-text-no-search-results-heading' ) ), 'oceanic', false );
		pll_register_string( 'oceanic-website-text-no-search-results-text', get_theme_mod( 'oceanic-website-text-no-search-results-text', customizer_library_get_default( 'oceanic-website-text-no-search-results-text' ) ), 'oceanic', true );
		
		// Blog read more
		pll_register_string( 'oceanic-blog-read-more-text', get_theme_mod( 'oceanic-blog-read-more-text', customizer_library_get_default( 'oceanic-blog-read-more-text' ) ), 'oceanic', false );
		
		// 404
		pll_register_string( 'oceanic-website-error-head', get_theme_mod( 'oceanic-website-error-head', customizer_library_get_default( 'oceanic-website-error-head' ) ), 'oceanic', false );
		pll_register_string( 'oceanic-website-error-msg', get_theme_mod( 'oceanic-website-error-msg', customizer_library_get_default( 'oceanic-website-error-msg' ) ), 'oceanic', true );
	}
	add_action( 'admin_init', 'oceanic_pll_register_string' );
}

/**
 * A fallback function that outputs a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return  void
 */
if ( !function_exists( 'pll_e' ) ) {
	function pll_e( $str ) {
		echo $str;
	}
}

/**
 * A fallback function that returns a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return string
 */
if ( !function_exists( 'pll__' ) ) {
	function pll__( $str ) {
		return $str;
	}
}

function oceanic_singular_or_plural( $singular, $plural, $value ) {
	$locale = get_locale();

	$plural_exceptions = array(
		'fr_CA',
		'fr_FR',
		'fr_BE',
		'pt_BR'
	);

	if ( ( $value == 0 && !in_array( $locale, $plural_exceptions ) ) || $value > 1 ) {
		return $plural;
	} else {
		return $singular;
	}
}
