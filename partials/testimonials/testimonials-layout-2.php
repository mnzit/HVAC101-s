 <?php
if ($testimonials_loop->have_posts()): 
$count=0;
?>
<div id="testimonials" class="testimonials-layout-2">
    <div class="container">
        <h3 class="section_heading text-center">Testimonials</h3>
          <div id="home-page-testimonials" class="owl-carousel owl-theme">

            <?php while($testimonials_loop->have_posts()): $testimonials_loop->the_post(); ?>

                <div class="card wow fadeInUpBig animated" data-wow-duration="0.7s" data-wow-delay="0s">
                    <div class="description text-center">
                        <div class="des-image"></div>
                        <p class="card-text"><?php echo get_excerpt(200); ?></p>
                        <h4 class="card-title"><?php the_title();?></h4>
                    </div>
                </div>

        <?php 
        $count++;
        endwhile; 
        wp_reset_postdata();
        ?>
        </div>
         <div class="owls-controls testimonials-control">
            <div class="navi">
                <div class="dots"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>