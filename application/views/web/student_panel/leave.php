<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Leave </h3>
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
                            <h3 class="m-0 ">Leave List</h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                        </div>
                    </div>
                </div>
                <div class="white_card_body ">
                <a href="<?= base_url('Add-Leave') ?>" class="btn btn-md btn-success">Add Leave</a>
                        <table class="table table-hover table-responsive">
                            <caption>List of Leaves</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Leave Start Date</th>
                                    <th class="text-center">Leave End Date</th>
                                    <th class="text-center">Reason</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($leave_data)){ $i=1; foreach($leave_data as $l_d){ ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ; ?></td>
                                    <td class="text-center"><?= date('d M, Y',$l_d['leave_start_date']); ?></td>
                                    <td class="text-center"><?php if(!empty($l_d['leave_end_date'])){ echo date('d M, Y',$l_d['leave_end_date']); } if(empty($l_d['leave_end_date'])){ echo "--"; } ?></td>
                                    <td class="text-center"><?= $l_d['reason']; ?></td>
                                    <?php if($l_d['status']=='1'){ ?>
                                    <td class="text-center text-success">Approved</td>
                                    <?php } ?>
                                    <?php if($l_d['status']=='2'){ ?>
                                    <td class="text-center text-danger">Disapproved</td>
                                    <?php } ?>
                                    <?php if($l_d['status']=='0'){ ?>
                                    <td class="text-center text-warning">Under Review</td>
                                    <?php } ?>
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