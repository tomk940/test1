<?php
/**
 * Core functions.
 *
 * @package Boston Business
 */

/**
 * Get theme option.
 *
 * @since 1.0
 *
 * @param string $key Option key.
 * @return mixed Option value.
 */
function boston_business_get_option( $key = '' ) {

	global $boston_business_default_options;
	if ( empty( $key ) ) {
		return;
	}

	$default = ( isset( $boston_business_default_options[ $key ] ) ) ? $boston_business_default_options[ $key ] : '';
	$theme_options = get_theme_mod( 'theme_options', $boston_business_default_options );
	$theme_options = array_merge( $boston_business_default_options, $theme_options );
	$value = '';
	if ( isset( $theme_options[ $key ] ) ) {
		$value = $theme_options[ $key ];
	}
	return $value;

}

/**
 * Get all theme options.
 *
 * @since 1.0
 *
 * @return array Theme options.
 */
function boston_business_get_options() {

	$value = array();
	$value = get_theme_mod( 'theme_options' );
	return $value;

}
