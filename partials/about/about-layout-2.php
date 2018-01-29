<?php 
$post = get_post($raw_data);
setup_postdata( $post );
?>
<div class="container<?php echo has_post_thumbnail()?'-fluid':''; ?>">
	<div class="row align-items-center">
		<?php if(has_post_thumbnail()): ?>
	    <div class="col-md-6 text-center">
	        <img class="img-fluid" src="<?php echo the_post_thumbnail_url(); ?>"/>
	    </div>
	<?php endif; ?>

	    <div class="<?php echo has_post_thumbnail()?'col-md-4 col-sm-12 text-left':'col-md-12 text-center'; ?> col-contents about-us-content">
	        <h2 class="section_heading"><?php the_title(); ?></h2>
	        <?php the_excerpt(); ?>
	        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
	    </div>
	</div>
</div>
<?php wp_reset_postdata(); ?>