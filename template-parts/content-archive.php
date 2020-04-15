<?php 
/**
 * Archive template
 * 
 * @package tstarter/
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="t-blog-archive__item">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="t-blog-archive__thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </div>
        <div class="t-blog-archive__post-info">
            <div class="t-blog-archive__post-header">
                <div class="t-blog-archive__post-meta">
                    <i class="far fa-calendar"></i> <?php echo get_the_date( 'd/m/Y' ); ?>
                </div>
                <div class="t-blog-archive__post-title">
                    <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                </div>
            </div>
            <div class="t-blog-archive__post-content">
                <?php the_excerpt(); ?>
                <div class="t-blog-archive__read-more">
                    <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Xem thêm', THEME_DOMAIN ); ?></a>
                </div>
            </div>
        </div>
    </article>
</div>