<?php

defined('ABSPATH') || exit;

/**
 * Enqueue scripts and styles
 */

if (!function_exists('t_register_scripts')) {
    function t_register_scripts()
    {
        $css_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'css/main.min.css');
        wp_enqueue_style('main-styles', INCLUDE_DIR_URI . 'css/main.min.css', array(), $css_version);
    
        $js_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'js/navigation.js');
        wp_enqueue_script('main-script', INCLUDE_DIR_URI . 'js/navigation.js', array(), $js_version, true);
    }
}
add_action('wp_enqueue_scripts', 't_register_scripts');

/**
 * Enqueue scripts and styles admin.
 */

if (!function_exists('t_register_admin_scripts')) {
    function t_register_admin_scripts($hook)
    {
        if ( $hook == 'nav-menus.php' ) {
            $css_admin_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'css/admin.css' );
            wp_register_style('menu-style', INCLUDE_DIR_URI . 'css/admin.css', array(), $css_admin_version, 'all');
            wp_enqueue_style('menu-style');

            $js_admin_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'js/admin.js');
            wp_register_script('menu-script', INCLUDE_DIR_URI . 'js/admin.js', array('jquery'), $js_admin_version, true);
            wp_enqueue_script('menu-script');    
        }
    }
}
add_action('admin_enqueue_scripts', 't_register_admin_scripts');
