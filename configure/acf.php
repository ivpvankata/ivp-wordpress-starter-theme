<?php

// add_filter('acf/settings/save_json', function () {
//     return get_stylesheet_directory() . '/acf-json';
// });
// add_filter('acf/settings/load_json', function ($paths) {
//     $paths[] = get_stylesheet_directory() . '/acf-json';
//     return $paths;
// });


// Theme Options
if( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' 	=> 'Theme options ',
		'menu_title'	=> 'Theme options ',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	) );
}
