<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<?php 
	$permalink = get_permalink();
?>

<div class="col-12 col-sm-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href="<?php echo $permalink; ?>">
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php
			the_title( '<h4 class="mt-3 mb-4">', '</h4>' );

			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php wp_bootstrap_starter_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</a>
	</article><!-- #post-## -->
</div>
