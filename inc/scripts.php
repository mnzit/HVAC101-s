<?php
/**
 * Enqueue scripts and styles.
 */
function hvac101_scripts() {

	wp_enqueue_style( 'hvac101-fa-style', '//use.fontawesome.com/releases/v5.0.2/css/all.css', array(), '1.0.0' );

	
	wp_enqueue_style( 'hvac101-owl-style', get_stylesheet_directory_uri() . '/css/owl-carousel.css', array(), '1.0.0' );

	wp_enqueue_style( 'hvac101-wow-style', get_stylesheet_directory_uri() . '/css/animate.css', array(), '1.0.0' );

	wp_enqueue_style( 'hvac101-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0' );

	wp_enqueue_script( 'hvac101-js', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), ' ', true );

	//wp_enqueue_script( 'hvac101-fa', '//use.fontawesome.com/releases/v5.0.1/js/all.js', array(), '5.0.1' );
	wp_enqueue_script( 'hvac101-owl-script', get_template_directory_uri() . '/js/owl-carousel.js', array('jquery'), '1.0.1', true );

	wp_enqueue_script( 'hvac101-wow-script', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0.1', true );

	wp_enqueue_script( 'hvac101-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.1', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hvac101_scripts' );


/**
 * Filter the HTML script tag of `leadgenwp-fa` script to add `defer` attribute.
 *
*/
function hvac101_defer_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array(
		'hvac101-fa'
	);
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'hvac101_defer_scripts', 10, 3 );