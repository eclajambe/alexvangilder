<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
    $enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
    if(!$enable_vc) {
    ?>
    <header class="entry-header">
		<?php if( get_field('page_title_override') ): ?>
			<h1 class="entry-title entry-title-acf"><?php the_field('page_title_override'); ?></h1> 
		<?php else : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
    <?php }

	if( have_rows('image_breakpoints') ): ?>
		<div id="vector-collage" class="container mt-3">
			<div class="row">
				<div class="col-12">
			
					<?php
						while( have_rows('image_breakpoints') ): the_row(); 
							
							$small_image  = get_sub_field( "small_collage_image" );
							$medium_image = get_sub_field( "medium_collage_image" );
							$large_image  = get_sub_field( "large_collage_image" );

							if( !empty( $small_image) ) : ?>
								<img class="d-md-none" src="<?php echo esc_url($small_image['url']); ?>" alt="<?php echo esc_attr($small_image['alt']); ?>" />
							<?php endif;					
							if( !empty( $medium_image) ) : ?>
								<img class="d-none d-md-block d-xl-none" src="<?php echo esc_url($medium_image['url']); ?>" alt="<?php echo esc_attr($medium_image['alt']); ?>" />
							<?php endif;
							if( !empty( $large_image) ) : ?>
								<img class="d-none d-xl-block" src="<?php echo esc_url($large_image['url']); ?>" alt="<?php echo esc_attr($large_image['alt']); ?>" />
							
							<?php
						endif; 
					endwhile; ?>

				</div>					
			</div>
		</div>
		
	<?php
	endif;
	?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() && !$enable_vc ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'wp-bootstrap-starter' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
