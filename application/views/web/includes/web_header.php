<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?= $title; ?></title>
    <meta name="description"
        content="<?= $description; ?>">
    <meta name="keywords"
        content="<?= $keywords ?>">
    <link rel="canonical" href="https://think-champ.com/" />
    <meta property="og:url" content="https://think-champ.com/" />
    <meta property="og:site_name" content="Think-Champ" />
    <meta property=“og:title” content="<?= $title ?>" />
    <meta property="og:description"
        content="<?= $description; ?>" />
    <meta property="og:url" content="https://think-champ.com/" />
    <link rel="alternate" href="https://think-champ.com" hreflang="en-us">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://think-champ.com/assets2/assets/images/bg/home6/icon/2.png" />
        <!-- meta tag -->
        <meta charset="utf-8">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/style.css") ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("assets2/assets/images/fav.png") ?>">
    <!-- Bootstrap v5.0.2 css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/css/bootstrap.min.css") ?>">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/css/font-awesome.min.css") ?>">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/css/animate.css") ?>">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/css/owl.carousel.css") ?>">
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/css/slick.css") ?>">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/css/off-canvas.css") ?>">
    <!-- linea-font css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/fonts/linea-fonts.css") ?>">
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/fonts/flaticon.css") ?>">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/css/magnific-popup.css") ?>">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="<?= base_url("assets2/assets/css/rsmenu-main.css") ?>">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/css/rs-spacing.css") ?>">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/style.css") ?>">
    <!-- This stylesheet dynamically changed from style.less -->
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets2/assets/css/responsive.css") ?>">
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body class="home-style6">

    <!--Preloader area start here-->
    <div id="loader" class="loader">
        <div class="loader-container">
            <div class='loader-icon'>
                <img src="assets2/images/logo.png" alt="">
            </div>
        </div>
    </div>
    <!--Preloader area End here-->

    <!--Full width header Start-->
    <div class="full-width-header header-style1 modify1 header-home6">
        <!--Header Start-->
        <header id="rs-header" class="rs-header">
            <!-- Topbar Area Start -->
            <div class="topbar-area d-none">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-md-6">
                            <ul class="topbar-contact">
                                <li>
                                    <i class="flaticon-email"></i>
                                    <a href="mailto:support@rstheme.com">support@rstheme.com</a>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <a href="tel:+0885898745">(+088) 589-8745</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-end">
                            <ul class="topbar-right">
                                <li class="login-register">
                                    <i class="fa fa-sign-in"></i>
                                    <a href="login.html">Login</a>/<a href="register.html">Register</a>
                                </li>
                                <li class="btn-part">
                                    <a class="apply-btn" href="#">Apply Now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar Area End -->

            <!-- Menu Start -->
            <div class="menu-area menu-sticky">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-3">
                            <div class="logo-cat-wrap">
                                    <a href="index.html">
                                        <img src="assets2/images/logo2.png" style="width:200px" alt="">
                                    </a>
                            </div>
                        </div>
                        <div class="col-lg-9 text-center">
                            <div class="rs-menu-area">
                                <div class="main-menu pr-90 md-pr-15">
                                    <div class="mobile-menu">
                                        <a class="rs-menu-toggle">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </div>
                                    <nav class="rs-menu">
                                        <ul class="nav-menu">
                                            <li class="rs-mega-menu mega-rs menu-item-has-children ">
                                                <a href="<?= base_url('') ?>">Home</a>

                                            </li>
                                            <?php
                                            $active="";
                                            $current_page =  $_SERVER['REQUEST_URI'] ;
                                            $current_page = explode("/",$current_page);
                                                  foreach($current_page as $c_p)
                                                      {
                                                        if($c_p=="About-Us"){
                                                        $active = "current-menu-item";
                                                         }
                                                      }
                                            ?>
                                            <li class="menu-item-has-children <?= $active; ?>">
                                                <a href="<?= base_url('About-Us') ?>">About</a>

                                            </li>
                                            <?php
                                            $active="";
                                            $current_page =  $_SERVER['REQUEST_URI'] ;
                                            $current_page = explode("/",$current_page);
                                                  foreach($current_page as $c_p)
                                                      {
                                                        if($c_p=="Courses"){
                                                        $active = "current-menu-item";
                                                         }
                                                      }
                                            ?>
                                            <li class="menu-item-has-children <?= $active ?>">
                                                <a href="<?= base_url("Courses") ?>">Courses</a>

                                            </li>
                                            <?php
                                            $active="";
                                            $current_page =  $_SERVER['REQUEST_URI'] ;
                                            $current_page = explode("/",$current_page);
                                                  foreach($current_page as $c_p)
                                                      {
                                                        if($c_p=="FAQ"){
                                                        $active = "current-menu-item";
                                                         }
                                                      }
                                            ?>
                                            <li class="menu-item-has-children <?= $active ?>">
                                                <a href="<?= base_url("FAQ") ?>">faqs</a>
                                            </li>
                                            <?php
                                            $active="";
                                            $current_page =  $_SERVER['REQUEST_URI'] ;
                                            $current_page = explode("/",$current_page);
                                                  foreach($current_page as $c_p)
                                                      {
                                                        if($c_p=="Blog"){
                                                        $active = "current-menu-item";
                                                         }
                                                      }
                                            ?>
                                            <li class="menu-item-has-children <?= $active ?>">
                                                <a href="<?= base_url("Blog") ?>">Blog</a>

                                            </li>
                                            <?php
                                            $active="";
                                            $current_page =  $_SERVER['REQUEST_URI'] ;
                                            $current_page = explode("/",$current_page);
                                                  foreach($current_page as $c_p)
                                                      {
                                                        if($c_p=="Contact"){
                                                        $active = "current-menu-item";
                                                         }
                                                      }
                                            ?>
                                            <li class="menu-item-has-children <?= $active ?>">
                                                <a href="<?= base_url("Contact") ?>">Contact</a>

                                            </li>
                                            <?php
                                            $active="";
                                            $current_page =  $_SERVER['REQUEST_URI'] ;
                                            $current_page = explode("/",$current_page);
                                                  foreach($current_page as $c_p)
                                                      {
                                                        if($c_p=="auth"){
                                                        $active = "current-menu-item";
                                                         }
                                                      }
                                            ?>
                                            <li class="menu-item-has-children <?= $active ?>">
                                                <a href="<?= base_url("auth") ?>">LOGIN</a>

                                            </li>

                                        </ul> <!-- //.nav-menu -->
                                    </nav>
                                </div> <!-- //.main-menu -->
                                <div class="expand-btn-inner">
                                    <ul>
                                        <li>
                                            <a class="hidden-xs rs-search" data-bs-toggle="modal"
                                                data-bs-target="#searchModal" href="#">
                                                <i class="flaticon-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <a id="nav-expander" class="nav-expander style6">
                                        <span class="dot1"></span>
                                        <span class="dot2"></span>
                                        <span class="dot3"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->

            <!-- Canvas Menu start -->
            <nav class="right_menu_togle hidden-md">
                <div class="close-btn">
                    <div id="nav-close">
                        <div class="line">
                            <span class="line1"></span><span class="line2"></span>
                        </div>
                    </div>
                </div>
                <div class="canvas-logo">
                    <a href="index.html"><img src="assets/images/logo-dark.png" alt="logo"></a>
                </div>
                <div class="offcanvas-text">
                    <p>We denounce with righteous indige nationality and dislike men who are so beguiled and demo by the
                        charms of pleasure of the moment data com so blinded by desire.</p>
                </div>
                <div class="offcanvas-gallery">
                    <div class="gallery-img">
                        <a class="image-popup" href="assets/images/gallery/1.jpg"><img src="assets/images/gallery/1.jpg"
                                alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="assets/images/gallery/2.jpg"><img src="assets/images/gallery/2.jpg"
                                alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="assets/images/gallery/3.jpg"><img src="assets/images/gallery/3.jpg"
                                alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="assets/images/gallery/4.jpg"><img src="assets/images/gallery/4.jpg"
                                alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="assets/images/gallery/5.jpg"><img src="assets/images/gallery/5.jpg"
                                alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="assets/images/gallery/6.jpg"><img src="assets/images/gallery/6.jpg"
                                alt=""></a>
                    </div>
                </div>
                <div class="map-img">
                    <img src="assets/images/map.jpg" alt="">
                </div>
                <div class="canvas-contact">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </nav>
            <!-- Canvas Menu end -->
        </header>
        <!--Header End-->
    </div>
    <!--Full width header End-->
