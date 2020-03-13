<?php

/**
 * Template name: Homepage v1
 * 
 * @package tstarter
 */

get_header();
?>
<main class="main"> 

    <?php 

        /**
         * @
         * 
         */
         do_action( 't_homepage' );
    ?>

</main> 
<?php
get_footer();
