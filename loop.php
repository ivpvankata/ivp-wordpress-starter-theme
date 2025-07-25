<?php if ( have_posts() ) : ?>
	<div class="articles">
		<ol>
			<?php while ( have_posts() ) : the_post(); ?>
				<li>
					<div  <?php post_class( 'article' ); ?>>
						<header class="article__head">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="article__image">
									<?php the_post_thumbnail( 'large' ); ?>
								</div><!-- /.article__image -->
							<?php endif; ?>

							<h2 class="article__title">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'crb' ), get_the_title() ) ); ?>">
									<?php the_title(); ?>
								</a>
							</h2><!-- /.article__title -->

							<div class="article__meta">
								<p>
									<?php the_time( 'F jS, Y ' ); printf( __( 'by %s', 'crb' ), get_the_author() ); ?> |

									<?php _e( 'Posted in ', 'crb' ); the_category( ', ' ); ?> |

									<?php
									if ( comments_open() ) {
										comments_popup_link( __( 'No Comments', 'crb' ), __( '1 Comment', 'crb' ), __( '% Comments', 'crb' ) );
									}
									?>
								</p>

								<?php the_tags( '<p>' . __( 'Tags:', 'crb' ) . ' ', ', ', '</p>' ); ?>
							</div><!-- /.article__meta -->
						</header><!-- /.article__head -->

						<div class="article__body">
							<div class="article__entry richtext-entry">
								<?php the_excerpt( __( 'Read the rest of this entry &raquo;', 'crb' ) ); ?>
							</div><!-- /.article__entry -->
						</div><!-- /.article__body -->
					</div><!-- /.article -->
				</li><!-- /.article -->
			<?php endwhile; ?>
		 </ol>
	</div><!-- /.articles -->
<?php else : ?>
	<div class="articles">
		<ol>
			<li>
				<div class="article article--error404 article--not-found">
					<div class="article__body">
						<div class="article__entry richtext-entry">
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
						</div><!-- /.article__entry -->
					</div><!-- /.article__body -->
				</div><!-- /.article -->
			</li>
		</ol>
	</div><!-- /.articles -->
<?php endif; ?>
