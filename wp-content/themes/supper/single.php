<?php get_header()?>
<?php breadcrumbs()?>

<h1>single</h1>
<?php
$tags = get_the_tags(get_the_ID());
echo '<pre>';
print_r(get_the_ID());
print_r($tags);
echo '</pre>';

if (is_array($tags)) {
    foreach ($tags as $tag) {
        $pre_val = get_term_meta($tag->term_id, 'view_count', true);
        if (isset($pre_val)) {
            $update_val = (int) $pre_val + 1;
        } else {
            $update_val = 1;
        }

        if (update_term_meta($tag->term_id, 'view_count', $update_val)) {
            echo "updated /n ";
        }
    }
}

$terms = get_terms('post_tag', array(
    'hide_empty' => false,
    "meta_key" => "view_count",
    "orderby" => 'meta_value_num',
    'order' => 'DESC'
));

echo '<pre>';
print_r($terms);
echo '</pre>';

?>
<div class="container">
    <ul>
        <?php foreach ($terms as $term): ?>
        <?php $term_view = get_term_meta($term->term_id, 'view_count', true);?>
        <li><?=$term->name?>  <span class="badge"><?=$term_view?> view</span></li>
        <?php endforeach;?>
    </ul>
</div>




<?php get_footer()?>
