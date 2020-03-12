<?php
$header_options = apply_filters('huutien_header_option_args', array(
    'icon' => 'el el-caret-up',
    'title' => esc_html__('Giao diện Header', 'understrap'),
    'fields' => array(
        array(
            'id' => 't-header-layout',
            'type' => 'select',
            'title' => esc_html__('Bố cục Header', 'understrap'),
            'subtitle' => esc_html__('Bố cục Header', 'understrap'),
            'desc' => esc_html__('Bố cục Header : chọn loại bố cục Sticky Header cho website.', 'understrap'),
            'options'  => array(
                'sticky-none'   => 'No sticky',
                'sticky-top'    => 'Sticky header top',
                'sticky-bottom' => 'Sticky header bottom'
            ),
            'placeholder' => esc_html__( 'Chọn loại bố cục.' ),
            'default' => 'sticky-topbar'
        )
    )
));
