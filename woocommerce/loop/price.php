<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<span class="t-product-carousel__product-price"><?php echo $price_html; ?></span>
<?php endif; ?>
