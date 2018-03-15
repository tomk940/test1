<?php
/**
 * Boston Business functions and definitions.
 *
 * @package Boston Business
 */

if ( ! function_exists( 'boston_business_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function boston_business_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'boston-business' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 */
		add_theme_support( 'custom-logo' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'boston-business-featured-banner', 1400, 320, true );

		// This theme uses wp_nav_menu() in four location.
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary Menu', 'boston-business' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'boston_business_custom_background_args', array(
			'default-color' => '#ffffff',
			'default-image' => '',
		) ) );

		// Set up the WordPress core custom header feature.
		add_theme_support( 'custom-header', apply_filters( 'boston_business_custom_header_args', array(
				'default-image' => get_template_directory_uri() . '/images/header-banner.jpeg',
				'width'         => 1400,
				'height'        => 320,
				'flex-height'   => true,
				'header-text'   => false,
		) ) );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Supports.
		require_once get_template_directory() . '/inc/footer-widget-area.php';

		global $boston_business_default_options;
		$boston_business_default_options = boston_business_get_default_theme_options();

	}
endif;

add_action( 'after_setup_theme', 'boston_business_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function boston_business_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'boston_business_content_width', 640 );
}
add_action( 'after_setup_theme', 'boston_business_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function boston_business_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'boston-business' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Primary Sidebar.', 'boston-business' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'boston_business_widgets_init' );

if ( ! function_exists( 'boston_business_fonts_url' ) ) :

/**
* Register Google fonts.
*
* @since Boston Business 1.0
*
* @return string Google fonts URL for the theme.
*/

function boston_business_fonts_url() {

	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	// body fonts

	/* translators: If there are characters in your language that are not supported by Ubuntu, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Ubuntu: on or off', 'boston-business' ) ) {
		$fonts[] = 'Ubuntu:300,400,500,700';
	}
	
	// header fonts
	
	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins: on or off', 'boston-business' ) ) {
		$fonts[] = 'Poppins:300,400,500,600,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

endif;

/**
 * Enqueue scripts and styles.
 */
function boston_business_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	$fonts_url = boston_business_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'boston-business-google-fonts', $fonts_url, array(), null );
	}

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap' . $min . '.css', '', '2.2.1' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome' . $min . '.css', '', '2.2.1' );

	wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/assets/css/slick-theme' . $min . '.css', '', '2.2.1' );

	wp_enqueue_style( 'slick', get_template_directory_uri() .'/assets/css/slick' . $min . '.css', '', '2.2.1' );

	wp_enqueue_style( 'boston-business-style', get_stylesheet_uri(), array(), '1.4.0' );

	wp_enqueue_script( 'boston-business-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $min . '.js', array(), '1.2.0', true );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap' . $min . '.js', array( 'jquery' ), '2.2.1', true );

	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick' . $min . '.js', array( 'jquery' ), '2.2.1', true );

	wp_enqueue_script( 'boston-business-custom', get_template_directory_uri() . '/assets/js/custom' . $min . '.js', array( 'jquery' ), '1.2.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'boston_business_scripts' );

/**
 * Include default theme options.
 */
require_once get_template_directory() . '/inc/customizer/default.php';

/**
 * Load Layout Option.
 */
require_once get_template_directory() . '/inc/layout-option.php';

/**
 * Load theme core functions.
 */
require_once get_template_directory() . '/inc/core.php';

/**
 * Load hooks.
 */
require_once get_template_directory() . '/inc/functions/structure.php';
require_once get_template_directory() . '/inc/functions/basic.php';
require_once get_template_directory() . '/inc/functions/custom.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( class_exists( 'Jetpack' ) ) {
	require_once get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load TGM pluin activation file.
 */
require_once get_template_directory() . '/plugins/class-tgm-plugin-activation.php';

/**
 * Load Site Origin Bundle Hooks.
 */
require_once get_template_directory() . '/inc/functions/so-widgets.php';


/**
 * Load Theme SO Widgets.
 */
if ( class_exists( 'SiteOrigin_Widget' ) ) {

	// Theme widgets.
	$theme_widgets = array(
        'main-slider',
        'team',
        'testimonial-slider',
		'latest-news',
        'address',
	);

	$template_dir = get_template_directory();

	foreach ( $theme_widgets as $widget ) {

		require_once $template_dir . '/inc/so-widgets/' . $widget . '/' . $widget . '.php';

	}
}
function boston_business_pro_add_menu_parent_class( $items ) {
    $parents = array();

    foreach ( $items as $item ) {
        //Check if the item is a parent item
        if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
          $parents[] = $item->menu_item_parent;
        }
    }

    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
          //Add "dropdown" class to parents
          $item->classes[] = 'dropdown';
        }
    }

    return $items;
}

/**
 * add_menu_parent_class to menu.
*/
add_filter( 'wp_nav_menu_objects', 'boston_business_pro_add_menu_parent_class' ); 
function boston_business_pro_new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);        
    return $menu;      
}
add_filter('wp_nav_menu','boston_business_pro_new_submenu_class');

/**
 * Excerpt.
 */

if ( ! function_exists( 'boston_business_excerpt_length' ) ) :
	/**
	 * excerpt length.
	 *
	 * @param int $length in words.
	 *
	 */
	function boston_business_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		$length = boston_business_get_option( 'excerpt_length' );
		$length = ! empty( $length ) ? $length : '25';
		return $length;
	}
endif;
add_filter( 'excerpt_length', 'boston_business_excerpt_length', 999 );

if( ! function_exists( 'boston_business_excerpt_more' ) ) :
	/**
	 * @param string $more.
	 *
	 * Return string 
	 */
	function boston_business_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
		/* translators: %s: post title */
		$more =	sprintf( __( '<span class="screen-reader-text"> "%s"</span>', 'boston-business' ), get_the_title( get_the_ID() ) );
		return ' &hellip; ' . $more;
	}
endif;	
add_filter('excerpt_more', 'boston_business_excerpt_more');


/**
* Get sidebar options.
*/

if ( ! function_exists( 'boston_business_get_sidebar_options' ) ) :

	function boston_business_get_sidebar_options() {

		global $wp_registered_sidebars;

		$output = array();

		if ( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ) {
			foreach ( $wp_registered_sidebars as $key => $sidebar ) {
				$output[ $key ] = $sidebar['name'];
			}
		}

		return $output;

	}

endif;

if ( ! function_exists( 'boston_business_get_index_page_id' ) ) :

	/**
	 * Get front index page ID.
	 *
	 * @param string $type Type.
	 * @return int Corresponding Page ID.
	 */
	function boston_business_get_index_page_id( $type = 'front' ) {

		$page = '';

		switch ( $type ) {
			case 'front':
				$page = get_option( 'page_on_front' );
				break;

			case 'blog':
				$page = get_option( 'page_for_posts' );
				break;

			default:
				break;
		}
		$page = absint( $page );
		return $page;

	}
endif;

if ( ! function_exists( 'boston_business_content_is_pagebuilder' ) ) :

	/**
	 * SiteOrigin Page Builder Content Check.
	 *
	 * Conditionally check if the current page/post was created with
	 * the SiteOrigin Page Builder editor.
	 *
	 * @return bool True if builder page.
	 */
	function boston_business_content_is_pagebuilder() {
		global $post;

		// Consider empty content the WP editor.
		if ( empty( $post ) ) {
			return false;
		}

		// Does pagebuilder content exist in custom fields?
		$panels_data = get_post_meta( $post->ID, 'panels_data', true );

		return ( empty( $panels_data ) ) ? false : true;
	}

endif;

if ( ! function_exists( 'boston_business_the_custom_logo' ) ) :

	/**
	 * Render logo.
	 */
	function boston_business_the_custom_logo() {

		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}

	}

endif;

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function boston_business_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'Demo Import',
			'import_file_url'            => get_template_directory_uri() . '/assets/demo-content/demo-content.xml',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'boston_business_ocdi_import_files' );

/**
 * 
 * Automatically assign "Front page", "Posts page" and menu locations after the importer is done
 * 
 */
function boston_business_ocdi_after_import_setup() {

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'boston_business_ocdi_after_import_setup' );

// Disable the ProteusThemes branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 *TGM Plugin activation.
*/

add_action( 'tgmpa_register', 'boston_business_activate_recommended_plugins' );

/**
 * Register recommended plugins.
 */

function boston_business_activate_recommended_plugins() {

	$plugins = array(

		array(
			'name'     => __( 'Page Builder by SiteOrigin', 'boston-business' ),
			'slug'     => 'siteorigin-panels',
			'required' => false,
		),
		array(
			'name'     => __( 'Jetpack', 'boston-business' ),
			'slug'     => 'jetpack',
			'required' => false,
		),
		array(
			'name'     => __( 'SiteOrigin Widgets Bundle', 'boston-business' ),
			'slug'     => 'so-widgets-bundle',
			'required' => false,
		),
		array(
			'name'     => __( 'Contact Form 7', 'boston-business' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),

		array(
			'name'      => esc_html__( 'One Click Demo Import', 'boston-business' ),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
	);

	$config = array();

	tgmpa( $plugins, $config );

}

