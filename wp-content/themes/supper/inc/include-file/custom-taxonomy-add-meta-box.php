<?php
// thêm trang term

function pippin_taxonomy_add_new_meta_field()
{
    // thêm custom meta field vào trang add new term
    ?>
        <div>
            <?php wp_nonce_field('nonce_metadata_action', 'nonce_metadata')?>
            <!-- List of images id to save -->
            <?php $input_name = 'feature';?>
            <input id="<?=$input_name?>_input" type="hidden" name="meta_data[<?=$input_name?>]" value="">
            <!-- The button to select images -->
            <p><?php _e('Thêm ảnh đại diện cho danh mục', 'super')?></p>
            <button id="pick_<?=$input_name?>" class="button">Select Images</button>
            <!-- Show images, use wp_get_attachment_image_src -->
            <ul id="display_<?=$input_name?>" class="display_media"></ul>

            <?php $input_name = 'icon';?>
            <input id="<?=$input_name?>_input" type="hidden" name="meta_data[<?=$input_name?>]" value="">
            <p><?php _e('Thêm icon cho danh mục', 'super')?></p>
            <button id="pick_<?=$input_name?>" class="button">Select Images</button>
            <ul id="display_<?=$input_name?>" class="display_media"></ul>
        </div>
    <?php
}
add_action('prod_cate_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2);

// chỉnh sửa trang term
function pippin_taxonomy_edit_meta_field($term)
{

    // gán term ID vào một biến
    $t_id = $term->term_id;
    // truy xuất giá trị hiện tại cho meta field này, trả về một mảng
    $term_meta = get_term_meta($t_id, $single = false);
    $test_Term_list = get_the_term_list($t_id, 'feature', '', ',');

    ?>
    <tbody>
        <tr>
            <th>
                <?php wp_nonce_field('nonce_metadata_action', 'nonce_metadata')?>

                <?php $input_name = 'feature';?>

                <label><?php _e('Thêm ảnh đại diện cho danh mục', 'super')?></label>
                <input id="<?=$input_name?>_input" type="hidden" name="meta_data[<?=$input_name?>]" value="<?=isset($term_meta[$input_name]) ? esc_attr($term_meta[$input_name][0]) : ''?>">
            </th>
            <td>
                <button id="pick_<?=$input_name?>" class="button">Select Images</button>

                <ul id="display_<?=$input_name?>" class="display_media">
                <?php if (isset($term_meta[$input_name])): ?>
                    <?php foreach ($term_meta[$input_name] as $id): ?>
                        <?php $attachment_url = wp_get_attachment_url(esc_attr($id))?>
                        <li>
                            <img src="<?=$attachment_url?>" alt="">
                        </li>
                    <?php endforeach;?>
                <?php endif;?>
                </ul>
            </td>
        </tr>

        <tr>
            <th>
                <?php $input_name = 'icon';?>

                <label><?php _e('Thêm icon cho danh mục', 'super')?></label>
                <input id="<?=$input_name?>_input" type="hidden" name="meta_data[<?=$input_name?>]" value="<?=isset($term_meta[$input_name]) ? esc_attr($term_meta[$input_name][0]) : ''?>">
            </th>
            <td>
                <button id="pick_<?=$input_name?>" class="button">Select Images</button>

                <ul id="display_<?=$input_name?>" class="display_media">
                    <?php if (isset($term_meta[$input_name])): ?>
                        <?php foreach ($term_meta[$input_name] as $id): ?>
                            <?php $attachment_url = wp_get_attachment_url($id)?>
                            <li>
                                <img src="<?=$attachment_url?>" alt="">
                            </li>
                        <?php endforeach;?>
                    <?php endif;?>
                </ul>
            </td>
        </tr>
    </tbody>
<?php
}
add_action('prod_cate_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2);

// function lưu field extra taxonomy
function save_taxonomy_custom_meta($term_id)
{
    if (isset($_POST['meta_data']) && wp_verify_nonce($_POST['nonce_metadata'], 'nonce_metadata_action')) {

        $cat_keys = array_keys($_POST['meta_data']);
        echo '<pre>';
        print_r($cat_keys);
        echo '</pre>';
        foreach ( $cat_keys as $key ) {
            if ( isset($_POST['meta_data'][$key]) ) {
                $term_meta[$key] = $_POST['meta_data'][$key];
                update_term_meta($term_id, $key, $_POST['meta_data'][$key]);
            }
        }
    }
}
add_action('edited_prod_cate', 'save_taxonomy_custom_meta', 10, 2);
add_action('create_prod_cate', 'save_taxonomy_custom_meta', 10, 2);
