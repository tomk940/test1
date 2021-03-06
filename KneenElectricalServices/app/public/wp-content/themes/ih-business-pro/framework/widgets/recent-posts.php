<?php
/**
 * Custom Widgets for this theme.
 *
 * @package 
 */

class ihbp_Recent_Posts extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'ihbp_rp', // Base ID
			__('Ih Business Pro Recent Posts with Thumbnails', 'ih-business-pro'), // Name
			array( 'description' => __( 'Display your recent posts, with a Thumbnail.', 'ih-business-pro' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
	if (isset($instance['title'])) :
		$title = apply_filters( 'widget_title', $instance['title'] );
		$no_of_posts = apply_filters( 'no_of_posts', $instance['no_of_posts'] );
	else :
		$title = __('Latest Posts','ih-business-pro');
		$no_of_posts = 5;
	endif;
				
		echo $args['before_widget'];
		
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		// WP_Query arguments
		$qa = array (
			'post_type'              => 'post',
			'posts_per_page'		 => $no_of_posts,
			'offset'				 => 0,
			'ignore_sticky_posts'    => 1

		);
		
		// The Query
		$recent_articles = new WP_Query( $qa );
		if($recent_articles->have_posts()) : ?>
		<ul class="rp">
		<?php
			while($recent_articles->have_posts()) : 
			$recent_articles->the_post();
         ?>
         		 
		         <li class='rp-item'>
		         <?php if( has_post_thumbnail() ) : ?>
		         <div class='rp-thumb'><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
		         <?php 
		         else :
		         ?>
		         <div class='rp-thumb'><a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/nthumb.png"></a></div>
		         <?php
		         endif; ?>	
		         <div class='rp-title'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		         <div class='rp-date'><?php the_time(__('M j, Y','ih-business-pro')); ?></div>
		         </li>      
		      
		<?php
		      endwhile;
		   else: 
		?>
		
		      <?php _e('Oops, there are no posts.','ih-business-pro'); ?>
		
		<?php
		   endif;
		   wp_reset_postdata();
		?>
		</ul>
		<?php
		
		echo $args['after_widget'];
	}

 	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Latest Articles', 'ih-business-pro' );
		}
		if ( isset( $instance[ 'no_of_posts' ] ) ) {
			$no_of_posts = $instance[ 'no_of_posts' ];
		}
		else {
			$no_of_posts = __( '5', 'ih-business-pro' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','ih-business-pro' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		
		<label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>"><?php _e( 'No. of Posts:', 'ih-business-pro' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" type="text" value="<?php echo esc_attr( $no_of_posts ); ?>" />
		</p>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : 'ih-business-pro';
		$instance['no_of_posts'] = ( ! empty( $new_instance['no_of_posts'] ) ) ? absint( $new_instance['no_of_posts'] ) : '5';
		if ( is_numeric($new_instance['no_of_posts']) == false ) {
			$instance['no_of_posts'] = $old_instance['no_of_posts'];
			}
		return $instance;
	}
}
add_action( 'widgets_init', 'ihbp_register_widget' );  
function ihbp_register_widget() {  
    register_widget( 'ihbp_Recent_Posts' );  
}  
