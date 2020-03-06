<?php 
$typography_options = apply_filters( 'huutien_typography_option_args', array(
    'icon' => 'el-icon-font',
    'title' => esc_html__('Typography', 'understrap'),
    'fields' => array(
        array(
            'id' => 'h1-typography',
            'type' => 'typography',
            'output' => array('h1'),
            'title' => esc_html__('Heading 1', 'understrap'),
            'subtitle' => esc_html__('Specify the heading 1 font properties.', 'understrap'),
            'google' => true,
            'default' => array(
                'color'       => '', 
                'font-style'  => '', 
                'font-family' => '',
                'font-size'   => '', 
                'line-height' => ''
            ),
        ),   
        array(
            'id' => 'h2-typography',
            'type' => 'typography',
            'output' => array('h2'),
            'title' => esc_html__('Heading 2', 'understrap'),
            'subtitle' => esc_html__('Specify the heading 2 font properties.', 'understrap'),
            'google' => true,
            'default' => array(
                'color'       => '', 
                'font-style'  => '', 
                'font-family' => '',
                'font-size'   => '', 
                'line-height' => ''
            ),
        ), 
        array(
            'id' => 'h3-typography',
            'type' => 'typography',
            'output' => array('h3'),
            'title' => esc_html__('Heading 3', 'understrap'),
            'subtitle' => esc_html__('Specify the heading 3 font properties.', 'understrap'),
            'google' => true,
            'default' => array(
                'color'       => '', 
                'font-style'  => '', 
                'font-family' => '',
                'font-size'   => '', 
                'line-height' => ''
            ),
        ), 
        array(
            'id' => 'h4-typography',
            'type' => 'typography',
            'output' => array('h4'),
            'title' => esc_html__('Heading 4', 'understrap'),
            'subtitle' => esc_html__('Specify the heading 4 font properties.', 'understrap'),
            'google' => true,
            'default' => array(
                'color'       => '', 
                'font-style'  => '', 
                'font-family' => '',
                'font-size'   => '', 
                'line-height' => ''
            ),
        ), 
        array(
            'id' => 'h5-typography',
            'type' => 'typography',
            'output' => array('h5'),
            'title' => esc_html__('Heading 5', 'understrap'),
            'subtitle' => esc_html__('Specify the heading 5 font properties.', 'understrap'),
            'google' => true,
            'default' => array(
                'color'       => '', 
                'font-style'  => '', 
                'font-family' => '',
                'font-size'   => '', 
                'line-height' => ''
            ),
        ), 
        array(
            'id' => 'h6-typography',
            'type' => 'typography',
            'output' => array('h6'),
            'title' => esc_html__('Heading 6', 'understrap'),
            'subtitle' => esc_html__('Specify the heading 6 font properties.', 'understrap'),
            'google' => true,
            'default' => array(
                'color'       => '', 
                'font-style'  => '', 
                'font-family' => '',
                'font-size'   => '', 
                'line-height' => ''
            ),
        ),    
        array(
            'id' => 'menu-typography',
            'type' => 'typography',
            'output' => array('#mainmenu a, .mainmenu li a'),
            'title' => esc_html__('Menu item', 'understrap'),
            'subtitle' => esc_html__('Specify the Menu item font properties.', 'understrap'),
            'google' => true,
            'default' => array(
                'color'       => '', 
                'font-style'  => '', 
                'font-family' => '',
                'font-size'   => '', 
                'line-height' => '',
            ),
        ),                                   
    )
) );