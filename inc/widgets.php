<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hvac101_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hvac101' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hvac101' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title card-header">',
		'after_title'   => '</h3>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar Left', 'hvac101' ),
		'id'            => 'top-bar-left',
		'description'   => esc_html__( 'Add widgets here.', 'hvac101' ),
		'before_widget' => '<span id="%1$s" class="widget %2$s">',
		'after_widget'  => '</span>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar Right', 'hvac101' ),
		'id'            => 'top-bar-right',
		'description'   => esc_html__( 'Add widgets here.', 'hvac101' ),
		'before_widget' => '<span id="%1$s" class="widget %2$s">',
		'after_widget'  => '</span>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'hvac101' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'hvac101' ),
		'before_widget' => '<div class="footer-widget-wrapper">',
		'after_widget'  => '</div>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'hvac101' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'hvac101' ),
		'before_widget' => '<div class="footer-widget-wrapper">',
		'after_widget'  => '</div>',
	) );


	register_sidebar( array(
	'name'          => esc_html__( 'Footer 3', 'hvac101' ),
	'id'            => 'footer-3',
	'description'   => esc_html__( 'Add widgets here.', 'hvac101' ),
	'before_widget' => '<div class="footer-widget-wrapper">',
	'after_widget'  => '</div>',
	) );

	register_sidebar( array(
	'name'          => esc_html__( 'Footer 4', 'hvac101' ),
	'id'            => 'footer-4',
	'description'   => esc_html__( 'Add widgets here.', 'hvac101' ),
	'before_widget' => '<div class="footer-widget-wrapper">',
	'after_widget'  => '</div>',
	) );


}
add_action( 'widgets_init', 'hvac101_widgets_init' );



class HVAC101_Social_Media_Widget extends WP_Widget {
  	/**
	* Sets up the widgets name etc
	*/
	public function __construct() {
	    // widget actual processes
	    parent::__construct(
	      'social_media_widget', // Base ID
	      __( 'Social Media', 'text_domain' ), // Name
	      array( 'description' => __( 'Social Medias', 'text_domain' ), ) // Args
	    );
	}
	
	/**
	   * Outputs the content of the widget
	   *
	   * @param array $args
	   * @param array $instance
	   */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		ob_start();
		require get_template_directory() . '/inc/social-media.php';
		$strrr= ob_get_clean();
		echo $strrr;
		echo $args['after_widget'];
		
	}
	
	/**
		* Outputs the options form on admin
		*
		* @param array $instance The widget options
		*/
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Follow us ', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}
	
	/**
		* Processing widget options on save
		*
		* @param array $new_instance The new options
		* @param array $old_instance The previous options
		*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
	
}
	
function register_social_media_widget() {
    register_widget( 'HVAC101_Social_Media_Widget' );
}

add_action( 'widgets_init', 'register_social_media_widget' );


// Recent blog

class HVAC101_Recent_Blog extends WP_Widget {
	/**
* Sets up the widgets name etc
*/
public function __construct() {
			// widget actual processes
			parent::__construct(
					'recent_blog', // Base ID
					__( 'Recent Blog', 'text_domain' ), // Name
					array( 'description' => __( 'Recent Blog', 'text_domain' ), ) // Args
			);
}

/**
		* Outputs the content of the widget
		*
		* @param array $args
		* @param array $instance
		*/
public function widget( $args, $instance ) {
	extract( $args );

	// Check the widget options
	$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
	$date_checkbox = ! empty( $instance['date_checkbox'] ) ? $instance['date_checkbox'] : false;
	$thumbnail_checkbox = ! empty( $instance['thumbnail_checkbox'] ) ? $instance['thumbnail_checkbox'] : false;

	// WordPress core before_widget hook (always include )
	echo $before_widget;

   // Display the widget
   echo '<div class="widget-text wp_widget_plugin_box">';

		// Display widget title if defined
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		// Display something if checkbox is true

	echo '</div>';
	ob_start();
	require get_template_directory() . '/inc/recent_post.php';
	$strrr= ob_get_clean();
	echo $strrr;
	// WordPress core after_widget hook (always include )
	echo $after_widget;




}

/**
* Outputs the options form on admin
*
* @param array $instance The widget options
*/
public function form( $instance ) {

// Set widget defaults
$defaults = array(
	'title'    => '',
	'date_checkbox' => '',
	'thumbnail_checkbox' => ''
);

// Parse current settings with defaults
extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

<?php // Widget Title ?>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php // Date Checkbox ?>
<p>
	<input id="<?php echo esc_attr( $this->get_field_id( 'date_checkbox' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date_checkbox' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $date_checkbox ); ?> />
	<label for="<?php echo esc_attr( $this->get_field_id( 'date_checkbox' ) ); ?>"><?php _e( 'Show published date', 'text_domain' ); ?></label>
</p>

<?php // Thumbnail Checkbox ?>
<p>
	<input id="<?php echo esc_attr( $this->get_field_id( 'thumbnail_checkbox' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumbnail_checkbox' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $thumbnail_checkbox ); ?> />
	<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail_checkbox' ) ); ?>"><?php _e( 'Show post image', 'text_domain' ); ?></label>
</p>

<?php }

/**
* Processing widget options on save
*
* @param array $new_instance The new options
* @param array $old_instance The previous options
*/
public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
	$instance['date_checkbox'] = isset( $new_instance['date_checkbox'] ) ? 1 : false;
	$instance['thumbnail_checkbox'] = isset( $new_instance['thumbnail_checkbox'] ) ? 1 : false;
	return $instance;
}

}

function register_recent_blog_widget() {
		register_widget( 'HVAC101_Recent_Blog' );
}

add_action( 'widgets_init', 'register_recent_blog_widget' );


// Promotion and offers

class HVAC101_Offers_Promotion extends WP_Widget {
	/**
* Sets up the widgets name etc
*/
public function __construct() {
			// widget actual processes
			parent::__construct(
					'offer_and_promotion', // Base ID
					__( 'Offers and promotion', 'text_domain' ), // Name
					array( 'description' => __( 'Offers and promotion widget', 'text_domain' ), ) // Args
			);
}

/**
		* Outputs the content of the widget
		*
		* @param array $args
		* @param array $instance
		*/
public function widget( $args, $instance ) {
	extract( $args );

	// Check the widget options
	$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';

	// WordPress core before_widget hook (always include )
	echo $before_widget;

   // Display the widget
   echo '<div class="widget-text wp_widget_plugin_box">';

		// Display widget title if defined
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		// Display something if checkbox is true

	echo '</div>';
	ob_start();
	require get_template_directory() . '/inc/promotion-offers.php';
	$strrr= ob_get_clean();
	echo $strrr;
	// WordPress core after_widget hook (always include )
	echo $after_widget;




}

/**
* Outputs the options form on admin
*
* @param array $instance The widget options
*/
public function form( $instance ) {

// Set widget defaults
$defaults = array(
	'title'    => ''
);

// Parse current settings with defaults
extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

<?php // Widget Title ?>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>


<?php }

/**
* Processing widget options on save
*
* @param array $new_instance The new options
* @param array $old_instance The previous options
*/
public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
	return $instance;
}

}

function register_offers_and_promotion_widget() {
		register_widget( 'HVAC101_Offers_Promotion' );
}

add_action( 'widgets_init', 'register_offers_and_promotion_widget' );




//Testimonials
class HVAC101_Testimonials extends WP_Widget {
	/**
* Sets up the widgets name etc
*/
public function __construct() {
			// widget actual processes
			parent::__construct(
					'Testimonials', // Base ID
					__( 'Testimonials', 'text_domain' ), // Name
					array( 'description' => __( 'Testimonials widget', 'text_domain' ), ) // Args
			);
}

/**
		* Outputs the content of the widget
		*
		* @param array $args
		* @param array $instance
		*/
public function widget( $args, $instance ) {
	extract( $args );

	// Check the widget options
	$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';

	// WordPress core before_widget hook (always include )
	echo $before_widget;

   // Display the widget
   echo '<div class="widget-text wp_widget_plugin_box">';

		// Display widget title if defined
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		// Display something if checkbox is true

	echo '</div>';
	ob_start();
	require get_template_directory() . '/inc/testimonials.php';
	$strrr= ob_get_clean();
	echo $strrr;
	// WordPress core after_widget hook (always include )
	echo $after_widget;




}

/**
* Outputs the options form on admin
*
* @param array $instance The widget options
*/
public function form( $instance ) {

// Set widget defaults
$defaults = array(
	'title'    => ''
);

// Parse current settings with defaults
extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

<?php // Widget Title ?>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>


<?php }

/**
* Processing widget options on save
*
* @param array $new_instance The new options
* @param array $old_instance The previous options
*/
public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
	return $instance;
}

}

function register_testimonials_widget() {
		register_widget( 'HVAC101_Testimonials' );
}

add_action( 'widgets_init', 'register_testimonials_widget' );




