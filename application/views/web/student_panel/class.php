<?php
$user_info = $this->session->userdata('user_data');
$student_id = $user_info['student_id'];
if($_GET['mode']=="Programming"){
    $check =2;
}
if($_GET['mode']=="Theory"){
    $check =1;
}
?>
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Live Classes </h3>
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
                        <?php if($_GET['mode']=='Theory'){ ?>
                            <h3 class="m-0 ">Theory Live Classes List</h3>
                            <?php } ?>
                            <?php if($_GET['mode']=='Programming'){ ?>
                            <h3 class="m-0 ">Programming Live Classes List</h3>
                            <?php } ?>
                            <?php if($_GET['mode']=='Doubt'){ ?>
                            <h3 class="m-0 ">Doubt Live Classes List</h3>
                            <?php } ?>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                        </div>
                    </div>
                    <br><br>
                    <?php
                    $tCls = "in-active-cl";
                    $pCls = "in-active-cl";
                    $dCls = "in-active-cl";
                    if($_GET['mode']=="Theory"){
                        $tCls = "active-cl";
                    }
                    if($_GET['mode']=="Programming"){
                        $pCls = "active-cl";
                    }
                    if($_GET['mode']=="Doubt"){
                        $dCls = "active-cl";
                    }
                    ?>
                <div class="row">
                    <div class="col text-center">
                        <a href="<?= base_url("Live-Class?id=".$_GET['id']) ?>&mode=Theory" class="btn btn-sm <?= $tCls; ?> ">Theory Class</a>
                    </div>
                    <div class="col text-center">
                    <a href="<?= base_url("Live-Class?id=".$_GET['id']) ?>&mode=Programming" class="btn btn-sm <?= $pCls; ?> ">Programming Class</a>
                    </div>
                    <div class="col text-center">
                    <a href="<?= base_url("Live-Class?id=".$_GET['id']) ?>&mode=Doubt" class="btn btn-sm <?= $dCls; ?> ">Doubt Class</a>
                    </div>
                </div>
                </div>
                <div class="white_card_body ">
                        <table class="table table-hover table-responsive">
                            <?php if($_GET['mode']=='Theory'){ ?>
                            <caption>List of Theory Classes</caption>
                            <?php } ?>
                            <?php if($_GET['mode']=='Programming'){ ?>
                            <caption>List of Programming Classes</caption>
                            <?php } ?>
                            <?php if($_GET['mode']=='Doubt'){ ?>
                            <caption>List of Doubt Classes</caption>
                            <?php } ?>
                            <thead>
                                <tr>

                                    <th class="text-center">Class No</th>
                                    <th class="text-center">Class Name </th>
                                    <th class="text-center">Class Date </th>
                                    <th class="text-center">Started At</th>
                                    <th class="text-center">Taken By</th>
                                    <th class="text-center">Total Student</th>
                                    <th class="text-center">Attendance</th>
                                    <th class="text-center">Request</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($class_data)){ $i=1; foreach($class_data as $c_d){ ?>
                              <tr>
                                <td class="text-center">Class <?= $i++; ?></td>
                                <td class="text-center"><?= $c_d['class_name']; ?></td>
                                <td class="text-center"><?= $c_d['class_date']; ?></td>
                                <td class="text-center"><?= $c_d['class_started_at']; ?></td>
                                <td class="text-center"><?= $c_d['emp_name']; ?></td>
                                <td class="text-center"><?php $std_n= explode(",",$c_d['student_ids']); echo sizeof($std_n); ?></td>
                                <?php $stdIdArr = explode(",",$c_d['student_ids']);
                                    if(in_array($student_id, $stdIdArr) ){
                                ?>
                                <td class="text-center text-success">Present</td>
                                <?php }else{ ?>
                                <td class="text-center text-danger">Absent</td>
                                <?php  } ?>
                                <td class="text-center">
                                    <form action="StudentPanel/request_video" method="post">
                                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                        <input type="hidden" name="mode" value="<?= $_GET['mode'] ?>">
                                        <input type="hidden" name="live_id" value="<?= $c_d['live_id'] ?>">
                                        <input type="hidden" name="batch_id" value="<?= $c_d['batch_id'] ?>">
                                        <?php if($_GET['mode']=="Programming"){ ?>
                                        <input type="hidden" name="group_id" value="<?= $c_d['group_id'] ?>">
                                        <?php } ?>
                                        <?php if(!empty($requested_live_class_id)){ foreach($requested_live_class_id as $r_d){ 
                                            if($r_d['type']==$check){
                                        if($r_d['live_id'] == $c_d['live_id'] ){

                                            $reStudent_id = explode(",",$r_d['requested_by']);
                                            if(in_array($student_id,$reStudent_id)){
                                            if($r_d['status']==0){
                                        ?>
                                        <span class="text-center text-danger">Requested</span>
                                        <?php }else{ ?>
                                            <span class="text-center text-success">Given</span>
                                            <?php } ?>
                                    <?php } }else{ ?>
                                        <button type="submit" name="submit" class="btn btn-sm active-cl">Request Video</button>
                                    <?php  } } } }else{
                                    ?>
                                     <button type="submit" name="submit" class="btn btn-sm active-cl">Request Video</button>
                                    <?php } ?>
                                    </form>
                                </td>
                              </tr>
                              <?php } } ?>
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