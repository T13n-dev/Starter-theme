<?php
/**
 * Widgets
 * 
 * @package tstarter
 */
defined('ABSPATH') || exit;

if ( !function_exists('t_widgets_classes') ) {
    function t_widgets_classes($params)
    {
        global $sidebars_widgets;

        $sidebars_widgets_count = apply_filters( 'sidebars_widgets', $sidebars_widgets );

        if ( isset( $params[0]['id'] ) && strpos(  $params[0]['before_widget'], 'dynamic-classes'  ) ) {
            $sidebar_id   = $params[0]['id'];
			$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
			
            $widget_classes = 't-widget-footer__count-' . $widget_count;

            if ( 5 === $widget_count ) {
				$widget_classes .= ' t-widget-footer__col-5';
			} elseif ( 4 === $widget_count ) {
				$widget_classes .= ' t-widget-footer__col-4';
			} elseif ( 3 === $widget_count ) {
				$widget_classes .= ' t-widget-footer__col-3';
			} elseif ( 2 === $widget_count ) {
				$widget_classes .= ' t-widget-footer__col-2';
			} elseif ( 1 === $widget_count ) {
				$widget_classes .= ' t-widget-footer__col-1';
			}

            $params[0]['before_widget'] = str_replace( 'dynamic-classes', $widget_classes, $params[0]['before_widget'] );          
        }

        return $params;
    }
    add_filter('dynamic_sidebar_params', 't_widgets_classes');
}

if( !function_exists('t_add_widgets') ) {
    /**
     * Initializes themes widgets.
     */
    function t_add_widgets() {
        register_sidebar(
            array(
                'name'          => __( 'Footer', THEME_DOMAIN ),
                'id'            => 'footer',
                'description'   => __( 'Full sized footer widget with dynamic grid', THEME_DOMAIN ),
                'before_widget' => '<div id="%1$s" class="t-widget-footer__item %2$s dynamic-classes" >',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="t-widget-footer__title">',
                'after_title'   => '</h3>',
            )
        );

        register_sidebar(
            array(
                'name'          => __( 'Single sidebar', THEME_DOMAIN ),
                'id'            => 'single',
                'description'   => __( 'Add items for single product sidebar', THEME_DOMAIN ),
                'before_widget' => '',
                'after_widget'  => '</div>',
                'before_title'  => '',
                'after_title'   => '',
            ) 
        );

        register_sidebar(
            array(
                'name'          => __( 'Archive Woo sidebar', THEME_DOMAIN ),
                'id'            => 'archive',
                'description'   => __( 'Add items for archive Woo sidebar', THEME_DOMAIN ),
                'before_widget' => '<aside id="%1$s" class="t-widget %1$s %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="t-widget__title">',
                'after_title'   => '</h3>',
            )
        );

        register_sidebar(
            array(
                'name'          => __( 'Archive sidebar', THEME_DOMAIN ),
                'id'            => 'archive-blog',
                'description'   => __( 'Add items for archive blog sidebar', THEME_DOMAIN ),
                'before_widget' => '<aside id="%1$s" class="t-widget %1$s %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="t-widget__title">',
                'after_title'   => '</h3>',
            )
        );

        register_widget( 'T_Widget' );
        register_widget( 'T_Widget_Blog' );
    }
    
    add_action( 'widgets_init', 't_add_widgets' );
}

class T_Widget extends WP_Widget {

    public $widget_options = array(
        'classname' => 't-widget-contact',
        'description' => 'Address Information'
    );

    public function __construct()
    {
        parent::__construct( 
            't-widget', 
            'Address Information', 
            $this->widget_options 
        );    
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        ?>

        <div class="t-widget-footer__image">
            <?php 
                $img = apply_filters(
                    't_footer_logo',  array (
                    'url' => '',
                    'height' => 300,
                    'width' => 300,
                    'title' => 'Adobe-Spark',
                    )
                );
            ?>
            <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo $img['title']; ?>">
        </div>

        <p class="t-widget-footer__caption">
            <?php echo apply_filters('t_footer_contact_caption', esc_html__('Nội dung', THEME_DOMAIN) ); ?>
        </p>

        <div class="t-widget-footer__contact">
            <div class="t-widget-footer__contact-address">
                <?php 
                    if ( has_filter('t_footer_address_v1') ) {

                        echo apply_filters('t_footer_address_v1', 'Type your address in the option '); 
                    }
                ?>
            </div>
            <div class="t-widget-footer__contact-phone">
                <?php echo apply_filters('t_footer_address_v2', 'Type your address in the option '); ?> 
            </div>
            <div class="t-widget__contact-email">
                <?php echo apply_filters('t_footer_address_v3', 'Type your address in the option '); ?>
            </div>
        </div>
        <?php
		echo $args['after_widget'];
    }    
}

class T_Widget_Blog extends WP_Widget {

    public $widget_options = array(
        'classname' => 't-widget-blog',
        'description' => 'Recent Blogs'
    );

    public function __construct()
    {
        parent::__construct( 
            't-widget-blog', 
            'Recent Blog', 
            $this->widget_options 
        );    
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        $q_args = array (
            'post_type' => 'post',
            'posts_per_page' => '2',
            'order' => 'DESC'
        );

        $wp_query = new WP_Query( $q_args );
        ?>

        <h3 class="t-widget-footer__title">Bài Viết Mới</h3>
        <ul class="t-widget-footer__recent-post">
        <?php 
            if ( $wp_query->have_posts() ) : 
                while( $wp_query->have_posts() ) : 
                    $wp_query->the_post();
        ?>
            <li> 
                <a class="t-widget-footer__recent-post-thumbnail" href="<?php echo get_the_permalink(); ?>">
                    <?php the_post_thumbnail( array(75, 65) ); ?>
                </a>
                <div class="t-widget-footer__recent-post-info">
                    <a class="t-widget-footer__recent-post-title" href="<?php echo get_the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>

                    <span class="t-widget-footer__recent-post-meta"> 
                    <?php echo get_the_date( 'M d,Y' );  
                    
                    if ( get_comments_number( get_the_ID() ) > 1 ) {
                    ?>
                    &nbsp; <a href="<?php echo esc_url( get_the_permalink().'#t-comments' ); ?>"> 
                        <?php echo get_comments_number( get_the_ID() ) ." ". esc_html__( 'Bình luận', THEME_DOMAIN ); ?> 
                    </a> </span>
                    <?php } ?>
                </div> 
            </li>
        <?php
                endwhile; 
            endif;

            wp_reset_query();
        ?>
        </ul>
        <?php 
		echo $args['after_widget'];
    }    
}
