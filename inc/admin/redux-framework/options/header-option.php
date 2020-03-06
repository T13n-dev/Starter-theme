<?php
$header_options = apply_filters('huutien_header_option_args', array(
    'icon' => 'el el-caret-up',
    'title' => esc_html__('Giao diện Header', 'understrap'),
    'fields' => array(
        array(
            'id' => 'tm-header-layout',
            'type' => 'select',
            'title' => esc_html__('Bố cục Header', 'understrap'),
            'subtitle' => esc_html__('Bố cục Header', 'understrap'),
            'desc' => esc_html__('Bố cục Header : chọn loại bố cục Sticky Header cho website.', 'understrap'),
            'options'  => array(
                'sticky-topbar' => 'Sticky Topbar',
                'sticky-nav' => 'Sticky Navigation',
                'sticky-middle' => 'Sticky Middle and Navigation',
            ),
            'placeholder' => esc_html__( 'Chọn loại bố cục.' ),
            'default' => 'sticky-topbar'
        ),
        array(
            'id' => 'top-header-background-color',
            'type' => 'color',
            'title' => esc_html__('Chọn màu cho thanh Top Header', 'understrap'),
            'subtitle' => esc_html__('Chọn một màu cho thanh Top Header ( mặc định: #ed1b24 ), bạn phải đảm bảo rằng website hiện đang có thanh Top Header.', 'understrap'),
            'default' => '#ed1b24',
            'validate' => 'color',
        ),
        array(
            'id' => 'middle-header-background-color',
            'type' => 'color',
            'title' => esc_html__('Chọn màu cho thanh Middle Header', 'understrap'),
            'subtitle' => esc_html__('Chọn một màu cho thanh Middle Header ( mặc định: #ffffff ).', 'understrap'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'nav-header-background-color',
            'type' => 'color',
            'title' => esc_html__('Chọn màu cho thanh thanh Menu chính', 'understrap'),
            'subtitle' => esc_html__('Chọn một màu cho thanh thanh Menu chính ( mặc định: #ed1b24 ).', 'understrap'),
            'default' => '#ed1b24',
            'validate' => 'color',
        ),
        array(
            'id' => 'top-header-text-color',
            'type' => 'color',
            'title' => esc_html__('Chọn màu chữ cho Top Header', 'understrap'),
            'subtitle' => esc_html__('Chọn màu chữ cho Top Header ( mặc định: #ffffff).', 'understrap'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'middle-header-text-color',
            'type' => 'color',
            'title' => esc_html__('Chọn màu chữ cho Middle Header', 'understrap'),
            'subtitle' => esc_html__('Chọn màu chữ cho Middle Header ( mặc định: #ffffff).', 'understrap'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'nav-header-text-color',
            'type' => 'color',
            'title' => esc_html__('Chọn màu chữ cho thanh Header', 'understrap'),
            'subtitle' => esc_html__('Chọn màu chữ cho thanh Header ( mặc định: #ffffff).', 'understrap'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id'       => 'desktop-sticky',
            'type'     => 'switch',
            'title'    => esc_html__('Màn hình máy tính Header Sticky tắt?', 'understrap'),
            'subtitle' => esc_html__('Nhìn, nó đang mở!', 'understrap'),
            'default'  => true,
        ),
        array(
            'id'       => 'mobile-sticky',
            'type'     => 'switch',
            'title'    => esc_html__('Màn hình điện thoại Header Sticky mở?', 'understrap'),
            'subtitle' => esc_html__('Nhìn, nó đang tắt!', 'understrap'),
            'default'  => false,
        ),
    )
));
