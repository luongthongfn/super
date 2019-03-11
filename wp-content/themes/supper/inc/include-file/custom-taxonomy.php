<?php

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

