<?php 
/**
 * Theme setup
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( !isset($content_width) ) {
    $content_width = 1170; // pixels
}

add_action( 'after_setup_theme', 'setup' );

if ( !function_exists( 'setup' ) ) {
    function setup() {

        // wp-content/languages/themes/
        // load_theme_textdomain( THEME_DOMAIN, trailingslashit( WP_LANG_DIR ) . 'themes/' );
        // wp-content/themes/[name]/languages/
		load_theme_textdomain( THEME_DOMAIN,  LANG_DIR . '/languages' );

        add_theme_support( 'automatic-feed-links' );
        
		add_theme_support( 'title-tag' );
        
		add_theme_support( 'post-thumbnails' );

        add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
        ) );
        
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

		// custom background 

		// custom logo

		// responsive embeds 

		// register nav menus

		// menus 

		// side bar

		// widgets

		// tgma :D bla bla
		
		// ! default theme options   
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


}