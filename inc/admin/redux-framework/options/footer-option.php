<?php 
    /**
     * Footer Options
     * 
     * ! How can i use this suck font, when cant CDN, get component bla bla ....bored
     * @package tstarter/inc/admin/redux-framework/options
     */

$footer_options = apply_filters('t_footer_options_args', array(
    'title'        => esc_html__('Footer', 'understrap'),
    'icon'         => 'el el-home',
    'fields'       => array(
        array(
            'id'            => 't_caption_address_footer',
            'type'          => 'text',
            'title'         => esc_html__('Caption for address', THEME_DOMAIN),
            'subtitle'      => esc_html__('Ex: Contact Us', THEME_DOMAIN)
        ),
        // array(
        //     'id'            => 't_icon_select_footer_v1',
        //     'type'          => 'select',
        //     'title'         => esc_html__('Icon select v1', THEME_DOMAIN),
        //     'subtitle'      => esc_html__('Select an icon.', THEME_DOMAIN),
        //     'data'          => 'elusive-icons'
        // ),
        array(
            'id'            => 't_text_address_footer_v1',
            'type'          => 'text',
            'title'         => esc_html__('Address', THEME_DOMAIN),
            'subtitle'      => esc_html__('Ex: 60, 29th Street, San Francisco, CA 94110, United States of America', THEME_DOMAIN)
        ),
        // array(
        //     'id'            => 't_icon_select_footer_v2',
        //     'type'          => 'select',
        //     'title'         => esc_html__('Icon select v2', THEME_DOMAIN),
        //     'subtitle'      => esc_html__('Select an icon.', THEME_DOMAIN),
        //     'data'          => 'elusive-icons'
        // ),
        array(
            'id'            => 't_text_address_footer_v2',
            'type'          => 'text',
            'title'         => esc_html__('Phone', THEME_DOMAIN),
            'subtitle'      => esc_html__('(+00) 123-456-789', THEME_DOMAIN)
        ),
        // array(
        //     'id'            => 't_icon_select_footer_v3',
        //     'type'          => 'select',
        //     'title'         => esc_html__('Icon select v3', THEME_DOMAIN),
        //     'subtitle'      => esc_html__('Select an icon.', THEME_DOMAIN),
        //     'data'          => 'elusive-icons'
        // ),
        array(
            'id'            => 't_text_address_footer_v3',
            'type'          => 'text',
            'title'         => esc_html__('Mail', THEME_DOMAIN),
            'subtitle'      => esc_html__('demo@example.com', THEME_DOMAIN)
        ),
        array(
            'id'            => 't_text_copyright_footer',
            'type'          => 'text',
            'title'         => esc_html__('Copyright', THEME_DOMAIN),
            'subtitle'      => esc_html__('Copyright © 2019 Tstarter ', THEME_DOMAIN)
        ),
        array(
            'id'            => 't_media_payment_footer',
            'type'          => 'media',
            'url'           => true,
            'title'         => esc_html__('Footer payment image ', THEME_DOMAIN),
            'compiler'      => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc'          => esc_html__('Set payment image footer', THEME_DOMAIN),
            'default'       => array('url' => get_template_directory_uri().'/images/logo.png'),                     
        )         
    )
));
