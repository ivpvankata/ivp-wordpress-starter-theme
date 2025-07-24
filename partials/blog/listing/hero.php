<?php
	$content = get_field('blog_listing_entry', 'option');
	$image_id = get_field('blog_listing_image', 'option');

	if ( $image_id ) {
		$image = wp_get_attachment_image_src( $image_id, 'large', '')[0];
	}
?>

<div class="hero">
	<?php if ( $image ): ?>
		<div class="hero__media">
			<picture class="hero__image">
				<?php echo wp_get_attachment_image( $image_id, 'large' ); ?>
			</picture><!-- /.hero__image -->

			<p class="hero__title-mobile h1"><?php ivp_the_title(); ?></p>
		</div><!-- /.hero__media -->
	<?php endif ?>

	<div class="hero__inner">
		<div class="hull">
			<div class="hero__content">
				<h1><?php ivp_the_title(); ?></h1>

				<?php if ( $content ): ?>
					<div class="hero__entry richtext-entry">
						<?php echo wp_kses_post($content); ?>
					</div><!-- /.hero__entry -->
				<?php endif ?>
			</div><!-- /.hero__content -->
		</div><!-- /.hull -->
	</div><!-- /.hero__inner -->
</div><!-- /.hero -->

