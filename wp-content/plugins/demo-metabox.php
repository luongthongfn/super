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
function thachpham_thongtin_save($post_id)
{
    isset($_POST['price']) ? $price = sanitize_text_field($_POST['price']) : null;
    isset($_POST['discount']) ? $discount = sanitize_text_field($_POST['discount']) : null;

    isset($price) ? update_post_meta($post_id, '_price', $price) : null;
    isset($discount) ? update_post_meta($post_id, '_discount', $discount) : null;
}
add_action('save_post', 'thachpham_thongtin_save');
