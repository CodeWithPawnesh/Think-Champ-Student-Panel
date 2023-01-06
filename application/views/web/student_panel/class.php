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
                            <h3 class="m-0 ">Live Classes List</h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                        </div>
                    </div>
                </div>
                <div class="white_card_body ">
                        <table class="table table-hover table-responsive">
                            <caption>List of Classes</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">Class No</th>
                                    <th class="text-center">Class Name </th>
                                    <th class="text-center">Class Date </th>
                                    <th class="text-center">Started At</th>
                                    <th class="text-center">Taken By</th>
                                    <th class="text-center">Total Student</th>
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
                              </tr>
                              <?php } } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>