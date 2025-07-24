<?php
// Remove WordPress emoji functionality to reduce unnecessary scripts and styles
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
});

// Disable WordPress big image size threshold to prevent automatic scaling of large images
add_filter('big_image_size_threshold', '__return_false');

// Remove unnecessary intermediate image sizes to save disk space
add_filter('intermediate_image_sizes_advanced', function ($sizes) {
    unset($sizes['large'], $sizes['medium'], $sizes['medium_large']);
    return $sizes;
});

// Deregister WordPress oEmbed script to reduce page load time
add_action('wp_footer', function () {
    wp_deregister_script('wp-embed');
}, 100);