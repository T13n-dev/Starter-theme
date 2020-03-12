<?php 

    /**
     * *@hooked woocommerce_show_product_loop_sale_flash - 10
     */
    if ( !function_exists('t_show_product_loop_sale_flash') ) {
        function t_show_product_loop_sale_flash() {
            global $post, $product;
    
            if ( ! $product->is_in_stock() ) return;
            
            $sale_price = (int) $product->get_sale_price();
            $regular_price = (int) $product->get_regular_price();
    
            // if (empty($regular_price)){ //then this is a variable product
            //     $available_variations = $product->get_available_variations();
            //     $variation_id=$available_variations[0]['variation_id'];
            //     $variation= new WC_Product_Variation( $variation_id );
            //     $regular_price = $variation ->regular_price;
            //     $sale_price = $variation ->sale_price;
            // }
    
            if ( !empty( $regular_price ) && !empty( $sale_price ) && $regular_price > $sale_price ) {

                $sale = ceil(( ($regular_price - $sale_price) / $regular_price ) * 100);

                echo apply_filters( 't_sale_flash', '<span class="onsale">-' . $sale . '%</span>', $post, $product );
            }
        }
    }

    /**
     * *@hooked woocommerce_template_loop_product_thumbnail - 10
     */
    if( !function_exists('t_template_loop_product_thumbnail') ) {
        function t_template_loop_product_thumbnail() {  
            global $product;
            
            // top image
            echo woocommerce_get_product_thumbnail();
    
            // bot image
            $gallery_ids = $product->get_gallery_image_ids();
            if ( isset($gallery_ids) && isset($gallery_ids[0]) ) {
                echo wp_get_attachment_image( $gallery_ids[0], apply_filters( 't_single_product_archive_thumbnail_size', 'woocommerce_thumbnail'), "", array( "class" => "t-product-carousel__product-simage" ) );
            }
        }
    }
    
    /**
     * *@hooked woocommerce_template_loop_product_title - 10
     */
    if ( !function_exists('t_template_loop_product_title') ) {
        function t_template_loop_product_title() {
            echo '<h2 class="' . esc_attr( apply_filters( 't_product_loop_title_classes', 't-product-carousel__product-title' ) ) . '">' . get_the_title() . '</h2>';
        }
    }
  
    if ( ! function_exists( 't_mini_cart_fragment' ) ) {
        /**
         * Cart Fragments
         * Ensure cart contents update when products are added to the cart via AJAX
         * @param  array $fragments Fragments to refresh via AJAX
         * @return array            Fragments to refresh via AJAX
         */

        function t_mini_cart_fragment( $fragments ) {

            $fragments['span.t-header__qty'] = '<span class="t-header__qty">' . WC()->cart->get_cart_contents_count() . '</span>';
            $fragments['span.t-header__total'] =  '<span class="t-header__total">'. WC()->cart->get_cart_subtotal() .'</span>';

            return $fragments;
        }
    }