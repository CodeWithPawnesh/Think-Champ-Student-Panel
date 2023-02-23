<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Profile</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Think-Champ</li>
                        </ol>
                    </div>
                    <div class="page_title_right">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xl-12 ">
            <div class="white_card mb_30 card_height_100">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title ">
                            <h3 class="m-0 ">User Profile</h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                        </div>
                    </div>
                </div>
                <div class="white_card_body ">
                    <div class="main_content_iner">
                        <div class="main-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <a href="assets/images/user_profile/<?php if(!empty($profile['profile'])){ echo $profile['profile'];  }else{ echo "avatar.jpg"; }  ?>"
                                                    target="_blank"><img
                                                        src="assets/images/user_profile/<?php if(!empty($profile['profile'])){ echo $profile['profile'];  }else{ echo "avatar.jpg"; }  ?>"
                                                        alt="Admin" class="rounded-circle p-1 bg-primary" width="210"
                                                        height="210"></a>
                                                <div class="mt-3">
                                                    <h4><?= $profile['student_name'] ?></h4>
                                                    <!-- <p class="text-secondary mb-1"><?= $profile['course_name'] ?></p> -->

                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <!-- <ul class="list-group list-group-flush">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">Course</h6>
                                                    <span class="text-secondary"><?= $profile['course_name'] ?></span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">Batch</h6>
                                                    <span class="text-secondary"><?= $profile['batch_name'] ?></span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">Trainer</h6>
                                                    <span class="text-secondary"><?= $profile['emp_name'] ?></span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">Group</h6>
                                                    <span
                                                        class="text-secondary"><?php if(!empty($group_data)){ echo $group_data[0]['group_name']; } ?></span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">Instructor</h6>
                                                    <span
                                                        class="text-secondary"><?php if(!empty($group_data)){ echo $group_data[0]['instructor']; } ?></span>
                                                </li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <?php if(!empty($message)){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $message; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    <?php } ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="Profile" method="post" enctype='multipart/form-data'>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Full Name </h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" name="name" class="form-control"
                                                            value="<?= $profile['student_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="email" name="email" class="form-control"
                                                            value="<?= $profile['email'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Phone</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="number" name="phone" class="form-control"
                                                            value="<?= $profile['phone'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" name="address" class="form-control"
                                                            value="<?= $profile['address'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Collage/Company</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" name="collage" class="form-control"
                                                            value="<?= $profile['collage'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Collage/Company Year</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" name="c_year" class="form-control"
                                                            value="<?= $profile['year'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Profile Picture</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="file" name="profile_picture" class="form-control">
                                                        <input type="hidden" name="profile"
                                                            value="<?= $profile['profile'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="submit" name="submit" class="btn btn-primary px-4"
                                                            value="Save Changes">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="d-flex align-items-center mb-3">Overall Progress</h5>
                                                    <p>Live Classes</p>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                            style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <p>Quiz</p>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 72%" aria-valuenow="72" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <p>Assignment</p>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 89%" aria-valuenow="89" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <p>Coding Challenge</p>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 55%" aria-valuenow="55" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <p>Live Coding Exam</p>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 66%" aria-valuenow="66" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p><?= date('Y') ?> © Think-Champ</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>
</body>

</html>
<script src="assets/dashboard/js/jquery1-3.4.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>