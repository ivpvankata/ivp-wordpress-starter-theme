<?php

// Hide login errors
add_filter('login_errors', '__return_empty_string');

// Disable file editor in admin
define('DISALLOW_FILE_EDIT', true);
