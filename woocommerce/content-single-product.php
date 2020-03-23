<?php
defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<header class="t-single__header">
		<?php
		$args = array(
			'delimiter' => ' » ',
			'home' => esc_html('Trang chủ', THEME_DOMAIN)
		);
		woocommerce_breadcrumb($args);

		// @hooked wc_print_notices
		do_action('woocommerce_before_single_product');
		?>
	</header>
	<div class="t-single__main">
		<div class="t-single__left">
			<?php do_action('woocommerce_before_single_product_summary'); ?>
		</div>

		<div class="t-single__middle">
			<?php do_action('woocommerce_single_product_summary'); ?>
		</div>

		<div class="t-single__right">
			<div class="t-single__ads">
				<?php 
					if (is_active_sidebar('single')) {
						dynamic_sidebar('single');
					}
				?>
			</div>
		</div>
	</div>
	<footer class="t-single__footer container">
		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action('woocommerce_after_single_product_summary');

		?>
	</footer>
</div>

<?php do_action('woocommerce_after_single_product'); ?>