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
                <?php foreach($programming_challenges AS $p_c){ ?>
                <div class="col-lg-12">
                    <!-- CUSTOM BLOCKQUOTE -->
                    <div class="blockquote-custom-icon bg-info"><?= $p_c['course_name'] ?></div>
                    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                        <h3><?= $p_c['pq_name'] ?> Challenge</h3>
                        <span>Completed :<?= $p_c['cc'] ?>/<?= $p_c['ac'] ?></span><br>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example with label"
                                style="width: 25%;" aria-valuenow="<?php if($p_c['ac']!=0 && $p_c['cc']!=0){ echo  $p_c['cc']/$p_c['ac']*100; }else { echo 0; } ?>" aria-valuemin="0" aria-valuemax="100"><?= $p_c['cc']/$p_c['ac']*100 ?></div>
                        </div>
                        <footer class="blockquote-footer pt-4 mt-4 border-top">
                            <a href="<?= base_url("Programming-Challenges?pc=").base64_encode($p_c['pq_id']) ?>"
                                class="btn btn btn-lg btn-success">Go To Challenges</a>
                        </footer>
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