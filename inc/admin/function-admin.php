<?php 
    /**
     * Theme Options
     */

function add_admin_page() {
    // admin menu 
    add_menu_page( 'Theme Options', 'Theme Options', 'manage_options', 'theme_options', 'func_admin_setting', '
    dashicons-admin-generic', 110 );

    // admin sub menu
    add_submenu_page( 'theme_options', 'Theme Options', 'Sidebar', 'manage_options', 'theme_options', 'func_admin_setting' );
    add_submenu_page( 'theme_options', 'Theme Options', 'Theme Options', 'manage_options', 'theme_options_plugin_required', 'func_required_plugins' );
}

add_action( 'admin_menu', 'add_admin_page' );
add_action( 'admin_init', 'custom_settings' );

function custom_settings() {

    

}

// template pages
function func_admin_setting() {
    echo 'admin tmp';
}

function func_required_plugins() {
    echo 'required plugin';
}