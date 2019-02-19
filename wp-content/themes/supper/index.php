<?php get_header()?>
<!-- begin banner-->
<section class="sc-banner">
    <div class="container">
        <div class="row m-80">
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs p80">
                <div class="danhmuc">
                    <h2 class="tit-dm">
                        <div class="tit-icon"><i class="fa fa-bars"></i></div>
                        Danh mục sản phẩm
                    </h2>
                    <ul class="as-menu">
                        <?php
                        $terms = get_terms([
                            'taxonomy' => 'prod_cate',
                            'childless'=>true,
                            'number'=>11
                        ]);
                        ?>
                        <?php foreach($terms as $term): ?>
                        <?php
                            $term_link = get_term_link($term, 'prod_cate');
                            $term_icon_id = get_term_meta($term->term_id, 'icon', true);

                            $term_icon_url = wp_get_attachment_url($term_icon_id);
                        ?>
                        <li>
                            <a href="<?php echo $term_link ?>">
                                <img src="<?php echo $term_icon_url ?>" alt="">
                                <?php echo $term->name ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>


            <!-- slider -->
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p80">
                <div class="slider_main owl-carousel">
                    <div class="item"><a href=""><img src="<?php echo THEME_URL ?>/assets/img/banner1.jpg"></a></div>
                    <div class="item"><a href=""><img src="<?php echo THEME_URL ?>/assets/img/banner1.jpg"></a></div>
                    <div class="item"><a href=""><img src="<?php echo THEME_URL ?>/assets/img/banner1.jpg"></a></div>
                </div>
                <div class="dp-top-right hidden-sm hidden-xs">
                    <ul id="main-custom-dots">
                        <li class="owl-dot"><img src="<?php echo THEME_URL ?>/assets/img/banner-thum1.jpg">
                            <div class="txt"><a href="">
                                    <div class="tit">Viên uống trắng da cao cấp</div>
                                    <div class="desc">Sản xuất 100% từ thiên thiên</div>
                                </a></div>
                        </li>
                        <li class="owl-dot"><img src="<?php echo THEME_URL ?>/assets/img/banner-thum2.jpg">
                            <div class="txt"><a href="">
                                    <div class="tit">Viên uống trắng da cao cấp</div>
                                    <div class="desc">Sản xuất 100% từ thiên thiên</div>
                                </a></div>
                        </li>
                        <li class="owl-dot"><img src="<?php echo THEME_URL ?>/assets/img/banner-thum3.jpg">
                            <div class="txt"><a href="">
                                    <div class="tit">Viên uống trắng da cao cấp</div>
                                    <div class="desc">Sản xuất 100% từ thiên thiên</div>
                                </a></div>
                        </li>
                    </ul>
                </div>
                <hr>
                <hr>

                <?php
                $slide = new WP_Query([
                    'post_type' => 'owl_slider',
                    'name'      => 'main-slider'
                ]);


                $slide_id = $slide->posts[0]->ID;
                // echo '<pre>';
                // print_r($slide->posts);
                // echo '</pre>';
                $slide = get_post_meta($slide_id, '_owl_slide', true);

                echo '<pre>';
                print_r($slide);
                echo '</pre>';

                ?>
            </div>
        </div>
    </div>
</section>
<!-- end banner-->
<section class="sc-sanpham-hot">
    <div class="container">
        <h2 class="title-home"><a href="">Danh mục nổi bật</a></h2>
        <div class="m-80">
            <div class="col-md-3 hidden-sm hidden-xs p80">
                <div class="imgage_hover"><a href=""><img class="insImageload w1" src="<?php echo THEME_URL ?>/assets/img/seller_banner.jpg" alt="Super store"></a></div>
            </div>
            <div class="col-md-9">
                <div class="slider_prod_hot owl-carousel imgRow">

                    <?php
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'sanpham' ),
                            'posts_per_page'         => '10',
                            'orderby'                => 'date',
                        );
                        // The Query
                        $query = new WP_Query( $args );
                    ?>
                    <?php
                        if ($query->have_posts()) {

                            // Load posts loop.
                            while ( $query->have_posts()) {
                                $query->the_post();
                                echo '<div class="item">';
                                get_template_part('template-parts/content/content','product');
                                echo '</div>';
                            }
                        } else {

                            // If no content, include the "No posts found" template.
                            get_template_part('template-parts/content/content', 'none');

                        }
                        wp_reset_postdata();
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $terms_child = get_term_children(78,'prod_cate'); ?>


<section class="sc-sanpham-home">
    <div class="container">
        <h2 class="title-home"><a href="">THỜI TRANG & SẮC ĐẸP</a></h2>
        <div class="row m-80">
            <div class="col-md-3 hidden-sm hidden-xs p80">
                <ul class="list-cate-block clearfix">
                    <?php
                foreach ( $terms_child as $child ):
                    $term = get_term_by( 'id', $child, 'prod_cate' );
                    $term_feature_id = get_term_meta($child, 'feature', true );
                    $term_feature = wp_get_attachment_url( $term_feature_id );
                    ?>
                    <li>
                        <a href="<?= get_term_link( $child, 'prod_cate' ) ?>"><img src="<?=$term_feature ?>"><span>
                                <?=$term->name?></span></a>
                    </li>
                    <?php
                endforeach;
                ?>
                </ul>
                <a href="">
                    <img class="w1" src="<?= THEME_URL ?>/assets/img/banner_block_home_1.jpg" style="margin-left: -1px">
                </a>
            </div>
            <div class="col-md-9 p80">
                <div class="main-block">
                    <!-- Nav tabs-->
                    <div class="home-tab-mb btn btn-default hidden-lg hidden-md hidden-sm flr"><i class="fa fa-list"></i></div>
                    <ul class="home-tabs ajax-tabs" role="tablist">
                        <?php $tab = 1 ;
                        foreach($terms_child as $child):
                            $term = get_term_by( 'id', $child, 'prod_cate' );
                            $term_feature_id = get_term_meta($child, 'feature', true );
                            $term_feature = wp_get_attachment_url( $term_feature_id );
                            ?>
                        <li class="<?= $tab == 1 ? 'active' : '' ?>" role="presentation">
                            <a href="#tab<?= $tab ?>" aria-controls="tab<?= $tab ?>" role="tab" data-toggle="tab">
                                <?=$term->name?></a>
                        </li>
                        <?php
                        $tab++;
                        endforeach; ?>

                    </ul>
                    <!-- Tab panes-->
                    <div class="tab-content home-tabs-content">
                        <?php $tab = 1; ?>
                        <?php foreach($terms_child as $child): ?>
                        <div class="tab-pane imgRow <?= $tab == 1 ? 'active' : '' ?>" role="tabpanel" id="tab<?= $tab ?>">

                            <?php $list = new WP_Query([
                                    'post_type' => 'sanpham',
                                    'tax_query' => array(
                                        'relation'=> 'AND',
                                        array(
                                            'taxonomy' => 'prod_cate',
                                            'terms'    => $child,
                                        )
                                    )

                                ]) ?>

                            <?php while($list->have_posts()): $list->the_post() ?>
                            <div class="col-lg-200 col-md-3 col-sm-4 col-xs-6 p0 ">
                                <div class="home-prod">
                                    <?php get_template_part('template-parts/content/content','product') ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata() ?>

                            <div class="clearfix"></div>
                            <div class="more"><a href="<?= get_term_link( $child, 'prod_cate' ) ?>">Xem thêm</a></div>
                        </div>
                        <?php $tab++ ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

    $now = time();
    $list = new WP_Query([
        'post_type' => 'sanpham',
        'meta_query' => [
            'relation' => 'AND',
            [
                'key' => '_flashsale',
                'value' => 'on',
                'compare' => '='
            ],
            [
                'key' => '_flashsale_from',
                'value' => $now,
                'compare' => '<'
            ],
            [
                'key' => '_flashsale_to',
                'value' => $now,
                'compare' => '>'
            ]
        ]
    ]);

?>
<section class="sc-deal-time">
    <div class="container">
        <h2 class="title-home"><a href="">deal time</a></h2>
        <div class="slider_deal owl-carousel">
            <?php
                while ($list->have_posts()) {
                    $list->the_post();
                    get_template_part('template-parts/content/content','flashsale');
                }
                wp_reset_postdata()
            ?>
        </div>
    </div>
</section>

<section class="sc-news-home">
    <div class="container">
        <h2 class="title-home"><a href="">Tin tức nổi bật</a></h2>
        <div class="slider_news owl-carousel imgRow">
            <?php
            if (have_posts()) {


                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content/content', 'new');
                }
            } else{
                get_template_part('template-parts/content/content', 'none');
            }
            wp_reset_postdata()
            ?>
        </div>
    </div>
</section>

<?php get_footer()?>
