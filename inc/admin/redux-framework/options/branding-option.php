<?php 
$branding_options = apply_filters('huutien_branding_options_args', array (
    'icon' => ' el-icon-picture',
    'title' => esc_html__('Logo & Favicon Settings', 'understrap'),
    'fields' => array(
        array(
            'id' => 'favicon',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Favicon', 'understrap'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Favicon.', 'understrap'),
            'subtitle' => esc_html__('Favicon', 'understrap'),
           'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),                     
        ),
        array(
            'id' => 'logo',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Logo static on header normal', 'understrap'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('logo for header normal, logo for header side navigation on mobile.', 'understrap'),
            'subtitle' => esc_html__('Logo static', 'understrap'),
           'default' => array('url' => get_template_directory_uri().'/images/logo.png'),                     
        ),
        array(
            'id' => 'logo_scroll',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Logo scroll on header normal', 'understrap'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('logo for header normal when scroll down page and use this logo.', 'understrap'),
            'subtitle' => esc_html__('Logo scroll is empty then will use Logo static to instead', 'understrap'),
           'default' => array('url' => get_template_directory_uri().'/images/logo.png'),                     
        ),    
        array(
            'id' => 'logo_side',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Logo on Header Side Navigation', 'understrap'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('logo for header side navigation on desktop.', 'understrap'),
            'subtitle' => esc_html__('Logo', 'understrap'),
           'default' => array('url' => get_template_directory_uri().'/images/logo-2.png'),                     
        ),                                              
    )
));