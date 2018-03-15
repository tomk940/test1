<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Boston Business
 */

get_header(); ?>

<div class="template-wrapper page-section">
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );
						?>

					<?php endwhile; ?>

					<?php
					/**
					 * Hook - boston_business_action_posts_navigation.
					 *
					 * @hooked: boston_business_custom_posts_navigation - 10
					 */
					do_action( 'boston_business_action_posts_navigation' ); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

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
