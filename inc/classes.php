<?php 

/**
 * Additional classes
 * 
 * @package tstarter/inc
 */


if ( !function_exists('t_body_classes') ) {
    function t_body_classes( $classes ) {
       
        // Parameter second `3` is no sticky, `1` is top and `2` is bottom.
        if ( has_filter('t_header_sticky') ) {
            $header_sticky = apply_filters('t_header_sticky', 3);
            if ( $header_sticky == 1 ) {
                $classes[] = 't-header--sticky-top';
            } else if ( $header_sticky == 2) {
                $classes[] = 't-header--sticky-bottom';
            } else {
                $classes[] = '';
            }
        }

        return $classes;
    }
}



