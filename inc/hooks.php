<?php 
    /**
     * Usage hooks
     */

    // setup
    add_action('after_setup_theme', 'setup');

    // classes
    add_filter('body_class', 't_body_classes'); // sticky header
