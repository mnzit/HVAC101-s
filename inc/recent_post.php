
     <?php 
					$blog_category = get_theme_mod('home-recent-posts'); 
			
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$wp_query = null;
					
					$args = array(
									'cat'  => $blog_category,
									'posts_per_page' =>5,
								
									);
					$wp_query = new WP_Query( $args );

					while ($wp_query->have_posts() ) : $wp_query->the_post();
     ?>
     <div>
     <div class="row">
     <div class="col-3">
     <a href="<?php the_permalink()?>">
     <?php
    if($thumbnail_checkbox){
     the_post_thumbnail();
    }
     ?>
      </a>
     </div>
     <div class="col-9">
     <a href="<?php the_permalink()?>">
     <?php the_title();?>
     <br>
     <?php
    if($date_checkbox){
      the_date();
     }
     ?>
     </a>
     </div>
     </div>
<?php 

    endwhile;
    wp_reset_postdata();
					?>
     