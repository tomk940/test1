<?php
/**
 * Theme Customizer.
 *
 * @package Boston Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function boston_business_customize_register( $wp_customize ) {

	// Load customize helpers.
	require get_template_directory() . '/inc/layout-option.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/callback.php';

	// Load customize option.
	require get_template_directory() . '/inc/customizer/option.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

}
add_action( 'customize_register', 'boston_business_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0
 */
function boston_business_customize_preview_js() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'boston-business-customizer', get_template_directory_uri() . '/assets/js/customizer' . $min . '.js', array( 'customize-preview' ), '1.1', true );

}
add_action( 'customize_preview_init', 'boston_business_customize_preview_js' );

/**
 * Enqueue styles on customizer preview.
 */
function boston_business_customizer_styles() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	if ( is_customize_preview() ) {
		// Add custom css for customizer
		wp_enqueue_style( 'boston-business-customizer', get_template_directory_uri() . '/assets/css/customizer'. $min .'.css' );
	}
}
add_action( 'customize_controls_print_styles', 'boston_business_customizer_styles' );


/**
 * Add update to pro button
 */
function boston_business_update_button() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_register_script( 'boston-business-update-button-scripts', get_template_directory_uri() . '/assets/js/update-pro'. $min .'.js', array("jquery"), '20120206', true  );

	wp_localize_script( 'boston-business-update-button-scripts', 'updateButtonObj', array(

		'pro' => __('Update to PRO version','boston-business')

	) );

	wp_enqueue_script( 'boston-business-update-button-scripts' );
}
add_action( 'customize_controls_enqueue_scripts', 'boston_business_update_button' );

if ( ! function_exists( 'boston_business_inline_css' ) ) :
	// Add Custom Css
	function boston_business_inline_css() {
		
		$color_layout = boston_business_get_option( 'color_layout' );
		$color_hover_layout = boston_business_get_option('color_hover_layout' );
		$color_layout_css = '';
		if ( ( '#fc7f0b' == $color_layout ) && ( '#fc7f0b' == $color_hover_layout ) ) {
			$color_layout = '';
		}

		if ( ! empty( $color_layout ) ) {
			$color_layout_css = '

			/*---------------------------------------------------
			Choose Theme Color
			---------------------------------------------------*/
			.navbar-inverse .navbar-nav>li.focus>a, 
			.navbar-inverse .navbar-nav>li:hover>a, 
			.navbar-inverse .navbar-nav .current-menu-item > a,
			.dropdown-menu>li>a:focus, 
			.dropdown-menu>li>a:hover,
			.navbar-inverse .navbar-brand:hover,
			.team-content h6 a:hover, 
			.team-content h6 a:focus,
			.position span.client-name a:hover, 
			.position span.client-name a:focus,
			.post-title:hover, 
			.post-title:focus,
			#footer-widgets a:hover, 
			#footer-widgets a:focus, 
			.site-info a:hover, 
			.site-info a:focus,
			#secondary .widget a:hover, 
			#secondary .widget a:focus,
			.big-title span,
			.entry-meta a:hover, 
			.entry-meta a:focus,
			span.comments-link a:hover:before, 
			span.comments-link a:focus:before, 
			span.byline a:hover:before, 
			span.byline a:focus:before,
			body:not(.siteorigin-panels) .template-wrapper .entry-title a:hover, 
			body:not(.siteorigin-panels) .template-wrapper .entry-title a:focus,
			ul.address-block i,
			#our-features .icon-container span,
			.comment-reply-link,
			code,
			.service .read-more a:hover,
			.service .read-more a:focus,
			.latest-news-comments a:hover,
			.latest-news-comments a:focus,
			p.logged-in-as a,
			#primary ul.address-block a:hover i,
			#primary ul.address-block a:focus i,
			#primary ul.address-block a:hover,
			#primary ul.address-block a:focus,
			#secondary ul.address-block a:hover i,
			#secondary ul.address-block a:focus i,
			#secondary ul.address-block a:hover,
			#secondary ul.address-block a:focus,
			#footer-widgets ul.address-block a:hover i,
			#footer-widgets ul.address-block a:focus i {
			    color: '.esc_attr( $color_layout ).';
			}
			.btn-danger,
			.title-divider-before,
			.title-divider-after,
			.backtotop,
			.progress-bar,
			.buttons-wrapper .button:nth-child(even) a,
			.grid .portfolio-content,
			.slick-prev, 
			.slick-next,
			ul.social-icons li a:hover, 
			ul.social-icons li a:focus,
			#client-testimonial button:hover,
			a.post-edit-link,
			button, input[type="button"], 
			input[type="reset"], 
			input[type="submit"],
			.widget_opening_hours li:nth-child(even),
			nav.woocommerce-MyAccount-navigation ul li.is-active a,
			nav.woocommerce-MyAccount-navigation ul li a:hover,
			#breadcrumb-list,
			.icon-container span,
			.single .entry-content p:first-child:first-letter,
			.site-main .navigation .nav-links a,
			.slick-dots li.slick-active button:before,
			#our-team .slick-dots li.slick-active button:before,
			.site-main .navigation .nav-links .page-numbers, 
			.site-main .navigation .nav-links a,
			span.sow-icon-elegantline {
				background-color: '.esc_attr( $color_layout ).';
			}
			.dropdown-menu {
				border-top-color: '.esc_attr( $color_layout ).';
			}
			.btn-danger,
			.backtotop,
			#logo img:hover, 
			#logo a:focus img,
			button, input[type="button"], 
			input[type="reset"], 
			input[type="submit"],
			input[type="text"]:focus, 
			input[type="email"]:focus, 
			input[type="url"]:focus, 
			input[type="password"]:focus, 
			input[type="search"]:focus, 
			input[type="number"]:focus, 
			input[type="tel"]:focus, 
			input[type="range"]:focus, 
			input[type="date"]:focus, 
			input[type="month"]:focus, 
			input[type="week"]:focus, 
			input[type="time"]:focus, 
			input[type="datetime"]:focus, 
			input[type="datetime-local"]:focus, 
			input[type="color"]:focus, 
			textarea:focus,
			.site-main .navigation .nav-links a,
			.site-main .navigation .nav-links .page-numbers, 
			.site-main .navigation .nav-links a {
				border-color: '.esc_attr( $color_layout ).';
			}
			/*--------------- END COLORS ----------------------*/


			/*---------------------------------------------------
			Choose Theme Hover Color
			---------------------------------------------------*/
			a:hover, 
			a:focus, 
			a:active,
			p.logged-in-as a:hover,
			p.logged-in-as a:focus {
				color: '.esc_attr( $color_hover_layout ).';
			}

			.btn-danger:hover, 
			.btn-danger:focus, 
			.btn-danger:active:hover, 
			.btn-danger:active:focus,
			.buttons-wrapper .button:nth-child(even) a:hover, 
			.buttons-wrapper .button:nth-child(even) a:focus,
			.btn-black:hover, 
			.btn-black:focus,
			.slick-prev:hover, 
			.slick-next:hover,
			.slick-prev:focus,
			.slick-next:focus,
			a.post-edit-link:hover,
			a.post-edit-link:focus,
			.backtotop:hover,
			.backtotop:focus,
			input[type="submit"]:hover, 
			input[type="submit"]:focus, 
			.site-main .navigation .nav-links a:hover, 
			.site-main .navigation .nav-links a:focus {
				background-color: '.esc_attr( $color_hover_layout ).';
			}
			.btn-danger:hover, 
			.btn-danger:focus, 
			.btn-danger:active:hover, 
			.btn-danger:active:focus,
			input[type="submit"]:hover, 
			input[type="submit"]:focus, 
			.site-main .navigation .nav-links a:hover, 
			.site-main .navigation .nav-links a:focus,
			.backtotop:hover {
				border-color: '.esc_attr( $color_hover_layout ).';
			}';
		}

		$css = $color_layout_css;	
		wp_add_inline_style( 'boston-business-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'boston_business_inline_css', 10 );