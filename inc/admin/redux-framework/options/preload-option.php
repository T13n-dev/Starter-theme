<?php
$preload_options = apply_filters('huutien_preload_options_args', array(
    'icon' => ' el-icon-repeat',
    'title' => esc_html__('Preload Settings', 'understrap'),
    'fields' => array(
        array(
            'id'       => 'preload-switch',
            'type'     => 'switch',
            'title'    => esc_html__('Preload Off?', 'understrap'),
            'subtitle' => esc_html__('Look, it\'s on!', 'understrap'),
            'default'  => true,
        ),
        array(
            'id' => 'preload-text-color',
            'type' => 'color',
            'title' => esc_html__('Preload Text Color', 'understrap'),
            'subtitle' => esc_html__('Pick the preload text color (default: #111111).', 'understrap'),
            'default' => '#111111',
            'validate' => 'color',
        ),
        array(
            'id' => 'preload-background-color',
            'type' => 'color',
            'title' => esc_html__('Preload Background Color', 'understrap'),
            'subtitle' => esc_html__('Pick the preload background color (default: #000000).', 'understrap'),
            'default' => '#000000',
            'validate' => 'color',
        ),
    )
));
