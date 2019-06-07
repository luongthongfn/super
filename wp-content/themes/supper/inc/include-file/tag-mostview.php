<?php
// test
// update_term_meta( 104, 'test_metadata', 123 );



function add_view_count($term_id, $tt_id)
{

    // do something
    update_term_meta($term_id, 'view_count', 12, true);
    echo '<pre>';
    print_r("aaaaaaaaaaaaaaaaaaaaaaaaaaaa");
    echo '</pre>';

    // die;
}
// add_action('create_term ', 'add_view_count', 10, 2);
add_action('create_post_tag ', 'add_view_count', 10, 2);
add_action('edited_post_tag ', 'add_view_count', 10, 2);
// add_action('edited_post_tag', 'save_taxonomy_custom_meta', 10, 2);

function post_tag_add_form()
{
    ?>
        <div>
            <input type="text" placeholder="viewer">
        </div>
        <br>
    <?php
}
add_action('post_tag_add_form_fields', 'post_tag_add_form', 10, 2);
