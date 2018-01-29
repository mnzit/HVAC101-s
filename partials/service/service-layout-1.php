 <?php
if ($service_loop->have_posts()): 
$count=0;
?>
<div id="our_services" class="our-service-layout-1">
    <h3 class="section_heading text-center">Our Services</h3>
        <div class="container">
            <div class="row text-center">
    
                <?php while($service_loop->have_posts()): $service_loop->the_post(); ?>

                        <div class="d-flex align-items-stretch carder col-lg-3 col-md-6 col-sm-6 service-<?php echo $count; ?>">
                            <div class="card">
                                <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?php the_title(); ?></h4>
                                    <p class="card-text"><?php the_excerpt();?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo $service_raw_data[$count]['sub_fields'][0]['button-text'] ?></a>
                                </div>
                            </div>
                        </div>

                    <?php 
                    $count++;
                    endwhile; 
                    wp_reset_postdata();
                    ?>


            </div>
        </div>
    </div>
<?php endif; ?> 

