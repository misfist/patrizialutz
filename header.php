<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Patrizia_Lutz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'patrizialutz' ); ?></a>

	<header id="masthead" class="site-header">

			<div class="site-branding jumbotron" style="background-image:url( '<?php echo get_random_header_image(); ?>' );">

				<div class="container">

					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

					<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description lead"><?php echo $description; /* WPCS: xss ok. */ ?></p>

						<?php patrizialutz_custom_menu();?>

					<?php
					endif; ?>

				</div><!-- .container -->

				<div class="overlay"></div>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation js-sticky-nav">

				<div class="container">

					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'depth'					 => 1,
							'fallback'			 => false,
						) );
					?>

				</div><!-- .container -->

			</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
