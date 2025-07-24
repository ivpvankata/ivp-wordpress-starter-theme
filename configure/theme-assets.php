<?php

/**
 * Enqueues theme CSS and JS files
 * Checks if files exist before enqueueing
 * CSS file: /assets/dist/main.css
 * JS file: /assets/dist/main.js with jQuery dependency
 */
add_action('wp_enqueue_scripts', function () {
    $style_path = get_stylesheet_directory() . '/assets/dist/main.css';
    $script_path = get_stylesheet_directory() . '/assets/dist/main.js';

    if (file_exists($style_path)) {
        wp_enqueue_style('theme-styles', get_stylesheet_directory_uri() . '/assets/dist/main.css', [], filemtime($style_path));
    }

    if (file_exists($script_path)) {
        wp_enqueue_script('theme-scripts', get_stylesheet_directory_uri() . '/assets/dist/main.js', ['jquery'], filemtime($script_path), true);
    }
}, 100);


/**
 * Adds defer and module attribute to theme JS file
 * Only affects script with handle 'theme-scripts'
 */

add_filter('script_loader_tag', function ($tag, $handle, $src) {
    if ($handle === 'theme-scripts') {
        $tag = str_replace('<script ', '<script type="module" defer ', $tag);
    }
    return $tag;
}, 10, 3);