<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">My Course</h3>
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
    <div class="row">
        <?php foreach($course_data as $c_d){ ?>
        <div class="col-sm-4">
            <div class="card">
                <img src="http://localhost/Employee-Portal/assets/images/course/<?= $c_d['sec_1_img'] ?>"
                    class="card-img-top" style="height:200px">
                    <hr>
                <div class="card-body text-center">
                    <h3 class="card-title hd-heading fw-bolder"><?= $c_d['course_name'] ?></h5>
                    <h5 class="card-title"><?= $c_d['course_title'] ?></h5>
                    <a href="<?= base_url("Live-Class?id=".base64_encode($c_d['course_id'])) ?>&mode=Theory"
                        class="btn btn-sm btn-success">Class History</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>