<?php

/**
 * Footer
 * 
 * @package tstarter
 */

defined('ABSPATH') || exit;
?>
        <footer>

            <?php
            get_template_part('template-parts/widget', 'footer');
            ?>

        </footer>
    
        <?php 
            if ( apply_filters('t_scroll_to_top', true) ) 
            {
        ?>
            <div class="t-backtotop">
                <i class="fa  fa-arrow-up"></i>
            </div>
        <?php 
            }
        ?>
    </div>
    <?php wp_footer(); ?>
</body>

</html>