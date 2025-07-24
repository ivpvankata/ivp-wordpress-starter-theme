<?php
define('IVP_THEME_DIR', __DIR__ . DIRECTORY_SEPARATOR);
define('IVP_INC_DIR', IVP_THEME_DIR . 'inc/');
define('IVP_CONFIGURE_DIR', IVP_THEME_DIR . 'configure/');

// Core theme setup
require_once IVP_INC_DIR . 'setup.php';
require_once IVP_INC_DIR . 'performance.php';
require_once IVP_INC_DIR . 'cleanup.php';
// require_once IVP_INC_DIR . 'gutenberg.php';
require_once IVP_INC_DIR . 'admin.php';
require_once IVP_INC_DIR . 'security.php';

// Custom project-specific
require_once IVP_CONFIGURE_DIR . 'post-types.php';
require_once IVP_CONFIGURE_DIR . 'cpt-taxonomy.php';
require_once IVP_CONFIGURE_DIR . 'acf.php';
require_once IVP_CONFIGURE_DIR . 'shortcodes.php';
require_once IVP_CONFIGURE_DIR . 'helpers/change-admin-login-logo.php';
require_once IVP_CONFIGURE_DIR . 'helpers/title.php';
require_once IVP_CONFIGURE_DIR . 'helpers/wrap-text.php';
require_once IVP_CONFIGURE_DIR . 'add-file-types.php';
require_once IVP_CONFIGURE_DIR . 'theme-assets.php';


// Admin-only
// if (is_admin()) {
//     require_once IVP_CONFIGURE_DIR . 'admin.php';
// }