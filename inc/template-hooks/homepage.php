<?php 
    /**
     * Template Hooks
     * 
     * @package tstarter
     */
    add_action('t_homepage', 't_slider_shortcode', 5); 
    add_action('t_homepage', 't_product_intro', 10);
    add_action('t_homepage', 't_product_carousel', 15);
    add_action('t_homepage', 't_product_intro_secondary', 20);
    add_action('t_homepage', 't_banner_products', 25);
    add_action('t_homepage', 't_banner_products_secondary', 30);
    add_action('t_homepage', 't_blog_carousel', 35);
    add_action('t_homepage', 't_brand_carousel', 40);

    /**
     * Woocomerce Hooks
     * 
     * * content-product
     * */
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

    add_action( 'woocommerce_before_shop_loop_item_title', 't_show_product_loop_sale_flash', 10);
    add_action( 'woocommerce_before_shop_loop_item_title', 't_template_loop_product_thumbnail', 10);
    add_action( 'woocommerce_shop_loop_item_title', 't_template_loop_product_title', 10 );

    /**
     * Filters
     */
    add_filter( 'woocommerce_add_to_cart_fragments', 't_mini_cart_fragment' );