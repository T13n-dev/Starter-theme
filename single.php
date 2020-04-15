<?php
/**
 * Single page
 * 
 * @package tstarter
 */

get_header();
?>
<main class="main t-blog-single container">
    <div class="t-blog-single__sidebar">
        <?php 
            get_sidebar();
        ?>
    </div>
    <div class="t-blog-single__main">
        <header class="t-blog-single__header">

            <?php the_title('<h1>', '</h1>'); ?>

            <?php t_breadcrumb(); ?>

        </header>
        <div class="t-blog-single__site-content">
            <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();

                            get_template_part('template-parts/content-single', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>