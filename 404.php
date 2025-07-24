<?php get_header(); ?>


<div class="hero">
	<div class="hero__inner">
		<div class="hull">
			<div class="hero__content">
				<h1>404</h1>

				<div class="hero__entry richtext-entry">
					<?php _e('This page does not exist. You can return to the home page from here:', 'bw') ?>
				</div><!-- /.hero__entry -->


				<a href="<?php echo home_url('/'); ?>" class="btn btn--md btn--base btn--trp-hover"><?php _e('Home'); ?></a>

			</div><!-- /.hero__content -->
		</div><!-- /.hull -->
	</div><!-- /.hero__inner -->
</div><!-- /.hero -->


<?php
get_footer();
