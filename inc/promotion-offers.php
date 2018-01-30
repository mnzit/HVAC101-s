<?php	
    $args = array(
  'post_type' => 'post',
  'posts_per_page' => 1,
  'paged' => 1,
  'category_name' => 'Promotion'
    );
$promotions_loop = new WP_Query($args);
if ($promotions_loop->have_posts()): 
$count=0;
?>
<div id="offers_and_promotion_widget" class="promotions_widget">
    <div class="container">
          <div id="promotions_widget" class="owl-carousel owl-theme">

            <?php while($promotions_loop->have_posts()): $promotions_loop->the_post(); ?>

                <?php for($i=0; $i<6; $i++): ?>
                <div class="image promo-img"><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>"></div>
                <?php endfor; ?>
        <?php 
        $count++;
        endwhile; 
        wp_reset_postdata();
        ?>
        </div>
         <div class="owls-controls offers_and_promotion">
            <div class="navi">
                <div class="dots"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>