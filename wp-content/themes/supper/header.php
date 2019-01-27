<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="teal">
    <title>sp</title>
    <!-- <link rel="stylesheet" href="css/menu-2.css"> -->
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <!-- begin header-->
    <div class="page-loadere">
        <div class="spin"></div>
    </div>
    <header id="header">
        <section class="qts_head_top">
            <div class="menu_mb butt_mobile visible-xs visible-sm clearfix">
                <button class="nav-toggle">
                    <div class="icon-menu"><span class="line line-1"></span><span class="line line-2"></span><span class="line line-3"></span></div>
                </button>
                <div class="text-center" style="line-height: 60px">
                    <a href="">
                        <img class="img_logo_mb" src="<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); echo $image[0]; ?>"
                            alt="">
                    </a>
                    <span class="flr">
                        <div class="control-box">
                            <ul class="ul-control-box">
                                <li class="top-cart-block"><a class="open-cart-popup" href="/cart" title="Giỏ hàng"><span class="div-user-control control-4" id="cartItemsCount"></span><span
                                            class="header-cart-count CartCount" id="count_Cart_mobile">0</span></a></li>
                                <li class="dropdown" id="segment_user_do_login"><a class="info" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <div class="div-user-control control-2"></div>
                                    </a>
                                    <ul class="dropdown-menu info-user" aria-labelledby="dLabel">
                                        <li class="info"><a class="login" href="/account/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
                                        <li class="info"><a href="/account/register"><i class="fa fa-registered" aria-hidden="true"></i> Đăng ký</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </span>
                </div>
            </div>
            <!-- /menu_mb-->
            <div class="clearfix clb-header visible-sm visible-xs"></div>
            <div class="hd-top">
                <div class="container">
                    <div class="hd-top-left">
                        <div class="part">
                            <i class="fa fa-map-marker"></i>
                            <?= get_option('setting_address') ?>
                        </div>
                        <div class="part">
                            <i class="fa fa-envelope"></i>
                            <?php echo get_option('setting_email') ?>
                        </div>
                        <div class="part">
                            <i class="fa fa-mobile"></i>
                            <?php echo get_option('setting_phone') ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="qts_head_mid">
            <div class="clb5"></div>
            <div class="container">
                <div class="row_pc dp-flex-pc ai-center jc-space-between">
                    <div class="dp-flex-pc ai-center jc-space-between p0 w1">
                        <div class="col-lg-3 col-md-2 hidden-sm hidden-xs">
                            <div class="center logo_pc">
                                <a href="">
                                    <img src="<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); echo $image[0]; ?>"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form class="box_search">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                    <input class="form-control input_search" type="text" placeholder="Search"><span class="input-group-btn">
                                        <button class="btn btn-default butt_search" type="button">Tìm kiếm</button></span>
                                </div>
                            </form>
                            <ul class="chir_autocomplete">
                                <li class="title dib"><strong>Gợi ý từ khóa: </strong></li>
                                <li><span>Thời trang nam, Thời trang nữ, Balo, Túi xách, Mè và bé...</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="control-box">
                                <ul class="ul-control-box">
                                    <li class="top-hotline"><a href="/apps/kiem-tra-don-hang" title="Hot line"><span class="div-user-control control-4"><img src="<?php echo THEME_URL ?>/assets/img/phone.png"></span><span
                                                class="info">Tra cứu đơn hàng</span></a></li>
                                    <li class="top-cart-block"><a class="open-cart-popup" href="/cart" title="Giỏ hàng"><span class="div-user-control control-4" id="cartItemsCount"></span><span
                                                class="info">Giỏ hàng</span><span class="header-cart-count CartCount" id="count_Cart">0</span></a></li>
                                    <li class="dropdown" id="segment_user_do_login">
                                        <a class="info" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <div class="div-user-control control-2"></div><span> Tài khoản </span>
                                        </a>
                                        <ul class="dropdown-menu info-user" aria-labelledby="dLabel">
                                            <li class="info"><a class="login" href="/account/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
                                            <li class="info"><a href="/account/register"><i class="fa fa-registered" aria-hidden="true"></i> Đăng ký</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix hidden-lg hidden-md"></div>
                </div>
            </div>
        </section>
        <section class="qts_head_bot sc_header_menu sticky-header p0">
            <div class="menu_bg dp-flex-pc jc-space-between ai-center">
                <div class="container">
                    <div class="row_pc">
                        <div class="col-md-12">
                            <nav class="nav is-fixed" role="navigation">

                                <?php
                                wp_nav_menu([
                                    'menu' => 'menu-header',
                                    'menu_class' => 'nav-menu menu clearfix',
                                    'container_class' => 'nav-container',
                                    // 'after'=>'<span class="label_icon"></span>'
                                ])
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- end-header-->
    <div class="home-content">
