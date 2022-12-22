
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Job Updates</h3>
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
        <?php  $s=1;if(!empty($job_data)){ foreach($job_data as $j_d){ 
                    ?>
        <div class="col-xl-12">
            <div class="white_card mb_30 card_height_100">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title ">
                            <h3 class="m-0 text-center">

                            </h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end m-0 ">

                        </div>
                    </div>
                </div>
                <div class="white_card_body text-center ">
                    <div class="title">
                        <h3 class="hd-color"><?= $j_d['job_title'] ?></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                        <img src="http://localhost/Employee-Portal/assets/images/job/<?=$j_d['image']?>"
                            width="400px" height="400px" class="card aos-init aos-animate img-fluid" data-aos="zoom-in"
                            data-aos-delay="100">
                        </div>
                        <div class="col-sm-6" style="position:relative;top:50px">
                            <?= $j_d['job_description'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ echo "<h2 class='text-center text-warning'>No Job Found</h2>"; } ?>
    </div>
</div>