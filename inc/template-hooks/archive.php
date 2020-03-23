<?php 

/**
 * Main Archive Hooks
 * 
 * @package tstarter/inc/template-hooks
 */

/**
 * Woocommerce Hooks
 * 
 * * archive
 * */
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_action('woocommerce_before_shop_loop', 't_archive_catalog_ordering', 30);