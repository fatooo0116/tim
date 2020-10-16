<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bluextrade
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<link rel="icon" href="https://www.bluextrade.com/wp-content/uploads/2018/10/cropped-bluex_favicon-32x32.png" sizes="32x32" />
	<link rel="icon" href="https://www.bluextrade.com/wp-content/uploads/2018/10/cropped-bluex_favicon-192x192.png" sizes="192x192" />
	<link rel="apple-touch-icon-precomposed" href="https://www.bluextrade.com/wp-content/uploads/2018/10/cropped-bluex_favicon-180x180.png" />

	<?php // echo get_option('ddg_header_jscode'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="fix_header">
<div id="preload"></div>

	

	<header id="main_menuv2" class="site-header">
			<div class="top_inner">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :				
						?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"  title="<?php bloginfo( 'name' ); ?>"><?php if(get_option('ddg_header_logo')){ echo '<img src="'.esc_attr( get_option('ddg_header_logo') ).'" />'; } ?></a>
						</h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>" > <?php if(get_option('ddg_header_logo')){ echo '<img src="'.esc_attr( get_option('ddg_header_logo') ).'" />'; } ?></a></p>
						<?php
					endif;
					$bluextrade_description = get_bloginfo( 'description', 'display' );
					if ( $bluextrade_description || is_customize_preview() ) :
						?>						
					<?php endif; ?>
				</div><!-- .site-branding -->


				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="msep"></span>
						<span class="msep"></span>
						<span class="msep"></span>
				</button>

				<nav id="site-navigation" class="main-navigation">
					<div class="global_menu">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</div><!-- global menu-->
				</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->



	<div id="content" class="site-content">
		

	