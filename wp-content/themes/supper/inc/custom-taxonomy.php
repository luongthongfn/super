<?php
/**
 * Tạo <a href="https://thachpham.com/wordpress/wordpress-development/wordpress-custom-taxonomy-toan-tap.html" data-wpel-link="internal">custom taxonomy</a>
 * https://piklist.com/learn/doc/getting-started-taxonomies-piklist/
 */
// function create_taxonomies($taxonomies)
// {
//     $taxonomies['sanpham_cat'] = array(
//         'post_type' => 'sanpham',
//         'name' => 'sanpham_cat',
//         'show_admin_column' => true,
//         'configuration' => array(
//             'hierarchical' => true,
//             'labels' => array(
//                 'name' => 'Danh mục sản phẩm',
//                 'name_singular' => 'Danh mục sản phẩm',
//                 'all_items' => 'Tất cả danh mục sản phẩm',
//                 'edit_item' => 'Sửa danh mục sản phẩm',
//                 'view_item' => 'Xem danh mục sản phẩm',
//                 'add_new_item' => 'Thêm danh mục sản phẩm',
//             ),
//             'show_ui' => true,
//             'query_vars' => true,
//             'rewrite' => array('slug' => 'sanpham_cat'),
//         ),
//     );
//     return $taxonomies;
// }
// add_filter('piklist_taxonomies', 'create_taxonomies');

/*Tao custom taxonomy */
function tao_taxonomy()
{
    $labels_taxonomy = array(
        'name' => __('Danh mục sản phẩm', 'super'),
        'singular' => __('Danh mục sản phẩm', 'super'),
        'menu_name' => __('Danh mục sản phẩm', 'super'),
        'add_new' => __('Thêm danh mục sản phẩm', 'super'),
        'add_new_item' => __('Thêm danh mục sản phẩm', 'super'),
        'edit_item' => __('Sửa danh mục sản phẩm', 'super'),
    );
    $args_taxonomy = array(
        'labels' => $labels_taxonomy,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('prod_cate', 'sanpham', $args_taxonomy);

}

add_action('init', 'tao_taxonomy', 0);

