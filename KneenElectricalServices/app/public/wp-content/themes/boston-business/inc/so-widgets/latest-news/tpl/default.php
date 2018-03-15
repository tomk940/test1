<div id="latest-post" class="relative">
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

        <div class="entry-content">
            <div class="row">
            <?php foreach ( $all_posts as $key => $post ) : ?>
            <?php setup_postdata( $post ); ?>
            <div class="col-lg-<?php echo esc_attr( $instance['settings']['post_column'] ); ?> col-md-<?php echo esc_attr( $instance['settings']['post_column'] ); ?> col-sm-<?php echo esc_attr( $instance['settings']['post_column'] ); ?> col-xs-12">
      		    <div class="post-wrapper">
    				<?php if ( 'disable' !== $instance['settings']['featured_image'] && has_post_thumbnail() ) : ?>
    					<div class="featured-image">
    						<a href="<?php the_permalink(); ?>">
    							<?php
    							$featured_image = esc_attr( $instance['settings']['featured_image'] );
    							$img_attributes = array( 'class' => 'aligncenter' );
    							the_post_thumbnail( esc_attr( $featured_image ), $img_attributes );
    							?>
    						</a>
    					</div><!-- .featured-image -->
      				<?php endif ?>

      					<div class="featured-content">
                            <?php if ( false === $instance['settings']['disable_date'] || ( false === $instance['settings']['disable_comment'] && comments_open( get_the_ID() ) ) ): ?>
                                <div class="latest-news-meta">
                                    <?php if ( false === $instance['settings']['disable_date'] ): ?>
                                        <span class="latest-news-date"><?php the_time( get_option('date_format') ); ?></span><!-- .latest-news-date -->
                                    <?php endif ?>

                                    <?php if ( false === $instance['settings']['disable_comment'] ): ?>
                                        <?php
                                        if ( comments_open( get_the_ID() ) ) {
                                            echo '<span class="latest-news-comments">';
                                            comments_popup_link( '<span class="leave-reply">' . __( 'No Comment', 'boston-business' ) . '</span>', __( '1 Comment', 'boston-business' ), __( '% Comments', 'boston-business' ) );
                                            echo '</span>';
                                        }
                                        ?>
                                    <?php endif; ?>
                                </div><!-- .latest-news-meta -->
                            <?php endif; ?>
                            
    						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-title"><?php the_title(); ?></a>

      						<?php if ( false === $instance['settings']['disable_excerpt'] ): ?>
      							<?php $excerpt_content = get_the_excerpt( $post ); ?>
      							<p class="detail"><?php echo wp_kses_post( $excerpt_content ); ?></p>
      						<?php endif ?>
      						<?php if ( false === $instance['settings']['disable_more_text'] ): ?>
      							<div class="read-more"><a href="<?php the_permalink(); ?>" class="btn btn-sm btn-danger"><?php echo esc_html( $instance['settings']['more_text'] ); ?></a></div><!-- .latest-news-read-more -->
      						<?php endif ?>
                            </div><!-- .featured-content -->
      					</div><!-- .post-wrapper -->
                    </div><!-- .col-lg -->
                <?php endforeach; ?>
            </div><!-- .row -->
        </div><!-- .entry-content -->
</div><!-- #latest-post -->

  	<?php wp_reset_postdata(); // Reset. ?>

<?php endif;

