<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<!-- Favicon and app icons with optimal sizes -->
<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

<!-- Security headers -->
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">

<?php wp_head(); ?>

<?php
	// $logo = get_field('logo', 'option');

	$classes = [];
	if ( is_front_page() ) {
		$classes[] = 'ivp_home';
	}
?>
</head>

<body <?php body_class( $classes ); ?>>
	<div class="wrapper">
		<div class="wrapper__inner">
			<header class="header">
				<div class="hull">
					<div class="header__inner">
						<div class="header__logo">
							<a href="<?php echo home_url('/'); ?>">
								<!-- <?php if ( $logo ): ?>
									<?php echo wp_get_attachment_image( $logo, 'full', '', ["class" => ""] ); ?>
								<?php endif ?> -->
							</a>
						</div><!-- /.header__logo -->

						<div class="header__nav">
							<?php if ( has_nav_menu( 'header-menu' ) ): ?>
								<?php
									wp_nav_menu( array(
										'theme_location'  => 'header-menu',
										'container' 	  => 'nav',
										'container_class' => 'nav'
									) );
								?>
							<?php endif ?>
						</div><!-- /.header__nav -->


						<button class="nav-trigger js-nav-trigger">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div><!-- /.header__inner -->
				</div><!-- /.hull -->
			</header><!-- /.header -->

		<div class="main">
