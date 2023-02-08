<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Certificate</h3>
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
                            <h3 class="m-0 ">Certificate</h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                        </div>
                    </div>
                </div>
                <div class="white_card_body ">
                    <table class="table table-hover table-responsive">
                        <caption>List of Leaves</caption>
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Course Name</th>
                                <th class="text-center">Batch Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($certificate_data)){ $i=1; foreach($certificate_data as $c_d){ ?>
                            <tr>
                                <td class="text-center"><?= $i++ ; ?></td>
                                <?php if($c_d['type']=='1'){ ?>
                                <td class="text-center text-success">Course Completion</td>
                                <?php } ?>
                                <td class="text-center"><?= $c_d['course_name'] ?></td>
                                <td class="text-center"><?= $c_d['batch_name'] ?></td>
                                <?php if($c_d['status']=='1'){ ?>
                                <td class="text-center text-success">Generated</td>
                                <?php } ?>
                                <?php if($c_d['status']=='2'){ ?>
                                <td class="text-center text-warning">Pending</td>
                                <?php } ?>
                                <?php if($c_d['status']=='3'){ ?>
                                <td class="text-center text-warning">Reverted</td>
                                <?php } ?>
                                <td class="text-center"><a href="<?= base_url("Certificate/view_certificate?id=").base64_encode($c_d['certificate_id']) ?>" class="btn btn-sm btn-info text-white">View</a></td>
                            </tr>
                            <?php } }else{ echo "<h1 class='text-center text-warning'>No Data Found</h1>"; } ?>
                        </tbody>
                    </table>
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