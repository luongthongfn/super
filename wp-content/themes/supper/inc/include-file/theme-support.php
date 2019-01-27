<?php
//add theme support
function my_theme_setup()
{
    /* Thiết lập theme có thể dịch được */
    $language_folder = THEME_PATH . '/languages';
    load_theme_textdomain('super', $language_folder);

    /* Tự chèn RSS Feed links trong <head> */
    add_theme_support('automatic-feed-links');

    /* Thêm chức năng post thumbnail (featured img) */
    add_theme_support('post-thumbnails');

    /* Thêm chức năng title-tag để tự thêm <title> */
    add_theme_support('title-tag');


    /* Thêm chức năng custom background */
    $default_background = array(
        'default-color' => '#e8e8e8',
    );
    add_theme_support('custom-background', $default_background);

    /* Tạo menu cho theme */
    register_nav_menu('menu-header', __('menu header', 'super'));

    function add_classes_on_li($classes, $item, $args) {
        $classes[] = 'menu-item';
        return $classes;
    }
    add_filter('nav_menu_css_class','add_classes_on_li',1,3);

    function add_classes_on_li_has_children($classes, $item, $args) {
        $item_has_children = in_array( 'menu-item-has-children', $classes );
        if ( $item_has_children ) {
            $classes['class'] = 'has-dropdown';
        }
        return $classes;
    }
    add_filter('nav_menu_css_class','add_classes_on_li_has_children',1,3);

    function add_badge_on_li($items, $args) {
        foreach( $items as &$item ) {
            $icon = get_field('label', $item);
            if( $icon ) {
                $item->title .= "<span class='label_icon label-$icon'>$icon</span>";
            }
        }
        return $items;
    }
    add_filter('wp_nav_menu_objects','add_badge_on_li',1,3);

    function add_classes_on_link($attrs, $item, $args) {
        $attrs['class'] = 'menu-link';
        return $attrs;
    }
    add_filter('nav_menu_link_attributes','add_classes_on_link',1,3);

    function add_classes_on_submenu($classes, $item, $args){
        $classes[] = 'nav-dropdown menu';
        return $classes;
    }
    add_filter('nav_menu_submenu_css_class','add_classes_on_submenu',1,3);


    /*display except for page*/
    add_post_type_support('page', 'excerpt');

    // add logo
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'my_theme_setup');
