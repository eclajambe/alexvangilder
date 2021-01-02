<?php
    /*
     * Page titles are set by ACF fields
    */
    if( get_field('page_title_display') !== 'none' ) : ?>
        <header class="entry-header">
            <?php if( get_field('custom_page_title') ): ?>
                <h1 class="entry-title entry-title-acf"><?php the_field('custom_page_title'); ?></h1> 
            <?php else : ?>
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <?php endif; ?>
        </header><!-- .entry-header -->
<?php 
    endif; 
?>