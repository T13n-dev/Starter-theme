<?php
/**
 * Hooks all redux admin
 * 
 * @package tstarter/inc/admin/
 */

// General Hooks
add_filter( 't_scroll_to_top', 't_apply_scroll_to_top', 10 );

// Header Hooks
add_filter( 't_header_sticky', 't_apply_header_sticky', 10 );
add_filter( 't_shipping1', 't_apply_shipping1', 10 );
add_filter( 't_shipping2', 't_apply_shipping2', 10 );
add_filter( 't_contact1', 't_apply_contact1', 10 );
add_filter( 't_contact2', 't_apply_contact2', 10 );
add_filter( 't_github', 't_apply_github', 10 );
add_filter( 't_github_link', 't_apply_github_link', 10 );

// Preload Hooks
add_filter( 't_preload', 't_apply_preload', 10 );

// Footer Filter Hooks
add_filter( 't_footer_contact_caption', 't_apply_footer_contact_caption', 10 );
add_filter( 't_footer_address_v1', 't_apply_footer_address_v1', 10 );
add_filter( 't_footer_address_v2', 't_apply_footer_address_v2', 10 );
add_filter( 't_footer_address_v3', 't_apply_footer_address_v3', 10 );
add_filter( 't_footer_copyright', 't_apply_footer_copyright', 10 );
add_filter( 't_footer_payment', 't_apply_footer_payment', 10 );
add_filter( 't_footer_logo', 't_apply_footer_logo', 10 );