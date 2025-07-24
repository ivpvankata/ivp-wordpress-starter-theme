<?php
get_header();
?>

<main id="main" class="site-main" role="main">
    <?php if (have_posts()) : ?>
        <div class="articles">
            <ol>
                <?php while (have_posts()) : the_post(); ?>
                    <li>
                        <div <?php post_class('article article--page'); ?>>
                            <header class="article__head">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="article__image">
                                        <?php the_post_thumbnail('large'); ?>
                                    </div>
                                <?php endif; ?>

                                <h1 class="article__title">
                                    <?php the_title(); ?>
                                </h1>
                            </header>

                            <div class="article__body">
                                <div class="article__entry richtext-entry">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ol>
        </div>
    <?php else : ?>
        <div class="articles">
            <ol>
                <li>
                    <div class="article article--error404 article--not-found">
                        <div class="article__body">
                            <div class="article__entry richtext-entry">
                                <p><?php _e('Sorry, no content available.', 'ivp'); ?></p>
                            </div>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    <?php endif; ?>
</main>

<?php
get_footer();
