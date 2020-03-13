<?php
$preload_options = apply_filters('huutien_preload_options_args', array(
    'icon' => ' el-icon-repeat',
    'title' => esc_html__('Thiết lập Preload', THEME_DOMAIN),
    'fields' => array(
        array(
            'id'       => 't_preload',
            'type'     => 'switch',
            'title'    => esc_html__('Tắt Preload?', THEME_DOMAIN),
            'subtitle' => esc_html__('Mở nó lên!', THEME_DOMAIN),
            'on'       => esc_html__('Bật', THEME_DOMAIN),
            'off'      => esc_html__('Tắt', THEME_DOMAIN),
            'default'  => true,
        )
    )
));