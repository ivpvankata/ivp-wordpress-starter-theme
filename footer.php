	</div>
	<footer class="footer">
		<div class="hull">
			<?php if ( has_nav_menu( 'footer-menu' ) ): ?>
				<div class="footer__nav">

					<?php
						wp_nav_menu( array(
							'theme_location'  => 'footer-menu',
							'container' 	  => 'nav',
							'container_class' => 'nav-footer'
						) );
					?>
				</div><!-- /.footer__nav -->
			<?php endif ?>
		</div><!-- /.hull -->
	</footer>
</div>
</div>

<?php get_template_part('partials/browser-sync'); ?>

<?php wp_footer(); ?>

</body>
</html>
