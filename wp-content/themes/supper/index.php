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


                        <!-- <li class="dropdown">
                            <a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm1.png">Tất cả sản phẩm</a>
                            <ul class="dropdown-content">
                                <li class="dropdown">
                                    <a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1</a>
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1</a>
                                        </li>
                                        <li>
                                            <a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1</a>
                                        </li>
                                        <li>
                                            <a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1</a></li>
                                <li><a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1</a></li>
                                <li><a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1</a></li>
                                <li><a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm2.png">Thê thao</a>
                            <ul class="dropdown-content mega-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="tit-menu">Nổi bật</h3>
                                        <li><a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1 link 1 link 1</a></li>
                                        <li><a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1 link 1 link 1</a></li>
                                        <li><a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm-child.png">link 1 link 1 link 1</a></li>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="tit-menu">Mới nhất</h3>
                                        <div class="menu-prod"><a href=""><img class="w1" src="<?php echo THEME_URL ?>/assets/img/sp1.jpg">
                                                <h3>Apple Macbook 14 inch 256GB - Rose 2016</h3>
                                            </a>
                                            <div class="price"><span class="current">25.000.000 ₫</span><span class="older">35.000.000 ₫</span></div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li><a href=""><img src="<?php echo THEME_URL ?>/assets/img/i-dm11.png">Sản phẩm khuyến mãi</a></li> -->
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
                <script></script>
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

<?php
$terms_child = get_term_children(78,'prod_cate');
echo '<pre>';
print_r($terms_child);
echo '</pre>';
?>
<?php
echo '<ul>';
    foreach ( $terms_child as $child ) {
        $term = get_term_by( 'id', $child, 'prod_cate' );
        $term_feature_id = get_term_meta($child, 'feature', true );
        $term_feature = wp_get_attachment_url( $term_feature_id );
        echo '<li><a href="' . get_term_link( $child, 'prod_cate' ) . '">' . $term->name . '</a></li>';
        ?>
        <img src="<?=$term_feature ?>" alt="">
        <?php
    }
echo '</ul>';
?>
<section class="sc-sanpham-home">
    <div class="container">
        <h2 class="title-home"><a href="">THỜI TRANG & SẮC ĐẸP</a></h2>
        <div class="row m-80">
            <div class="col-md-3 hidden-sm hidden-xs p80">
                <ul class="list-cate-block clearfix">
                    <li>
                        <a href=""><img src="<?= THEME_URL ?>/assets/img/brand_1_block_home_1.png"><span>Áo nam/nữ</span></a>
                    </li>
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
                        <li class="active" role="presentation"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Mỹ phẩm</a></li>
                        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Thời trang</a></li>
                        <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">
                                Viên uống chức
                                năng</a></li>
                        <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Trang sức</a></li>
                        <li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">Bán chạy</a></li>
                    </ul>
                    <!-- Tab panes-->
                    <div class="tab-content home-tabs-content">
                        <div class="tab-pane active imgRow" role="tabpanel" id="tab1">
                            <div class="col-lg-200 col-md-3 col-sm-4 col-xs-6 p0">
                                <div class="home-prod">
                                    <div class="relative"><a class="reRenderImg relative" href=""><img src="img/prod1.jpg"></a>
                                        <div class="dp-mid-center"><a class="quick_views" href=""><img src="img/zoom_w.png" alt="Xem nhanh" title="Xem nhanh"></a><a class="view_product"
                                                href=""><img src="img/eye_w.png" alt="Xem chi tiết" title="Xem chi tiết"></a><a class="add-cart" href=""><img src="img/cart_w.png"
                                                    alt="Thêm vào giỏ" title="Thêm vào giỏ"></a></div>
                                        <div class="dp-top-right">Giảm 92%</div>
                                    </div>
                                    <div class="txt">
                                        <h3><a href="">Balo nam nữ style dể thương SID49706 1</a></h3>
                                        <div class="price"><span class="current">25.500₫</span><span class="older">30.000₫</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="more"><a href="">Xem thêm</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer()?>
