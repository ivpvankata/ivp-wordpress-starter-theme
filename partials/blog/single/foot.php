<?php
	$tags = get_the_tags();
?>

<div class="article__foot">
	<div class="hull hull--xs">
		<div class="article__foot-inner">
			<?php if ( $tags ): ?>
				<div class="article__foot-content">
					<strong><?php _e('Tags:', 'bw') ?></strong>

					<ul class="article__foot-tags">
						<?php foreach ($tags as $tag): ?>
							<li>
								<a href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name ?><span>,</span></a>
							</li>
						<?php endforeach ?>
					</ul>
				</div><!-- /.article__foot-content -->
			<?php endif ?>

			<div class="article__foot-content">
				<strong><?php _e('Follow Us:', 'bw') ?></strong>

				<?php get_template_part('partials/navs/nav-socials'); ?>
			</div><!-- /.article__foot-content -->
		</div><!-- /.article__foot-/-inner -->
	</div><!-- /.hull -->
</div><!-- /.article__foot -->
