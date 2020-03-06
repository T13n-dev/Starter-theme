<?php
$social_options = apply_filters('huutien_social_option_args', array(
    'icon' => 'el-icon-group',
    'title' => esc_html__('Social Settings', 'understrap'),
    'fields' => array(
        array(
            'id' => 'switch_header_social',
            'type' => 'switch',
            'title' => esc_html__('Social on Top Header Off?', 'understrap'),
            'subtitle' => esc_html__('Look, it\'s on!', 'understrap'),
            'desc' => esc_html__('On/Off Social on Header.', 'understrap'),
            'default'  => true,
        ),
        array(
            'id' => 'switch_footer_social',
            'type' => 'switch',
            'title' => esc_html__('Social on Footer Off?', 'understrap'),
            'subtitle' => esc_html__('Look, it\'s on!', 'understrap'),
            'desc' => esc_html__('On/Off Social on Footer.', 'understrap'),
            'default'  => true,
        ),
        array(
            'id' => 'facebook',
            'type' => 'text',
            'title' => esc_html__('Facebook Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => 'https://www.facebook.com/',
        ),
        array(
            'id' => 'google',
            'type' => 'text',
            'title' => esc_html__('Google+ Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => 'https://plus.google.com',
        ),
        array(
            'id' => 'rss',
            'type' => 'text',
            'title' => esc_html__('RSS Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => '#',
        ),
        array(
            'id' => 'twitter',
            'type' => 'text',
            'title' => esc_html__('Twitter Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => 'https://twitter.com/',
        ),
        array(
            'id' => 'github',
            'type' => 'text',
            'title' => esc_html__('Github Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => '#'
        ),
        array(
            'id' => 'youtube',
            'type' => 'text',
            'title' => esc_html__('Youtube Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => '',
        ),
        array(
            'id' => 'linkedin',
            'type' => 'text',
            'title' => esc_html__('Linkedin Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => '',
        ),
        array(
            'id' => 'dribbble',
            'type' => 'text',
            'title' => esc_html__('Dribbble Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => '',
        ),
        array(
            'id' => 'behance',
            'type' => 'text',
            'title' => esc_html__('Behance Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => ''
        ),
        array(
            'id' => 'instagram',
            'type' => 'text',
            'title' => esc_html__('Instagram Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => ''
        ),
        array(
            'id' => 'skype',
            'type' => 'text',
            'title' => esc_html__('Skype Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => ''
        ),
        array(
            'id' => 'pinterest',
            'type' => 'text',
            'title' => esc_html__('pinterest Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => ''
        ),
        array(
            'id' => 'vimeo',
            'type' => 'text',
            'title' => esc_html__('vimeo Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => ''
        ),
        array(
            'id' => 'tumblr',
            'type' => 'text',
            'title' => esc_html__('tumblr Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => ''
        ),
        array(
            'id' => 'soundcloud',
            'type' => 'text',
            'title' => esc_html__('soundcloud Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => ''
        ),
        array(
            'id' => 'lastfm',
            'type' => 'text',
            'title' => esc_html__('lastfm Url', 'understrap'),
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default' => ''
        ),
        array(
            'id' => 'social_extend',
            'type' => 'editor',
            'title' => esc_html__('Add your social extend', 'understrap'),
            'subtitle' => esc_html__('Add your social html code here, if your social network not have on list social above.', 'understrap'),
            'description' => esc_html__('HTML code: <li><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>', 'understrap'),
            'default' => '',
        ),
    )
));
