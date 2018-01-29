<?php 
$service_areas_image=get_theme_mod('home-service-areas-image');
$content=get_theme_mod('home-service-areas-content');
?>
<div class="service-areas-container service-areas-layout-1">
	<img src="<?php echo $service_areas_image;?>" class="service-areas-bg" />
	<div class="container">
		<div class="row">

			<div class="col service-areas-content-wrapper text-center">

				<h3 class="section_heading text-center">Service Areas</h3>
				<?php  echo $content; ?>

	    		<?php 
	    		 $args = array(
	              'theme_location' => 'service-areas',
	              'depth'      => 1,
	              );

	            if (has_nav_menu('service-areas')) {
	              wp_nav_menu($args);
	            }
	            ?>

	    	</div>
		</div>
	</div>
</div>