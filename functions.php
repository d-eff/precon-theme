<?php


//INITIALIZATION
if ( ! function_exists('precon_setup') ):
  
  function precon_setup() {
  
  		$args = array(
			'width'         => 100,
			'height'        => 100,
			'default-image' => get_template_directory_uri() . '/images/PR-logo.png',
			'uploads'       => true,
		);
  		add_theme_support( 'custom-header', $args );
  		add_theme_support( 'html5', array( 'search-form' ) );
  }

endif;
add_action('after_setup_theme', 'precon_setup');


//CUSTOM SETTINGS
if( ! function_exists('precon_initialize_theme_options')):
function precon_initialize_theme_options() {
 
    // First, we register a section. This is necessary since all future options must belong to one. 
    add_settings_section(
        'general_settings_section',         // ID used to identify this section and with which to register options
        'Policy Recon Options',             // Title to be displayed on the administration page
        'precon_general_options_callback',  // Callback used to render the description of the section
        'general'                           // Page on which to add this section of options
    );
     
    // Next, we will introduce the fields for toggling the visibility of content elements.
    add_settings_field( 
        'site_byline',                      // ID used to identify the field throughout the theme
        'Site Byline',                      // The label to the left of the option interface element
        'precon_byline_callback',   		// The name of the function responsible for rendering the option interface
        'general',                          // The page on which this option will be displayed
        'general_settings_section',         // The name of the section to which this field belongs
        array(                              // The array of arguments to pass to the callback. In this case, just a description.
            'Optional secondary subtitle. Appears to the right of the site title.'
        )
    );
     
    // Finally, we register the fields with WordPress
    register_setting(
        'general',
        'site_byline'
    );   
} 
endif;
add_action('admin_init', 'precon_initialize_theme_options');

/* ------------------------------------------------------------------------ *
 * The Excerpt stuff
 * ------------------------------------------------------------------------ */
function custom_excerpt_length( $length ) {
    return 70;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function precon_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'precon_excerpt_more' );



/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */
 
function precon_general_options_callback() {
    echo '<p>Select additional theme options.</p>';
} 
 
/* ------------------------------------------------------------------------ *
 * Field Callbacks
 * ------------------------------------------------------------------------ */

function precon_byline_callback($args) {
     
    // Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
    $html = '<input type="text" id="site_byline" name="site_byline"/>'; 
     
    // Here, we will take the first argument of the array and add it to a label next to the checkbox
    $html .= '<label for="site_byline"> '  . $args[0] . '</label>'; 
     
    echo $html;
     
} 

function precon_widgets_init() {

	register_sidebar( array(
		'name' => 'Main left sidebar',
		'id' => 'main_left',
		'before_widget' => '<div class="widgetWrap">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgetTitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => 'Main right sidebar',
		'id' => 'main_right',
		'before_widget' => '<div class="widgetWrap">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgetTitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => 'Countries Index Left Sidebar',
		'id' => 'countries_left',
		'before_widget' => '<div class="widgetWrap">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgetTitle">',
		'after_title' => '</h4>',
	) );

    register_sidebar( array(
        'name' => 'Footer Widget Area',
        'id' => 'footer_widgets',
        'before_widget' => '<div class="footer_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footerWidgetTitle">',
        'after_title' => '</h4>',
    ) );
}
add_action( 'widgets_init', 'precon_widgets_init' );



function precon_scripts() {
	wp_enqueue_script( 'preconmain', get_template_directory_uri() . '/js/main.js' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
	
}
add_action( 'wp_enqueue_scripts', 'precon_scripts' );

/* ------------------------------------------------------------------------ *
 * Menus!
 * ------------------------------------------------------------------------ */

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'social-menu' => __( 'Social Links' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


