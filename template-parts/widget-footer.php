<?php

/**
 * Footer template
 * 
 * @package tstarter/template-parts
 */
?>
    <div class="footer-top container">
        <div class="t-widget">
            <?php
            if (is_active_sidebar('footer')) {
                dynamic_sidebar('footer');
            }
            ?>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom__inner container">
            <div class="footer-bottom__copyright"> 
                <?php echo apply_filters( 't_footer_copyright', esc_html( 'Copy right', THEME_DOMAIN ) );?> 
            </div>
            <div class="footer-bottom__payment">
                <?php 
                    $img = apply_filters(
                        't_footer_payment',  array (
                        'url' => '',
                        'height' => 300,
                        'width' => 300,
                        'title' => 'Adobe-Spark',
                        )
                    );
                ?>
                <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo $img['title']; ?>">
            </div>
        </div>
    </div>