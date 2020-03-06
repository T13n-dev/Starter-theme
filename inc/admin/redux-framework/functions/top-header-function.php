<?php

if (!function_exists('huutien_is_info_header')) {
    function huutien_is_info_header()
    {
        global $huutien_options;

		if ( ! isset( $huutien_options['is-info-topbar'] ) ) {
			$huutien_options['is-info-topbar'] = true;
		}

		if ( $huutien_options['is-info-topbar'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

        return $enable;
    }
}

if (!function_exists('huutien_is_phone_header')) {
    function huutien_is_phone_header()
    {
        global $huutien_options;

		if ( ! isset( $huutien_options['is-phone-topbar'] ) ) {
			$huutien_options['is-phone-topbar'] = true;
		}

		if ( $huutien_options['is-phone-topbar'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

        return $enable;
    }
}

if (!function_exists('huutien_is_phone_header')) {
    function huutien_is_phone_header()
    {
        global $huutien_options;

		if ( ! isset( $huutien_options['is-phone-topbar'] ) ) {
			$huutien_options['is-phone-topbar'] = true;
		}

		if ( $huutien_options['is-phone-topbar'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

        return $enable;
    }
}

if (!function_exists('huutien_text_info_header')) {
    function huutien_text_info_header()
    {
        global $huutien_options;

		if ( ! empty ( $huutien_options['info-topbar'] ) ) {
            $info_topbar = $huutien_options['info-topbar'];
            
            ob_start();
            ?>
            <span>
                <?php echo wp_kses_post( $info_topbar ); ?>
            </span>
            <?php 
            $text_info = ob_get_clean();
		}

        return $text_info;
    }
}

if (!function_exists('huutien_text_phone_header')) {
    function huutien_text_phone_header()
    {
        global $huutien_options;

		if ( ! empty ( $huutien_options['phone-topbar'] ) ) {
            $phone_topbar = $huutien_options['phone-topbar'];
            
            ob_start();
            ?>
            <span>
                <?php echo wp_kses_post( $phone_topbar ); ?>
            </span>
            <?php 
            $text_phone = ob_get_clean();
		}

        return $text_phone;
    }
}

if (!function_exists('huutien_is_account_header')) {
    function huutien_is_account_header()
    {
        global $huutien_options;

		if ( ! isset( $huutien_options['is-account-topbar'] ) ) {
			$huutien_options['is-account-topbar'] = true;
		}

		if ( $huutien_options['is-account-topbar'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

        return $enable;
    }
}

if (!function_exists('huutien_is_checkout_header')) {
    function huutien_is_checkout_header()
    {
        global $huutien_options;

		if ( ! isset( $huutien_options['is-checkout-topbar'] ) ) {
			$huutien_options['is-checkout-topbar'] = true;
		}

		if ( $huutien_options['is-checkout-topbar'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

        return $enable;
    }
}

if (!function_exists('huutien_is_login_register_header')) {
    function huutien_is_login_register_header()
    {
        global $huutien_options;

		if ( ! isset( $huutien_options['is-login-register-topbar'] ) ) {
			$huutien_options['is-login-register-topbar'] = true;
		}

		if ( $huutien_options['is-login-register-topbar'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

        return $enable;
    }
}
