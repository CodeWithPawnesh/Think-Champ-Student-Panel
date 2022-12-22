<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Internship</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Think-Champ</li>
                        </ol>
                    </div>
                    <div class="page_title_right">
                        <!-- Right -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <?php $s=1;if(!empty($internship_data)){ foreach($internship_data as $i_d){  
                    ?>
        <div class="col-xl-12">
            <div class="white_card mb_30 card_height_100">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title ">
                            <h3 class="m-0 ">
                                <?php if($i_d['status'] == 1){ ?>
                                <h3 class="m-0 text-muted">Status : Offer Given</h3>
                                <?php  } ?>
                                <?php if($i_d['status'] == 2){ ?>
                                <h3 class="m-0 text-warning">Status : Accepted</h3>
                                <?php  } ?>
                                <?php if($i_d['status'] == 3){ ?>
                                <h3 class="m-0 text-danger">Status : Rejected</h3>
                                <?php  } ?>
                                <?php if($i_d['status'] == 4){ ?>
                                <h3 class="m-0 text-success">Status : Hired</h3>
                                <?php  } ?>
                            </h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end m-0 ">
                        </div>
                    </div>
                </div>
                <div class="white_card_body text-center ">
                    <?= $i_d['description'] ?>
                    <br><br>
                    <div class="text-center">
                        Internship Type : <?php  if($i_d['paid_or_unpaid']==1) { ?> <span class="text-success">Paid</span> <?php } ?><?php  if($i_d['paid_or_unpaid']==2) { ?> <span class="text-success">Un-Paid</span> <?php } ?>
                    </div>
                    <br>
                    <div class="text-center">
                    <?php  if($i_d['paid_or_unpaid']==1) { ?>  Stipend : <span class="text-success fw-bolder "><?= $i_d['stipend'] ?></span><?php } ?>
                    </div>
                    <br>
                    <?php if($i_d['status']==1){ ?>
                    <form action="Internship" method="post">
                        <input type="hidden" name="int_id" value="<?= $i_d['internship_id'] ?>">
                        <input type="submit" name="accept" value="Accept" class="btn btn-sm btn-success">
                        <input type="submit" name="reject" value="Reject" class="btn btn-sm btn-danger">
                    </form>
                    <?php } ?>
                    <br>
                    <div class="row">
                        <div class="col text-bold  text-center">Internship Start Date :
                            <?= date('d M, Y',strtotime($i_d['start_date'])) ?></div>
                        <div class="col text-bold text-center">Internship End date :
                            <?= date('d M, Y',strtotime($i_d['end_date'])) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ echo "<h2 class='text-center text-warning'>No Internship Found</h2>"; } ?>
    </div>
</div>