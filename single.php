<?php

/**
 * Single
 * 
 * @package tstarter
 */

get_header();
?>
<main class="main container">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();

                get_template_part('template-parts/content', 'single');

        endwhile;
    endif;
    ?>
</main>
<?php get_footer(); ?>