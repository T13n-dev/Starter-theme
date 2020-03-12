<?php
$preload_options = apply_filters('huutien_preload_options_args', array(
    'icon' => ' el-icon-repeat',
    'title' => esc_html__('Preload Settings', 'understrap'),
    'fields' => array(
        array(
            'id'       => 't_preload',
            'type'     => 'switch',
            'title'    => esc_html__('Preload Off?', 'understrap'),
            'subtitle' => esc_html__('Look, it\'s on!', 'understrap'),
            'default'  => true,
        )
    )
));
