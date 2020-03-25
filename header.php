<?php
    defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    // checks wp old version 
    if (function_exists('wp_body_open')) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    }
    ?> 

    <?php
        /**
         * @ t_preload
         */
        do_action('t_header_preload');
    ?>

    <div class="site">
        <header class="t-header">
            <div class="t-header__inner">
                <?php 
                    /**
                     * @ t_header_top - 5
                     * @ t_header_bottom - 10
                     */
                    do_action('t_header');
                ?>
            </div>
        </header>
