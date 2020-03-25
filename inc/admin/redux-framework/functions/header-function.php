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

if (!function_exists('t_apply_shipping1')) {
    function t_apply_shipping1( $shipping1 ){
        global $t_options;

        if( isset( $t_options['t_header_info_shipping_1'] ) ) {
			$shipping1 = $t_options['t_header_info_shipping_1'];
		}

        return $shipping1;
    }
}

if (!function_exists('t_apply_shipping2')) {
    function t_apply_shipping2( $shipping2 ){
        global $t_options;

        if( isset( $t_options['t_header_info_shipping_2'] ) ) {
			$shipping2 = $t_options['t_header_info_shipping_2'];
		}

        return $shipping2;
    }
}

if (!function_exists('t_apply_contact1')) {
    function t_apply_contact1( $contact1 ){
        global $t_options;

        if( isset( $t_options['t_header_info_contact_1'] ) ) {
			$contact1 = $t_options['t_header_info_contact_1'];
		}

        return $contact1;
    }
}

if (!function_exists('t_apply_contact2')) {
    function t_apply_contact2( $contact2 ){
        global $t_options;

        if( isset( $t_options['t_header_info_contact_2'] ) ) {
			$contact2 = $t_options['t_header_info_contact_2'];
		}

        return $contact2;
    }
}
