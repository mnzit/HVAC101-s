<?php
if ($loop->have_posts()): 
$count=0;
?>
<div class="home-slider owl-carousel">

    <?php while($loop->have_posts()): $loop->the_post(); ?>

    <div class="item home-slider-item home-slider-count-<?php echo $count; ?>" id="home-slider-<?php the_ID(); ?>">
        <img src="<?php the_post_thumbnail_url(); ?>"/>
        <div class="owl-carousel-caption">
            <div class="container">

                <?php if($raw_data[$count]['sub_fields'][0]['slider-align']=='center'): ?> 
                    <div class="row justify-content-md-center">
                        <div class="text-center">
                <?php elseif ($raw_data[$count]['sub_fields'][0]['slider-align']=='left'): ?>
                    <div class="row">
                        <div class="col-6">
                <?php elseif($raw_data[$count]['sub_fields'][0]['slider-align']=='right'): ?>
                    <div class="row justify-content-end">
                        <div class="col-5">
                <?php else: ?>
                    <div class="row">
                        <div class="col-6">
                <?php endif; ?>
               
                        <?php the_excerpt(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 

$count++;
endwhile; 
wp_reset_postdata();
?>

</div> <!-- END SLIDER -->

<div class="owl-extras">
    <div class="nav-container"></div>
</div>
<div class="dot-container"></div>
<?php endif; ?>
