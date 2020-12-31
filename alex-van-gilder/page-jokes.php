<?php
/**
* Template Name: Full Width
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<div id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<div id="jokes">
				<?php
					// Check rows exists.
					if( have_rows('jokes') ):

						// Loop through rows.
						while( have_rows('jokes') ) : the_row();
							
							//Output ACF content
						?>
							
							<p class="joke-question"><?php the_sub_field('question'); ?></p>
							<p class="joke-answer"><?php the_sub_field('answer'); ?></p>

						<?php
						// End loop.
						endwhile;

					// No value.
					else :
						// Do something...
					endif;
				?>
			</div>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
