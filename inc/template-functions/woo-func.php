<?php 
    /**
     * Woo functions
     * 
     * @package tstarter/inc/template-functions
     */

    /** 
     * * Add class support Woocommerce for pages
     */
    if ( !function_exists('t_add_class_woo') ) {
        function t_add_class_woo( $classes ) {
            // check if not woo page && is custom template homepage-v1
            if ( !is_woocommerce() && is_page_template('template-homepage-v1.php') ) {
               $classes[] = 'woocommerce';
            }

            return $classes;
        }
    }

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

    /**
     * *@hooked woocommerce_catalog_ordering - 30
     */
    if ( !function_exists('t_archive_catalog_ordering') ) {
        function t_archive_catalog_ordering() {
            if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
                return;
            }
            $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
            $catalog_orderby_options = apply_filters(
                'woocommerce_catalog_orderby',
                array(
                    'menu_order' => __( 'Sắp xếp', THEME_DOMAIN ),
                    'popularity' => __( 'Sắp xếp theo mức phổ biến', THEME_DOMAIN ),
                    'rating'     => __( 'Sắp xếp theo mức đánh giá trung bình', THEME_DOMAIN ),
                    'date'       => __( 'Sắp xếp sản phẩm mới nhất', THEME_DOMAIN ),
                    'price'      => __( 'Sắp xếp theo giá: thấp đến cao', THEME_DOMAIN ),
                    'price-desc' => __( 'Sắp xếp theo giá: cao đến thấp', THEME_DOMAIN ),
                )
            );
    
            $default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
            $orderby         = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby; // WPCS: sanitization ok, input var ok, CSRF ok.
    
            if ( wc_get_loop_prop( 'is_search' ) ) {
                $catalog_orderby_options = array_merge( array( 'relevance' => __( 'Relevance', 'woocommerce' ) ), $catalog_orderby_options );
    
                unset( $catalog_orderby_options['menu_order'] );
            }
    
            if ( ! $show_default_orderby ) {
                unset( $catalog_orderby_options['menu_order'] );
            }
    
            if ( ! wc_review_ratings_enabled() ) {
                unset( $catalog_orderby_options['rating'] );
            }
    
            if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
                $orderby = current( array_keys( $catalog_orderby_options ) );
            }
    
            wc_get_template(
                'loop/orderby.php',
                array(
                    'catalog_orderby_options' => $catalog_orderby_options,
                    'orderby'                 => $orderby,
                    'show_default_orderby'    => $show_default_orderby,
                )
            );
        }
     }