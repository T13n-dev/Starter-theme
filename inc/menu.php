<?php
/**
 * Custom Menu walker by HuuTien
 * ! Còn save meta nua~ ;-((, tao ra 1 core để lưu meta ???
 * @package tstater/inc
 */

defined('ABSPATH') || exit;

if (!class_exists('HuuTien_Menu_Walker_Mega')) {

    class HuuTien_Menu_Walker_Mega extends Walker_Nav_Menu
    {
        public $isMegaMenu; // boolean

        public function __construct()
        {
            $this->isMegaMenu = 0;
        }

        public function start_lvl(&$output, $depth = 0, $args = array())
        {
            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }

            $indent = str_repeat($t, $depth);

            // ! If is Mega-menu
            if ($this->isMegaMenu != 0) {
                $classes = array('t-menu__megamenu-inner');
            } else {
                $classes = array('t-menu__dropdown-inner');
            }

            $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $output .= "{$n}{$indent}<ul$class_names>{$n}";

            if ($this->isMegaMenu != 0) {
                $output .= "<li class=\"t-menu__megamenu-col\"><ul>\n";
            }
        }

        public function end_lvl(&$output, $depth = 0, $args = array())
        {
            // * End for mega menu
            if ($this->isMegaMenu != 0) {
                $output .= "\n</li></ul>\n";
            }

            $indent  = str_repeat("\t", $depth);
            $output .= "\n {$indent} </ul>\n";
        }

        public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {

            $indent = ($depth) ? str_repeat("\t", $depth) : '';
            $li_attributes = $class_names = $value = '';

            $classes = empty($item->classes) ? array() : (array) $item->classes;

            // * Check megamenu === menu_item_parant and it's not its parent
            if ($this->isMegaMenu === intval($item->menu_item_parent) && $this->isMegaMenu  != 0) {
                // * If is Divider-column
                if (!empty($item->megaType) && $item->megaType == '_megaCol') {
                    $output .= "</ul></li> <li class=\"t-menu__megamenu-col\"><ul>\n";
                }

                // * If is Divider
                if (!empty($item->megaType) && $item->megaType == '_megaDivider') {
                    $output .= "<li class=\"t-menu__divider\"></li>\n";
                }

                // * Add class for Image-item
                if (!empty($item->megaType) && $item->megaType == '_megaImage') {
                    $classes[] = 'featured-image';
                }
            } else {
                $this->isMegaMenu = 0;
            }

            // ! If is Mega-menu
            if (!empty($item->mega) && $item->mega == '_mega') {

                $this->isMegaMenu = $item->ID;
                $classes[] = 't-menu__megamenu';
            }

            $classes[] = 't-menu__item';
            $classes[] = ($args->walker->has_children) ? 't-menu__dropdown' : '';
            $classes[] = ($item->current || $item->current_item_ancestor) ? 't-menu__item--active' : '';
            $classes[] = 't-menu__item-' . $item->ID;

            // * Add class dropdown-submenu when $depth
            if ($depth && $args->walker->has_children) {
                $classes[] = 't-menu__dropdown-submenu';
            }

            $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = ' class="' . esc_attr($class_names) . '"';

            // * Create id's attribute for li
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
            $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

            // * Create attribute for tag <a> includes href, class, ...
            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
            $attributes .= ($args->walker->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

            $item_output = $args->before;
            // <a>
            $item_output .= '<a class="' . ((!empty($item->caption)) ? 't-sidebar__caption' : '') . '"' . $attributes . '>';
            if (!empty($item->icon)) {
                $item_output .= '<i class="' . esc_attr($item->icon) . ' t-sidebar__caret-left"></i>';
            }

            if ($this->isMegaMenu === intval($item->menu_item_parent) && $this->isMegaMenu  != 0) {
                // * If is Image-item
                if (!empty($item->megaType) && $item->megaType == '_megaImage') {
                    $postID = url_to_postid($item->url);
                    $output .= "<img src=\" " . get_the_post_thumbnail_url($postID) . " \">";
                }
            }

            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

            // * Add more support for menu item title
            if (strlen($item->attr_title) > 2) {
                $item_output .= '<h3 class="tit">' . $item->attr_title . '</h3>';
            }

            // * Add support for menu item descriptions
            // </a>
            if (strlen($item->description) > 2) {
                $item_output .= '</a> <span class="sub">' . $item->description . '</span>';
            }

            // * Super Caret
            $item_output .= (($depth == 0 || 1) && $args->walker->has_children && !empty($item->icon)) ? ' <b class="t-sidebar__caret-left' . $item->icon . '"> </b></a>' : '</a>';

            $item_output .= $args->after;

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
    }
}

/**
 * 1. Register A custom field for the nav menu item
 */
function custom_nav_menu_item($item)
{
    $item->mega = get_post_meta($item->ID, '_menu_item_mega', true);
    $item->caption = get_post_meta($item->ID, '_menu_item_caption', true);
    $item->megaType = get_post_meta($item->ID, '_menu_item_megaType', true);
    $item->icon = get_post_meta($item->ID, '_menu_item_icon', true);

    return $item;
}
add_filter('wp_setup_nav_menu_item', 'custom_nav_menu_item');

/**
 * 2. Save The User’s Input
 */
function custom_update_nav_menu_item($menu_id, $menu_item_db_id, $menu_item_args)
{

    /**
     * * nht_update_post_meta Method
     * @param int post_id
     * @param string meta_name
     * @param arr post_arr
     * @param string post_name
     */

    nht_update_post_meta($menu_item_db_id, '_menu_item_mega', $_POST, 'menu-item-mega');
    nht_update_post_meta_sidebar($menu_item_db_id, '_menu_item_caption', $_POST, 'menu-item-caption');
    nht_update_post_meta($menu_item_db_id, '_menu_item_megaType', $_POST, 'menu-item-megaType');
    nht_update_post_meta($menu_item_db_id, '_menu_item_icon', $_POST, 'menu-item-icon');
}
add_action('wp_update_nav_menu_item', 'custom_update_nav_menu_item', 10, 3);

/**
 * Helper update meta function
 */
function nht_update_post_meta($post_id, $meta_name, $post, $post_name)
{
    if (isset($post[$post_name])) {

        if (is_array($post[$post_name]) && isset($post[$post_name][$post_id])) {

            $value = $post[$post_name][$post_id];
            // sanitize_html_class
            update_post_meta($post_id, $meta_name, $value);
        }
    } else {

        update_post_meta($post_id, $meta_name, null);
    }
}

/**
 * Step 3: Set Up A New Walker For The Edit Menu Tree
 */
add_filter('wp_edit_nav_menu_walker', function ($class) {
    return 'HuuTien_Menu_Walker_Mega_Edit';
});

if (!class_exists("HuuTien_Menu_Walker_Mega_Edit")) {

    class HuuTien_Menu_Walker_Mega_Edit extends Walker_Nav_Menu
    {
        public function start_lvl(&$output, $depth = 0, $args = array())
        {
        }
        public function end_lvl(&$output, $depth = 0, $args = array())
        {
        }

        public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {
            global $_wp_nav_menu_max_depth;
            $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

            ob_start();
            $item_id      = esc_attr($item->ID);
            $removed_args = array(
                'action',
                'customlink-tab',
                'edit-menu-item',
                'menu-item',
                'page-tab',
                '_wpnonce',
            );

            $original_title = false;

            if ('taxonomy' == $item->type) {
                $original_object = get_term((int) $item->object_id, $item->object);
                if ($original_object && !is_wp_error($original_title)) {
                    $original_title = $original_object->name;
                }
            } elseif ('post_type' == $item->type) {
                $original_object = get_post($item->object_id);
                if ($original_object) {
                    $original_title = get_the_title($original_object->ID);
                }
            } elseif ('post_type_archive' == $item->type) {
                $original_object = get_post_type_object($item->object);
                if ($original_object) {
                    $original_title = $original_object->labels->archives;
                }
            }

            $classes = array(
                'menu-item menu-item-depth-' . $depth,
                'menu-item-' . esc_attr($item->object),
                'menu-item-edit-' . ((isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item']) ? 'active' : 'inactive'),
            );

            $title = $item->title;

            if (!empty($item->_invalid)) {
                $classes[] = 'menu-item-invalid';
                /* translators: %s: Title of an invalid menu item. */
                $title = sprintf(__('%s (Invalid)'), $item->title);
            } elseif (isset($item->post_status) && 'draft' == $item->post_status) {
                $classes[] = 'pending';
                /* translators: %s: Title of a menu item in draft status. */
                $title = sprintf(__('%s (Pending)'), $item->title);
            }

            $title = (!isset($item->label) || '' == $item->label) ? $title : $item->label;

            $submenu_text = '';
            if (0 == $depth) {
                $submenu_text = 'style="display: none;"';
            }

?>
            <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes); ?>">
                <div class="menu-item-bar">
                    <div class="menu-item-handle">

                        <span class="item-title"><span class="menu-item-title"><?php echo esc_html($title); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php _e('sub item'); ?></span></span>
                        <span class="item-controls">
                            <?php
                            /**
                             * 
                             */
                            ?>
                            <span class="item-type show-if-mega"> Mega Menu </span>
                            <span class="item-type show-if-item"> Mega Item </span>
                            <span class="item-type hide-if-item"><?php echo esc_html($item->type_label); ?></span>
                            <?php
                            /**
                             * 
                             */
                            ?>
                            <span class="item-order hide-if-js">
                                <?php
                                printf(
                                    '<a href="%s" class="item-move-up" aria-label="%s">&#8593;</a>',
                                    wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action'    => 'move-up-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                        ),
                                        'move-menu_item'
                                    ),
                                    esc_attr__('Move up')
                                );
                                ?>
                                |
                                <?php
                                printf(
                                    '<a href="%s" class="item-move-down" aria-label="%s">&#8595;</a>',
                                    wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action'    => 'move-down-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                        ),
                                        'move-menu_item'
                                    ),
                                    esc_attr__('Move down')
                                );
                                ?>
                            </span>
                            <?php
                            if (isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item']) {
                                $edit_url = admin_url('nav-menus.php');
                            } else {
                                $edit_url = add_query_arg(
                                    array(
                                        'edit-menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url('nav-menus.php#menu-item-settings-' . $item_id))
                                );
                            }

                            printf(
                                '<a class="item-edit" id="edit-%s" href="%s" aria-label="%s"><span class="screen-reader-text">%s</span></a>',
                                $item_id,
                                $edit_url,
                                esc_attr__('Edit menu item'),
                                __('Edit')
                            );
                            ?>
                        </span>
                    </div>
                </div>

                <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo $item_id; ?>">
                    <?php if ('custom' == $item->type) : ?>
                        <p class="field-url description description-wide">
                            <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                                <?php _e('URL'); ?><br />
                                <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->url); ?>" />
                            </label>
                        </p>
                    <?php endif; ?>
                    <p class="description description-wide">
                        <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                            <?php _e('Navigation Label'); ?><br />
                            <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->title); ?>" />
                        </label>
                    </p>
                    <p class="field-title-attribute field-attr-title description description-wide">
                        <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                            <?php _e('Title Attribute'); ?><br />
                            <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->post_excerpt); ?>" />
                        </label>
                    </p>
                    <p class="field-link-target description">
                        <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                            <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]" <?php checked($item->target, '_blank'); ?> />
                            <?php _e('Open link in a new tab'); ?>
                        </label>
                    </p>
                    <p class="field-css-classes description description-thin">
                        <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                            <?php _e('CSS Classes (optional)'); ?><br />
                            <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr(implode(' ', $item->classes)); ?>" />
                        </label>
                    </p>
                    <p class="field-xfn description description-thin">
                        <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                            <?php _e('Link Relationship (XFN)'); ?><br />
                            <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->xfn); ?>" />
                        </label>
                    </p>
                    <!-- 
                        Icon
                     -->
                    <p class="description description-thin">
                        <label for="edit-menu-item-icon-<?php echo $item_id; ?>">
                            <?php _e('Fontawsome Icon'); ?><br />
                            <input type="text" id="edit-menu-item-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-icon" name="menu-item-icon[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->icon); ?>" />
                        </label>
                    </p>
                    <!--
                        #End Icon
                    -->
                    <!-- 
                        Use as Mega Menu 
                    -->
                    <p class="description description-wide show-if-mega-menu">
                        <label for="edit-menu-item-mega-<?php echo $item_id; ?>">
                            <input class="nht-mega-menu" type="checkbox" id="edit-menu-item-mega-<?php echo $item_id; ?>" value="_mega" name="menu-item-mega[<?php echo $item_id; ?>]" <?php checked($item->mega, '_mega') ?> />
                            <?php _e('Use as Mega Menu', 'underscores'); ?>
                        </label>
                    </p>
                    <!--
                        #End Use as Mega Menu 
                     -->
                    <!-- 
                        Use as Caption Menu 
                    -->
                    <p class="description description-wide">
                        <label for="edit-sidebar-item-caption-<?php echo $item_id; ?>">
                            <input class="nht-caption-menu" type="checkbox" id="edit-sidebar-item-caption-<?php echo $item_id; ?>" value="_caption" name="menu-item-caption[<?php echo $item_id; ?>]" <?php checked($item->caption, '_caption') ?> />
                            <?php _e('Use as caption Menu', 'underscores'); ?>
                        </label>
                    </p>
                    <!--
                        #End Use as Caption Menu 
                    -->


                    <!-- 
                        If Mega menu was checked, types of mega menu item
                    -->
                    <p class="description description-wide show-if-mega-menu-type">
                        <!-- col -->
                        <label for="edit-menu-item-megaDef-<?php echo $item_id; ?>">
                            <input type="radio" id="edit-menu-item-megaDef-<?php echo $item_id; ?>" value="_megaDef" name="menu-item-megaType[<?php echo $item_id; ?>]" <?php echo (!isset($item->megaType)) ? "checked='checked'" : checked($item->megaType, '_megaDef'); ?> />
                            <?php _e('Default'); ?>
                        </label>
                        &nbsp;
                        <!-- col -->
                        <label for="edit-menu-item-megaCol-<?php echo $item_id; ?>">
                            <input type="radio" id="edit-menu-item-megaCol-<?php echo $item_id; ?>" value="_megaCol" name="menu-item-megaType[<?php echo $item_id; ?>]" <?php checked($item->megaType, '_megaCol') ?> />
                            <?php _e('Break Column'); ?>
                        </label>
                        &nbsp;
                        <!-- image -->
                        <label for="edit-menu-item-megaImage-<?php echo $item_id; ?>">
                            <input type="radio" id="edit-menu-item-megaImage-<?php echo $item_id; ?>" value="_megaImage" name="menu-item-megaType[<?php echo $item_id; ?>]" <?php checked($item->megaType, '_megaImage') ?> />
                            <?php _e('Image '); ?>
                        </label>
                        &nbsp;
                        <!-- divider -->
                        <label for="edit-menu-item-megaDivider-<?php echo $item_id; ?>">
                            <input type="radio" id="edit-menu-item-megaDivider-<?php echo $item_id; ?>" value="_megaDivider" name="menu-item-megaType[<?php echo $item_id; ?>]" <?php checked($item->megaType, '_megaDivider') ?> />
                            <?php _e('Divider '); ?>
                        </label>
                    </p>
                    <!-- 
                        #end
                    -->

                    <p class="field-description description description-wide">
                        <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                            <?php _e('Description'); ?><br />
                            <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html($item->description); // textarea_escaped 
                                                                                                                                                                                                                    ?></textarea>
                            <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.'); ?></span>
                        </label>
                    </p>

                    <fieldset class="field-move hide-if-no-js description description-wide">
                        <span class="field-move-visual-label" aria-hidden="true"><?php _e('Move'); ?></span>
                        <button type="button" class="button-link menus-move menus-move-up" data-dir="up"><?php _e('Up one'); ?></button>
                        <button type="button" class="button-link menus-move menus-move-down" data-dir="down"><?php _e('Down one'); ?></button>
                        <button type="button" class="button-link menus-move menus-move-left" data-dir="left"></button>
                        <button type="button" class="button-link menus-move menus-move-right" data-dir="right"></button>
                        <button type="button" class="button-link menus-move menus-move-top" data-dir="top"><?php _e('To the top'); ?></button>
                    </fieldset>

                    <div class="menu-item-actions description-wide submitbox">
                        <?php if ('custom' !== $item->type && false !== $original_title) : ?>
                            <p class="link-to-original">
                                <?php
                                /* translators: %s: Link to menu item's original object. */
                                printf(__('Original: %s'), '<a href="' . esc_attr($item->url) . '">' . esc_html($original_title) . '</a>');
                                ?>
                            </p>
                        <?php endif; ?>

                        <?php
                        printf(
                            '<a class="item-delete submitdelete deletion" id="delete-%s" href="%s">%s</a>',
                            $item_id,
                            wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action'    => 'delete-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    admin_url('nav-menus.php')
                                ),
                                'delete-menu_item_' . $item_id
                            ),
                            __('Remove')
                        );
                        ?>
                        <span class="meta-sep hide-if-no-js"> | </span>
                        <?php
                        printf(
                            '<a class="item-cancel submitcancel hide-if-no-js" id="cancel-%s" href="%s#menu-item-settings-%s">%s</a>',
                            $item_id,
                            esc_url(
                                add_query_arg(
                                    array(
                                        'edit-menu-item' => $item_id,
                                        'cancel'         => time(),
                                    ),
                                    admin_url('nav-menus.php')
                                )
                            ),
                            $item_id,
                            __('Cancel')
                        );
                        ?>
                    </div>

                    <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
                    <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object_id); ?>" />
                    <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object); ?>" />
                    <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_item_parent); ?>" />
                    <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_order); ?>" />
                    <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->type); ?>" />
                </div><!-- .menu-item-settings-->
                <ul class="menu-item-transport"></ul>
    <?php
            $output .= ob_get_clean();
        }
    }
}

// Add more default class for <li>
if (!function_exists('add_class_custom_menu')) {
    function add_class_custom_menu($classes, $item, $args)
    {
        if ('primary' === $args->theme_location && isset($args->items_class)) {
            $classes[] = $args->items_class;
        }
        return $classes;
    }
}
add_filter('nav_menu_css_class', 'add_class_custom_menu', 1, 3);
