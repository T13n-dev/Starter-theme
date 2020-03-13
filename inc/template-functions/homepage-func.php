<?php

/**
 * Homepage functions
 * 
 * @package tstarter/template-functions/homepage-func
 */

if (!function_exists('t_slider_shortcode')) {
    function t_slider_shortcode()
    {
        $meta_shortcode = get_field('slider_shortcode');

        echo do_shortcode($meta_shortcode);
    }
}

if (!function_exists('t_product_intro')) {
    function t_product_intro()
    {
        $meta_intro = get_field('t_intro_blocks');
    ?>
        <section class="t-intro container">
            <?php foreach ($meta_intro as $block) {
            ?>
                <div class="t-intro__col">
                    <div class="t-intro__col-inner">
                        <a class="t-intro__link" href="<?php echo esc_url($block['action_link']); ?>">
                            <div class="t-intro__items">
                                <div class="t-intro__image">
                                    <img src="<?php echo esc_url($block['image']); ?>" alt="">
                                </div>
                                <div class="t-intro__content">
                                    <div class="t-intro__text">
                                        <?php echo $block['text_field']; ?>
                                    </div>
                                    <div class="t-intro__action">
                                        <?php echo esc_html($block['action_text']); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php  } ?>
        </section>
    <?php
    }
}

if (!function_exists('t_product_carousel')) {
    function t_product_carousel()
    {
        $title = get_field('t_section_carousel_title');
        $category = get_field('t_section_carousel_category_slug');
        if ($category) {
            $arrCate = explode(',', $category);
        }
        $selectPro = get_field('t_section_carousel_products');
        $productsID = get_field('t_section_carousel_product_id');
        $orderPro = get_field('t_section_carousel_order');
        $posts_per_page = get_field('t_section_carousel_product_limit');

        if ($selectPro) {
            switch ($selectPro) {
                case 'products':
                    $arrPro = explode(',', $productsID);

                    $products = new WP_Query(
                        array(
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'posts_per_page' => $posts_per_page,
                            'post__in' => $arrPro
                        )
                    );
                    break;
                case 'recent':
                    $products = new WP_Query(
                        array(
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'posts_per_page' => $posts_per_page,
                            'order' => $orderPro,
                        )
                    );
                    break;
            }
        }

    ?>
        <section class="t-product-items t-product-carousel container">
            <div class="t-product-items__head">
                <h2>
                    <?php echo $title; ?>
                </h2>
                <ul>
                    <?php
                    if (isset($arrCate) && is_array($arrCate)) {
                        foreach ($arrCate as $cate) {
                            $term = get_term_by('slug', $cate, 'product_cat'); ?>
                            <li>
                                <a href="<?php echo esc_html(get_category_link($term->term_id)); ?>">
                                    <?php echo esc_html($term->name); ?>
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="t-product-carousel__body">
                <ul class="t-product-carousel__products owl-carousel owl-theme">
                    <?php
                    if ($products->have_posts()) :
                        while ($products->have_posts()) :
                            $products->the_post();

                            wc_get_template_part('content', 'product');

                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>
                </ul>
                <div class="t-product-items t-product-carousel__nav">
                </div>
            </div>
        </section>
    <?php
    }
}

if (!function_exists('t_banner_products')) {
    function t_banner_products()
    {

        $banner = get_field('t_side_banner');
        $items = get_field('t_products');

        if ($items) {
            $arrItems = explode(',', $items['products']);
        }

        if (isset($arrItems) && is_array($arrItems)) {
            $products = new WP_Query(
                array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => $items['product_limit'],
                    'order' => $arrItems
                )
            );
        }
    ?>
    <section class="t-banner-products t-product-carousel container">
        <div class="t-banner-products__image">
            <img src="<?php echo esc_url($banner['image']); ?>" alt="">
            <div class="t-banner-products__image-content">
                <div class="t-banner-products__title">
                    <?php echo esc_html($banner['caption']); ?>
                </div>
                <div class="t-banner-products__description">
                    <?php echo esc_html($banner['content']); ?>
                </div>
                <a href="<?php echo esc_url($banner['action_link']); ?>" class="t-banner-products__link">
                    <?php echo esc_html($banner['action_text']); ?>
                </a>
            </div>
        </div>
        <div class="t-banner-products__body t-product-carousel__body">
            <ul class="t-banner-products__items owl-carousel owl-theme">
                <?php
                if ($products->have_posts()) :
                    while ($products->have_posts()) : $products->the_post();

                        wc_get_template_part('content', 'product');

                    endwhile;
                endif;
                wp_reset_query();
                ?>
            </ul>
            <div class="t-banner-products t-product-carousel__nav">
            </div>
        </div>
    </section>
    <?php
    }
}

if (!function_exists('t_banner_products_secondary')) {
    function t_banner_products_secondary()
    {

        $banner = get_field('t_side_banner_secondary');
        $items = get_field('t_products_secondary');

        if ($items) {
            $arrItems = explode(',', $items['products']);
        }

        if (isset($arrItems) && is_array($arrItems)) {
            $products = new WP_Query(
                array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => $items['product_limit'],
                    'order' => $arrItems
                )
            );
        }

    ?>
        <section class="t-banner-products t-product-carousel container">
            <div class="t-banner-products__image">
                <img src="<?php echo esc_url($banner['image']); ?>" alt="">
                <div class="t-banner-products__image-content">
                    <div class="t-banner-products__title--white">
                        <?php echo esc_html($banner['caption']); ?>
                    </div>
                    <div class="t-banner-products__description--white">
                        <?php echo esc_html($banner['content']); ?>
                    </div>
                    <a href="<?php echo esc_url($banner['action_link']); ?>" class="t-banner-products__link--white">
                        <?php echo esc_html($banner['action_text']); ?>
                    </a>
                </div>
            </div>
            <div class="t-banner-products__body t-product-carousel__body">
                <ul class="t-banner-products__items owl-carousel owl-theme">
                    <?php
                    if ($products->have_posts()) :
                        while ($products->have_posts()) : $products->the_post();

                            wc_get_template_part('content', 'product');

                        endwhile;
                    endif;

                    wp_reset_query();
                    ?>
                </ul>
                <div class="t-banner-products t-product-carousel__nav"></div>
            </div>
        </section>
    <?php
    }
}

if (!function_exists('t_product_intro_secondary')) {
    function t_product_intro_secondary()
    {
        $meta_intro = get_field('t_intro_blocks_secondary');
    ?>
        <section class="t-intro-secondary container">
            <?php foreach ($meta_intro as $block) {
            ?>
                <div class="t-intro-secondary__col">
                    <div class="t-intro-secondary__col-inner">
                        <a class="t-intro-secondary__link" href="<?php echo esc_url($block['action_link']); ?>">
                            <div class="t-intro-secondary__items">
                                <div class="t-intro-secondary__image">
                                    <img src="<?php echo esc_url($block['image']); ?>" alt="">
                                </div>
                                <div class="t-intro-secondary__content">
                                    <div class="t-intro-secondary__caption">
                                        <?php echo esc_html($block['text_caption']); ?>
                                    </div>
                                    <div class="t-intro-secondary__text">
                                        <?php echo esc_html($block['text_field']); ?>
                                    </div>
                                    <div class="t-intro-secondary__action">
                                        <?php echo esc_html($block['action_text']); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php  } ?>
        </section>
    <?php
    }
}

if (!function_exists('t_blog_carousel')) {
    function t_blog_carousel()
    {

        $title = get_field('blog_caption');
        $blog_ids = get_field('blog_ids');

        if ($blog_ids) {
            $arr_blogs = explode(',', $blog_ids);

            $blogs = new WP_Query(
                array(
                    'post_type' => 'post',
                    'post__in' => $arr_blogs
                )
            );
        }
    ?>
        <section class="t-blog-items t-blog-carousel container">
            <div class="t-blog-items__head">
                <h2> <?php echo esc_html( $title ); ?> </h2>
            </div>
            <div class="t-blog-items__body t-blog-carousel__body">
                <ul class="t-blog-items__blogs owl-carousel owl-theme">
                    <?php
                    if ($blogs->have_posts()) :
                        while ($blogs->have_posts()) :
                            $blogs->the_post();
                            if (locate_template('template-parts/content-blog-carousel.php') != '') {
                                get_template_part('template-parts/content-blog', 'carousel');
                            }
                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>
                </ul>
                <div class="t-blog-items t-blog-carousel__nav"></div>
            </div>
        </section>
    <?php
    }
}

if (!function_exists('t_brand_carousel')) {
    function t_brand_carousel()
    {
        $brands = get_field('brand_ids');

        if ($brands) {
            $arr_brands = explode(',', $brands);

            $blogs = new WP_Query(
                array(
                    'post_type' => 'branding_cpt',
                    'post__in' => $arr_brands
                )
            );
        }
    ?>
        <section class='t-brand-carousel container'>
            <ul class='t-brand-carousel__brands owl-carousel owl-theme'>
                <?php
                    if ($blogs->have_posts()) :
                    while ($blogs->have_posts()) : $blogs->the_post();
                ?>
                    <li>
                        <?php
                        the_post_thumbnail();
                        ?>
                    </li>
                <?php
                    endwhile;
                    endif;
                    wp_reset_query();
                ?>
            </ul>
        </section>
    <?php
    }
}