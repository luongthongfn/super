<?php

// register
function create_custom_post_type_slide()
{
    $label = array(
        'name' => __('Owl slider', 'super'),
        'singular_name' => __('Owl slider', 'super'),
        'add_new' => __('Add slide', 'super'),
        'add_new_item' => __('Add slide', 'super'),
        'edit_item' => __('Edit slide', 'super'),
    );
    $args = array(
        'labels' => $label,
        'description' => __('Owl Slider ', 'super'),
        'supports' => array(
            'title',
            'revisions',
            'custom-fields',
        ),
        // 'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => true,
        'menu_icon' => 'dashicons-slides',
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post', //
    );

    register_post_type('owl_slider', $args);

}
add_action('init', 'create_custom_post_type_slide');

// ----------------------------------------------- add metabox
function metabox_slider_content($post)
{
    $slider = get_post_meta($post->ID, '_owl_slide', true);
    wp_nonce_field('save_thongtin', 'thongtin_nonce');

    echo "<ul class='owl-list'>";
    if ($slider) {
        $i = 0;
        foreach ($slider as $item) {
            $img_id = isset($item['img']) ? $item['img'] : '';
            $img_url = isset($item['img']) ? wp_get_attachment_url($item['img']) : '';
            $thumb_id = isset($item['thumb']) ? $item['thumb'] : '';
            $thumb_url = isset($item['thumb']) ? wp_get_attachment_url($item['thumb']) : '';
            $title = isset($item['title']) ? $item['title'] : '';
            $desc = isset($item['desc']) ? $item['desc'] : '';
            $link = isset($item['link']) ? $item['link'] : '';
            printf("
                    <li id='item-$i'>
                        <span class='delete'>&times;</span>
                        <input type='hidden' name='owl_slide[img][]' class='hidden_input_img' value='$img_id'>
                        <label class='pickfile' style='background-image: url($img_url)'>
                            <input type='button' class='pick_img'>
                        </label>
                        <input type='hidden' name='owl_slide[thumb][]' class='hidden_input_thumb' value='$thumb_id'>
                        <label class='pickthumb' style='background-image: url($thumb_url)'>
                            <input type='button' class='pick_thumb'>
                        </label>
                        <label>
                            <span>Slide title</span>
                            <input type='text' name='owl_slide[title][]' value='$title'>
                        </label>
                        <label>
                            <span>Slide Desc</span>
                            <input type='text' name='owl_slide[desc][]' value='$desc'>
                        </label>
                        <label>
                            <span>Slide link</span>
                            <input type='text' name='owl_slide[link][]' value='$link'>
                        </label>
                    </li>
                ");

            $i++;
        }
    } else {
        printf("
                    <li id='item-$i'>
                        <span class='delete'>&times;</span>
                        <input type='hidden' name='owl_slide[img][]' class='hidden_input_img'>
                        <label class='pickfile'>
                            <input type='button' class='pick_img'>
                        </label>
                        <input type='hidden' name='owl_slide[thumb][]' class='hidden_input_thumb'>
                        <label class='pickthumb'>
                            <input type='button' class='pick_thumb'>
                        </label>
                        <label>
                            <span>Slide title</span>
                            <input type='text' name='owl_slide[title][]'>
                        </label>
                        <label>
                            <span>Slide Desc</span>
                            <input type='text' name='owl_slide[desc][]'>
                        </label>
                        <label>
                            <span>Slide link</span>
                            <input type='text' name='owl_slide[link][]'>
                        </label>
                    </li>
                ");
    }

    echo "</ul>";
    echo "<button class='add-item' type='button'>add item</button>";
}
function register_metabox_slide_info()
{
    add_meta_box('info', __('Slider Item'), 'metabox_slider_content', 'owl_slider');
}
add_action('add_meta_boxes', 'register_metabox_slide_info');

//------------------------------------------ Save filed
function array_map_r($func, $arr)
{
    $newArr = array();

    foreach ($arr as $key => $value) {
        $newArr[$key] = (is_array($value) ? array_map_r($func, $value) : (is_array($func) ? call_user_func_array($func, $value) : $func($value)));
    }

    return $newArr;
}

function owl_slider_save($post_id, $post)
{

    if (isset($post->post_status) && 'auto-draft' == $post->post_status) {
        return;
    }

    // process form data

    // isset($_POST['owl_slide']) ? $owl_slide = sanitize_text_field($_POST['owl_slide']) : null;
    isset($_POST['owl_slide']) ? $owl_slide = ($_POST['owl_slide']) : null;
    if (isset($owl_slide)) {
        // die( print_r($owl_slide) );
        $new_arr = [];
        $keys = array_keys($owl_slide);
        $len = count($owl_slide['img']);
        foreach ($keys as $key) {
            for ($i = 0; $i < $len; $i++) {
                $new_arr[$i][$key] = $owl_slide[$key][$i];
            }
        }
    }
    isset($new_arr) ? update_post_meta($post_id, '_owl_slide', $new_arr) : null;
}
add_action('save_post', 'owl_slider_save', 1, 2);

//-------------------------------------- style & script
function add_owlcarousel_FE()
{
    // css
    wp_enqueue_style('owl-style', get_template_directory_uri() . '/assets/css/admin-owl-style.css');

    //js
    $current_screen = get_current_screen();
    if ($current_screen->base == 'post' && $current_screen->post_type == 'owl_slider') {
        // wp_enqueue_media();
        wp_enqueue_script('my_slide_upload_js', get_template_directory_uri() . '/assets/js/adminSlideUpload.js');
    }
}

add_action('admin_enqueue_scripts', 'add_owlcarousel_FE');
