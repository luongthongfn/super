<?php
/*
Plugin Name: Ví dụ Meta Box
Author: Thạch Phạm
Description: Hướng dẫn tạo meta box
Author URI: https://thachpham.com
 */

/**
declare meta box
 **/

// info
function metabox_info_content($post)
{
    $price = get_post_meta($post->ID, '_price', true);
    $discount = get_post_meta($post->ID, '_discount', true);
    wp_nonce_field('save_thongtin', 'thongtin_nonce');
    printf("
        <table>
            <tr>
                <td>%s</td>
                <td>
                    <input type='number' name='price' value='$price'>
                </td>
            </tr>
            <tr>
                <td>%s</td>
                <td>
                    <input type='number' name='discount' value='$discount'>
                </td>
            </tr>
        </table>
        ", _('Giá'), _('Khuyến Mạ̣i'));
}
function register_metabox_price()
{
    add_meta_box('info', _('chi tiết sản phẩm'), 'metabox_info_content', 'sanpham');
}
add_action('add_meta_boxes', 'register_metabox_price');

/**
 * * Lưu dữ liệu meta box khi nhập vào
 * @param post_id là ID của post hiện tại
 **/
  
function thachpham_thongtin_save($post_id, $post)
{
    /* 
    A draft or "blank" is saved as soon as you start to create a new post. 
    Those new posts have the post_status of auto-draft. 
    Check for that to prevent your callback from firing on those "blank" post saves. 
    */
    if (isset($post->post_status) && 'auto-draft' == $post->post_status) {
        return;
    }

    if ( !isset($_POST['thongtin_nonce']) || !wp_verify_nonce($_POST['thongtin_nonce'], 'save_thongtin') ) {
        print 'Sorry, your nonce did not verify.';
        exit;
    } else {

        // process form data

        isset($_POST['price']) ? $price = sanitize_text_field($_POST['price']) : null;
        isset($_POST['discount']) ? $discount = sanitize_text_field($_POST['discount']) : null;

        isset($price) ? update_post_meta($post_id, '_price', $price) : null;
        isset($discount) ? update_post_meta($post_id, '_discount', $discount) : null;
    }
}
add_action('save_post', 'thachpham_thongtin_save', 1, 2);
