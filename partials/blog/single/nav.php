<?php

$prev_post = get_previous_post();
$next_post = get_next_post();

?>

<?php if ( $prev_post || $next_post ): ?>
	<div class="article__nav">
		<div class="hull hull--xs">
			<div class="article__nav-inner">

				<?php if ( $prev_post ):
					$prev_thumbnail = get_post_thumbnail_id( $prev_post->ID ) ? wp_get_attachment_image( get_post_thumbnail_id( $prev_post->ID ), 'large' ) : '';
					$prev_title = get_the_title( $prev_post->ID );
					$prev_excerpt = get_the_excerpt( $prev_post->ID );
					$prev_url = get_permalink( $prev_post->ID );
				?>
					<div class="article__nav-btn article__nav-btn--prev">
						<div class="article__nav-btn-inner">
							<p class="article__nav-btn__subtitle"><a href="<?php echo $prev_url; ?>"><?php _e('Previous', 'bw') ?> <span><?php _e('Аrticle', 'bw') ?></span></a></p>

								<article class="article-sm">
									<div class="article__inner">
										<picture class="article__image">
											<a href="<?php echo $prev_url; ?>">
												<span class="sr-only">
													<?php echo $prev_title; ?>
													<?php _e(' - read More', 'bw' ); ?>
												</span>

												<?php if ( $prev_thumbnail ): ?>
													<?php echo $prev_thumbnail; ?>
												<?php else: ?>
													<span class="icon">
														<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/src/img/icons/ico-image-white.svg" title="No image available"/>
													</span>
												<?php endif; ?>
											</a>
										</picture><!-- /.article__image -->

										<div class="article__body">
											<p class="article__title h4">
												<a href="<?php echo $prev_url; ?>">
													<?php echo $prev_title; ?>
												</a>
											</p><!-- /.article__title -->

											<p class="article__more">
												<a href="<?php echo $prev_url; ?>">
													<?php _e('Read More', 'bw') ?>
												</a>
											</p>
										</div><!-- /.article__body -->
									</div><!-- /.article__inner -->
								</article>
						</div><!-- /.article__nav-btn-inner -->
					</div><!-- /.article__nav-btn--prev -->
				<?php endif; ?>

				<?php if ( $next_post ):
					$next_thumbnail = get_post_thumbnail_id( $next_post->ID ) ? wp_get_attachment_image( get_post_thumbnail_id( $next_post->ID ), 'large' ) : '';
					$next_title = get_the_title( $next_post->ID );
					$next_excerpt = get_the_excerpt( $next_post->ID );
					$next_url = get_permalink( $next_post->ID );
				?>
					<div class="article__nav-btn article__nav-btn--next">
						<div class="article__nav-btn-inner">
							<p class="article__nav-btn__subtitle"><a href="<?php echo $next_url; ?>"><?php _e('Next', 'bw') ?> <span><?php _e('Аrticle', 'bw') ?></span></a></p>

								<article class="article-sm">
									<div class="article__inner">
										<picture class="article__image">
											<a href="<?php echo $next_url; ?>">
												<span class="sr-only">
													<?php echo $next_title; ?>
													<?php _e(' - read More', 'bw' ); ?>
												</span>

												<?php if ( $next_thumbnail ): ?>
													<?php echo $next_thumbnail; ?>
												<?php else: ?>
													<span class="icon">
														<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/src/img/icons/ico-image-white.svg" title="No image available"/>
													</span>
												<?php endif; ?>
											</a>
										</picture><!-- /.article__image -->

										<div class="article__body">
											<p class="article__title h4">
												<a href="<?php echo $next_url; ?>">
													<?php echo $next_title; ?>
												</a>
											</p><!-- /.article__title -->

											<p class="article__more">
												<a href="<?php echo $prev_url; ?>">
													<?php _e('Read More', 'bw') ?>
												</a>
											</p>
										</div><!-- /.article__body -->
									</div><!-- /.article__inner -->
								</article>
						</div><!-- /.article__nav-btn-inner -->
					</div><!-- /.article__nav-btn--next -->
				<?php endif; ?>

			</div><!-- /.article__nav-inner -->
		</div><!-- /.hull -->
	</div><!-- /.article__foot -->
<?php endif; ?>
