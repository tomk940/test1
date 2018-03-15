<?php

/**
 * Register stylesheets.
 * Loads parent theme from parent folder before child theme stylesheet.
 */

function exbusiness_frontscripts() {
	wp_enqueue_style( 'exbusiness-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'exbusiness-style', get_stylesheet_uri(), array( 'exbusiness-parent-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'exbusiness_frontscripts' );

