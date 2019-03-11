<div class="item" id="post_<?= get_the_ID() ?>">
    <div class="tin">
        <div class="bder">
            <a class="img-hover reRenderImg" href=""><img src="<?php the_post_thumbnail_url('medium') ?>"></a>
            <div class="txt">
                <h3><a href=""><?php the_title() ?></a></h3>
                <div class="post-by">Đăng bởi: <?php the_author() ?></div>
                <hr>
                <p>
                    <?php the_excerpt() ?>
                </p>
                <ul class="status">
                    <li><i class="fa fa-comments-o"></i><?php comments_number(0, 1) ?> Bình luận</li>
                    <li><i class="fa fa-calendar"></i>04/03/2017 <?php the_date('d/m/Y') ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
