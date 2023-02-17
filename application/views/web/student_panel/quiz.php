<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Quiz</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Think-Champ</li>
                        </ol>
                    </div>
                    <div class="page_title_right">
                        Right
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
                            <h3 class="m-0 ">Quiz</h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end">

                        </div>
                    </div>
                </div>
                <div class="white_card_body ">
                    <?php if(!empty($quiz_data)){ ?>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Quiz Title</th>
                                    <th class="text-center">Quiz Launched</th>
                                    <th class="text-center">Quiz Deadline</th>
                                    <th class="text-center">Quiz Duration</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($quiz_data as $q_d){ ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center"><?= $q_d['quiz_title']; ?></td>
                                    <td class="text-center"><?= date('d M, Y',$q_d['quiz_start_date']) ?></td>
                                    <td class="text-center"><?= date('d M, Y',$q_d['quiz_end_date']) ?></td>
                                    <td class="text-center"><?= $q_d['quiz_duration']; ?> min</td>
                                    <?php if(!empty($sub_quiz)){
                                        foreach($sub_quiz as $s_q){
                                            if($s_q['quiz_id'] == $q_d['quiz_id']){
                                         ?>
                              <td class="text-center"><a href="<?= base_url("Quiz-Analytics?quiz_id=".base64_encode($q_d['quiz_id'])) ?>" class="btn btn-sm btn-success">Result</a></td>
                                         <?php }else{ ?>
                                    <td class="text-center"><a href="<?= base_url("Quiz-Start?id=".base64_encode($q_d['quiz_id'])) ?>" class="btn btn-sm btn-success">Start</a></td>
                                    <?php } ?>
                                    <?php } } else{ ?>
                                        <td class="text-center"><a href="<?= base_url("Quiz-Start?id=".base64_encode($q_d['quiz_id'])) ?>" class="btn btn-sm btn-success">Start</a></td>
                                    <?php }  ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } else{echo "<h1 class='text-warning text-center'>No Quiz Found</h1>";} ?>
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