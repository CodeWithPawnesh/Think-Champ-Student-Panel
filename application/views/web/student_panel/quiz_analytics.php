<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Quzi Analytics </h3>
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
                            <h3 class="m-0 ">Quiz Analytics</h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                        </div>
                    </div>
                </div>
                <div class="white_card_body ">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="col-sm-6 text-center">Quiz Name</td>
                                <td class="col-sm-6 text-center"><?= $quiz_result['quiz_title'] ?></td>
                            <tr>
                                <td class="col-sm-6 text-center">Student Name</td>
                                <td class="col-sm-6 text-center"><?= $quiz_result['student_name'] ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-6 text-center">Total Questions</td>
                                <td class="col-sm-6 text-center"><?= sizeof($quiz_questions) ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-6 text-center">Questions Attempted</td>
                                <td class="col-sm-6 text-center">
                                    <?= sizeof(json_decode($quiz_result['question_answers'])) ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-6 text-center">Total Marks</td>
                                <td class="col-sm-6 text-center"><?= $msum ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-6 text-center">Marks Obtained</td>
                                <td class="col-sm-6 text-center"><?= $quiz_result['marks_obtained'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Question</th>
                                <th class="text-center">Option 1</th>
                                <th class="text-center">Option 2</th>
                                <th class="text-center">Option 3</th>
                                <th class="text-center">Option 4</th>
                                <th class="text-center">Correct Option</th>
                                <th class="text-center">Your Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0 ;$i<sizeof($quiz_questions) ;$i++){
                                $check = explode(",",$question_answer[$i]);
                                if($check[1]==$quiz_questions[$i]['question_id']){
                             ?>
                            <tr>
                                <td class="text-center"><?= $i+1 ?></td>
                                <td class="text-center"><?= $quiz_questions[$i]['question_text'] ?></td>
                                <td class="text-center"><?= $quiz_questions[$i]['option_1'] ?></td>
                                <td class="text-center"><?= $quiz_questions[$i]['option_2'] ?></td>
                                <td class="text-center"><?= $quiz_questions[$i]['option_3'] ?></td>
                                <td class="text-center"><?= $quiz_questions[$i]['option_4'] ?></td>
                                <td class="text-center"><?= $quiz_questions[$i]['correct_options'] ?></td>
                                <td class="text-center"><?= $check[0] ?></td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>