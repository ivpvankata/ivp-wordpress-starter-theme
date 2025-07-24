<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class( 'article-single' ); ?>>
		<header class="article__head">
			<?php get_template_part( 'fragments/post-meta' ); ?>
		</header><!-- /.article__head -->

		<div class="article__body">
			<div class="article__entry richtext-entry">
				<?php the_content(); ?>
			</div><!-- /.article__entry -->
		</div><!-- /.article__body -->
	</article><!-- /.article -->

	<?php comments_template(); ?>
<?php endwhile; ?>
