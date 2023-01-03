<?php $user_info = $this->session->userdata('user_data'); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
<style>
    .hd-heading{
        color:rgb(141, 86, 252);
    }
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/dashboard/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/dashboard/vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/datepicker/date-picker.css" />
    <link rel="stylesheet" href="assets/dashboard/vendors/vectormap-home/vectormap-2.0.2.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/scroll/scrollable.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="assets/dashboard/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="assets/dashboard/vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="assets/dashboard/vendors/morris/morris.css">

    <link rel="stylesheet" href="assets/dashboard/vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="assets/dashboard/css/metisMenu.css">

    <link rel="stylesheet" href="assets/dashboard/css/style1.css" />
    <link rel="stylesheet" href="assets/dashboard/css/style.css" />
    <link rel="stylesheet" href="assets/dashboard/css/colors/default.css" id="colorSkinCSS">
</head>

<body class="crm_body_bg">


    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo" href="<?= base_url('') ?>"><img src="assets/images/home/Logo.png" style="height:50px;" alt=""></a>
            <a class="small_logo" href="<?= base_url('') ?>"><img src="assets/images/home/Logo.png" style="height:50px;" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li>
                <a href="<?= base_url('Dashboard') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-home"></i>
                    </div>
                    <div class="nav_title">
                        <span>DashBoard</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Profile') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-user"></i>
                    </div>
                    <div class="nav_title">
                        <span>Profile</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Live-Class') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-laptop"></i>
                    </div>
                    <div class="nav_title">
                        <span>Class</span>
                    </div>
                </a>
            </li>
            <!-- <li>
                <a href="<?= base_url('') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-book"></i>
                    </div>
                    <div class="nav_title">
                        <span>Notes</span>
                    </div>
                </a>
            </li> -->
            <li>
                <a href="<?= base_url('Leave') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-file"></i>
                    </div>
                    <div class="nav_title">
                        <span>Leave</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Assignment') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-duotone fa-briefcase"></i>
                    </div>
                    <div class="nav_title">
                        <span>Assessment</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Quiz') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-solid fa-circle-question"></i>
                    </div>
                    <div class="nav_title">
                        <span>Quiz</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Job') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-solid fa-handshake"></i>
                    </div>
                    <div class="nav_title">
                        <span>Job Updates</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Internship') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-duotone fa-hands-asl-interpreting"></i>
                    </div>
                    <div class="nav_title">
                        <span>Internship</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Certificate') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                    <i class="fas fa-certificate"></i>
                    </div>
                    <div class="nav_title">
                        <span>CertiFicate</span>
                    </div>
                </a>
            </li>
           
        </ul>
    </nav>

    <section class="main_content dashboard_part large_header_bg">

        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <label class="form-label switch_toggle d-none d-lg-block" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="slider round open_miniSide"></div>
                        </label>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                
                                <li>
                                    <a class="bell_notification_clicker" href="#"> <img src="assets/dashboard/img/icon/bell.svg" alt="">
                                       
                                    </a>

                                    <div class="Menu_NOtification_Wrap">
                                        <div class="notification_Header">
                                            <h4>Notifications</h4>
                                        </div>
                                        <div class="Notification_body">

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                  
                                                </div>
                                                <div class="notify_content">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nofity_footer">
                                            <div class="submit_button text-center pt_20">
                                                <a href="#" class="btn_1">See More</a>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                
                            </div>
                            <div class="profile_info">
                                <img src="assets/images/user_profile/<?php  echo "avatar.jpg";  ?>" alt="#">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <h5><?= $user_info['student_name'] ?></h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="<?= base_url("Profile") ?>">My Profile </a>
                                        <a href="<?= base_url("Auth/logout") ?>">Log Out </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>