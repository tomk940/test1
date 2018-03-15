<?php

class Boston_Business_Mainslider_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'boston-business-mainslider',
			__( 'Boston: Main Slider', 'boston-business' ),
			array(
				'description' => __( 'Displays Full Width Slider', 'boston-business' ),
			),
			array(),
			array(
				'posts' => array(
					'type'  => 'posts',
					'label' => __( 'Posts', 'boston-business' ),
				),
				'settings' => array(
					'type'   => 'section',
					'label'  => __( 'Settings', 'boston-business' ),
					'hide' => true,
					'fields' => array(
						'more_text' => array(
							'type'    => 'text',
							'label'   => __( 'Read More Text', 'boston-business' ),
							'default' => __( 'Read more', 'boston-business' ),
						),
		    			'disable_excerpt' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Post Excerpt', 'boston-business' ),
		    			),
		    			'disable_more_text' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Read More Text', 'boston-business' ),
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

siteorigin_widget_register( 'boston-business-mainslider', __FILE__, 'Boston_Business_Mainslider_Widget' );
