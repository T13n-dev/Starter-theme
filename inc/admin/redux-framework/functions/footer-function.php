<?php

/**
 * Footer functions
 * 
 * @package @package tstarter/inc/admin/redux-framework/functions
 */

if (!function_exists('t_apply_footer_contact_caption')) {
    function t_apply_footer_contact_caption($contact)
    {
        global $t_options;

        if (isset($t_options['t_caption_address_footer'])) {
            $contact = $t_options['t_caption_address_footer'];
        }

        return $contact;
    }
}

if (!function_exists('t_apply_footer_address_v1')) {
    function t_apply_footer_address_v1($address)
    {
        global $t_options;

        if (isset($t_options['t_text_address_footer_v1'])) {
            $address = $t_options['t_text_address_footer_v1'];

            ob_start();
            ?>
                <i class="fas fa-map-marker-alt"></i>
            <?php
            echo esc_html( $address );

            $address = ob_get_clean();
        }

        return $address;
    }
}

if (!function_exists('t_apply_footer_address_v2')) {
    function t_apply_footer_address_v2($address)
    {
        global $t_options;

        if (isset($t_options['t_text_address_footer_v2'])) {
            $address = $t_options['t_text_address_footer_v2'];

            ob_start();
            ?>
                <i class="fas fa-phone-square-alt"></i>
            <?php
            echo esc_html( $address );    

            $address = ob_get_clean();
        }

        return $address;
    }
}

if (!function_exists('t_apply_footer_address_v3')) {
    function t_apply_footer_address_v3($address)
    {
        global $t_options;

        if (isset($t_options['t_text_address_footer_v3'])) {
            $address = $t_options['t_text_address_footer_v3'];

            ob_start();
            ?>
                <i class="fas fa-envelope-open-text"></i>
            <?php
            echo esc_html( $address );

            $address = ob_get_clean();
        }
        return $address;
    }
}

if (!function_exists('t_apply_footer_copyright')) {
    function t_apply_footer_copyright($copyright)
    {
        global $t_options;

        if (isset($t_options['t_text_copyright_footer'])) {
            $copyright = $t_options['t_text_copyright_footer'];
        }

        return $copyright;
    }
}

if (!function_exists('t_apply_footer_payment')) {
    function t_apply_footer_payment( array $payment )
    {
        global $t_options;

        if (isset($t_options['t_media_payment_footer'])) {
            $payment = $t_options['t_media_payment_footer'];
        }

        return $payment;
    }
}
