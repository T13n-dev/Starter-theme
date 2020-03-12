<?php

if (!class_exists('ReduxFramework')) {
    return;
}

if (!class_exists('T_ReduxOptions')) {
    class T_ReduxOptions
    {
        public function __construct()
        {
            $this->load_config();
        }

        public function load_config()
        {
            $options = array( 'general', 'miscellaneous', 'preload', 'branding', 'sidenav', 'typography', 'social', 'search', 'footer' );

            $options_dir = INCLUDE_DIR . 'inc/admin/redux-framework/options';

            foreach ($options as $option) {
                require_once $options_dir . '/' . $option . '-option.php';
            }

            $sections     = apply_filters('redux_options_sections_args', array( $general_options, $miscellaneous_options, $preload_options, $branding_options, $sidenav_options, $typography_options, $social_options, $search_options, $footer_options ) );
            $theme         = wp_get_theme();
            $args         = array(
                'opt_name'              => 't_options',
                'display_name'          => $theme->get('Name'),
                'display_version'       => $theme->get('Version'),
                'admin_bar'             => false,
                'allow_sub_menu'        => false,
                'menu_type'             => 'submenu',
                'google_api_key'        => '',
                'page_slug'             => 'main_options',
                'intro_text'            => '',
                'dev_mode'              => false,
                'customizer'            => true,
                'show_import_export'    => false,
                'footer_credit'         => '&nbsp;',
                'show_options_object'   => false
            );
            
            $ReduxFramework = new ReduxFramework($sections, $args);
        }
    }

    new T_ReduxOptions();
}

if (!array_key_exists('t_options', $GLOBALS)) {
    $GLOBALS['t_options'] = get_option('t_options', array());
}
