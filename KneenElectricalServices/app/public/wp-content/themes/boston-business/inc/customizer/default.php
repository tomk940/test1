<?php
/**
 * Default theme options.
 *
 * @package Boston Business
 */

if ( ! function_exists( 'boston_business_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0
	 *
	 * @return array Default theme options.
	 */
	function boston_business_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_title']   = true;
		$defaults['show_tagline'] = true;

		// Layout.
		$defaults['page_layout']           = 'right-sidebar';
		$defaults['archive_layout']          = 'excerpt';

		// Pagination.
		$defaults['pagination_type'] = 'default';

		// Footer.
		$defaults['copyright_text']          = esc_html__( 'Copyright &copy; All rights reserved.', 'boston-business' );
		$defaults['copyright_text_description'] = esc_html__( 'Boston Business By Creativ Themes.', 'boston-business' );

		// Layout.
		$defaults['site_layout'] = 'wide';
		$defaults['color_layout'] = '#1e73be';
		$defaults['color_hover_layout'] = '#00acee';

		// Excerpt 
		$defaults['excerpt_length'] = '25';

		// Pass through filter.
		$defaults = apply_filters( 'boston_business_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
