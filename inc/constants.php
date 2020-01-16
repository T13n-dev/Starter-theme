<?php  

defined( 'INCLUDE_DIR' ) ? null : define( 'INCLUDE_DIR', trailingslashit( get_template_directory() ) );
defined( 'LANG_DIR' ) ? null : define( 'LANG_DIR', 
trailingslashit( WP_LANG_DIR ) );

$theme = wp_get_theme();

defined( 'THEME_NAME' ) ? null : define( 'THEME_NAME', $theme->get( 'Name' ) );
defined( 'THEME_DOMAIN' ) ? null : define( 'THEME_DOMAIN', $theme->get( 'TextDomain' ) );
defined( 'THEME_VERSION' ) ? null : define( 'THEME_VERSION', $theme->get( 'Version' ) );