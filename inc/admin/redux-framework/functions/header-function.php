<?php

/**
 * 
 * Header funcition
 * 
 *  @package  tstarter/inc/admin/redux-framework/functions
 */

if (!function_exists('t_apply_header_sticky')) {
    function t_apply_header_sticky()
    {
        global $t_options;

        if ( isset( $t_options['t-header-layout'] ) && $t_options['t-header-layout'] == 'sticky-bottom' ) {
           $result = 2;
        }  else if ( isset( $t_options['t-header-layout'] ) && $t_options['t-header-layout'] == 'sticky-top' ) {
            $result = 1;
        } else {
            $result = 3;
        }

        return $result;
    }
}