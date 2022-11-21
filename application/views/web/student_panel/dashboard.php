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
                                Right
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
                                        <h3 class="m-0 "><?= $course_data['course_title'] ?></h3>
                                    </div>
                                    <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body ">
                                <!-- Theory Class Data -->
                                <h5 class="text-center">Theory Live Class <?= $course_data['course_name'] ?></h5>
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Class Timing</th>
                                                <th>Batch</th>
                                                <th>Trainer</th>
                                                <th>Trainer PH.No</th>
                                                <th>Class Room</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td><?= $t_live_class_data['class_name']; ?></td>
                                            <td><?=  date('h:i A',$t_live_class_data['class_ts']); ?></td>
                                            <td><?= $t_live_class_data['batch_name']; ?></td>
                                            <td><?= $t_live_class_data['emp_name']; ?></td>
                                            <td><?= $t_live_class_data['phone']; ?></td>
                                            <td><a id="<?= $t_live_class_data['class_id'] ?>" href="<?= $t_live_class_data['live_link']; ?>" target="_blank" class="btn btn-sm btn-success">Join Room</a></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Programming Class Data -->
                                <h5 class="text-center">Programming Live Class <?= $course_data['course_name'] ?></h5>
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Class Timing</th>
                                                <th>Batch</th>
                                                <th>Group</th>
                                                <th>Instructor</th>
                                                <th>Instructor PH.No</th>
                                                <th>Class Room</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td><?= $p_live_class_data['class_name']; ?></td>
                                            <td><?=  date('h:i A',$p_live_class_data['class_ts']); ?></td>
                                            <td><?= $p_live_class_data['batch_name']; ?></td>
                                            <td><?= $p_live_class_data['group_name']; ?></td>
                                            <td><?= $p_live_class_data['emp_name']; ?></td>
                                            <td><?= $p_live_class_data['phone']; ?></td>
                                            <td><a id="<?= $p_live_class_data['class_id'] ?>" href="<?= $p_live_class_data['live_link']; ?>" target="_blank" class="btn btn-sm btn-success">Join Room</a></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 ">
                        <div class="white_card card_height_100 mb_30 sales_card_wrapper">
                            <div class="white_card_header d-flex justify-content-end">
                            </div>
                            <div class="card badge_card">
                                <div class="card-body">
                                    <h2 class="text-center">Weekly Toppers</h2>
                                    <br>
                                    <div class="row text-center">
                                        <div class="col">
                                            <img src="assets/dashboard/img/gold-medal.png" alt="">
                                            <label>Pawnesh Kumar</label>
                                        </div>
                                        <div class="col">
                                            <img src="assets/dashboard/img/silver-medal.png" alt="">
                                            <label>Diksha</label>
                                        </div>
                                        <div class="col">
                                            <img src="assets/dashboard/img/bronze-medal.png" alt="">
                                            <label>Chink</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
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
                    </div>
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
        <script>
   function check_class_time(){
    
    var today = new Date();
    var h = zeros(today.getHours() % 12 || 12);
    var m = today.getMinutes();
    var s = today.getSeconds();
    var time = h + ':' + m + ':' + s;
         var t_s_time =  '<?= date("h:i:s", ($t_live_class_data['class_ts']) - (15 * 60))?>' ;
         var t_e_time = '<?= date("h:i:s", ($t_live_class_data['class_ts']) + (15 * 60))?>';
         var p_s_time = '<?= date("h:i:s", ($p_live_class_data['class_ts']) - (15 * 60))?>';
         var p_e_time = '<?= date("h:i:s", ($p_live_class_data['class_ts']) + (15 * 60)) ?>';

    if(  t_s_time  <= time &&  t_e_time >=  time)
    {
    document.getElementById("<?= $t_live_class_data['class_id'] ?>").style.display="block";
    }else{
        document.getElementById("<?= $t_live_class_data['class_id'] ?>").style.display="none";
    }
    if(  p_s_time  <= time &&  p_e_time >=  time)
    {
    document.getElementById("<?= $p_live_class_data['class_id'] ?>").style.display="block";
    }else{
        document.getElementById("<?= $p_live_class_data['class_id'] ?>").style.display="none";
    }
    }
    setInterval(function(){
        check_class_time();
    }, 100);
    function zeros(i) {
      if (i < 10) {
        return "0" + i;
      } else {
        return i;
      }
    }
</script>
        </script>