<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php
/**
 * Add support class Woocomerce
 * https://docs.woocommerce.com/document/conditional-tags/
 * 
 * @package tstarter/
 * */ 

if ( is_woocommerce() ) {
	$page = '';
	if ( is_product() ) {
		$page .= 't-single ';	
	}

	if ( is_product_category() ) {
		$page .= 't-archive ';
	}
}


echo "<main class='main {$page} container'>";

// echo '<div id="primary" class="content-area main container"><main id="main" class="site-main" role="main">';