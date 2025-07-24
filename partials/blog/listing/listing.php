<section class="section-articles-sm">
	<div class="hull">
		<header class="section__head">
			<p class="section__subtitle green-sm-title h5"><?php _e('Blog', 'bw') ?></p>
		</header><!-- /.section__head -->

		<div class="section__body">
			<?php if ( have_posts() ) : ?>
				<ul class="articles-sm">
					<?php while ( have_posts() ) : the_post(); ?>
						<li>
							<?php get_template_part('partials/blog/listing/article-sm'); ?>
						</li><!-- /.article -->
					<?php endwhile; ?>
				</ul><!-- /.articles-sm -->

				<div class="archive-pagination">
					<?php $args = array(
						'format'    => 'page/%#%/',
						'prev_next' => true,
					);
					the_posts_pagination($args); ?>
				</div>
			<?php else : ?>
				<div class="section__body-content">
					<p>
						<?php
						if ( is_category() ) { // If this is a category archive
							printf( __( "Sorry, but there aren't any posts in the %s category yet.", 'crb' ), single_cat_title( '', false ) );
						} else if ( is_date() ) { // If this is a date archive
							_e( "Sorry, but there aren't any posts with this date.", 'crb' );
						} else if ( is_author() ) { // If this is a category archive
							$userdata = get_user_by( 'id', get_queried_object_id() );
							printf( __( "Sorry, but there aren't any posts by %s yet.", 'crb' ), $userdata->display_name );
						} else if ( is_search() ) { // If this is a search
							_e( 'No posts found. Try a different search?', 'crb' );
						} else {
							_e( 'No posts found.', 'crb' );
						}
						?>
					</p>

					<?php get_search_form(); ?>
				</div><!-- /.section__body-content -->
			<?php endif; ?>
		</div><!-- /.section__body -->
	</div><!-- /.hull -->
</section><!-- /.section-slider-posts-sm -->
