<div id="main-slider">
    <?php
    $post_selector_pseudo_query = $instance['posts'];
    $processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
    $all_posts = get_posts( $processed_query  );

    if ( ! empty( $all_posts ) ) : ?>

  	<?php global $post; ?>

    <div class="regular align-center" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":true, "autoplay": true, "fade": false, "draggable": true }'>
        <?php foreach ( $all_posts as $key => $post ) : ?>
        <?php setup_postdata( $post ); ?>

        <div class="slick-item" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( $post_id ) ); ?>);">
			<div class="black-overlay"></div>
  		    <div class="container">
				<div class="main-slider-content">
	                <header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
	                    <div class="title-divider">
	                        <div class="title-divider-before"></div>
	                        <div class="title-divider-after"></div>
	                    </div><!-- .title-divider -->
	                </header>
                
					<?php if ( false === $instance['settings']['disable_excerpt'] ): ?>
						<?php $excerpt_content = get_the_excerpt( $post ); ?>
						<div class="entry-summary">
							<p><?php echo wp_kses_post( $excerpt_content ); ?></p>
						</div><!-- .entry-summary -->
					<?php endif ?>

					<?php if ( false === $instance['settings']['disable_more_text'] ): ?>
						<div class="view-more">
							<a href="<?php the_permalink(); ?>" class="btn btn-sm btn-danger"><?php echo esc_html( $instance['settings']['more_text'] ); ?></a>
						</div><!-- .view-more -->
					<?php endif ?>
				</div><!-- .main-slider-content -->
			</div><!-- .container -->
		</div><!-- .slick-item -->
        <?php endforeach; ?>
    </div><!-- .regular -->
</div><!-- #main-slider -->

	<?php wp_reset_postdata(); // Reset. ?>

<?php endif;

