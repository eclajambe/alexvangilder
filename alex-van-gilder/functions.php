<?php 

/**
 * Dequeue legacy Bootstrap stylesheet
*/
function dequeue_my_css() {
	wp_dequeue_style( 'wp-bootstrap-starter-bootstrap-css' );
	wp_deregister_style( 'wp-bootstrap-starter-bootstrap-css' );
}
add_action('wp_enqueue_scripts','dequeue_my_css',100);

/**
 * Enqueue child stylesheet
*/
function alex_van_gilder_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'bootstrap-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' );
} 
add_action( 'wp_enqueue_scripts', 'alex_van_gilder_enqueue_styles' );

/**
 * Register our sidebars and widgetized areas
*/
function avg_widgets_init() {

	register_sidebar( array(
		'name'          => 'Dark Footer Centered',
		'id'            => 'dark-footer-centered',
		'before_widget' => '<div class="widget-custom widget-dark-footer-centered text-center text-light" role="complementary">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'avg_widgets_init' );

/**
 * Create Custom Post Type - Case Studies
*/
function case_study_cpt_init() {
	$labels = array(
	  'name'               => _x( 'Case Studies', 'post type general name' ),
	  'singular_name'      => _x( 'Case Study', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'book' ),
	  'add_new_item'       => __( 'Add New Case Study' ),
	  'edit_item'          => __( 'Edit Case Study' ),
	  'new_item'           => __( 'New Case Study' ),
	  'all_items'          => __( 'All Case Studies' ),
	  'view_item'          => __( 'View Case Study' ),
	  'search_items'       => __( 'Search Case Studies' ),
	  'not_found'          => __( 'No case studies found' ),
	  'not_found_in_trash' => __( 'No case studies found in the Trash' ), 
	  'menu_name'          => 'Case Studies',
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds our case studies',
	  'public'        => true,
	  'menu_position' => 5,
	  'menu_icon'     => 'dashicons-portfolio',
	  'show_in_rest'  => true,
	  'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
	  'rewrite'       => array( 'slug' => 'work' ),
	  'has_archive'   => true
	);
	register_post_type( 'case-study', $args ); 
}
add_action( 'init', 'case_study_cpt_init' );

/**
 * Add options page to Case Studies post type
*/
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_sub_page(array(
        'page_title'  => 'Case Studies Options',
		'menu_title'  => 'Options',
        'parent_slug' => 'edit.php?post_type=case-study',
    ));

}

?>