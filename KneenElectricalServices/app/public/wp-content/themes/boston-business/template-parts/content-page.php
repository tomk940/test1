<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boston Business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-container">
		<div class="entry-content">
	    <?php
		  /**
		   * Hook - boston_business_single_image.
		   *
		   * @hooked boston_business_add_image_in_single_display -  10
		   */
		  do_action( 'boston_business_single_image' );
		?>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'boston-business' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-container -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'boston-business' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

