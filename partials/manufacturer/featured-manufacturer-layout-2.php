<?php 
$featured_manufacturer_image=get_theme_mod('home-featured-manufacturer-image');
$content=get_theme_mod('home-featured-manufacturer-content');
?>
<div class="featured-manufacturer-container featured-manufacturer-layout-1">
	<div class="container">

		<h3 class="section_heading text-center">Featured Manufacturer</h3>

		<div class="row">

			<div class="col manufacturer-content-wrapper text-center">
				
	    		<img src="<?php  echo $featured_manufacturer_image; ?>"/>


	    	</div>

	    	<div class="col"><?php echo $content; ?></div>
		</div>
	</div>
</div>