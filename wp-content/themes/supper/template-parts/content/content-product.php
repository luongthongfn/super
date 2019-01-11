
<div id="post-<?php the_ID(); ?>" <?php post_class('prod'); ?> >
    <div class="relative">
        <a class="reRenderImg relative" href="<?php the_permalink() ?>">
            <?php get_thumbnail('small') ?>
        </a>
        <div class="dp-mid-center">
            <a class="quick_views" href=""><img src="<?php echo THEME_URL ?>/assets/img/zoom_w.png" alt="Xem nhanh" title="Xem nhanh"></a>
            <a class="view_product" href="<?php the_permalink() ?>"><img src="<?php echo THEME_URL ?>/assets/img/eye_w.png" alt="Xem chi tiết" title="Xem chi tiết"></a>
            <a class="add-cart" href=""><img src="<?php echo THEME_URL ?>/assets/img/cart_w.png" alt="Thêm vào giỏ" title="Thêm vào giỏ"></a>
        </div>
        <?php
            $discount =  get_post_meta(get_the_ID(), '_discount', true);
            // echo '<pre>';
            // print_r($discount);
            // echo '</pre>';
            $price =  get_post_meta(get_the_ID(), '_price', true);
            if ($discount > 0) {
                $percent = 100 - ceil($discount *  100 / $price);
            }
        ?>
        <?php if(isset($percent)): ?>
            <div class="dp-top-right">Giảm <?php echo $percent ?>%</div>
        <?php endif ?>
    </div>
    <div class="txt">
        <h3><a href=""><?php the_title() ?></a></h3>
        <div class="price">

        <?php if($discount > 0): ?>
            <span class="current"><?php echo number_format($discount) ?>₫</span>
            <span class="older"><?php echo number_format($price) ?>₫</span>
        <?php else: ?>
            <span class="current"><?php echo number_format($price) ?>₫</span>
        <?php endif ?>
        </div>
    </div>

</div>
