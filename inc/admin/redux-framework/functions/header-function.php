<?php
if (!function_exists('huutien_apply_header_style')) {
    function huutien_apply_header_style()
    {
        global $huutien_options;

        if ( ! isset( $huutien_options['tm-header-layout'] ) ) {
            $huutien_options['tm-header-layout'] = 'sticky-topbar';
        } 

        if ( $huutien_options['tm-header-layout'] != 'sticky-topbar' ) {
            $result = $huutien_options['tm-header-layout'];
        } else {
            $result = $huutien_options['tm-header-layout'];
        }
        
        return $result;
    }
}
