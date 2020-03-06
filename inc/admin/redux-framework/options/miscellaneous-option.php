<?php
$miscellaneous_options = apply_filters('huutien_miscellaneous_options_args', array(
    'icon' => ' el-icon-stackoverflow',
    'title' => esc_html__('Miscellaneous Settings', 'understrap'),
    'fields' => array(
        array(
            'id'       => 'animate-switch',
            'type'     => 'switch',
            'title'    => esc_html__('Animation Off?', 'understrap'),
            'subtitle' => esc_html__('Look, it\'s on!', 'understrap'),
            'default'  => true,
        ),
        array(
            'id'       => 'animate-mobile-switch',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Animation on Mobile?', 'understrap'),
            'subtitle' => esc_html__('Look, it\'s on!', 'understrap'),
            'default'  => true,
        ),
        array(
            'id' => 'animation_mobile_screen_size',
            'type' => 'text',
            'title' => esc_html__('Mobile screen size for animation', 'understrap'),
            'subtitle' => esc_html__('Animation will not active from screen size how much go down?', 'understrap'),
            'desc' => esc_html__('Set Mobile Screen Size: 480, 768, 980, etc...', 'understrap'),
            'default' => ''
        ),
        array(
            'id'       => 'footer-landing',
            'type'     => 'switch',
            'title'    => esc_html__('Footer Widget Landing Page On?', 'understrap'),
            'subtitle' => esc_html__('Look, it\'s off!', 'understrap'),
            'default'  => false,
        ),
        array(
            'id' => 'gmap_api',
            'type' => 'text',
            'title' => esc_html__('Google Map API Key', 'understrap'),
            'subtitle' => esc_html__('Add your Google map api key', 'understrap'),
            'desc' => esc_html__('Create your Gmap API key here: https://developers.google.com/maps/documentation/javascript/', 'understrap'),
            'default' => 'AIzaSyDZJDaC3vVJjxIi2QHgdctp3Acq8UR2Fgk'
        ),
    )
));
