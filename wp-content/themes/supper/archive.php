<?php get_header() ?>

<article class="home-content">
    <div class="container">
        <?php breadcrumbs('crumbs') ?>
        <div class="row_pc">
            <aside class="col-md-3 col-sm-4">
                <div class="aside">
                    <?php
                        $terms = get_terms([
                            'taxonomy' => 'prod_cate',
                            'childless'=>true,
                            'number'=>11
                        ]);
                    ?>
                    <section class="sc-danhmuc-cate">
                        <h2 class="tit-aside">danh mục sản phẩm</h2>
                        <div class="sc-txt">
                            <ul class="list-cate">
                                <li><a href="">Tất cả sản phẩm</a></li>

                                <?php foreach($terms as $term): ?>
                                    <?php $term_link = get_term_link($term, 'prod_cate'); ?>
                                    <li>
                                        <a href="<?php echo $term_link ?>">
                                            <?php echo $term->name ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>

                    <?php
                        $list = new WP_Query([
                            'post_type' => 'sanpham',
                            'posts_per_page' => 5
                        ]);
                    ?>
                    <section class="sc-spnb">
                        <h2 class="tit-aside">Sản phẩm nổi bật</h2>
                        <div class="sc-txt">
                            <?php while($list->have_posts()){
                                $list->the_post();
                                get_template_part('template-parts/content/content', 'product');
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </section>
                </div>
            </aside>
            <main class="col-md-9 col-sm-8">
                <!-- begin sanpham-cate-->
                <?php
                    $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
                    $order = isset($_GET['order']) ? $_GET['order'] : null;
                    echo $orderby;
                    echo '<br/>';
                    echo $order;
                    // $term = get_query_var('name');
                    $list = new WP_Query([
                        'post_type' => 'sanpham',
                        'posts_per_page' => 18,
                        'orderby' => $orderby,
                        'order'=> $order,
                        'tax_query' => array(
                            'relation'=> 'AND',
                            array(
                                'taxonomy' => 'prod_cate',
                                'terms'    => $term,
                            )
                        )
                    ]);
                    echo '<pre>';
                    print_r($list->request);
                    echo '</pre>';

                    echo '<pre>';
                    print_r($list->query_vars);
                    echo '</pre>';
                ?>
                <section class="sc-sanpham-cate">
                    <h2 class="title-cate">
                        <a href="">Tất cả sản phẩm</a>
                        <div class="browse-tags">
                            <div id="sort-by" class="">
                                <label class="left">Sắp xếp: </label>
                                <ul>
                                    <li><span class="sortText">Thứ tự</span><span class="right-arrow"></span>
                                        <ul>
                                            <li><a href="?orderby=null">Mặc định</a></li>
                                            <li><a href="?orderby=best-selling">Bán chạy nhất</a></li>
                                            <li><a href="?orderby=name&order=asc">A &rarr; Z</a></li>
                                            <li><a href="?orderby=name&order=desc">Z &rarr; A</a></li>
                                            <li><a href="?orderby=price&order=asc">Giá tăng dần</a></li>
                                            <li><a href="?orderby=price&order=desc">Giá giảm dần</a></li>
                                            <li><a href="?orderby=created-desc">Hàng mới nhất</a></li>
                                            <li><a href="?orderby=created-asc">Hàng cũ nhất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </h2>
                    <div class="row">
                        <?php while($list->have_posts()): $list->the_post() ?>
                            <div class="col-md-4 col-sm-6 col-xs-6 clear-md-4 clear-xs-6">
                                <?php get_template_part('template-parts/content/content', 'product'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
                <!-- end sanpham-cate-->
            </main>
        </div>
    </div>
</article>
<?php get_footer() ?>
