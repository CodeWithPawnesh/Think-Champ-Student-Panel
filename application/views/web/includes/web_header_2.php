<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>Think Champ</title>
    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
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
    <div class="full-width-header header-style2 modify1 header-home6">
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
                                <div class="logo-part pr-90">
                                    <a href="index.html">
                                        <img src="assets2/images/logo.png" alt="">
                                    </a>
                                </div>
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
                                            <li class="rs-mega-menu mega-rs menu-item-has-children current-menu-item">
                                                <a href="<?= base_url('') ?>">Home</a>

                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#rs-about">About</a>

                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="#rs-popular-courses">Courses</a>

                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="#rs-faq">faqs</a>

                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="rs-blog">Blog</a>

                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="#rs-contact">Contact</a>

                                            </li>
                                            <li class="menu-item-has-children">
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
                    <a href="index.html"><img src="assets2/images/logo.png" alt="logo"></a>
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
