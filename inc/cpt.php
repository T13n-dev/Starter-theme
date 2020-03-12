<?php

/**
 * Register CPT 
 * 
 * Add custom post type here
 * @package tstarter/inc/cpt
 */

function cpt_branding()
{
    $labels = array(
        'name'                  => _x('Brand', 'Post Type General Name', 'tstarter'),
        'singular_name'         => _x('Brand', 'Post Type Singular Name', 'tstarter'),
        'menu_name'             => __('Brands', 'tstarter'),
        'name_admin_bar'        => __('Post Type', 'tstarter'),
        'archives'              => __('Item Archives', 'tstarter'),
        'attributes'            => __('Item Attributes', 'tstarter'),
        'parent_item_colon'     => __('Parent Item:', 'tstarter'),
        'all_items'             => __('All Items', 'tstarter'),
        'add_new_item'          => __('Add New Item', 'tstarter'),
        'add_new'               => __('Add New', 'tstarter'),
        'new_item'              => __('New Item', 'tstarter'),
        'edit_item'             => __('Edit Item', 'tstarter'),
        'update_item'           => __('Update Item', 'tstarter'),
        'view_item'             => __('View Item', 'tstarter'),
        'view_items'            => __('View Items', 'tstarter'),
        'search_items'          => __('Search Item', 'tstarter'),
        'not_found'             => __('Not found', 'tstarter'),
        'not_found_in_trash'    => __('Not found in Trash', 'tstarter'),
        'featured_image'        => __('Featured Image', 'tstarter'),
        'set_featured_image'    => __('Set featured image', 'tstarter'),
        'remove_featured_image' => __('Remove featured image', 'tstarter'),
        'use_featured_image'    => __('Use as featured image', 'tstarter'),
        'insert_into_item'      => __('Insert into item', 'tstarter'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'tstarter'),
        'items_list'            => __('Items list', 'tstarter'),
        'items_list_navigation' => __('Items list navigation', 'tstarter'),
        'filter_items_list'     => __('Filter items list', 'tstarter'),
    );
    $args = array(
        'label'                 => __('Brand', 'tstarter'),
        'description'           => __('Brand Description', 'tstarter'),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'taxonomies'            => array(),
        // 'rewrite' => array( 'slug' => 'brand', 'with_front' => false ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('branding_cpt', $args);
}
add_action('init', 'cpt_branding', 0);
