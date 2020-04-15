<?php
    /**
     * Single template
     * 
     * @package Single template
     */
    $post_format = get_post_format();
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('t-blog-single__article');?> >
        <div class="t-blog-single__entry-content">
            <?php the_content(); ?>
        </div>
        <div class="t-blog-single__entry-meta">
            <div class="t-blog-single__meta-inner">
                <i class="fas fa-edit"></i> <?php the_author(); ?>
            </div>
            <div class="t-blog-single__meta-inner">
                <i class="fas fa-tags"></i> <?php echo t_get_makeup_categories(); ?>
            </div>
            <div class="t-blog-single__meta-inner">
                <i class="far fa-folder"></i> 
                <?php 
                    echo t_get_makeup_tag();
                ?>
            </div>
            <div class="t-blog-single__meta-inner">
                <i class="far fa-calendar"></i> <?php echo get_the_date( 'd/m/Y' ); ?>
            </div>
        </div>

        <?php 
            echo "<pre style='color:red; margin-left: 0px;'>";
            print_r( get_the_author_meta() );
            echo "</pre>";
        ?>

        <div class="t-blog-single__author-info">
            <div class="t-blog-single__author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
            </div>
            <div class="t-blog-single__author-description">
                <h2 class="t-blog-single__author-title">
                    <?php echo get_the_author_meta( 'display_name' ); ?>
                </h2>
                <div class="t-blog-single__author-link">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>" >Xem tất cả bài viết của <?php the_author(); ?> → </a>
                </div>
            </div>
        </div>

        <div class="t-blog-single__post-navigation">
            <div class="t-blog-single__nav-left"><?php previous_post_link( '<i class="fa fa-chevron-left"></i> &nbsp; %link' ); ?></div>
            <div class="t-blog-single__nav-right"><?php next_post_link('%link &nbsp; <i class="fa fa-chevron-right"></i>'); ?></div>
        </div>

        <div class="t-blog-single__related-post">
            <div class="t-blog-single__related-post-title">
                <h1><?php echo esc_html__( 'Bài viết liên quan', THEME_DOMAIN ); ?></h1>
            </div>
            <div class="t-blog-single__related-posts">
                <div class="t-blog-single__items-list">
                <?php
                $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID) ) );
                if( $related ) foreach( $related as $post ) {
                    setup_postdata($post); 
                ?>  

                    <div class="t-blog-single__item">
                        <article id="post-474" class="post-474 post type-post status-publish format-standard has-post-thumbnail hentry category-anime category-life tag-con-gai tag-cuoc-song">
                            <div class="t-blog-single__thumbnail">
                                <?php the_post_thumbnail('large'); ?>     
                            </div>
                            <div class="t-blog-single__post-info">
                                <div class="t-blog-single__post-header">
                                    <div class="t-blog-single__post-meta">
                                        <i class="far fa-calendar"></i> <?php echo get_the_date( 'd/m/Y' ); ?>              
                                    </div>
                                    <div class="t-blog-single__post-title">
                                        <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                                    </div>
                                </div>
                                <div class="t-blog-single__post-content">
                                    <?php the_excerpt(); ?>
                                    <div class="t-blog-single__read-more">
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Xem thêm', THEME_DOMAIN ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                <?php 
                }
                wp_reset_postdata(); 
                ?>
                </div>
            </div>
            <?php
                if ( comments_open() ):
                    comments_template();
                endif;
            ?>
        </div>

    </article>