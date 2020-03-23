<?php 

/**
 * Page template 
 * 
 * @package tstarter
 */

get_header();
?>
<main class="main">
    <div class="container">
    <?php 
    if( have_posts() ) : 
        while( have_posts() ) : 
            the_post();
            
            the_content();
        endwhile; 
    endif;
    ?>
    </div>
</main>

<?php 
get_footer();