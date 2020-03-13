<?php
/**
 * Footer Options
 * 
 * @package tstarter/inc/admin/redux-framework/options
 */

$general_options = apply_filters('t_general_options_args', array(
    'title'        => esc_html__('Cấu hình chung', THEME_DOMAIN),
    'icon'        => 'el el-home',
    'fields'    => array(
        array(
            'title'        => esc_html__('Scroll To Top', THEME_DOMAIN),
            'id'        => 't_scroll_to_top',
            'type'        => 'switch',
            'on'        => esc_html__('Bật', THEME_DOMAIN),
            'off'        => esc_html__('Tắt', THEME_DOMAIN),
            'default'    => 1,
        )
    )
));