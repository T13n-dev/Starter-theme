<?php
function nht_simple_slide_func($args, $content)
{
    ob_start();
    $flag = 1;
    $args = array(
        'post_type' => 'cpt-per-slide',
        'post_parent' => (int) $args['id'],
        'order' => 'ASC',
        'posts_per_page' => -1
    );

    $wp_query = new WP_Query($args);
?>
    <div class="wrap-t-slider">
        <div class="t-slider">
            <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <div class="t-slider__item <?php echo ($flag == 1) ? 'current-slide' : ''; ?> ">
                    <img class="t-slider__item" src="<?php echo get_the_excerpt(); ?>" alt="">
                </div>
            <?php $flag++;
                endwhile;
            endif; ?>
        </div>
    </div>
<?php
    wp_reset_query();

    return ob_get_clean();
}

add_shortcode('nht_simple_slide', 'nht_simple_slide_func');