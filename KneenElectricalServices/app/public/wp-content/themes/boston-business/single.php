<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Boston Business
 */

get_header(); ?>
	<div class="template-wrapper page-section">
		<div class="container">
			<div class="row">
				<div id="primary" class="content-area col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<main id="main" class="site-main" role="main">
						<div class="blog-posts">
							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'template-parts/content', 'single' ); ?>

								<?php the_post_navigation(); ?>

								<?php
									// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
									endif;
								?>

							<?php endwhile; // End of the loop. ?>
						</div><!-- .blog-posts -->
					</main><!-- #main -->
				</div><!-- #primary -->

				<?php
					/**
					 * Hook - boston_business_action_sidebar.
					 *
					 * @hooked: boston_business_add_sidebar - 10
					 */
					do_action( 'boston_business_action_sidebar' );
				?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .template-wrapper -->
<?php get_footer(); ?>
