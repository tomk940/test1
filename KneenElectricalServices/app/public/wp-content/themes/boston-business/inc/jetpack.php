<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Boston Business
 */

/**
 * Add theme support for Jetpack.
 *
 * @since 1.0
 */
function boston_business_jetpack_setup() {

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'boston_business_jetpack_setup' );
