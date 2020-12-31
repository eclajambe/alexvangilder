<?php 

// Enqueue child stylesheet
add_action( 'wp_enqueue_scripts', 'alex_van_gilder_enqueue_styles' );
	function alex_van_gilder_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

/**
 * Register our sidebars and widgetized areas.
 *
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

?>