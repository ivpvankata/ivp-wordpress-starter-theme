<?php

// Disable Gutenberg editor
add_filter('use_block_editor_for_post_type', '__return_false', 100);
add_filter('use_block_editor_for_post', '__return_false', 100);

// Disable Gutenberg CSS
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
}, 100);
