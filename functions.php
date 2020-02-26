<?php 
/**
 * T Starter functions and definitions
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
    'admin/function-admin.php'
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