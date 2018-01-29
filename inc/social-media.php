<?php 
$social = array(
          array('social_gbl','fab fa-google', 'Google Reviews'),
          array('social_facebook','fab fa-facebook-square'),
          array('social_twitter','fab fa-twitter-square'),
          array('social_youtube','fab fa-youtube'),
          array('social_instagram','fab fa-instagram'),
          array('social_linkedin','fab fa-linkedin'),
          array('social_gplus','fab fa-google-plus-square'),
          array('social_yelp','fab fa-yelp'),
          array('social_angieslist','fab fa-angellist'),
          array('social_bbb','fas fa-link'),
          array('social_custom1','fas fa-link'),
          array('social_custom2','fas fa-link'),
          array('social_custom3','fas fa-link'),
          array('social_custom4','fas fa-link'),
			);
?>
<span class="social-icon">

<?php foreach($social as $soc):
	if(get_option($soc[0]) != ""): 
?>
	<a class="social-links <?php echo $soc[0]; ?>" href="<?php echo get_option($soc[0]);?>" target = "_blank">
	<i class="<?php echo $soc[1]; ?>" aria-hidden="true"></i>
	</a>
<?php
endif;
endforeach;
?>
</span>