<?php
// product meta-box
function metabox_info_content($post)
{
    $price = get_post_meta($post->ID, '_price', true);
    $discount = get_post_meta($post->ID, '_discount', true);
    $flashsale_from = get_post_meta($post->ID, '_flashsale_from', true);
    $flashsale_to = get_post_meta($post->ID, '_flashsale_to', true);
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
            <tr>
                <td>%s</td>
                <td>
                    %s
                    <input type='date' name='flashsale_from' value='$flashsale_from'>
                    %s
                    <input type='date' name='flashsale_to' value='$flashsale_to'>
                </td>
            </tr>
        </table>
        ",__('Giá'),__('Khuyến Mạ̣i'),__('Flash sale'),__('From'),__('To'));
}
function register_metabox_price()
{
    add_meta_box('info',__('chi tiết sản phẩm'), 'metabox_info_content', 'sanpham');
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

    // if ( !isset($_POST['thongtin_nonce']) || !wp_verify_nonce($_POST['thongtin_nonce'], 'save_thongtin') ) {
    //     print 'Sorry, your nonce did not verify.';
    //     exit;
    // } else {

        // process form data

        isset($_POST['price']) ? $price = sanitize_text_field($_POST['price']) : null;
        isset($_POST['discount']) ? $discount = sanitize_text_field($_POST['discount']) : null;
        isset($_POST['flashsale_from']) ? $flashsale_from = sanitize_text_field($_POST['flashsale_from']) : null;
        isset($_POST['flashsale_to']) ? $flashsale_to = sanitize_text_field($_POST['flashsale_to']) : null;

        isset($price) ? update_post_meta($post_id, '_price', $price) : null;
        isset($discount) ? update_post_meta($post_id, '_discount', $discount) : null;
        isset($flashsale_from) ? update_post_meta($post_id, '_flashsale_from', $flashsale_from) : null;
        isset($flashsale_to) ? update_post_meta($post_id, '_flashsale_to', $flashsale_to) : null;
    // }
}
add_action('save_post', 'thachpham_thongtin_save', 1, 2);
