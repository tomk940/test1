<?php
/**
 * Functions related to customizer and options.
 *
 * @package Boston Business
 */

if ( ! function_exists( 'boston_business_get_page_layout_options' ) ) :

	/**
	 * Returns Page or Post layout and pagination options.
	 *
	 * @since 1.0
	 *
	 * @return array Options array.
	 */
	function boston_business_get_page_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'boston-business' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'boston-business' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'boston-business' ),
		);
		$output = apply_filters( 'boston_business_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'boston_business_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0
	 *
	 * @return array Options array.
	 */
	function boston_business_get_pagination_type_options() {

		$choices = array(
			'default' => esc_html__( 'Older/Newer Post', 'boston-business' ),
			'numeric' => esc_html__( 'Numeric Pagination', 'boston-business' ),
		);
		return $choices;

	}

endif;


