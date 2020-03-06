<?php 

if ( ! function_exists('huutien_apply_logo_header') ) {
    function huutien_apply_logo_header() {
        global $huutien_options; 

        if ( ! empty( $huutien_options['logo']['url'] ) ) {

			$logo_image_src = $huutien_options['logo']['url'];
			if ( is_ssl() ) {
				$logo_image_src = str_replace( 'http:', 'https:', $logo_image_src );
			}
			ob_start();
			?>

			<div class="header-site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo-link">
					<img src="<?php echo esc_url( $logo_image_src ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="img-header-logo" style="height: 60px; width: auto;" />
				</a>
			</div>
			<?php
			$logo = ob_get_clean();
		}

		return $logo;
    }
}
