<?php

class Boston_Business_Latest_News_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'boston-business-latest-news',
			__( 'Boston: Latest News', 'boston-business' ),
			array(
				'description' => __( 'Displays latest posts in grid', 'boston-business' ),
			),
			array(),
			array(
				'section_title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'boston-business' ),
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
		    			'post_column' => array(
					        'type'  => 'select',
					        'label' => __( 'Number of Columns', 'boston-business' ),
					        'default' => 4,
					       	'options' => array(
								'3' => 3,
								'4' => 4,
							),
					    ),
					    'featured_image' => array(
							'type'    => 'select',
							'label'   => __( 'Image Size', 'boston-business' ),
							'default' => 'medium',
							'options' =>  array( 'disable', 'thumbnail', 'medium' ),
						),
						'more_text' => array(
							'type'    => 'text',
							'label'   => __( 'Read More Text', 'boston-business' ),
							'default' => __( 'Read more', 'boston-business' ),
						),
						'disable_date' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Date in Post', 'boston-business' ),
		    			),
		    			'disable_comment' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Comment in Post', 'boston-business' ),
		    			),
		    			'disable_excerpt' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Post Excerpt', 'boston-business' ),
		    			),
		    			'disable_date' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Date in Post', 'boston-business' ),
		    			),
		    			'disable_more_text' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Read More Text', 'boston-business' ),
		    			),
	    			),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'boston-business-latest-news', __FILE__, 'Boston_Business_Latest_News_Widget' );
