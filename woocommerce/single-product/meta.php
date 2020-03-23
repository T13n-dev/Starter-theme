<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="t-single__meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ", &nbsp;", '<p class="t-single__meta--posted-in">' . _n( '<span>Danh mục: </span>', '<span>Danh mục: </span>', count( $product->get_category_ids() ), THEME_DOMAIN ) . ' ', '</p>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ", &nbsp;", '<p class="t-single__meta--tagged-as">' . _n( '<span>Tag: </span>', '<span>Tags: </span>', count( $product->get_tag_ids() ), THEME_DOMAIN ) . ' ', '</p>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
