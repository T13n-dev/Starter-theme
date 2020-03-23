<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<p class="t-single__stock <?php echo esc_attr( $class ); ?>"><?php echo wp_kses_post( $availability ); ?></p>
