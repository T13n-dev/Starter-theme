<?php 
    $post_format = get_post_format();

    if( $post_format == 'quote' || $post_format == 'link' || $post_format == 'aside' || $post_format == 'status' ) {

        // get_template_part( 'templates/contents/content', $post_format );

        echo 'single_blogs';

    } else {
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('t-single'); ?>>
        <header class="t-single__header">
            <?php 
                $args = array(
                    'delimiter' => ' » ',
                );
                woocommerce_breadcrumb($args);

                wc_get_template( 'single-product/sale-flash.php' ); 
            ?>
        </header>
        <div class="t-single__main">   
            <div class="t-single__left">
                <?php wc_get_template( 'single-product/product-image.php' ); ?>
            </div>
            <div class="t-single__middle">
                <?php 
                    do_action( 'woocommerce_single_product_summary' );
                ?>
            </div>    
            <div class="t-single__right">
                <div class="t-single__ads">
                    
                </div>
            </div>
        </div>
        <footer class="t-single__footer">
        
        </footer>
    </article>
    
    <?php
    }