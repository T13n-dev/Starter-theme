<?php
$header_options = apply_filters('huutien_header_option_args', array(
    'icon' => 'el el-caret-up',
    'title' => esc_html__('Giao diện Header', THEME_DOMAIN),
    'fields' => array(
        array(
            'id' => 't-header-layout',
            'type' => 'select',
            'title' => esc_html__('Bố cục Header', THEME_DOMAIN ),
            'subtitle' => esc_html__('Bố cục Header', THEME_DOMAIN ),
            'desc' => esc_html__('Bố cục Header : chọn loại bố cục Sticky Header cho website.', 'understrap'),
            'options'  => array(
                'sticky-none'   => 'No sticky',
                'sticky-top'    => 'Sticky header top',
                'sticky-bottom' => 'Sticky header bottom'
            ),
            'placeholder' => esc_html__( 'Chọn loại bố cục.' ),
            'default' => 'sticky-topbar'
        ),
        array(
			'title'		=> esc_html__( 'Thông tin header', THEME_DOMAIN ),
			'id'		=> 'header_info',
			'type'		=> 'section',
			'indent'	=> true
		),
        array(
            'id' => 't_header_info_shipping_1',
            'type' => 'text',
            'title' => esc_html__('Thêm thông tin vận chuyển 1', THEME_DOMAIN),
            'desc' => esc_html__('Ví dụ: Miễn phí', THEME_DOMAIN),
            'default' => ''
        ),
        array(
            'id' => 't_header_info_shipping_2',
            'type' => 'text',
            'title' => esc_html__('Thêm thông tin vận chuyển 2', THEME_DOMAIN),
            'desc' => esc_html__('Ví dụ: Vận chuyển', THEME_DOMAIN),
            'default' => ''
        ),
        array(
            'id' => 't_header_info_contact_1',
            'type' => 'text',
            'title' => esc_html__('Thêm thông tin liên hệ 1', THEME_DOMAIN),
            'desc' => esc_html__('Ví dụ: Tư vấn', THEME_DOMAIN),
            'default' => ''
        ),
        array(
            'id' => 't_header_info_contact_2',
            'type' => 'text',
            'title' => esc_html__('Thêm thông tin liên hệ 2', THEME_DOMAIN),
            'desc' => esc_html__('Ví dụ: 070 7768 350', THEME_DOMAIN),
            'default' => ''
        )
    )
));
