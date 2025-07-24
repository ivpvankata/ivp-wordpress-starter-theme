<header class="article__head hero">
	<?php
		$id = $post->ID;
		$image = wp_get_attachment_url( get_post_thumbnail_id(), 'large' );
		$image_mobile = get_field('blog_post_mobile_image');
		$has_images = '';
		$back_url = get_home_url();

		if ( $image_mobile && $image ) {
			$has_images = ' has-images';
		}
	?>
	<div class="article__media hero__media">
		<picture class="article__image hero__image<?php echo $has_images ?>">
			<?php if ( $image ): ?>
				<img src="<?php echo $image ?>" alt="" loading="lazy" decoding="async"/>
			<?php endif ?>

			<?php if ( $image_mobile ): ?>
				<?php echo wp_get_attachment_image( $image_mobile, 'large', '', ); ?>
			<?php endif ?>
		</picture><!-- /.article__image -->

		<p class="article__title-mobile hero__title-mobile h1">
			<a href="javascript:window.history.back();" class="back-btn">
				<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 105 105" style="enable-background:new 0 0 512 512" xml:space="preserve" fill-rule="evenodd" class=""><g transform="matrix(1.04,0,0,1.04,-2.083344535827642,-2.083347625732415)"><path fill-rule="nonzero" d="M97.914 47.917H16.306l26.221-26.221a4.162 4.162 0 0 0 0-5.891 4.163 4.163 0 0 0-5.892 0L3.302 49.134c-.384.387-.688.85-.9 1.358a4.171 4.171 0 0 0 0 3.184c.212.508.516.97.9 1.358l33.333 33.329a4.152 4.152 0 0 0 2.946 1.221 4.156 4.156 0 0 0 2.946-1.221 4.163 4.163 0 0 0 0-5.892l-26.221-26.22h81.608c2.3 0 4.167-1.867 4.167-4.167s-1.867-4.167-4.167-4.167z" fill="#fff" opacity="1" data-original="#fff" class=""></path></g></svg>

				<span><?php _e('Back', 'bw') ?></span>
			</a>

			<?php the_title(); ?>
		</p>
	</div><!-- /.article__media -->

	<div class="article__head-inner hero__inner">
		<div class="hull">
			<div class="article__head-content hero__content">

				<a href="javascript:window.history.back();" class="back-btn">
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 105 105" style="enable-background:new 0 0 512 512" xml:space="preserve" fill-rule="evenodd" class=""><g transform="matrix(1.04,0,0,1.04,-2.083344535827642,-2.083347625732415)"><path fill-rule="nonzero" d="M97.914 47.917H16.306l26.221-26.221a4.162 4.162 0 0 0 0-5.891 4.163 4.163 0 0 0-5.892 0L3.302 49.134c-.384.387-.688.85-.9 1.358a4.171 4.171 0 0 0 0 3.184c.212.508.516.97.9 1.358l33.333 33.329a4.152 4.152 0 0 0 2.946 1.221 4.156 4.156 0 0 0 2.946-1.221 4.163 4.163 0 0 0 0-5.892l-26.221-26.22h81.608c2.3 0 4.167-1.867 4.167-4.167s-1.867-4.167-4.167-4.167z" fill="#fff" opacity="1" data-original="#fff" class=""></path></g></svg>

					<span><?php _e('Back', 'bw') ?></span>
				</a>

				<h1><?php the_title(); ?></h1>

				<?php if ( has_excerpt() ): ?>
					<div class="article__head-entry richtext-entry hero__entry">
						<?php echo wp_kses_post(get_the_excerpt()); ?>
					</div><!-- /.article__head-entry richtext-entry hero__entry -->
				<?php endif ?>
			</div><!-- /.article__head-content -->
		</div><!-- /.hull -->
	</div><!-- /.article__head-inner -->
</header><!-- /.article__head -->
