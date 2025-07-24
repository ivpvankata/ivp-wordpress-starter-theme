<?php
/**
 * Change the login header logo href attribute to open the homepage
 * instead of the default https://wordpress.org/.
 *
 * @link https://developer.wordpress.org/reference/hooks/login_headerurl/
 *
 * @param  string $login_header_url Login header logo URL.
 * @return string Homepage URL.
 */
function ivp_change_login_header_url( $login_header_url ) {
	return home_url( '/' );
}
add_filter( 'login_headerurl', 'ivp_change_login_header_url' );

/**
 * Change the login header logo title attribute to display the Site Title
 * instead of the default "Powered by WordPress".
 *
 * @link https://developer.wordpress.org/reference/hooks/login_headertext/
 *
 * @param  string $login_header_title Login header logo URL.
 * @return string Site Title.
 */
function ivp_change_login_header_title( $login_header_title ) {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'ivp_change_login_header_title' );

add_action( 'login_enqueue_scripts', 'ivp_login_enqueue_scripts' );

function ivp_login_enqueue_scripts() {
	$directory = get_stylesheet_directory_uri() . '/site-logo.svg';
	?>
	<style type="text/css">
		.login h1 a { 
            background-image: url(<?php echo esc_url($directory); ?>) !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: 90% !important;
            background-color: #000048 !important;
			width: 320px !important; 
			height: 140px !important; 
			border-radius: 16px !important;
			margin: 0 0 10px;
		}
		body,
		.login form,
		.login form .input,
		.login .message { background: #fff !important; }

		.login form .input,
		.login .message,
		.login label,
		.login .forgetmenot label { color: #000; }

		body,
		.login form {
			border-radius: 16px !important;
			overflow: hidden;
		}
	</style>
	<?php
}
