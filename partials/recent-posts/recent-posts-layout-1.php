 <?php
if ($recent_posts_loop->have_posts()): 
$count=0;
?>
<div id="latest_blog" class="recent-posts-layout-1">
    <div class="container">
        <h3 class="section_heading text-center">Latest Blog</h3>
            <div id="home-page-recent-posts" class="owl-carousel owl-theme">

            <?php while($recent_posts_loop->have_posts()): $recent_posts_loop->the_post(); ?>

              <div class="card wow fadeInUpBig animated" data-wow-duration="0.7s" data-wow-delay="0s">
                <img class="card-img-top" src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
                <div class="row">
                    <div class="post_date col-2 text-center">
                        <h3><?php the_time('d'); ?></h3>
                        <hr>
                        <p><?php the_time('M'); ?></p>
                    </div>
                    <div class="description col-10 text-left">
                        <h4 class="card-title"><?php the_title(); ?></h4>
                        <p class="card-text"><?php echo get_excerpt(200); ?></p>
                        <a href="<?php the_permalink(); ?>">Read More</a>                        
                    </div>
                </div>
            </div>

        <?php 
        $count++;
        endwhile; 
        wp_reset_postdata();
        ?>
        </div>

        <div class="owls-controls">
            <div class="navi">
                <div class="dots"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?> 



 
              
