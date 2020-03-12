<?php

/**
 * Hooks all redux admin
 * 
 * @package tstarter/inc/admin/
 */

// Redux Hooks


// Footer Filter Hooks
add_filter( 't_footer_contact_caption', 't_apply_footer_contact_caption', 10 );
add_filter( 't_footer_address_v1', 't_apply_footer_address_v1', 10 );
add_filter( 't_footer_address_v2', 't_apply_footer_address_v2', 10 );
add_filter( 't_footer_address_v3', 't_apply_footer_address_v3', 10 );
add_filter( 't_footer_copyright', 't_apply_footer_copyright', 10 );
add_filter( 't_footer_payment', 't_apply_footer_payment', 10 );