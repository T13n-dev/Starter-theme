<?php
/**
 * Footer Options
 * 
 * @package tstarter/inc/admin/redux-framework/options
 */

$general_options = apply_filters('huutien_general_options_args', array(
    'title'        => esc_html__('General', 'understrap'),
    'icon'        => 'el el-home',
    'fields'    => array(
        array(
            'title'        => esc_html__('Scroll To Top', THEME_DOMAIN),
            'id'        => 't_scroll_to_top',
            'type'        => 'switch',
            'on'        => esc_html__('Enabled', 'understrap'),
            'off'        => esc_html__('Disabled', 'understrap'),
            'default'    => 1,
        )
    )
));