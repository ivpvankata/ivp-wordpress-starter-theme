<?php
/**
 * Cleanup WordPress to improve performance.
 */
add_action('init', 'bw_cleanup_wp');
function bw_cleanup_wp() {
    // Remove WP Emoji scripts/styles.
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // Dequeue WP Embed if not needed.
    add_action('wp_footer', function () {
        wp_deregister_script('wp-embed');
    });

    // Remove jQuery migrate on front-end.
    add_action( 'wp_default_scripts', function( $scripts ) {
        if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
            $scripts->registered['jquery']->deps = array_diff(
                $scripts->registered['jquery']->deps,
                [ 'jquery-migrate' ]
            );
        }
    } );

    // Remove RSD link
    remove_action('wp_head', 'rsd_link');
    // Remove Windows Live Writer manifest link
    remove_action('wp_head', 'wlwmanifest_link');
    // Remove WordPress version number
    remove_action('wp_head', 'wp_generator');
    // Remove shortlink
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    // Remove REST API link from HTTP header
    remove_action('template_redirect', 'rest_output_link_header', 11);
    // Remove RSS feed links
    remove_action('wp_head', 'feed_links', 2);
    // Remove extra RSS feed links
    remove_action('wp_head', 'feed_links_extra', 3);
}

/**
 * Force scripts in footer to reduce render-blocking.
 */
add_action('wp_enqueue_scripts', 'bw_force_scripts_in_footer');
function bw_force_scripts_in_footer() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
}

add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
add_filter('xmlrpc_enabled', '__return_false');