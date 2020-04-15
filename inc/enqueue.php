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

        $js_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'js/main.js');
        wp_enqueue_script('main-script', INCLUDE_DIR_URI . 'js/main.js', array(), $js_version, true);

        wp_localize_script('main-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
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
            $css_menu_admin_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'css/admin-menu.css' );
            wp_register_style('menu-style', INCLUDE_DIR_URI . 'css/admin-menu.css', array(), $css_menu_admin_version, 'all');
            wp_enqueue_style('menu-style');

            $js_admin_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'js/admin-menu.js');
            wp_register_script('menu-script', INCLUDE_DIR_URI . 'js/admin-menu.js', array('jquery'), $js_admin_version, true);
            wp_enqueue_script('menu-script');
        }

        // silder admin [cpt]
        if (isset($_GET['post'])) {
            $post = get_post($_GET['post']);

            if ($post->post_type == 'cpt-slider' && $hook == 'post.php') {
                $css_slider_admin_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'css/admin-slider.css' );
                wp_register_style('slider-style', INCLUDE_DIR_URI . 'css/admin-slider.css', array(), $css_slider_admin_version , 'all');
                wp_enqueue_style('slider-style');

                wp_enqueue_media();

                $js_slider_admin_version = THEME_VERSION . '.' . filemtime(INCLUDE_DIR . 'js/admin-slider.js');
                wp_register_script('slider-script', INCLUDE_DIR_URI . 'js/admin-slider.js', array('jquery'), $js_slider_admin_version , true);
                wp_enqueue_script('slider-script');

                wp_localize_script('slider-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
            }
        }
    }
}
add_action('admin_enqueue_scripts', 't_register_admin_scripts');
