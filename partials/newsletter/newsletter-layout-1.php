<?php 
$home_newsletter_shortcode=get_theme_mod('home-newsletter-shortcode');
$content=get_theme_mod('home-newsletter-content');
?>
<div class="newsletter-container newsletter-layout-1">
	<div class="container">
		<div class="row">

			<div class="col newsletter-content-wrapper text-center">
				<div>
	    			<div class="newsletter-content"><?php echo $content; ?></div>
	    		</div>
	    		<?php  echo $home_newsletter_shortcode; ?>

	    	</div>
		</div>
	</div>
</div>