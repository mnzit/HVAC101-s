<?php
/**
Template Name: Home Page
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

<div id="primary" class="home-content-area">
	<section class="section-home-page-slider">

		<?php 

			$raw_data=json_decode(get_theme_mod('home-slider'), true );

			$raw_data = super_unique($raw_data, 'mainValue');
			$home_sliders=array();
			foreach ($raw_data as $data):
				$home_sliders[]=$data['mainValue'];
			endforeach;
			
			$args = array(
              'post_type' => 'page',
              'post__in' => $home_sliders,
              'orderby' =>'post__in',
            );

			$loop = new WP_Query($args);

			set_query_var( 'loop', $loop );
			set_query_var( 'raw_data', $raw_data );

			get_template_part( 'partials/slider/slider', 'layout-1' ); 

			?>
	</section>

	<section class="home-section section-home-page-about">
		<?php
			$raw_data=get_theme_mod('home-about');
			//$loop = get_post($raw_data);

//			set_query_var( 'loop', $loop );
			set_query_var( 'raw_data', $raw_data );

			$about_layout=1; //default layout
			if(get_theme_mod('home-about-layout')!=''):
				$about_layout=get_theme_mod('home-about-layout');
			endif;

			get_template_part( 'partials/about/about', 'layout-'.$about_layout );

		?>
	</section>


	<section class="home-section section-home-page-services">

		<?php 
			$service_raw_data=json_decode(get_theme_mod('home-service'), true );

			$service_raw_data = super_unique($service_raw_data, 'mainValue');
			$home_services=array();
			foreach ($service_raw_data as $data):
				$home_services[]=$data['mainValue'];
			endforeach;
			
			$args = array(
              'post_type' => 'page',
              'post__in' => $home_services,
              'orderby' =>'post__in',
            );

			$service_loop = new WP_Query($args);

			set_query_var( 'service_loop', $service_loop );
			set_query_var( 'service_raw_data', $service_raw_data );


			$service_layout=1; //default layout
			if(get_theme_mod('home-service-layout')!=''):
				$service_layout=get_theme_mod('home-service-layout');
			endif;

			get_template_part( 'partials/service/service', 'layout-'.$service_layout );

			?>
	</section>

	<section class="home-section section-home-page-recent-posts">

		<?php 
		$recent_posts_raw_data = get_theme_mod('home-recent-posts'); 
		
		$args = array(
		'post_type' => 'post',
         'posts_per_page' => 6,
	     'paged' => 1,
	     'cat' => $recent_posts_raw_data,
        );

		$recent_posts_loop = new WP_Query($args);

		set_query_var( 'recent_posts_loop', $recent_posts_loop );
		set_query_var( 'recent_posts_raw_data', $recent_posts_raw_data );


		$recent_posts_layout=1; //default layout
		if(get_theme_mod('home-recent-post-layout')!=''):
			$recent_posts_layout=get_theme_mod('home-recent-post-layout');
		endif;

		get_template_part( 'partials/recent-posts/recent-posts', 'layout-'.$recent_posts_layout );

		?>

	</section>

	<section class="home-section section-home-page-promotions">

		<?php 
		$promotions_raw_data = get_theme_mod('home-promotions'); 
		
		$args = array(
		'post_type' => 'post',
         'posts_per_page' => -1,
	     'paged' => 1,
	     'cat' => $promotions_raw_data,
        );

		$promotions_loop = new WP_Query($args);

		set_query_var( 'promotions_loop', $promotions_loop );
		set_query_var( 'promotions_raw_data', $promotions_raw_data );


		$promotions_layout=1; //default layout
		if(get_theme_mod('home-promotions-layout')!=''):
			$promotions_layout=get_theme_mod('home-promotions-layout');
		endif;

		get_template_part( 'partials/promotions/promotions', 'layout-'.$promotions_layout );

		?>

	</section>

	<section class="home-section section-home-page-testimonials">

		<?php 
		$testimonials_raw_data = get_theme_mod('home-testimonials'); 
		
		$args = array(
		'post_type' => 'post',
	     'posts_per_page' => -1,
	     'paged' => 1,
	     'cat' => $testimonials_raw_data,
	    );

		$testimonials_loop = new WP_Query($args);

		set_query_var( 'testimonials_loop', $testimonials_loop );
		set_query_var( 'testimonials_raw_data', $testimonials_raw_data );


		$testimonials_layout=1; //default layout
		if(get_theme_mod('home-testimonials-layout')!=''):
			$testimonials_layout=get_theme_mod('home-testimonials-layout');
		endif;

		get_template_part( 'partials/testimonials/testimonials', 'layout-'.$testimonials_layout );

		?>

	</section>

	<section class="home-section section-home-page-team">

		<?php 
		$team_raw_data = get_theme_mod('home-team'); 
		
		$args = array(
		'post_type' => 'post',
	     'posts_per_page' => -1,
	     'paged' => 1,
	     'cat' => $team_raw_data,
	    );

		$team_loop = new WP_Query($args);

		set_query_var( 'team_loop', $team_loop );
		set_query_var( 'team_raw_data', $team_raw_data );


		$team_layout=1; //default layout
		if(get_theme_mod('home-team-layout')!=''):
			$team_layout=get_theme_mod('home-team-layout');
		endif;

		get_template_part( 'partials/team/team', 'layout-'.$team_layout );

		?>

	</section>


	<section class="home-section section-home-page-seer">

		<?php
			$raw_data=get_theme_mod('home-seer-page');

			set_query_var( 'raw_data', $raw_data );

			$seer_layout=1; //default layout
			if(get_theme_mod('home-seer-layout')!=''):
				$seer_layout=get_theme_mod('home-seer-layout');
			endif;

			get_template_part( 'partials/seer/seer', 'layout-'.$seer_layout );

		?>

	</section>

	<section class="home-section section-home-page-troubleshooter">
		<?php
			$troubleshooter_layout=1; //default layout
			if(get_theme_mod('home-troubleshooter-layout')!=''):
				$troubleshooter_layout=get_theme_mod('home-troubleshooter-layout');
			endif;

			get_template_part( 'partials/troubleshooter/troubleshooter', 'layout-'.$troubleshooter_layout );

		?>
	</section>

	<section class="home-section section-home-page-featured-manufacturer">
		<?php
			$featured_manufacturer_layout=1; //default layout
			if(get_theme_mod('featured-manufacturer-layout')!=''):
				$featured_manufacturer_layout=get_theme_mod('featured-manufacturer-layout');
			endif;

			 get_template_part( 'partials/manufacturer/featured-manufacturer', 'layout-'.$featured_manufacturer_layout );
		
		?>
	</section>

	<section class="home-section section-home-page-newsletter">
		<?php
			$newsletter_layout=1; //default layout
			if(get_theme_mod('home-newsletter-layout')!=''):
				$newsletter_layout=get_theme_mod('home-newsletter-layout');
			endif;

			 get_template_part( 'partials/newsletter/newsletter', 'layout-'.$newsletter_layout );
		
		?>
	</section>

	<section class="home-section section-home-page-service-areas">
		<?php
			$newsletter_layout=1; //default layout
			if(get_theme_mod('home-service-areas-layout')!=''):
				$service_areas_layout=get_theme_mod('home-service-areas-layout');
			endif;

			 get_template_part( 'partials/service-areas/service-areas', 'layout-'.$service_areas_layout );
		
		?>
	</section>

	
<?php /*
	<main id="main" class="site-main" role="main">
		<div class="container">

		<div class="row">

			<div class="col">
			
			<section><strike>Services</strike></section>
			<section>Who We Serve <sup>Design Yet to make</sup></section>
			<section><strike>Recent Posts</strike></section>
			<section><strike>Promotions</strike></section>
			<section><strike>SEER Calculator</strike></section>
			<section><strike>Troubleshooter</strike></section>

			
			<section>=============</section>
				

			<section>Maintainence Plan</section>
			<section>Financing</section>
			<section>Some Extra Page Content</section>
			<section>Some Extra Page Content 2</section>
			<section>Some Extra Page Content 3 ++</section>

			<section>=============</section>


			<section>Brands We Serve</section>
			<section>Our Clients</section>
			<section>Certifications</section>
			<section><strike>Our Team</strike></section>
			<section><strike>Testimonials</strike></section>
			<section><strike>Featured Manufacturer</strike></section>
			<section><strike>Sign Up for Newsletter</strike></section>
			<section>Service Areas</section>

			</div>
		</div>
	</div>			

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	*/ ?>
</div><!-- #primary -->
	
<?php
get_footer();
