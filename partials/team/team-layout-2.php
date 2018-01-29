 <?php
if ($team_loop->have_posts()): 
$count=0;
?>
<div id="team" class="team-layout-2">
    <div class="container">
        <h3 class="section_heading text-center">Our Team</h3>

        <div class="row justify-content-center">
            <?php while($team_loop->have_posts()): $team_loop->the_post(); ?>

                <div class="col col-lg-3 col-md-3 col-sm-6 team-<?php echo $count; ?>">
                    <div class="round-head">
                      <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>">
                  	</div>
                  	<div class="team-block">
                    	<h4 class="card-title text-center"><?php the_title();?></h4>
                  	</div>
                </div>

        <?php 
        $count++;
        endwhile; 
      //  wp_reset_postdata();
        ?>

        

        		<div class="col col-lg-3 col-md-3 col-sm-6 team-<?php echo $count; ?>">
                    <div class="round-head">
                      <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>">
                  	</div>
                  	<div class="team-block">
                    	<h4 class="card-title text-center"><?php the_title();?></h4>
                  	</div>
                </div>


                
        </div>
        </div>
    </div>
</div>
<?php endif; ?>