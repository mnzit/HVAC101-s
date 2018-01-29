<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HVAC101
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<?php	if ( is_active_sidebar( 'top-bar-left' ) ):  ?>
						<div class="col-8 top-bar-left">
						<?php dynamic_sidebar( 'top-bar-left' ); ?>
						</div>
					<?php endif;?>

					<?php	if ( is_active_sidebar( 'top-bar-right' ) ):  ?>
						<div class="col top-bar-right align-self-end text-right">
						<?php dynamic_sidebar( 'top-bar-right' ); ?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>

		<div class="top-menu-wrapper">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<span>&nbsp;</span><?php /* This space is here for a reasin. DO NOT REMOVE*/?>
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
			   		<div class="collapse navbar-collapse" id="navbarTop">
		            <?php
		            $args = array(
		              'theme_location' => 'top',
		              'depth'      => 5,
		              'container'  => false,
		              'menu_class'     => 'navbar-nav navbar-right ml-md-auto',
		              'walker'     => new Bootstrap_Walker_Nav_Menu()
		              );
		            if (has_nav_menu('top')) {
		              wp_nav_menu($args);
		            }
		            ?>
		          </div>	
	          </div>				        
			</nav>
		</div>

		<div class="logo-row">
			<div class="container">
				<div class="row align-items-center justify-content-end">
					<div class="col-lg-5">

						<?php 
							if ( has_custom_logo() ) : 
								the_custom_logo(); 
							else: ?>
				      			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				      				<h1 class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
					      			<h2 class="site-description">
					      				<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
					      			</h2>
					      		</a>
				      		<?php endif; ?>
				      	
					</div>

					<?php if(get_theme_mod('header-content-1')!=""): ?>
					<div class="col header-box">
						<?php echo get_theme_mod('header-content-1'); ?>
					</div>
					<?php endif; ?>
					<?php if(get_theme_mod('header-content-2')!=""): ?>
					<div class="col header-box">
						<?php echo get_theme_mod('header-content-2'); ?>
					</div>
					<?php endif; ?>
					<?php if(get_theme_mod('header-content-3')!=""): ?>
					<div class="col header-box">
						<?php echo get_theme_mod('header-content-3'); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
					<span>&nbsp;</span>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

			   		<div class="collapse navbar-collapse" id="navbarNav">		   			 
		            <?php
		            $args = array(
		              'theme_location' => 'top',
		              'depth'      => 5,
		              'container'  => false,
		              'menu_class'     => 'navbar-nav',
		              'walker'     => new Bootstrap_Walker_Nav_Menu()
		              );
		            if (has_nav_menu('top')) {
		              wp_nav_menu($args);
		            }
		            ?>
		          	</div>
		      </div>				        
			</nav>		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
