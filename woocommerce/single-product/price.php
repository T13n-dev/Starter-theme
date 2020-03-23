<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="t-single__price"><?php echo $product->get_price_html(); ?></p>
