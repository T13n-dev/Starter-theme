<?php 
/**
 * Archive page
 * 
 * @package tstarter
 */
    
get_header();
?>
<main class="main t-blog-archive container">
    <div class="t-blog-archive__sidebar">
        <?php 
            get_sidebar();
        ?>
    </div>
    <div class="t-blog-archive__main">
        <header class="t-blog-archive__header">

            <?php the_archive_title('<h1>', '</h1>'); ?>

            <?php t_breadcrumb(); ?>

        </header>
        <div class="t-blog-archive__items-list">
            <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();

                            get_template_part('template-parts/content-archive', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
        <div class="t-blog-archive__pagination">
            <?php t_pagination(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>