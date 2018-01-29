<?php
/**
 * HVAC101 Theme Customizer
 *
 * @package HVAC101
 */

require get_template_directory() . '/inc/wp_easy_control.php';

if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;
/**
 * Customize Control for Taxonomy Select
 */
class hvac101_Customize_Dropdown_Taxonomies_Control extends WP_Customize_Control {

  public $type = 'dropdown-taxonomies';

  public $taxonomy = '';


  public function __construct( $manager, $id, $args = array() ) {

    $hvaclite_taxonomy = 'category';
    if ( isset( $args['taxonomy'] ) ) {
      $taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
      if ( true === $taxonomy_exist ) {
        $our_taxonomy = esc_attr( $args['taxonomy'] );
      }
    }
    $args['taxonomy'] = $hvaclite_taxonomy;
    $this->taxonomy = esc_attr( $hvaclite_taxonomy );

    parent::__construct( $manager, $id, $args );
  }

  public function render_content() {

    $tax_args = array(
      'hierarchical' => 0,
      'taxonomy'     => $this->taxonomy,
    );
    $all_taxonomies = get_categories( $tax_args );

    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
         <select <?php echo $this->link(); ?>>
            <?php
              printf('<option value="%s" %s>%s</option>', '', selected($this->value(), '', false),__('Select', 'hvaclite') );
             ?>
            <?php if ( ! empty( $all_taxonomies ) ): ?>
              <?php foreach ( $all_taxonomies as $key => $tax ): ?>
                <?php
                  printf('<option value="%s" %s>%s</option>', $tax->term_id, selected($this->value(), $tax->term_id, false), $tax->name );
                 ?>
              <?php endforeach ?>
           <?php endif ?>
         </select>

    </label>
    <?php
  }

}



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hvac101_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


/*--------------------------------------------------------------
## Easy Control Boilerplate Starts
--------------------------------------------------------------*/

$wp_customize->add_panel( 'panel-1', array(
  'title' => __( 'Panel 1' ),
  'description' => 'Testing panel 1', // Include html tags such as &lt;p>;.
  'priority' => 1, // Mixed with top-level-section hierarchy.
) );

$wp_customize->add_section( 'section-1' , array(
  'title' => 'Section 1',
  'panel' => 'panel-1',
) );


$wp_customize->add_setting( 'setting-1-1', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => '',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(
  new WP_Easy_Control(
    $wp_customize, // WP_Customize_Manager
    'setting-1-1', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Slider' ),
      'section' => 'section-1',
      'sub_fields'=>array(
      	array('id'=>1, 'name'=>'text-field', 'label'=>'Text Field', 'type'=>'text', 'value'=>'Hey there','description'=>'Enter Text Here'),


      	array('id'=>2, 'name'=>'select-field', 'label'=>'Select Field', 'type'=>'select', 'value'=>'4',
      		'description'=>'Select a Value Here',
      		 'options'=>array(
      		 	1=>'Option 1',
      		 	2=>'Option 2',
      		 	3=>'Option 3',
      		 	4=>'Option 4',
      		)),

      	array('id'=>3, 'name'=>'radio-field', 'label'=>'Radio Field', 'type'=>'radio', 'value'=>'3',
      		'description'=>'Select a Value Here',
      		 'options'=>array(
      		 	1=>'Option 1',
      		 	2=>'Option 2',
      		 	3=>'Option 3',
      		 	4=>'Option 4',
      		)),

		array('id'=>4, 'name'=>'textarea-field', 'label'=>'Textarea Field', 'type'=>'textarea', 'value'=>'Hey there textarea','description'=>'Enter content Here'),
		array('id'=>5, 'name'=>'checkbox-field', 'label'=>'Checkbox Field', 'type'=>'checkbox', 'value'=>'ischecked','description'=>'Check/Uncheck Checkbox'),

      )
    )
  )
);



/*--------------------------------------------------------------
## Easy Control Boilerplate Ends
--------------------------------------------------------------*/




/*--------------------------------------------------------------
## Header panel 
--------------------------------------------------------------*/



$wp_customize->add_panel( 'header-panel', array(
  'title' => __( 'Header' ),
  'description' => 'Customize Your Website Header ', // Include html tags such as &lt;p>;.
  'priority' => 1, // Mixed with top-level-section hierarchy.
) );



$wp_customize->add_section( 'header-boxes' , array(
  'title' => 'Header Content Boxes',
  'panel' => 'header-panel',
) );



$wp_customize->add_setting( 'header-content-1', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'header-content-1', array(
    'label'                 =>  __( 'Enter Content for Header Box 1 ', 'hvac101' ),
    'section'               => 'header-boxes',
    'type'                  => 'textarea',
    'default'               =>  '',
    'priority'              => 32,
    'settings' => 'header-content-1',
) );



$wp_customize->add_setting( 'header-content-2', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'header-content-2', array(
    'label'                 =>  __( 'Enter Content for Header Box 2', 'hvac101' ),
    'section'               => 'header-boxes',
    'type'                  => 'textarea',
    'default'               =>  '',
    'priority'              => 32,
    'settings' => 'header-content-2',
) );



$wp_customize->add_setting( 'header-content-3', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'header-content-3', array(
    'label'                 =>  __( 'Enter Content for Header Box 3', 'hvac101' ),
    'section'               => 'header-boxes',
    'type'                  => 'textarea',
    'default'               =>  '',
    'priority'              => 32,
    'settings' => 'header-content-3',
) );



/*--------------------------------------------------------------
## Header Panel Ends
--------------------------------------------------------------*/




/*--------------------------------------------------------------
## Easy Control Boilerplate Ends
--------------------------------------------------------------*/


/*--------------------------------------------------------------
## Home Page Panel Starts
--------------------------------------------------------------*/


$wp_customize->add_panel( 'homepage-panel', array(
  'title' => __( 'Home Page' ),
  'description' => 'Customize Your Home Page', // Include html tags such as &lt;p>;.
  'priority' => 2, // Mixed with top-level-section hierarchy.
) );


/*--------------------------------------------------------------
## Home Page Slider
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-slider-section' , array(
  'title' => 'Sliders',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-slider', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => '',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(
  new WP_Easy_Control(
    $wp_customize, 
    'home-slider', 
    array(
      'label' => __( 'Select Slider' ),
      'section' => 'home-slider-section',
      'sub_fields'=>array(
      		array('id'=>1, 'name'=>'slider-align', 'label'=>'Alignment', 'type'=>'select', 'value'=>'left',
      		'description'=>'Select alignment from here',
      		'options'=>array(
      		 	'left'=>'Left',
      		 	'center'=>'Center',
      		 	'right'=>'Right'
      		)),
      	)
    )
  )
);

/*--------------------------------------------------------------
## Home Page Slider Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page About Us
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-about-section' , array(
  'title' => 'About Us',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-about', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-about', array(
    'label'                 =>  __( 'Select Page About Us Section', 'hvac101' ),
    'section'               => 'home-about-section',
    'type'                  => 'dropdown-pages',
    'allow_addition'		=> true,
    'priority'              => 31,
    'settings' => 'home-about',
) );


hvac101_show_layout_option($wp_customize, 'home-about-section', 'home-about-layout', "Select layout for About Us section", 
	array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
## Home Page About Us Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Services
--------------------------------------------------------------*/


$wp_customize->add_section( 'home-services-section' , array(
  'title' => 'Services',
  'panel' => 'homepage-panel',
) );

//hvac101_show_title_field($wp_customize, $section, $setting_control, $string)
hvac101_show_title_field($wp_customize, 'home-services-section', 'home-service-title', "Enter Heading for Our Services Section", "Our Services");


$wp_customize->add_setting( 'home-service', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => '',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(
  new WP_Easy_Control(
    $wp_customize, 
    'home-service', 
    array(
      'label' => __( 'Select Service' ),
      'section' => 'home-services-section',
      'sub_fields'=>array(
      		array('id'=>1, 'name'=>'button-text', 'label'=>'Button Text', 'type'=>'text', 'value'=>'Click Here', 'description'=>'Enter Button Text')
      	)
    )
  )
);

hvac101_show_layout_option($wp_customize, 'home-services-section', 'home-service-layout', "Select layout for Our Services section", 
	array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);


/*--------------------------------------------------------------
## Home Page Services Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Who We Serve
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-whoweserve-section' , array(
  'title' => 'Who We Serve',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-who-we-serve', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => '',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(
  new WP_Easy_Control(
    $wp_customize, 
    'home-who-we-serve', 
    array(
      'label' => __( 'Select Who We Serve' ),
      'section' => 'home-whoweserve-section',
      'sub_fields'=>array(
      		array('id'=>1, 'name'=>'button-text', 'label'=>'Button Text', 'type'=>'text', 'value'=>'Click Here', 'description'=>'Enter Button Text')
      	)
    )
  )
);

hvac101_show_layout_option($wp_customize, 'home-whoweserve-section', 'home-who-we-serve-layout', "Select layout for Who We Serve section", 
	array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);


/*--------------------------------------------------------------
## Home Page Services Ends
--------------------------------------------------------------*/


/*--------------------------------------------------------------
## Home Page Recent Posts
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-recent-post-section' , array(
  'title' => 'Recent Posts',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-recent-posts', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-recent-posts', array(
    'label'                 =>  __( 'Select Category for Recent Posts', 'hvac101' ),
    'section'               => 'home-recent-post-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-recent-posts'
	)
) );


hvac101_show_layout_option($wp_customize, 'home-recent-post-section', 'home-recent-post-layout', "Select layout for Recent Posts section", 
	array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Recent Posts Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Promotions
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-promotions-section' , array(
  'title' => 'Promotions',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-promotions', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-promotions', array(
    'label'                 =>  __( 'Select Category for Promotions', 'hvac101' ),
    'section'               => 'home-promotions-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-promotions'
	)
) );


hvac101_show_layout_option($wp_customize, 'home-promotions-section', 'home-promotions-layout', "Select layout for Promotions section",
	array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Promotions
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Testimonials
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-testimonials-section' , array(
  'title' => 'Testimonials',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-testimonials', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-testimonials', array(
    'label'                 =>  __( 'Select Category for Testimonials', 'hvac101' ),
    'section'               => 'home-testimonials-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-testimonials'
  )
) );


hvac101_show_layout_option($wp_customize, 'home-testimonials-section', 'home-testimonials-layout', "Select layout for Testimonials section",
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Testimonials Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Team
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-team-section' , array(
  'title' => 'Our Team',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-team', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-team', array(
    'label'                 =>  __( 'Select Category for Our Team', 'hvac101' ),
    'section'               => 'home-team-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-team'
  )
) );


hvac101_show_layout_option($wp_customize, 'home-team-section', 'home-team-layout', "Select layout for Our Team section",
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Team Ends
--------------------------------------------------------------*/




/*--------------------------------------------------------------
## Home Page SEER Calculator 
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-seer-section' , array(
  'title' => 'SEER Calculator',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-seer-page', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-seer-page', array(
    'label'                 =>  __( 'Select Page SEER Calculator Section', 'hvac101' ),
    'section'               => 'home-seer-section',
    'type'                  => 'dropdown-pages',
    'priority'              => 31,
    'settings' => 'home-seer-page',
) );


$wp_customize->add_setting( 'home-seer-content', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-seer-content', array(
    'label'                 =>  __( 'Enter content for SEER Calculator Section (with <iframe> tag if any)', 'hvac101' ),
    'section'               => 'home-seer-section',
    'type'                  => 'textarea',
    'priority'              => 32,
    'settings' => 'home-seer-content',
) );


hvac101_show_layout_option($wp_customize, 'home-seer-section', 'home-seer-layout', "Select layout for SEER Calculator section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
## Home Page SEER Calculator Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Troubleshooter
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-troubleshooter-section' , array(
  'title' => 'HVAC Troubleshooter',
  'panel' => 'homepage-panel',
) );

$wp_customize->add_setting( 'home-troubleshooter-content', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-troubleshooter-conten t', array(
    'label'                 =>  __( 'Enter Content for HVAC Troubleshooter Section', 'hvac101' ),
    'section'               => 'home-troubleshooter-section',
    'type'                  => 'textarea',
    'default'               =>  '<h3>Troubleshoot Your Problem</h3>
<h6>Every problem has a solution and we know how to find it!</h6>
<div class="btn-group" role="group">
<a href="#" type="button" class="btn btn-default">Try our troubleshooter</a>
  <span type="button" class="btn bg-info">OR</span>
    <a href="#" type="button" class="btn btn-default">Get a free second opinion</a>
</div>',
    'priority'              => 32,
    'settings' => 'home-troubleshooter-content',
) );


hvac101_show_layout_option($wp_customize, 'home-troubleshooter-section', 'home-troubleshooter-layout', "Select layout for HVAC Troubleshooter section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
## Home Page HVAC Troubleshooter Ends
--------------------------------------------------------------*/


/*--------------------------------------------------------------
## Home Page Featured Manufacturer
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-featured-manufacturer-section' , array(
  'title' => 'HVAC Featured Manufacturer',
  'panel' => 'homepage-panel',
) );

$wp_customize->add_setting( 'home-featured-manufacturer-image', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'home-featured-manufacturer-image',
           array(
               'label'      => __( 'Upload a Image', 'hvac101' ),
               'section'    => 'home-featured-manufacturer-section',
               'settings'   => 'home-featured-manufacturer-image',
               'context'    => 'Image for featured manufacturer' 
           )
       )
   );


$wp_customize->add_setting( 'home-featured-manufacturer-content', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'home-featured-manufacturer-content', array(
    'label'                 =>  __( 'Enter Content for HVAC Featured Manufacturer Section', 'hvac101' ),
    'section'               => 'home-featured-manufacturer-section',
    'type'                  => 'textarea',
    'default'               =>  '',
    'priority'              => 32,
    'settings' => 'home-featured-manufacturer-content',
) );


hvac101_show_layout_option($wp_customize, 'home-featured-manufacturer-section', 'featured-manufacturer-layout', "Select layout for HVAC Featured Manufacturer section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
## Home Page Featured Manufacturer Ends
--------------------------------------------------------------*/




/*--------------------------------------------------------------
## Newsletter 
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-newsletter-section' , array(
  'title' => 'Newsletter',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-newsletter-shortcode', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-newsletter-shortcode', array(
    'label'                 =>  __( 'Enter Newsletter Form Shortcode', 'hvac101' ),
    'section'               => 'home-newsletter-section',
    'type'                  => 'text',
    'priority'              => 31,
    'settings' => 'home-newsletter-shortcode',
) );


$wp_customize->add_setting( 'home-newsletter-content', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-newsletter-content', array(
    'label'                 =>  __( 'Enter content for Newsletter Section', 'hvac101' ),
    'section'               => 'home-newsletter-section',
    'type'                  => 'textarea',
    'priority'              => 32,
    'settings' => 'home-newsletter-content',
) );


hvac101_show_layout_option($wp_customize, 'home-newsletter-section', 'home-newsletter-layout', "Select layout for Newsletter section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
##Newsletter Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Service Areas
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-service-areas-section' , array(
  'title' => 'Service Areas',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-service-areas-image', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'home-service-areas-image',
           array(
               'label'      => __( 'Upload a Image', 'hvac101' ),
               'section'    => 'home-service-areas-section',
               'settings' => 'home-service-areas-image',
               'context'    => 'Image for Service Areas (Generally map)' 
           )
       )
   );


$wp_customize->add_setting( 'home-service-areas-content', array(
  'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-service-areas-content', array(
    'label'                 =>  __( 'Enter content for Service Areas Section', 'hvac101' ),
    'section'               => 'home-service-areas-section',
    'type'                  => 'textarea',
    'priority'              => 32,
    'settings' => 'home-service-areas-content',
) );


hvac101_show_layout_option($wp_customize, 'home-service-areas-section', 'home-service-areas-layout', "Select layout for Service Areas section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
## Service Areas Ends
--------------------------------------------------------------*/


/*--------------------------------------------------------------
## Social Profile
--------------------------------------------------------------*/

//Social Profile
$wp_customize->add_section(
	'social_profile',
	array(
				'title' => 'Social Media Profile',
				'panel'=> 'panel-1',
				'description' => 'Add/ Edit links to your social media here',
				'priority' => 14,
	)
);

$social=array();

$social[]=array('social_facebook', array('label'=>"Facebook", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_twitter', array('label'=>"Twitter", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_youtube', array('label'=>"Youtube", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_gplus', array('label'=>"Google Plus", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_instagram', array('label'=>"Instagram", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_linkedin', array('label'=>"Linkedin", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_yelp', array('label'=>"Yelp", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_angieslist', array('label'=>"Angie's List", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_gbl', array('label'=>"Google Business Listing", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_bbb', array('label'=>"BBB", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_custom1', array('label'=>"Custom 1", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_custom2', array('label'=>"Custom 2", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_custom3', array('label'=>"Custom 3", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_custom4', array('label'=>"Custom 4", 'section'=>'social_profile', 'type'=>"url" ));

foreach ($social as $soc) {
	$wp_customize->add_setting($soc[0], array('default' => '', 'type'=>'option'));
	$wp_customize->add_control($soc[0], $soc[1]);
	}

}
add_action( 'customize_register', 'hvac101_customize_register' );


/*--------------------------------------------------------------
## Social Profile Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Special Functions
--------------------------------------------------------------*/


function hvac101_show_title_field($wp_customize, $section, $setting_control, $string, $default)
{

$wp_customize->add_setting( $setting_control, array(
    'capability'    => 'edit_theme_options',
    'default'     => $default,
    'transport' => 'refresh', // or postMessage
    'type'=>'theme_mod'
) );

$wp_customize->add_control( $setting_control, array(
    'label'                 =>  __($string, 'hvac101' ),
    'section'               => $section,
    'type'                  => 'text',
    'priority'              => 11,
    'settings' => $setting_control,
) );

}


//Function for enabling or disabling a section $setting_control
function hvac101_show_enable_disable($wp_customize, $section, $setting_control, $string)
{

$wp_customize->add_setting( $setting_control, array(
    'capability'    => 'edit_theme_options',
    'default'     => true,
    'transport' => 'refresh', // or postMessage
    'type'=>'theme_mod'
) );

$wp_customize->add_control( $setting_control, array(
    'label'                 =>  __($string, 'hvac101' ),
    'section'               => $section,
    'type'                  => 'checkbox',
    'priority'              => 10,
    'settings' => $setting_control,
) );

}


function hvac101_show_layout_option($wp_customize, $section, $setting_control_name, $string, $options){
$wp_customize->add_setting( $setting_control_name, array(
    'capability'    => 'edit_theme_options',
    'default'     => reset($options),
    'transport' => 'refresh', // or postMessage
    'type'=>'theme_mod'
) );

$wp_customize->add_control( $setting_control_name, array(
    'label'                 =>  __($string, 'hvac101' ),
    'section'               => $section,
    'type'                  => 'select',
    'choices'				=> $options,
    'priority'              => 10,
    'settings' => $setting_control_name,
) );


} // main function edns


