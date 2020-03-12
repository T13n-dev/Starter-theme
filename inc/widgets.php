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
			
            $widget_classes = 't-widget__count-' . $widget_count;

            if ( 5 === $widget_count ) {
				$widget_classes .= ' t-widget__col-5';
			} elseif ( 4 === $widget_count ) {
				$widget_classes .= ' t-widget__col-4';
			} elseif ( 3 === $widget_count ) {
				$widget_classes .= ' t-widget__col-3';
			} elseif ( 2 === $widget_count ) {
				$widget_classes .= ' t-widget__col-2';
			} elseif ( 1 === $widget_count ) {
				$widget_classes .= ' t-widget__col-1';
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
                'before_widget' => '<div id="%1$s" class="t-widget__item %2$s dynamic-classes" >',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );

        register_widget( 'T_Widget' );
    }
    
    add_action( 'widgets_init', 't_add_widgets' );
}

class T_Widget extends WP_Widget {

    public  $widget_options = array(
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
        <h2 class="t-widget__title">
        <?php echo apply_filters('t_footer_contact_caption', esc_html__('Liên hệ', THEME_DOMAIN) ); ?>
        </h2>
        <div class="t-widget__contact">
            <div class="t-widget__contact-address">
                <?php 
                    if ( has_filter('t_footer_address_v1') ) {

                        echo apply_filters('t_footer_address_v1', 'Type your address in the option '); 
                    }
                ?>
            </div>
            <div class="t-widget__contact-phone">
              
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