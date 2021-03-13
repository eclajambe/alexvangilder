<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<div id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php 
					$archive_page_title = get_field('archive_page_title_override', 'option');
					if( $archive_page_title ): ?>
						<h1 class="entry-title entry-title-acf"><?php echo $archive_page_title; ?></h1> 
				<?php else :
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					// the_archive_description( '<div class="archive-description">', '</div>' );	
				?>
				<?php endif; ?>				
			</header><!-- .page-header -->
			
			<div class="entry-content">
				<div class="row gx-5 gy-4">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content-case-studies', get_post_format() );

					endwhile;

					the_posts_navigation();

					else :

						get_template_part( 'template-parts/content-case-studies', 'none' );

					endif; ?>
				</div>
			</div>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
//get_sidebar();
get_footer();
