<div id="client-testimonial" class="relative">
    <?php if ( ! empty( $instance['section_title'] ) ) : ?>
		<header class="entry-header align-center">
			<h2 class="entry-title"><?php echo esc_html( $instance['section_title'] ); ?></h2>
			<div class="title-divider">
				<div class="title-divider-before"></div>
				<div class="title-divider-after"></div>
			</div><!-- .title-divider -->
		</header>
	<?php endif; ?>

    <?php
    $post_selector_pseudo_query = $instance['posts'];
    $processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
    $all_posts = get_posts( $processed_query  );

    if ( ! empty( $all_posts ) ) : ?>

  	<?php global $post; ?>

    <div class="regular align-center" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "fade": true, "draggable": true }'>
        <?php foreach ( $all_posts as $key => $post ) : ?>
        <?php setup_postdata( $post ); ?>

        <div class="slick-item">
        	<div class="testimonial-wrapper">
        		<?php if ( 'disable' !== $instance['settings']['featured_image'] && has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>">
						<?php
						$featured_image = esc_attr( $instance['settings']['featured_image'] );
						$img_attributes = array();
						the_post_thumbnail( esc_attr( $featured_image ), $img_attributes );
						?>
					</a>
				<?php endif ?>

				<div class="testimonial-description">
					<?php if ( false === $instance['settings']['disable_excerpt'] ): ?>
						<?php $excerpt_content = get_the_excerpt( $post ); ?>
						<p><?php echo wp_kses_post( $excerpt_content ); ?></p>
					<?php endif ?>
				</div><!-- .testimonial-description -->

                <div class="position">
                	<span class="client-name">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</span><!-- .client-name -->
				</div><!-- .position -->
			</div><!-- .testimonial-wrapper -->
		</div><!-- .slick-item -->
        <?php endforeach; ?>
    </div><!-- .regular -->
</div><!-- #client-testimonial -->

	<?php wp_reset_postdata(); // Reset. ?>

<?php endif;

