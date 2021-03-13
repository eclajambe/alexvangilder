<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<div id="main" class="site-main" role="main">
		
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used iaqnstead.
				 */
				get_template_part( 'template-parts/content-front-page', get_post_format() );
				
			endwhile;

			the_posts_navigation();

		else :
	
			get_template_part( 'template-parts/content-front-page', 'none' );

		endif; ?>

		<?php
			$num_posts = get_field( 'number_teasers' );
			/* Loop through Case Studies */			
			$args = array(
				'post_type' => 'case-study',
				'posts_per_page' => $num_posts
			);

			$post_query = new WP_Query($args);

			if($post_query->have_posts() ) : ?>
				
				<div class="container">
					<div class="row gx-5 gy-4">

						<?php
						while($post_query->have_posts() ) :
							$post_query->the_post(); ?>

								<div class="col-12 col-md-6">
									<a href="<?php echo get_post_permalink(); ?>">
									<?php 
										if ( has_post_thumbnail() ) :
											$featured_image = get_the_post_thumbnail(); ?>
												<?php echo $featured_image; ?>
										<?php 
										else :
											// do nothing
										endif; ?>			
										<h4 class="mt-3 mb-4"><?php the_title(); ?></h4>
									</a>
								</div>

							<?php
						endwhile; ?>		
					</div>
				</div>			
			<?php 
			endif;
		?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
// get_sidebar();
get_footer();
