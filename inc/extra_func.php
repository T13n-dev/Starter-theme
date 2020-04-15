<?php 

/**
 * Additional classes
 * 
 * @package tstarter/inc
 */

if ( !function_exists('t_body_classes') ) {
    function t_body_classes( $classes ) {
       
        // Parameter second `3` is no sticky, `1` is top and `2` is bottom.
        if ( has_filter('t_header_sticky') ) {
            $header_sticky = apply_filters('t_header_sticky', 3);
            if ( $header_sticky == 1 ) {
                $classes[] = 't-header--sticky-top';
            } else if ( $header_sticky == 2) {
                $classes[] = 't-header--sticky-bottom';
            } else {
                $classes[] = '';
            }
        }

        return $classes;
    }
}

/**
 * Get categories Woo Blocks
 */
if ( !function_exists('t_get_categories') ){
    function t_get_categories() {
        $taxonomy = 'product_cat';
        $orderby = 'name';
        $show_count = 0;
        $pad_count = 0;
        $hierachical = 1;
        $title = '';
        $empty = 0;

        $args = array(
            'taxonomy' => $taxonomy,
            'orderby' => $orderby,
            'show_count' => $show_count,
            'pad_counts' => $pad_count,
            'hierarchical' => $hierachical,
            'title_li' => $title,
            'hide_empty' => $empty
        );

        $all_categories = get_categories($args);
        ?>

        <ul class="t-search__dropdown">
            <li>
                <a> <?php echo esc_html( 'Tất cả danh mục', THEME_DOMAIN ); ?> </a> 
            </li>
            <?php
            foreach ($all_categories as $cat) {
                if ($cat->category_parent == 0) {
                    ?>
                    <li>
                        <a class="level-0" data-slug="<?php echo esc_attr($cat->slug) ?>"> <?php echo esc_html($cat->name); ?> </a>
                    </li>
                    <?php
                    $args2 = array(
                        'taxonomy'     => $taxonomy,
                        'child_of'     => 0,
                        'parent'       => $cat->term_id,
                        'orderby'      => $orderby,
                        'show_count'   => $show_count,
                        'pad_counts'   => $pad_count,
                        'hierarchical' => $hierachical,
                        'title_li'     => $title,
                        'hide_empty'   => $empty
                    );
                    $sub_cats = get_categories($args2);
                    if ($sub_cats) {
                        foreach ($sub_cats as $sub_category) {
                    ?>
                    <li>
                        <a class="level-1" data-slug="<?php echo esc_attr($sub_category->slug) ?>">&nbsp;&nbsp;&nbsp; <?php echo esc_html($sub_category->name); ?> </a>
                    </li>
                    <?php
                        }
                    }
                }
            }
            ?>
        </ul>
        <?php
    }
}

/**
 * Find and replace 
 * 
 * @param $keyword | str  Search keyword
 * @param $str | str  String to search
 */
if ( !function_exists('t_find_and_replace') ) {
    function t_find_and_replace( $keyword, $str ) {
        $tmp = '';
    
        preg_match_all( "/{$keyword}/i", $str, $matches );
        $m = array_shift( $matches );
     
        for( $i = 0; $i < count( $m ); $i ++ ) {
            
            if( empty($tmp) ) {
                $r = preg_replace( "/{$m[$i]}/" , "<strong>{$m[$i]}</strong>", $str );
                $tmp = $r;
                // echo $m[$i];
            } else {
                $r = preg_replace( "/{$m[$i]}/" , "<strong>{$m[$i]}</strong>", $tmp );
            }
        }
    
        return $r;
    }
}

// Breadcrumbs
function t_breadcrumb() {
       
    // Settings
    $separator          = ' » ';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs'; // ! Thay đổi ảnh hưởng cấu trúc css
    $home_title         = esc_html__( 'Trang chủ', THEME_DOMAIN );
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Trang chủ
        echo '<li class="breadcrumbs__item-home"><a class="'.$breadcrums_class.'__link-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> &nbsp;'. $separator . ' &nbsp; </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix = '', false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                $arrval_cat = array_values($category);
                // Get last category post is in
                $last_category = end($arrval_cat);
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">&nbsp;'.$parents.'&nbsp;</li>';
                    $cat_display .= '<li class="separator">&nbsp;'. $separator .'&nbsp;</li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="'. $breadcrums_class .'__item-cat">'. single_cat_title('', false) . '</li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
    }      
}

if ( !function_exists( 't_pagination' ) ) {
	function t_pagination() {
		$prev_arrow = is_rtl() ? '<i class="fa fa-angle-right"></i>' : '<i class="fa fa-angle-left"></i>';
		$next_arrow = is_rtl() ? '<i class="fa fa-angle-left"></i>' : '<i class="fa fa-angle-right"></i>';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999;
		if( $total > 1 )  {
            // if( !$current_page = get_query_var('paged') ) $current_page = 1;
            
            // echo "<pre style='color:red; margin-left: 0px;'>";
            // print_r( get_option('permalink_structure') );
            // echo "</pre>";

            if( get_option('permalink_structure') ) {
                $format = 'page/%#%/';
            } else {
                $format = '&paged=%#%';
            }

            echo paginate_links( array(
                'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'		=> $format,
                'current'		=> max( 1, get_query_var('paged') ),
                'total' 		=> $total,
                'mid_size'		=> 3,
                // 'type' 			=> 'list',
                'prev_text'		=> $prev_arrow,
                'next_text'		=> $next_arrow,
            ) );
		}
	}
}

if ( !function_exists( 't_get_makeup_categories' ) ) {
    function t_get_makeup_categories() {
        $categories = get_the_category();
        $separator = ', ';
        $output = '';
        $i = 1;

        if ( !empty($categories) ) {
            foreach( $categories as $category ) {
              if ( $i > 1 ) {
                  $output .= $separator;
              }  
              $output .= '<a href="'.esc_url(get_category_link($category->term_id)).'" alt="'.esc_attr( $category->name).'">'.esc_html($category->name).'</a>';
              ++$i;
            }
        }

        return $output;
    }
}

if ( !function_exists( 't_get_makeup_tags' ) ) {
    function t_get_makeup_tag() {
        $tags = get_the_tags();
        $separator = ', ';
        $output = '';
        $i = 1;

        if( !empty( $tags ) ) {
            foreach ( $tags as $tag ) {
                if ($i > 1 ) {
                    $output .= $separator;
                }
                $output .= '<a href="'.esc_url(get_category_link($tag->term_id)).'" alt="'.esc_attr( $tag->name).'">'.esc_html($tag->name).'</a>';
                ++$i;
            }
        }

        return $output;
    }
}
