<?php
define('THEME_PATH', get_stylesheet_directory());
define('THEME_URL', get_template_directory_uri());

if (!function_exists('my_theme_setup')) {

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

        add_theme_support('custom-logo');
    }

    add_action('after_setup_theme', 'my_theme_setup');

}
// add logo


function my_styles()
{
    /*
     * Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
     * Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
     */
    wp_register_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.0/css/bootstrap.min.css', 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', 'all');
    wp_enqueue_style('fontAwesome');

    wp_register_style('main-style', get_template_directory_uri() . '/assets/css/style.css', 'all');
    wp_enqueue_style('main-style');

    wp_register_style('slider-style', get_template_directory_uri() . '/assets/css/owl.theme2.css', 'all');
    wp_enqueue_style('slider-style');

    /* Chèn file JS custom.js */
    wp_register_script('jquery-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', null, true, false);
    wp_enqueue_script('jquery-js');

    wp_register_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.0/js/bootstrap.min.js', null, true, true);
    wp_enqueue_script('bootstrap-js');

    wp_register_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', null, true, true);
    wp_enqueue_script('custom-js');
}

add_action('wp_enqueue_scripts', 'my_styles');
