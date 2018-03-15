<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Boston Business
 */

if ( ! function_exists( 'boston_business_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0
	 */
	function boston_business_doctype() {
	?><!DOCTYPE html><html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'boston_business_action_doctype', 'boston_business_doctype', 10 );


if ( ! function_exists( 'boston_business_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0
	 */
	function boston_business_head() {
	?>
	    <meta charset="<?php bloginfo( 'charset' ); ?>">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="profile" href="http://gmpg.org/xfn/11">
	    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	    <?php endif; ?>
    <?php
	}
endif;
add_action( 'boston_business_action_head', 'boston_business_head', 10 );

if ( ! function_exists( 'boston_business_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0
	 */
	function boston_business_page_start() {
	?>
    <div id="page" class="hfeed site">
    <?php
	}
endif;
add_action( 'boston_business_action_before', 'boston_business_page_start' );

if ( ! function_exists( 'boston_business_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0
	 */
	function boston_business_page_end() {
	?></div><!-- #page --><?php
	}
endif;

add_action( 'boston_business_action_after', 'boston_business_page_end' );

if ( ! function_exists( 'boston_business_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0
	 */
	function boston_business_content_start() {
	?><div id="content" class="site-content"><?php
	}
endif;
add_action( 'boston_business_action_before_content', 'boston_business_content_start' );


if ( ! function_exists( 'boston_business_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0
	 */
	function boston_business_content_end() {
	?></div><!-- #content --><?php
	}
endif;
add_action( 'boston_business_action_after_content', 'boston_business_content_end' );


if ( ! function_exists( 'boston_business_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0
	 */
	function boston_business_header_start() {
		?><header id="masthead" class="site-header navbar navbar-inverse" role="banner"><div class="container"><?php
	}
endif;
add_action( 'boston_business_action_before_header', 'boston_business_header_start' );

if ( ! function_exists( 'boston_business_header_end' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0
	 */
	function boston_business_header_end() {
	?></div><!-- .container --></header><!-- #masthead --><?php
	}
endif;
add_action( 'boston_business_action_after_header', 'boston_business_header_end' );



if ( ! function_exists( 'boston_business_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0
	 */
	function boston_business_footer_start() {
		$footer_status = apply_filters( 'boston_business_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}
		?><footer id="colophon" class="site-footer" role="contentinfo"><?php
	}
endif;
add_action( 'boston_business_action_before_footer', 'boston_business_footer_start' );


if ( ! function_exists( 'boston_business_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0
	 */
	function boston_business_footer_end() {
		$footer_status = apply_filters( 'boston_business_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}
		?></footer><!-- #colophon -->
		<?php
	}
endif;
add_action( 'boston_business_action_after_footer', 'boston_business_footer_end' );
