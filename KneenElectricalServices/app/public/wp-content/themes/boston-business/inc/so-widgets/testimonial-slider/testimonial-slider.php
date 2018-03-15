<?php

class Boston_Business_Testimonial_Slider_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'boston-business-testimonial-slider',
			__( 'Boston: Testimonial Slider', 'boston-business' ),
			array(
				'description' => __( 'Displays Client Testimonial carousel', 'boston-business' ),
			),
			array(),
			array(
				'section_title' => array(
					'type'  => 'text',
					'label' => __( 'Enter Section Title', 'boston-business' ),
				),
				'posts' => array(
					'type'  => 'posts',
					'label' => __( 'Posts', 'boston-business' ),
				),
				'settings' => array(
					'type'   => 'section',
					'label'  => __( 'Settings', 'boston-business' ),
					'hide' => true,
					'fields' => array(
						'featured_image' => array(
							'type'    => 'select',
							'label'   => __( 'Image Size', 'boston-business' ),
							'default' => 'medium',
							'options' =>  array( 'disable', 'thumbnail', 'medium' ),
						),
		    			'disable_excerpt' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Post Excerpt', 'boston-business' ),
		    			),
	    			),
				),
			)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'boston-business-testimonial-slider', __FILE__, 'Boston_Business_Testimonial_Slider_Widget' );
