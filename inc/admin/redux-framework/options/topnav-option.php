<?php

$topnav_options = apply_filters('huutien_header_topnav_options_args', array(
    'title'      => esc_html__('Cài đặt Top Navigation', 'understrap'),
    'id'         => 'side-navigation-styling',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'is-info-topbar',
            'type'     => 'switch',
            'title'    => esc_html__('Tắt/mở phần thông tin trên Top Header', 'understrap'),
            'subtitle' => esc_html__('Phần thông tin nằm mặc định bên trái Top Header', 'understrap'),
            'default'  => true,
        ),
        array(
            'id'       => 'is-phone-topbar',
            'type'     => 'switch',
            'title'    => esc_html__('Tắt/mở phần số điện thoại trên Top Header', 'understrap'),
            'subtitle' => esc_html__('Phần số điện thoại nằm mặc định bên trái Top Header', 'understrap'),
            'default'  => true,
        ),
        array(
            'id' => 'info-topbar',
            'type' => 'editor',
            'title' => esc_html__('Nhập phần thông tin trên Top Header', 'understrap'),
            'subtitle' => esc_html__('Ví dụ: info@company.com', 'understrap'),
            'default' => '',
        ),
        array(
            'id' => 'phone-topbar',
            'type' => 'editor',
            'title' => esc_html__('Nhập phần số điện thoại trên Top Header', 'understrap'),
            'subtitle' => esc_html__('Ví dụ: 071234567', 'understrap'),
            'default' => '',
        ),
        array(
            'id'       => 'is-account-topbar',
            'type'     => 'switch',
            'title'    => esc_html__('Tắt/mở tài khoản trên Top Header', 'understrap'),
            'subtitle' => esc_html__('Phần tài khoản nằm mặc định bên phải Top Header', 'understrap'),
            'default'  => true,
        ),
        array(
            'id'       => 'is-checkout-topbar',
            'type'     => 'switch',
            'title'    => esc_html__('Tắt/mở thanh toán trên Top Header', 'understrap'),
            'subtitle' => esc_html__('Phần thanh toán nằm mặc định bên phải Top Header', 'understrap'),
            'default'  => true,
        ),
        array(
            'id'       => 'is-login-register-topbar',
            'type'     => 'switch',
            'title'    => esc_html__('Tắt/mở đăng nhập/đăng ký trên Top Header', 'understrap'),
            'subtitle' => esc_html__('Phần đăng nhập/ đăng ký nằm mặc định bên phải Top Header', 'understrap'),
            'default'  => true,
        ),
    ),
));
