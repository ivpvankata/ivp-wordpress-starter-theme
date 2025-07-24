<?php
	$title = get_the_title();
	$date = get_the_date();
	$content = get_the_content();
	$excerpt = get_the_excerpt();

	$author_id = get_the_author_meta('ID');
	$author_name = get_the_author_meta('display_name', $author_id);
	$author_bio = get_the_author_meta('description', $author_id);

	$thumbnail = get_post_thumbnail_id(get_the_ID(), 'large');

	$no_thumbnail_class = '';

	if (!$thumbnail) {
		$content = apply_filters('the_content', get_the_content());
		$first_image = preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
		if ($first_image) {
			$thumbnail = $matches[1];
		} else {
			$no_thumbnail_class = ' article-slider-sm--no-image';
		}
	}
?>

<article class="article-sm <?php echo $no_thumbnail_class ?>">
	<div class="article__inner">
		<picture class="article__image">
			<a href="<?php the_permalink(); ?>">
				<span class="sr-only">
					<?php echo $title ?>
					<?php _e(' - read More', 'bw' ); ?>
				</span>

				<?php if ( $thumbnail ): ?>
					<?php echo wp_get_attachment_image( $thumbnail, 'medium', '', ["class" => ""] ); ?>
				<?php else: ?>
					<span class="icon">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/src/img/icons/ico-image-white.svg" title="No image available"/>
					</span>
				<?php endif ?>
			</a>
		</picture><!-- /.article__image -->

		<div class="article__body">
			<p class="article__category h6 green-sm-title"><?php the_category(', '); ?></p><!-- /.article-category -->

			<p class="article__title h4">
				<a href="<?php the_permalink(); ?>">
					<?php echo $title ?>
				</a>
			</p><!-- /.h2 -->

			<?php if ( $excerpt ): ?>
				<div class="article__entry">
					<?php
						$text_excerpt = strip_tags($excerpt);
						echo strlen($text_excerpt) > 62 ? substr($text_excerpt, 0, 62) . '...' : $text_excerpt;
					?>
				</div><!-- /.article__entry -->
			<?php elseif ( $content ): ?>
				<div class="article__entry">
					<?php
						$text_content = strip_tags($content);
						echo strlen($text_content) > 62 ? substr($text_content, 0, 62) . '...' : $text_content;
					?>
				</div><!-- /.article__entry -->
			<?php else: ?>
				<div class="article__entry">
					<p><?php _e('No content available at this time.', 'bw'); ?></p>
				</div><!-- /.article__entry -->
			<?php endif ?>

			<p class="article__date"><?php echo $date ?></p><!-- /.article__date -->
		</div><!-- /.article__body -->
	</div><!-- /.article__inner -->
</article>
