<?php 
/**
 * Functions and definitions
 * 
 * @package tstarter
 */
defined( 'ABSPATH' ) || exit;

$includes = array (
    'constants.php',
    'setup.php',
    'menu.php',
    'sidebar.php',
    'hooks.php',
    'enqueue.php',
    'ajax.php',
    'customizer.php',
    'admin/function-admin.php', // setup admin functions
    'init-template.php' // setup theme template
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