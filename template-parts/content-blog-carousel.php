<?php 
    /**
     * 
     * 
     * @package tstarter/template-parts/content-carousel
     */
?>
    <li class="t-blog-carousel__blogs">  
        <div class="t-blog-carousel__inner">
            <div class="t-blog-carousel__left">
                <?php
                    the_post_thumbnail( 'medium' );
                ?>
            </div>
            <div class="t-blog-carousel__right">
                <div class="t-blog-carousel__content">
                    <div class="t-blog-carousel__title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </div>
                    <div class="t-blog-carousel__date">
                        <?php echo get_the_date( 'D M Y' ); ?>
                    </div>
                    <div class="t-blog-carousel__excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </div>
    </li>