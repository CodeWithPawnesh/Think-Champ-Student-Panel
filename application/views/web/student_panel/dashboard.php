        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                            <div class="page_title_left">
                                <h3 class="f_s_25 f_w_700 dark_text">Dashboard</h3>
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
                <div class="row ">
                    <div class="col-xl-8 ">
                        <div class="white_card mb_30 card_height_100">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title ">
                                        <h3 class="m-0 ">Live Classes</h3>
                                    </div>
                                    <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body ">
                                <!-- Theory Class Data -->
                                <?php if(!empty($t_live_class_data)){ ?>
                                <h4 class="text-center hd-heading">Theory Live Class</h4>
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Class</th>
                                                <th class="text-center">Class Timing</th>
                                                <th class="text-center">Batch</th>
                                                <th class="text-center">Trainer</th>
                                                <th class="text-center">Trainer PH.No</th>
                                                <th class="text-center">Class Room</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($t_live_class_data as $t_d){?>
                                            <tr>
                                                <td class="text-center"><?= $t_d['class_name']; ?></td>
                                                <td class="text-center"><?=  date('h:i A',$t_d['class_ts']); ?></td>
                                                <td class="text-center"><?= $t_d['batch_name']; ?></td>
                                                <td class="text-center"><?= $t_d['emp_name']; ?></td>
                                                <td class="text-center"><?= $t_d['phone']; ?></td>
                                                <td class="text-center">
                                                    <a id="<?= $t_d['class_id'] ?>" style="display:none"
                                                        href="Dashboard?id=<?= $t_d['class_id'] ?>&cl_l=<?= $t_d['live_link']; ?>&type=1"
                                                        target="_blank" class="btn btn-sm btn-success">Join Room</a>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Programming Class Data -->
                                <?php } if(!empty($p_live_class_data)){ ?>
                                <h4 class="text-center hd-heading">Programming Live Class </h4>
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Class</th>
                                                <th class="text-center">Class Timing</th>
                                                <th class="text-center">Batch</th>
                                                <th class="text-center">Group</th>
                                                <th class="text-center">Instructor</th>
                                                <th class="text-center">Instructor PH.No</th>
                                                <th class="text-center">Class Room</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($p_live_class_data as $p_d){ ?>
                                            <tr>
                                                <td class="text-center"><?= $p_d['class_name']; ?></td>
                                                <td class="text-center"><?=  date('h:i A',$p_d['class_ts']); ?></td>
                                                <td class="text-center"><?= $p_d['batch_name']; ?></td>
                                                <td class="text-center"><?= $p_d['group_name']; ?></td>
                                                <td class="text-center"><?= $p_d['emp_name']; ?></td>
                                                <td class="text-center"><?= $p_d['phone']; ?></td>
                                                <td class="text-center">
                                                <a id="<?= $p_d['class_id'] ?>" style="display:none"
                                                        href="Dashboard?id=<?= $p_d['class_id'] ?>&cl_l=<?= $p_d['live_link']; ?>&type=2"
                                                        target="_blank" class="btn btn-sm btn-success">Join Room</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php } if(!empty($doubt_classes)){ ?>
                                    <h4 class="text-center hd-heading">Doubt Class </h4>
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Class</th>
                                                <th class="text-center">Class Date</th>
                                                <th class="text-center">Class Timing</th>
                                                <th class="text-center">Batch</th>
                                                <th class="text-center">Teacher</th>
                                                <th class="text-center">Teacher PH.No</th>
                                                <th class="text-center">Class Room</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($doubt_classes as $d_d){ ?>
                                            <tr>
                                                <td class="text-center"><?= $d_d['class_name']; ?></td>
                                                <td class="text-center"><?=  date('d M, Y',$d_d['class_date']); ?></td>
                                                <td class="text-center"><?=  date('h:i A',$d_d['class_ts']); ?></td>
                                                <td class="text-center"><?= $d_d['batch_name']; ?></td>
                                                <td class="text-center"><?= $d_d['emp_name']; ?></td>
                                                <td class="text-center"><?= $d_d['phone']; ?></td>
                                                <td class="text-center">
                                                <a id="<?= $d_d['class_id'] ?>" style="display:none"
                                                        href="Dashboard?id=<?= $d_d['class_id'] ?>&cl_l=<?= $d_d['live_link']; ?>&type=0"
                                                        target="_blank" class="btn btn-sm btn-success">Join Room</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 ">
                        <div class="white_card mb_30 sales_card_wrapper height">
                            <div class="white_card_header d-flex justify-content-end">
                            </div>
                            <div class="card badge_card">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-4">
                        <div class="white_card card_height_100 mb_30 ">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">To Do List</h3>
                                        <span>Todo</span>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body QA_section">
                                <div class="todo_wrapper">
                                    <div class="single_todo d-flex justify-content-between align-items-center">
                                        <div class="lodo_left d-flex align-items-center">
                                            <div class="bar_line mr_10"></div>
                                            <div class="todo_box">
                                                <label class="form-label primary_checkbox  d-flex mr_10 ">
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="todo_head">
                                                <h5 class="f_s_18 f_w_900 mb-0">Task </h5>
                                                <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                            </div>
                                        </div>
                                        <div class="lodo_right"> <a href="#" class="badge_complete">Complete</a> </div>
                                    </div>
                                    <div class="single_todo d-flex justify-content-between align-items-center">
                                        <div class="lodo_left d-flex align-items-center">
                                            <div class="bar_line red_line mr_10"></div>
                                            <div class="todo_box">
                                                <label class="form-label primary_checkbox  d-flex mr_10 ">
                                                    <input type="checkbox">
                                                    <span class="checkmark red_check"></span>
                                                </label>
                                            </div>
                                            <div class="todo_head">
                                                <h5 class="f_s_18 f_w_900 mb-0">Task</h5>
                                                <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                            </div>
                                        </div>
                                        <div class="lodo_right"> <a href="#" class="mark_complete">Mark as completed</a>
                                        </div>
                                    </div>
                                    <div class="single_todo d-flex justify-content-between align-items-center">
                                        <div class="lodo_left d-flex align-items-center">
                                            <div class="bar_line red_line mr_10"></div>
                                            <div class="todo_box">
                                                <label class="form-label primary_checkbox  d-flex mr_10 ">
                                                    <input type="checkbox">
                                                    <span class="checkmark red_check"></span>
                                                </label>
                                            </div>
                                            <div class="todo_head">
                                                <h5 class="f_s_18 f_w_900 mb-0">Task </h5>
                                                <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                            </div>
                                        </div>
                                        <div class="lodo_right"> <a href="#" class="mark_complete">Mark as completed</a>
                                        </div>
                                    </div>
                                    <div class="single_todo d-flex justify-content-between align-items-center">
                                        <div class="lodo_left d-flex align-items-center">
                                            <div class="bar_line mr_10"></div>
                                            <div class="todo_box">
                                                <label class="form-label primary_checkbox  d-flex mr_10 ">
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="todo_head">
                                                <h5 class="f_s_18 f_w_900 mb-0">Task </h5>
                                                <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                            </div>
                                        </div>
                                        <div class="lodo_right"> <a href="#" class="badge_complete">Complete</a> </div>
                                    </div>
                                    <div class="single_todo d-flex justify-content-between align-items-center">
                                        <div class="lodo_left d-flex align-items-center">
                                            <div class="bar_line mr_10"></div>
                                            <div class="todo_box">
                                                <label class="form-label primary_checkbox  d-flex mr_10 ">
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="todo_head">
                                                <h5 class="f_s_18 f_w_900 mb-0">Task </h5>
                                                <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                            </div>
                                        </div>
                                        <div class="lodo_right"> <a href="#" class="badge_complete">Complete</a> </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-xl-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="date_picker_wrapper">
                                <div class="default-datepicker">
                                    <div class="datepicker-here" data-language='en'></div>
                                </div>
                            </div>
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
<script>
function check_class_time() {
    <?php foreach($t_live_class_data as $t_d){ ?>
    var t_class_id = <?= $t_d['class_id'] ?>;
    $.ajax({
        url: "<?= base_url("StudentPanel/today_classes") ?>",
        type: "POST",
        data: {
            class_id: t_class_id
        },
        cache: false,
        success: function(dataResult) {
            if (dataResult != 0) {
                document.getElementById("<?= $t_d['class_id'] ?>").style.display = "block";
            } else {
                document.getElementById("<?= $t_d['class_id'] ?>").style.display = "none";
            }
        }
    });
    <?php } ?>
    <?php foreach($p_live_class_data as $p_d){ ?>
    var class_id = <?= $p_d['class_id'] ?>;
    $.ajax({
        url: "<?= base_url("StudentPanel/today_classes") ?>",
        type: "POST",
        data: {
            class_id: class_id
        },
        cache: false,
        success: function(dataResult) {
            if (dataResult !=0 ) {
                document.getElementById("<?= $p_d['class_id'] ?>").style.display = "block";
            } else {
                document.getElementById("<?= $p_d['class_id'] ?>").style.display = "none";
            }
        }
    });
    <?php } ?>
    <?php foreach($doubt_classes as $d_d){ ?>
    var class_id = <?= $d_d['class_id'] ?>;
    $.ajax({
        url: "<?= base_url("StudentPanel/today_classes") ?>",
        type: "POST",
        data: {
            class_id: class_id
        },
        cache: false,
        success: function(dataResult) {
            if (dataResult !=0 ) {
                document.getElementById("<?= $d_d['class_id'] ?>").style.display = "block";
            } else {
                document.getElementById("<?= $d_d['class_id'] ?>").style.display = "none";
            }
        }
    });
    <?php } ?>

}
setInterval(function() {
    check_class_time();
}, 1000);

        </script>