<?php $user_info = $this->session->userdata('user_data');
      $order_details =  $this->session->userdata('order_details');
      $currDate = date("y-m-d");
      $currTs = strtotime($currDate);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <style>
    .hd-heading {
        color: rgb(141, 86, 252);
    }

    .count {
        display: none;
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
            <a class="large_logo" href="<?= base_url('') ?>"><img src="assets2/images/logo2.png" style="height:50px;"
                    alt=""></a>
            <a class="small_logo" href="<?= base_url('') ?>"><img src="assets2/images/logo2.png" style="height:50px;"
                    alt=""></a>
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
                <a href="<?= base_url('Order') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fas fa-cart-shopping"></i>
                    </div>
                    <div class="nav_title">
                        <span>Order</span>
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
                <a href="<?= base_url('My-Course') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <div class="nav_title">
                        <span>My Course</span>
                    </div>
                </a>
            </li>
            <!-- Programming Challenge -->
            <li>
                <a href="<?= base_url('Challenges') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fas fa-solid fa-circle-question"></i>
                    </div>
                    <div class="nav_title">
                        <span>Code Challenge</span>
                    </div>
                </a>
            </li>
            <!-- End Programming Challenge  -->
            <li>
                <a href="<?= base_url('Class-Video') ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="nav_title">
                        <span>Class Videos</span>
                    </div>
                </a>
            </li>
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
                                    <a class="bell_notification_clicker" href="#"> <img
                                            src="assets/dashboard/img/icon/bell.svg" alt="">

                                    </a>
                                    <span class="badge bg-danger" id="nCount"
                                        style="position:absolute;right:10px;bottom:10px"></span>
                                    <div class="Menu_NOtification_Wrap">
                                        <div class="notification_Header">
                                            <h4>Notifications</h4>
                                        </div>
                                        <div class="Notification_body" id="not_data">
                                        </div>
                                        <div class="nofity_footer">
                                        </div>
                                    </div>

                                </li>

                            </div>
                            <div class="profile_info">
                                <?php if(!empty($user_info['profile'])){ ?>
                                <img src="assets/images/user_profile/<?php  echo $user_info['profile'];  ?>" alt="#">
                                <?php }else{ ?>
                                <img src="assets/images/user_profile/<?php  echo "avatar.jpg";  ?>" alt="#">
                                <?php } ?>
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
        <br>
        <div class="container">
            <?php foreach($order_details AS $od){
                $DueDate = date("y-m-d",$od['due_date']);
                $newDueDate = date("y-m-d",strtotime($DueDate. '- 3 days'));
                if($currDate>=$newDueDate){
             ?>
            <div class="alert alert-danger" role="alert">
                Dear, <?= $user_info['student_name'] ?> Your <?= $od['course_name'] ?> Course Installment Is <strong>
                    Pending On <?= date('d M, Y',$od['due_date']) ?></strong>.
                Please Clear Your Due For Un-interrupted Learning. Pay Your Due By Clicking On <a
                    href="<?= base_url("Order") ?>" class="btn btn-sm btn-danger">This</a> Button<br>
                Live Classes Will be <strong> Stop On <?= date('d M, Y',$od['due_date']) ?></strong>
            </div>
            <?php } } ?>
            <!-- Modal -->
            <?php foreach($order_details AS $od){
            $DueDate = date("y-m-d",$od['due_date']);
            if($currDate>$DueDate){
            ?>
            <div class="modal fade"  data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                            <h2 class="text-center" style="padding-top:20px" id="exampleModalLabel"><span class="text-center text-danger">Dashboard Blocked</span></h2>
                        <div class="modal-body">
                           <strong> Dear, <?= $user_info['student_name'] ?> </strong> <span class="fw-bolder text-danger">Your Payment of <?= $od['course_name'] ?> Course Was Due On  <?= date('d M, Y',$od['due_date']) ?>
                            You Missed Your Due Date</span>. Please Contact Admin For Clearing The Due. Classes Will Resume After Payment 
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>
            <script src="assets/dashboard/js/jquery1-3.4.1.min.js"></script>
            <script>
            $(document).ready(function() {
                $("#exampleModal").modal('show');
            });
            </script>