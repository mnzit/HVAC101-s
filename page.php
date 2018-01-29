<?php
/**
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
					$args = array (
						'showposts' => '1',
						'category_name' => 'Blog',
						'paged' => $paged
					);
					$the_query = new WP_Query( $args );
					while ($the_query->have_posts() ) : $the_query->the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
