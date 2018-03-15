<?php

class Boston_Business_Address_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'boston-business-address',
			__( 'Boston: Contact Address', 'boston-business' ),
			array(
				'description' => __( 'Displays Contact Address', 'boston-business' ),
				),
			array(),
			array(
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Enter Widget Title', 'boston-business' ),
				),
				'location' => array(
					'type'  => 'text',
					'label' => __( 'Enter Location', 'boston-business' ),
				),
				'phone' => array(
					'type'  => 'text',
					'label' => __( 'Enter Phone Number', 'boston-business' ),
				),
				'email' => array(
					'type'  => 'text',
					'label' => __( 'Enter Email', 'boston-business' ),
				),
			)
		);

	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'boston-business-address', __FILE__, 'Boston_Business_Address_Widget' );
