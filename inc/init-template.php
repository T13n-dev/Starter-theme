<?php 

    /**
     * Connection Template 
     * 
     * @package tstarter
     */

    // Classes 

    // Require all template functions 
    require_once INCLUDE_DIR . 'inc/template-functions/header-func.php';
    require_once INCLUDE_DIR . 'inc/template-functions/homepage-func.php';
    require_once INCLUDE_DIR . 'inc/template-functions/woo-func.php';
    require_once INCLUDE_DIR . 'inc/template-functions/archive.php';

    // Require all template hooks
    require_once INCLUDE_DIR . 'inc/template-hooks/header.php';
    require_once INCLUDE_DIR . 'inc/template-hooks/homepage.php';
    require_once INCLUDE_DIR . 'inc/template-hooks/single.php';
    require_once INCLUDE_DIR . 'inc/template-hooks/archive.php';