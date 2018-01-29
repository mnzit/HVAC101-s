<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HVAC101
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		

	<section class="hvac101-footer">
		<div class="container">
			<div class="row">

			<?php if (is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="col footer-1">

					<?php dynamic_sidebar( 'footer-1' ); ?>

				</div>

			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="col footer-2">

					<?php dynamic_sidebar( 'footer-2' ); ?>

				</div>

			<?php endif; ?>

			<?php if (is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="col footer-3">

					<?php dynamic_sidebar( 'footer-3' ); ?>

				</div>

			<?php endif; ?>

			<?php if (is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="col footer-4">

					<?php dynamic_sidebar( 'footer-4' ); ?>

				</div>

			<?php endif; ?>

			</div>
		</div>
			
	</section>

	</footer><!-- #colophon -->
</div><!-- #page -->
<div class="footer-bar">
	<div class="container">
			<div class="site-info">
				&copy; <?php //bloginfo( 'name' );
				echo "Theme By - CI Web Group";
						echo ' - ';
						echo date("Y"); ?>
			</div><!-- .site-info -->
		</div><!--  .container -->
</div>

<?php wp_footer(); ?>

</body>
</html>
