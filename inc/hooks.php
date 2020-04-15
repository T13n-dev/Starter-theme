<?php 
    /**
     * Usage Hooks
     * 
     * @package tstarter/inc
     */

    // Setup
    add_action('after_setup_theme', 'setup');

    // Extra functions
    add_filter('body_class', 't_body_classes'); // Handler sticky header
    add_action('t_get_categories', 't_get_categories');