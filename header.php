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
         * @
         * 
         */
        do_action('t_header');
    ?>

    <div class="site">
        <header class="t-header">
            <div class="t-header__inner">
                <div class="t-header__top">
                    <div class="t-header__top--inner container">
                        <div class="t-header__section t-header__section--left">
                            <?php if (!has_custom_logo()) : ?>
                                <h2>
                                    <?php bloginfo('name'); ?>
                                </h2>
                            <?php
                            else :
                                the_custom_logo();
                            endif;
                            ?>
                        </div>
                        <div class="t-header__section t-header__section--middle">
                            <?php wp_nav_menu(
                                array(
                                    'theme_location'  => 'primary',
                                    'container'       => 'nav',
                                    'container_class' => 't-menu',
                                    'container_id'    => 'nav',
                                    'menu_class'      => 't-menu__list',
                                    // 'menu_id'         => 't-header-nav',
                                    'fallback_cb'     => '',
                                    'depth'           => 2,
                                    'items_class'     => '', // More custom add class at menu.php
                                    'walker'          => new HuuTien_Menu_Walker_Mega()
                                )
                            ); ?>
                        </div>
                        <div class="t-header__section t-header__section--right">
                            <div class="t-header__service">
                                <div class="t-header__service-left">
                                    <div class="button-icon button-icon--ship">
                                    </div>
                                    <div class="t-header__service-content">
                                        <div class="t-header__intro">
                                            Free
                                        </div>
                                        <div class="t-header__link">
                                            Shipping
                                        </div>
                                    </div>
                                </div>
                                <div class="t-header__service-right">
                                    <div class="button-icon button-icon--contact">
                                    </div>
                                    <div class="t-header__service-content">
                                        <div class="t-header__intro">
                                            Contact Us
                                        </div>
                                        <div class="t-header__link">
                                            070 7768 350
                                        </div>
                                    </div>
                                </div>
                                <div class="advertisement-zone">
                                    <a href="#">Advertisement zone</a>
                                </div>
                                
                            </div>
                            <div class="t-header__mobile-menu">
                                <div class="button-icon--menu ml10">
                                </div>
                                <?php 
                                    wp_nav_menu(
                                        array (
                                            'theme_location' => 'mobile',
                                            'container' => 'nav',
                                            'container_class' => 't-mobile'
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="t-header__bottom">
                    <div class="t-header__bottom-inner container">
                        <div class="t-header__section t-header__section--left">
                            <div class="t-header__category-list">
                                <p>Shop By</p>
                                <h2>Categories </h2>
                            </div>
                            <?php 
                                wp_nav_menu(
                                    array (
                                        'theme_location'  => 'sidebar',
                                        'container'       => 'div',
                                        'container_class' => 't-sidebar',
                                        'menu_class'      => 't-sidebar__list',
                                        'depth'           => 2,
                                        'walker'          => new HuuTien_Sidebar_Walker_Mega()
                                    )
                                );
                            ?>
                        </div>
                        <div class="t-header__section t-header__section--middle">
                            <div class="t-header__search-area">
                                <form action="" class="t-search woocommerce-product-search">
                                    <div class="t-search__group">
                                        <input type="search" class="t-search__field" name="s" value="" placeholder="Tìm kiếm sản phẩm" autocomplete="off">
                                        <div class="t-search__button">
                                            <button stype="submit" class="button-icon--search">
											</button>
                                        </div>
                                        <div class="t-search__category">
                                            <a href="" class="t-search__select-box">
                                                <span class="t-search__label"> All Categories </span>
                                                <span class="t-search__arrow"></span>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="button-icon--search">
                                
                            </div>
                        </div>
                        <div class="t-header__section t-header__section--right">
                            <div class="t-header__account">
                                <div class="t-header__account-link">
                                    <span class="t-header__sign-in">Sign In</span>
                                    <span class="t-header__my-account">My account</span>
                                </div>
                                <div class="t-header__account-dropdown">
                                    <ul>
                                        <li> 
                                            <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"> Tài khoản </a>  
                                        </li>
                                        <li> Wishlist </li>
                                        <li>  
                                            <a href="<?php echo get_permalink( wc_get_page_id( 'checkout' ) ); ?>"> Thanh toán </a>
                                        </li>
                                        <li> Conpare </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="t-header__my-cart">
                                <div class="t-header__img button-icon--cart">
                                    <span class="t-header__qty">
                                        <?php echo WC()->cart->get_cart_contents_count(); ?>    
                                    </span> 
                                </div>
                                <div class="t-header__cart-link">   
                                    <span class="t-header__cart">Giỏ hàng</span>
                                    <span class="t-header__total"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                                </div>
                                <div class="t-header__cart-dropdown">
                                    <div class="widget_shopping_cart_content">
                                        <?php woocommerce_mini_cart(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
