<?php
// thêm trang term
function pippin_taxonomy_add_new_meta_field()
{
    // thêm custom meta field vào trang add new term
    ?>
        <div>
            <label for="term_meta[term_feature_img]">
                <?php _e('Ảnh danh mục', 'super');?>
            </label>
            <input type="file" name="term_meta[term_feature_img]" id="term_meta[term_feature_img]" value="">
            <p><?php _e('Enter a value for this field', 'super');?></p>

            <label for="term_meta[term_feature_icon]">
                <?php _e('Icon danh mục', 'super');?>
            </label>
            <input type="file" name="term_meta[term_feature_icon]" id="term_meta[term_feature_icon]" value="">
            <p><?php _e('Enter a value for this field', 'super');?></p>
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
    $term_meta = get_option("taxonomy_$t_id");?>
        <tr>
            <th scope="row" valign="top">
                <label for="term_meta[custom_term_meta]">
                    <?php _e('Ảnh danh mục', 'super');?>
                </label>
            </th>
            <td>
                <input
                    type="file"

                    id="term_meta[custom_term_meta]"
                    name="term_meta[custom_term_meta]"
                    value="<?php echo esc_attr($term_meta['custom_term_meta']) ? esc_attr($term_meta['custom_term_meta']) : ''; ?>">
                <p><?php _e('Enter a value for this field', 'super');?></p>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top">
                <label for="term_meta[term_feature_icon]">
                    <?php _e('Icon danh mục', 'super');?>
                </label>
            </th>
            <td>
                <input
                    type="file"
                    id="term_meta[term_feature_icon]"
                    name="term_meta[term_feature_icon]"
                    value="<?php echo esc_attr($term_meta['term_feature_icon']) ? esc_attr($term_meta['term_feature_icon']) : ''; ?>">
                <p><?php _e('Enter a value for this field', 'super');?></p>
            </td>
        </tr>
<?php
}
add_action('prod_cate_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2);

// function lưu field extra taxonomy
function save_taxonomy_custom_meta($term_id)
{
    if (isset($_POST['term_meta'])) {
        $t_id = $term_id;
        $term_meta = get_option("taxonomy_$t_id");
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }

        // lưu mảng tùy chọn
        update_option("taxonomy_$t_id", $term_meta);
    }
}
add_action('edited_prod_cate', 'save_taxonomy_custom_meta', 10, 2);
add_action('create_prod_cate', 'save_taxonomy_custom_meta', 10, 2);
