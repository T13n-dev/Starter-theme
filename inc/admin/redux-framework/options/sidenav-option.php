<?php

$sidenav_options = apply_filters('huutien_header_sidenav_options_args', array(
    'title'      => esc_html__('Header Side Navigation', 'understrap'),
    'id'         => 'side-navigation-styling',
    'subsection' => true,
    'fields'     => array(
        array(
            'id' => 'header-border-color',
            'type' => 'color',
            'title' => esc_html__('Header Border Menu Item Color', 'understrap'),
            'subtitle' => esc_html__('Use for Header Side Navigation(default: #1b1b1b).', 'understrap'),
            'default' => '#1b1b1b',
            'validate' => 'color',
        ),
        array(
            'id' => 'sidenav_contactinfo_extend',
            'type' => 'editor',
            'title' => esc_html__('Add your contact info extend on bottom header.', 'understrap'),
            'subtitle' => esc_html__('Add your contact info html code here.', 'understrap'),
            'default' => '',
        ),
    ),
));
