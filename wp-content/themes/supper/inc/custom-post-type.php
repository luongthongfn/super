<?php
// add cuustom-post type
function create_custom_post_type()
{
    $label_sanpham = array(
        'name' => __('sản phẩm', 'super'),
        'singular_name' => __('sản phẩm', 'super'),
        'add_new' => __('Thêm sản phẩm', 'super'),
        'add_new_item' => __('Thêm sản phẩm', 'super'),
        'edit_item' => __('Sửa sản phẩm', 'super'),
    );
    $args_sanpham = array(
        'labels' => $label_sanpham,
        'description' => __('Danh mục sản phẩm', 'super'),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields',
        ),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post', //
    );

    register_post_type('sanpham', $args_sanpham);

}

add_action('init', 'create_custom_post_type');
