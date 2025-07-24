<?php

// Custom admin footer
add_filter('admin_footer_text', function () {
    echo ' Developed with ♥ by Ivan Petrov! ';
});

// Optional: Remove WP version from admin footer
add_filter('update_footer', '__return_empty_string', 11);
