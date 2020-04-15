<?php 
/**
 * Functions Lord
 * 
 * @package tstarter
 */
defined( 'ABSPATH' ) || exit;

$includes = array (
    'constants.php',                // Theme Constant 
    'setup.php',                    // Theme Setup
    'extra_func.php',               // Funcs Support Function
    'menu.php',                     // Custom Menu Walker
    'category.php',                 // Custom Category Walker
    'sidebar.php',                  // Custom Vertical Menu Walker
    'hooks.php',                    // Main Hooks 
    'enqueue.php',                  // Register resources
    'ajax.php',                     // Handler Ajax request
    'customizer.php',               // Add more Customizer
    'cpt.php',                      // Custom Post Type
    'widgets.php',                  // Register Widgets
    'admin/function-admin.php',     // Setup Admin functions
    'init-template.php'             // Theme Template ( include template func and hooks )
);

foreach ( $includes as $file ) {
    $pre_path = trailingslashit( locate_template( 'inc') );
    $file_path = $pre_path . $file;
    if ( ! $file_path ) {
        // generates user-lv err/notice/warning mess
        trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
    }

    require_once $file_path;
}