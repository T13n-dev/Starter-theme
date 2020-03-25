<?php 
    /**
     * Header Hooks
     * 
     * @package tstarter/inc/template-hooks
     */

    add_action('t_header_preload', 't_preload', 5);
    
    add_action('t_header_info', 't_header_shipping', 5);
    add_action('t_header_info', 't_header_contact', 10);

    add_action( 't_header', 't_header_top', 5 );
    add_action( 't_header', 't_header_bottom', 10 );