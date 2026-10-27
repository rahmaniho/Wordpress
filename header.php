<?php
/**
 * header.cpp — هدر سایت قالب کارن سافت.
 */
?><!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'ks-site' ); ?>>
	<?php wp_body_open(); ?>

	<header class="site-header" id="masthead">
		<div class="container">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<a class="site-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						<span class="site-title"><?php bloginfo( 'name' ); ?></span>
					</a>
					<?php
				}
				?>
			</div>

			<button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu" aria-label="<?php esc_attr_e( 'بازکردن منو', 'karen-soft' ); ?>">
				<span class="visually-hidden"><?php esc_html_e( 'منو', 'karen-soft' ); ?></span>
				&#9776;
			</button>

			<nav class="primary-navigation" id="site-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
					'items_wrap'     => '<ul class="primary-navigation__list" id="primary-menu">%3$s</ul>',
				) );
				?>
			</nav>
		</div>
	</header>

	<main id="site-content">
