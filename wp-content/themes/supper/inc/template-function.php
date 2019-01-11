<?php
if (!function_exists('get_thumbnail')) {
    function get_thumbnail($size, $check_single = false)
    {
        $is_single = true;
        if ($check_single) {
            $is_single = is_single();
        }
        // Chỉ hiển thumbnail với post không có mật khẩu
        if ($is_single && has_post_thumbnail() && !post_password_required() || has_post_format('image')): ?>
            <?php the_post_thumbnail($size);?>
        <?php
endif;
    }
}

if ( ! function_exists( 'super_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function super_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
                    __( 'Newer posts', 'super' ),
                    '>'
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
                    '<',
                    __( 'Older posts', 'super' )
				)
			)
		);
	}
endif;
