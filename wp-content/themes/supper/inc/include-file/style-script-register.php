<?php
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

//admin
// validation metabox
function add_post_validtate()
{
    // css
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/admin-style.css');

    //js
    wp_enqueue_script('admin_jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js');
    wp_enqueue_script('my_script_js', get_template_directory_uri() . '/assets/js/adminPost.validation.js');
}
add_action('admin_enqueue_scripts', 'add_post_validtate');

//upload media
function admin_upload_media()
{
    wp_enqueue_media();
    wp_enqueue_script('my_script_upload_js', get_template_directory_uri() . '/assets/js/adminMediaUpload.js');
}
add_action('admin_enqueue_scripts', 'admin_upload_media');
