<div class="article__body">
	<div class="article__entry hull">
		<div class="article__entry-head hull hull--xs">
			<p class="article__date h5 green-sm-title"><?php echo get_the_date(); ?></p><!-- /.h6 green-sm-title -->

			<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			    yoast_breadcrumb( '<div class="article__breadcrumbs yoast-breadcrumbs" id="breadcrumbs">', '</div>' );
			} ?>

			<?php
				$video = get_field('blog_post_video');
			?>

			<?php if ( $video ): ?>
				<div class="article__video article-video js-article-video">
					<button class="article-video__play js-article-video-play">
						<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><circle cx="30" cy="30" r="30" fill="#00e2b3"/><path d="M12,0,24,18H0Z" transform="translate(42 18) rotate(90)" fill="#0b1b30"/></svg>
					</button><!-- /.article__video-play -->

					<video muted loop playsinline preload="metadata">
						<source src="<?php echo $video ?>" type="video/mp4">
					  	Your browser does not support the video tag.
					</video>
				</div><!-- /.article-video -->
			<?php endif ?>
		</div><!-- /.article__entry-head -->

		<div class="article__entry-inner richtext-entry">
			<div class="hull hull--xs">
				<?php the_content(); ?>
			</div><!-- /.hull hull-/-sm -->
		</div><!-- /.article__entry-inner richtext-entry -->
	</div><!-- /.article__entry -->
</div><!-- /.article__body -->
