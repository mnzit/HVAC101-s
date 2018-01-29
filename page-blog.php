<?php
/**
	* * Template Name: Blog
*
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HVAC101
 */
//blog page
get_header(); ?>

<div class="page-inner-heading">
	<div class="container">
		<?php the_title( '<h1 class="page-main-title">', '</h1>' ); ?>
		<?php custom_breadcrumbs(); ?>
	</div>
</div>

	<div class="container">
		<div class="row">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

 				<?php 
					$blog_category = get_theme_mod('home-recent-posts'); 
			
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$original_query = $wp_query;
					$wp_query = null;
					$default_posts_per_page = get_option( 'posts_per_page' );
					$args = array(
									'cat'  => $blog_category,
									'posts_per_page' => $default_posts_per_page,
									'paged'          => $paged,
									);
					$wp_query = new WP_Query( $args );

					while ($wp_query->have_posts() ) : $wp_query->the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_navigation();
				wp_reset_postdata();
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
