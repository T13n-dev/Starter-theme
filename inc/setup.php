<?php 
/**
 * Theme setup
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( !isset($content_width) ) {
    $content_width = 1170; // pixels
}

if( !function_exists( 'setup' ) ) {
	function setup() {
		// load textdomain
		set_theme_textdomain();
		// declare theme support
		declare_theme_support();
	}
}

/**
 * Load localization files
 */
if( !function_exists( 'set_theme_textdomain' ) )  {
	function set_theme_textdomain() {
		// wp-content/languages/themes/
		// load_theme_textdomain( THEME_DOMAIN, trailingslashit( WP_LANG_DIR ) . 'themes/' );
		// wp-content/themes/[name]/languages/
		load_theme_textdomain( THEME_DOMAIN,  LANG_DIR . '/languages' );
	}
}

/**
 * Declares theme supports
 */
if( !function_exists( 'declare_theme_support' ) ) {
    function declare_theme_support() {
		/** 
		 * Feed Links
		 * https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
		 */
		add_theme_support( 'automatic-feed-links' );
		
        /** 
		 * Title Tag 
		 * https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
		 */
		add_theme_support( 'title-tag' );

        /** 
		 * Post Thumbnails
		 * https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * HTML5 
		 * https://developer.wordpress.org/reference/functions/add_theme_support/#html5 
		 */
        add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );
		
        /** 
		 * Post Formats
		 * https://developer.wordpress.org/reference/functions/add_theme_support/#post-formats
		 */
        add_theme_support( 'post-formats', array(
			'image',
			'gallery',
			'video',
			'audio',
			'quote',
			'link',
			'aside',
			'status'
		) );

		/**
		 * Custom Background
		 * https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
		 */
		add_theme_support( 'custom-background', apply_filters(
			'custom_background_args', array (
				'default-color' => 'fcfcfc',
				'default-image' => ''
		) ) );

		/**
		 * Custom Logo
		 * https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
		 */
		add_theme_support( 'custom-logo' );

		/**
		 * Responsive embedded content
		 * https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content
		 */
		add_theme_support( 'responsive-embeds' );
		
		// ! default theme options   
	}
}

add_filter( 'excepts_more', 'custom_excerpt_more' );

if ( !function_exists('custom_excerpt_more') ) {
	function custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'custom_all_excerpts_get_more_link' );

if ( !function_exists( 'custom_all_excerpts_get_more_link' ) ) {
	function custom_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' [...]<p><a class="btn btn-secondary understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More...',
			'understrap' ) . '</a></p>';
		}
		return $post_excerpt;
	}
}

// This theme uses wp_nav_menu() in one location.
register_nav_menus( 
	array(
		'primary' => __( 'Primary Menu', THEME_DOMAIN ),	
		'sidebar' => __( 'Sidebar Menu', THEME_DOMAIN ),
		'mobile'  => __( 'Mobile Menu', THEME_DOMAIN )
	) 
);

