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

    /* Thêm chức năng post format */
    // add_theme_support('post-formats',
    //     array(
    //         'image',
    //         'video',
    //         'gallery',
    //         'link',
    //         'aside',
    //         'quote',
    //         'status ',
    //         'chat  ',
    //         'audio  ',
    //     )
    // );

    /* Thêm chức năng custom background */
    $default_background = array(
        'default-color' => '#e8e8e8',
    );
    add_theme_support('custom-background', $default_background);

    /* Tạo menu cho theme */
    register_nav_menu('menu-header', __('menu header', 'super'));
    register_nav_menu('menu-test', __('menu test', 'super'));

    /*display except for page*/
    add_post_type_support('page', 'excerpt');

    // add logo
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'my_theme_setup');
