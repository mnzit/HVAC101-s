 <?php
if ($promotions_loop->have_posts()): 
$count=0;
?>
<div id="offers_and_promotion" class="promotions-layout-1">
    <div class="container">
        <h3 class="section_heading text-center">Offers and Promotions</h3>
            <div id="home-page-promotions" class="owl-carousel owl-theme">

            <?php while($promotions_loop->have_posts()): $promotions_loop->the_post(); ?>

                <?php for($i=0; $i<3; $i++): ?>
                <div class="promo-img"><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>"></div>
                <?php endfor; ?>

        <?php 
        $count++;
        endwhile; 
        wp_reset_postdata();
        ?>
        
        </div>
    </div>
</div>
<?php endif; ?>