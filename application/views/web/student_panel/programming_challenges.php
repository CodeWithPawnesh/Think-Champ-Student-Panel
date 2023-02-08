<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Code Challenges </h3>
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
            <!-- Start Challenges Card  -->
            <div class="row">
                <?php foreach($programming_quiz AS $pq){ ?>
                <div class="col-lg-12">
                    <!-- CUSTOM BLOCKQUOTE -->
                    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                        <div class="row">
                            <div class="col-lg-9 cont_div">
                                <h2><?= $pq['challenge_name'] ?> Challenge</h2>
                                <p>
                                    <?php if($pq['level']==1){ ?><span
                                        class="text-success fw-bolder">Easy</span><?php } ?>
                                    <?php if($pq['level']==2){ ?><span class="text-warning">Medium</span><?php } ?>
                                    <?php if($pq['level']==3){ ?><span class="text-danger">Hard</span><?php } ?>,
                                    <?= $pq['course_name'] ?>,
                                    Max-Marks : <?= $pq['marks'] ?>
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <?php if($pq['check']==1){ ?>
                                <a href="<?= base_url("Programming/quiz_panel?id=").base64_encode($pq['ch_id']) ?>&pqc_m=<?= base64_encode($pq['pc_map_id']) ?>&pq=<?= $_GET['pc'] ?>" class="btn cus_bt"><span style="font-size:24px;"><i class="fa fa-check-circle" aria-hidden="true"></i></span> Solved</a>
                                <?php } ?>
                                <?php if($pq['check']==0){ ?>
                                <a href="<?= base_url("Programming/quiz_panel?id=").base64_encode($pq['ch_id']) ?>&pqc_m=<?= base64_encode($pq['pc_map_id']) ?>&pq=<?= $_GET['pc'] ?>" class="btn cus_bt"> Solve Challenge</a>
                                <?php } ?>
                            </div>
                        </div>
                    </blockquote><!-- END -->
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- End  -->
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