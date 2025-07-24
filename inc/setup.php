<?php
/**
 * Theme setup function that:
 * - Enables title tag support
 * - Enables featured images/thumbnails
 * - Adds HTML5 support for various elements
 * - Enables wide/full alignment
 * - Enables responsive embeds
 * - Registers footer navigation menu
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('bw', get_template_directory() . '/languages');
    
    // Enable WordPress features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'gallery', 'caption', 'script', 'style']);
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    // Register navigation menu locations
    register_nav_menus([
        'header-menu' => __( 'Header', 'bw' ),
        'footer-menu' => __( 'Footer', 'bw' ),
    ]);
});