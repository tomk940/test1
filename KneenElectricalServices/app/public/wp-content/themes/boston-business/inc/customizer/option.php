<?php
/**
 * Theme Options.
 *
 * @package Boston Business
 */

$default = boston_business_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'boston-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boston_business_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => __( 'Show Site Title', 'boston-business' ),
	'section'  => 'title_tagline',
	'type'     => 'checkbox',
	'priority' => 25,
	)
);
// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boston_business_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => __( 'Show Tagline', 'boston-business' ),
	'section'  => 'title_tagline',
	'type'     => 'checkbox',
	'priority' => 25,
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => __( 'Layout Options', 'boston-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting page_layout.
$wp_customize->add_setting( 'theme_options[page_layout]',
	array(
	'default'           => $default['page_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boston_business_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[page_layout]',
	array(
	'label'    => __( 'Post / Page Layout', 'boston-business' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => boston_business_get_page_layout_options(),
	'priority' => 100,
	)
);

// Setting page_layout.
$wp_customize->add_setting( 'theme_options[site_layout]',
	array(
	'default'           => $default['site_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boston_business_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[site_layout]',
	array(
	'label'    => __( 'Wide / Boxed Layout', 'boston-business' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => array( 
		'wide' => esc_html( 'Wide','boston-business' ),
		'boxed'=> esc_html( 'Boxed','boston-business' )
	),
	'priority' => 100,
	)
);


// Pagination Section.
$wp_customize->add_section( 'section_pagination',
	array(
	'title'      => __( 'Pagination Options', 'boston-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting( 'theme_options[pagination_type]',
	array(
	'default'           => $default['pagination_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boston_business_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[pagination_type]',
	array(
	'label'       => __( 'Blog Posts Pagination Type', 'boston-business' ),
	'section'     => 'section_pagination',
	'type'        => 'select',
	'choices'     => boston_business_get_pagination_type_options(),
	'priority'    => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_excerpt',
	array(
	'title'      => __( 'Excerpt Options', 'boston-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting Excerpt Length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
	'default'           => $default['excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boston_business_sanitize_number_range',
	)
);

$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
		'label'    => __( 'Excerpt Length', 'boston-business' ),
		'section'  => 'section_excerpt',
		'type'     => 'number',
		'choices'  => array(
			'min' => 25,
			'step'=> 5,
		),
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => __( 'Footer Options', 'boston-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boston_business_sanitize_footer_content',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Footer Copyright Text 1', 'boston-business' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);
$wp_customize->add_setting( 'theme_options[copyright_text_description]',
	array(
	'default'           => $default['copyright_text_description'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boston_business_sanitize_footer_content',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text_description]',
	array(
	'label'    => __( 'Footer Copyright Text 2', 'boston-business' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Add color setting and control.
$wp_customize->add_setting( 'theme_options[color_layout]', array(
	'default'           => $default['color_layout'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[color_layout]', array(
	'label'             => esc_html__( 'Theme Color', 'boston-business' ),
	'section'           => 'colors',
) ) );


// Add theme hover setting and control.
$wp_customize->add_setting( 'theme_options[color_hover_layout]', array(
	'default'           => $default['color_hover_layout'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[color_hover_layout]', array(
	'label'             => esc_html__( 'Theme Hover Color', 'boston-business' ),
	'section'           => 'colors',
) ) );
