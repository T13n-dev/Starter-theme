<?php
/**
 * Ajax Handler
 * action: ajax_search
 * 
 * @package tstarter/inc/admin/includes
 */

add_action('wp_ajax_ajax_search', 'ajax_search');
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search');

if (!function_exists('ajax_search')) {
    function ajax_search()
    {
        // Sanitizes a string from user input 
        $search = sanitize_text_field($_POST['query']);
        $slug = sanitize_text_field($_POST['slug']);

        if (!empty($slug)) {
            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => 8,
                's' => $search,
                'sentence' => true,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $slug
                    )
                )
            );
        } else {
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'product',
                's' => $search,
                'posts_per_page' => 8,
                'tax_query' => array (
                    'taxonomy' => 'product_cat'
                )
            );
        }

        if ( $args && !empty( $search ) ) {
            $the_query = new WP_Query($args);

            if ( $the_query->have_posts() ) : 
                while( $the_query->have_posts() ) : 
                    $the_query->the_post();

                    $currency = get_woocommerce_currency_symbol();
				    $price = get_post_meta(get_the_ID(), '_regular_price', true);
                    $sale = get_post_meta(get_the_ID(), '_sale_price', true);
                    
                    // $title = str_ireplace( $search, '<strong>'.  $search .'</strong>' , get_the_title() );

                    $title = t_find_and_replace( $search, get_the_title() );

                    ?>
                    <div class="t-search__results-list">
                        <div class="t-search__results-item">
                            <div class="t-search__results-image">
                                <?php the_post_thumbnail( 'shop_thumbnail' ); ?>
                            </div>
                            <div class="t-search__results-title">
                                <a href="<?php the_permalink(); ?>"> <?php echo ($title) ? $title : get_the_title(); ?> </a>
                            </div>
                            <span class="t-search__results-price">
                                <?php if ($price): ?>
                                <span class="woocommerce-Price-amount">
                                    <?php echo $price; ?>
                                    <span class="woocommerce-Price-currencySymbol">
                                        <?php echo $currency; ?>
                                    </span>
                                </span> <?php echo ( !empty($price) && !empty($sale) ) ? '–' : ''; ?> 
                                <?php endif; ?>
                                <?php if ($sale): ?>
                                <span class="t-search__results-amount">
                                    <?php echo $sale; ?>
                                    <span class="woocommerce-Price-currencySymbol">
                                        <?php echo $currency; ?>
                                    </span>
                                </span> 
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <?php
                endwhile; 
            wp_reset_query();
            else:
            ?>
                <div class="t-search__results-list">
                    <div class="t-search__results-item">
                        <div class="t-search__results-nofound">
                            <?php echo esc_html__( 'Không có sản phẩm được tìm thấy', THEME_DOMAIN ); ?>
                        </div>
                    </div>
                </div>
            <?php
            endif;
        }   

        die();
    }
}
