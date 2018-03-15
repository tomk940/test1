<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'ihbp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ihbp_setup() {


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 *
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Custom Logo
	add_theme_support( 'custom-logo' );
	
	
	//RT Slider Support
	add_theme_support( 'rt-slider' );
	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ih-business-pro' ),
		'footer' => __( 'Footer Menu', 'ih-business-pro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ihbp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => 'ih-business-pro',
	) ) );
	
	add_image_size('ihbp-pop-thumb',542, 340, true );
	add_image_size('ihbp-thumb',600, 600, true );
	add_image_size('ihbp-slider-thumb',860, 430, true );
	
	//Set up the Plugin
	add_theme_support( 'ihss-all' );
	add_theme_support( 'ih-showcase' );
	add_theme_support( 'ih-testimonials' );
	add_theme_support( 'ih-counters' );
	add_theme_support( 'ih-parallax' );

	
}
endif; // ihbp_setup
add_action( 'after_setup_theme', 'ihbp_setup' );