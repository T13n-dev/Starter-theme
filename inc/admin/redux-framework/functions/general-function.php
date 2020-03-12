<?php
/**
 *  General functions 
 * 
 * @package  tstarter/inc/admin/redux-framework/functions
 * 
 */

if (!function_exists('t_apply_scroll_to_top')) {
    function t_apply_scroll_to_top()
    {
        global $t_options;

        if( isset( $t_options['t_scroll_to_top'] ) && $t_options['t_scroll_to_top'] == '1' ) {
            $scrollup = true;
        } else {
            $scrollup = false;
        }

        return $scrollup;
    }
}