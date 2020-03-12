<?php
/**
 *  Preload functions 
 * 
 * @package  tstarter/inc/admin/redux-framework/functions
 * 
 */

if (!function_exists('t_apply_preload')) {
    function t_apply_preload()
    {
        global $t_options;

        if( isset( $t_options['t_preload'] ) && $t_options['t_preload'] == '1' ) {
            $scrollup = true;
        } else {
            $scrollup = false;
        }

        return $scrollup;
    }
}