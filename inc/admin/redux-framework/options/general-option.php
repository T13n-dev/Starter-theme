<?php
$general_options = apply_filters('huutien_general_options_args', array(
    'title'        => esc_html__('General', 'understrap'),
    'icon'        => 'el el-home',
    'fields'    => array(
        array(
            'title'        => esc_html__('Scroll To Top', 'understrap'),
            'id'        => 'scrollup',
            'type'        => 'switch',
            'on'        => esc_html__('Enabled', 'understrap'),
            'off'        => esc_html__('Disabled', 'understrap'),
            'default'    => 1,
        ),
        array(
            'title'        => esc_html__('Register Image Size', 'understrap'),
            'subtitle'    => esc_html__('Enable and regenerate thumbnails to enable theme registered image sizes.', 'understrap'),
            'id'        => 'reg_image_size',
            'type'        => 'switch',
            'on'        => esc_html__('Enabled', 'understrap'),
            'off'        => esc_html__('Disabled', 'understrap'),
            'default'    => 0,
        ),
        array(
            'id'        => 'sidebar_margin_top',
            'type'        => 'text',
            'title'        => esc_html__('Home v2 Sidebar Margin Top', 'understrap'),
            'subtitle'    => esc_html__('Values in Pixels', 'understrap'),
            'default'    => esc_html__('268', 'understrap'),
        ),
    )
));
