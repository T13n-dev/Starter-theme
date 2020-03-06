<?php 
    /**
     * Theme Options
     */

function add_admin_page() {
    // admin menu 
    add_menu_page( 'Theme Options', 'Theme Options', 'manage_options', 'theme_options', 'func_admin_setting', '
    dashicons-admin-generic', 3 );

    // admin sub menu
    add_submenu_page( 'theme_options', 'Theme Options', 'Theme Options', 'manage_options', 'theme_options', 'func_admin_setting' );
    add_submenu_page( 'theme_options', 'Theme Options', 'Sliders', 'manage_options', 'edit.php?post_type=cpt-slider');
}

add_action( 'admin_menu', 'add_admin_page' );
add_action( 'admin_init', 'custom_settings' );

function custom_settings() {

    
}

// template pages
function func_admin_setting() {
    echo 'admin tmp';
}
