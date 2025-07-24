<?php
	$fb = get_field('socials_facebook', 'option');
	$li = get_field('socials_linkedin', 'option');
	$ig = get_field('socials_instagram', 'option');
?>

<?php if ( $fb || $li || $ig ): ?>
	<nav class="nav-socials">
		<ul>
			<?php if ( $fb ): ?>
				<li>
					<a href="<?php echo esc_url($fb); ?>">
						<span class="sr-only"><?php _e('Find us on Facebook', 'bw') ?></span>

						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/src/img/icons/ico-facebook.svg" alt="" loading="lazy" decoding="async"/>
					</a>
				</li>
			<?php endif ?>

			<?php if ($li): ?>
				<li>
					<a href="<?php echo esc_url($li); ?>">
						<span class="sr-only"><?php _e('Find us on LinkedIn', 'bw') ?></span>

						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/src/img/icons/ico-linkedin.svg" alt="" loading="lazy" decoding="async"/>
					</a>
				</li>
			<?php endif ?>

			<?php if ( $ig ): ?>
				<li>
					<a href="<?php echo esc_url($ig); ?>">
						<span class="sr-only"><?php _e('Find us on Instagram', 'bw') ?></span>

						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/src/img/icons/ico-instagram.svg" alt="" loading="lazy" decoding="async"/>
					</a>
				</li>
			<?php endif ?>
		</ul>
	</nav><!-- /.nav-socials -->

<?php endif ?>
