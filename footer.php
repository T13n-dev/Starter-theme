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
        <div class="t-backtotop">
            <i class="fa  fa-arrow-up"></i>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>