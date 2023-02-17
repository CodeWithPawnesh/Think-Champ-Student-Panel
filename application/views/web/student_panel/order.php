<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">My Order </h3>
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
                            <h3 class="m-0 ">My Order List</h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                        </div>
                    </div>
                </div>
                <div class="white_card_body ">
                        <table class="table table-hover  table-responsive-lg">
                            <caption>List of Order</caption>
                            <thead>
                                <tr>
                                    <th class="text-center">Order Id</th>
                                    <th class="text-center">Course</th>
                                    <th class="text-center">Mode</th>
                                    <th class="text-center">Pay Type</th>
                                    <th class="text-center">Pay Number</th>
                                    <th class="text-center">Fee Paid</th>
                                    <th class="text-center">Pending Amount</th>
                                    <th class="text-center">Due Date</th>
                                    <th class="text-center">Method</th>
                                    <th class="text-center">Pay Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($order_data)){ $i=1; foreach($order_data as $o_d){ ?>
                                <tr>
                                    <th class="text-center"><?= $o_d['main_order_id'] ?></th>
                                    <th class="text-center"><?= $o_d['course_name'] ?></th>
                                    <?php if($o_d['mode']==0){ ?>
                                    <th class="text-center">--</th>
                                    <?php } ?>
                                    <?php if($o_d['mode']==1){ ?>
                                    <th class="text-center">Online</th>
                                    <?php } ?>
                                    <?php if($o_d['mode']==2){ ?>
                                    <th class="text-center">Offline</th>
                                    <?php } ?>
                                    <?php if($o_d['pay_type']==1){ ?>
                                    <th class="text-center">Full Payment</th>
                                    <?php } ?>
                                    <?php if($o_d['pay_type']==2 ||$o_d['pay_type']==3){ ?>
                                    <th class="text-center"> Ins.</th>
                                    <?php } ?>
                                    <th class="text-center"><?= $o_d['pay_no']; if($o_d['pay_type']!=1){ echo "Ins."; } ?></th>
                                    <th class="text-center <?php if(!empty($o_d['fee_paid'])){ ?> text-success <?php } ?>"><?= $o_d['fee_paid'] ?></th>
                                    <th class="text-center <?php if(($o_d['pending_amount']-$o_d['fee_paid'])>0){ ?> text-danger <?php } ?>"><?php if(!empty($o_d['pending_amount'])){ echo $o_d['pending_amount']-$o_d['fee_paid']; } else { echo "NA"; } ?></th>
                                    <th class="text-center"><?php if(!empty($o_d['due_date'])){ echo date('d M, y',$o_d['due_date']); } else { echo "NA"; } ?></th>
                                    <th class="text-center"><?= $o_d['method'] ?></th>
                                    <th class="text-center"><?php if(!empty($o_d['order_tc'])){ echo date('d M, y',$o_d['order_tc']); } ?></th>
                                    <th class="text-center"><?php if($o_d['status']!=1){ ?> <a href="<?= base_url("Subscription/pay_installments?od=").base64_encode($o_d['order_id']) ?>&pa=<?= base64_encode($o_d['pending_amount']) ?>" class="btn btn-sm btn-success">Pay Now</a> <?php }else { echo "NA";} ?> </th>
                                </tr>
                                <?php } }else{ echo "<h1 class='text-center text-warning'>No Order Found</h1>"; } ?>
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