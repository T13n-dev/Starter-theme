<?php 
$search_options = apply_filters( 'huutien' , array(
    'icon' => 'el el-search',
    'title' => esc_html__( 'Search', 'understrap' ),
    'fields' => array (
        array (
            'title' => esc_html__( 'Turn on to active Search Ajax', 'understrap' ),
            'id' => 'active_search',
            'type' => 'switch',
            'on' => esc_html__( 'On', 'understrap' ),
            'off' => esc_html__( 'Off', 'understrap' ),
            'default' => 1,
        ),
        array (
            'title' => esc_html__( '* Testing Active Update JSON data', 'understrap' ),
            'id' => 'update_json_search',
            'type' => 'switch',
            'on' => esc_html__( 'On', 'understrap' ),
            'off' => esc_html__( 'Off', 'understrap' ),
            'default' =>  1,
        ), 
        array (
            'title' => esc_html__( '* Testing Auto Sync Update JSON', 'understrap' ),
            'id' => 'sync_update_json',
            'type' => 'switch',
            'on' => esc_html__( 'On', 'understrap' ),
            'off' => esc_html__( 'Off', 'understrap' ),
            'default' => 1,
        )
    )
) );