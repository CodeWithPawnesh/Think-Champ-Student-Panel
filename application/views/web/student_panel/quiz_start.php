<?php 
$quiz_duration = $quiz_data['quiz_duration']*60;
$user_info = $this->session->userdata('user_data');
$user_id = $user_info['user_id'];
$student_id = $user_info['student_id'];
?>
<style>
.prevent-select {
    -webkit-user-select: none;
    /* Safari */
    -ms-user-select: none;
    /* IE 10 and IE 11 */
    user-select: none;
    /* Standard syntax */
}

.info-box {
    font-size: 18px;
    width: 250px;
    height: 30px;
    box-shadow: 2px solid #8950FC;
}

.card {
    border-radius: 20px;
}

.qus-card {
    display: none;
}

.outter-circle {
    position: relative;
    top: 10px;
    width: 200px;
    height: 200px;
    border-radius: 100px;
}

.inner-circle {
    position: relative;
    top: 25px;
    left: 25px;
    width: 150px;
    height: 150px;
    border-radius: 75px;
    border: 1px solid black;
    background-color: black;
}

.qs-value {
    position: relative;
    top: 30%;
    color: #8950FC;
    font-weight: bolder;
}
</style>
<div class="main_content_iner overly_inner prevent-select ">
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
                        <!-- Right -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xl-7">
            <div class="card" id="info-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <h2><?= $quiz_data['quiz_title'] ?></h2>
                        </div>
                    </div>
                    <ul class="list-group hd-color">
                        <li class="list-group-item">1.All Questions Are compulsory.</li>
                        <li class="list-group-item">2.You can attempt a quiz only one time.</li>
                        <li class="list-group-item">3.Before you start a quiz make sure you have a stable Internet
                            Connection.</li>
                        <li class="list-group-item">4.Once you submit the quiz you can not change your options.</li>
                        <li class="list-group-item">5.Click on <span class="fw-bolder">Start</span> Button To Launch the
                            Quiz </li>
                    </ul>
                    <br>
                    <div class="text-center">
                        <form id="form1" method="post">
                            <input type="hidden" id="quiz_id" value="<?= $quiz_data['quiz_id']?>">
                            <input type="hidden" id="student_id" value="<?= $student_id ?>">
                            <button type="button" id="btn_start" name="start_quiz"
                                class="btn btn-sm btn-success">Start</button>
                        </form>
                    </div>
                </div>
            </div>
            <input type="hidden" id="t_ques" value="<?= sizeof($quiz_questions) ?>">
            <form action="Quiz/submit" id="form" method="post">
                <input type="hidden" name="quiz_id" value="<?= $quiz_data['quiz_id']?>">
                <?php  
                   $i=1;
                   foreach($quiz_questions as $q){ 
                ?>
                <div class="card qus-card " id="<?= $i ?>">
                    <div class="card-body">
                        <h3> Q<?= $i++; ?>. <?= $q['question_text'] ?></h3>
                        <p class="fw-bolder text-end">Marks = <?= $q['marks']; ?></p>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-3">
                                A. <?= $q['option_1'] ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="radio" id="qs" class="qs" onchange="qusAttempt()"
                                    name="qst<?= $q['question_id']?>" value="1,<?= $q['question_id'] ?>">
                            </div>
                            <div class="col-sm-3">
                                B. <?= $q['option_2'] ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="radio" id="qs" class="qs" onchange="qusAttempt()"
                                    name="qst<?= $q['question_id']?>" value="2,<?= $q['question_id'] ?>">
                            </div>
                        </div>
                        <br>
                        <?php if($q['no_of_options']==4){ ?>
                        <div class="row">
                            <div class="col-sm-3">
                                C. <?= $q['option_3'] ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="radio" id="qs" class="qs" onchange="qusAttempt()"
                                    name="qst<?= $q['question_id']?>" value="3,<?= $q['question_id'] ?>">
                            </div>
                            <div class="col-sm-3">
                                D. <?= $q['option_4'] ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="radio" id="qs" class="qs" onchange="qusAttempt()"
                                    name="qst<?= $q['question_id']?>" value="4,<?= $q['question_id'] ?>">
                            </div>
                        </div>
                        <br>
                        <?php } ?>

                        <div class="row">
                            <?php if($i>2){ ?>
                            <div class="col-auto">
                                <button type="button" name="back" id="back" onclick="prevQues(<?= $i ?>)"
                                    class="btn btn-sm btn-dark text-white">Back</button>
                            </div>
                            <?php } ?>
                            <?php if(($i-1)<4){ ?>
                            <div class="col-auto">
                                <button type="button" name="next" id="next" onclick="nextQues(<?= $i ?>)"
                                    class="btn btn-sm btn-dark text-white">Next</button>
                            </div>
                            <?php } ?>
                            <div class="col-auto">
                                <button type="submit" name="btnsubmit" value="submit"
                                    class="btn btn-sm btn-success text-white">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </form>
        </div>
        <div class="col-xl-5">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <h2><?= $quiz_data['quiz_title'] ?></h2>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="info-box text-center fw-bolder">
                                <span class="hd-heading">Time Left :</span> <span class="fw-bolder" id="qTimer"></span>
                            </div>
                            <br>
                            <div class="info-box text-center fw-bolder">
                                <span class="hd-heading"> Questions Attempted:</span> <span id="q_att_div">0</span>
                            </div>
                            <br>
                            <div class="info-box text-center fw-bolder">
                                <span class="hd-heading">Total Questions:</span> <?= count($quiz_questions); ?>
                            </div>
                            <br>
                            <div class="info-box text-center fw-bolder ">
                                <span class="hd-heading">Total Marks:</span> <?= $msum ?>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="outter-circle">
                                <div class="inner-circle">
                                    <div class="qs-value text-center display-6">0%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#btn_start').on('click', function() {
        $("#btn_start").attr("disabled", "disabled");
        var student_id = $('#student_id').val();
        var quiz_id = $('#quiz_id').val();
        $.ajax({
            url: "<?= base_url("Quiz/enter") ?>",
            type: "POST",
            data: {
                student_id: student_id,
                quiz_id: quiz_id
            },
            cache: false,
            success: function(dataResult) {
                if (dataResult == 1) {
                    // Hide Info Card And Show First Question
                    $("#info-card").hide();
                    $("#1").show();
                    //Show Timer And Start Timer
                    // if (timeLeft == 0) {
                    //     clearTimeout(tm);
                    //     $("#form").submit();
                    // } 
                    var tm = setTimeout(function() {
                        timeout()
                    }, 1000);
                }
            }
        });
    });
});
var timeLeft = <?= $quiz_duration ?>

function prevQues(i) {
    var a = i;
    console.log(a);
    document.getElementById(a - 2).style.display = "block";
    document.getElementById(a - 1).style.display = "none";
}

function nextQues(i) {
    var a = i;
    document.getElementById(a).style.display = "block";
    document.getElementById(a - 1).style.display = "none";
}

function qusAttempt() {
    let qsProgress = document.querySelector(".outter-circle"),
        psvalue = document.querySelector(".qs-value");
    var tQues = document.getElementById("t_ques").value;
    var radArr = document.getElementsByClassName("qs");
    var count = 0;
    for (i = 0; i < radArr.length; i++) {
        if (radArr[i].checked) {
            count++;
        }
    }
    document.getElementById("q_att_div").textContent = `${count}`;
    var commonValue = 100 / tQues;
    var progressStartValue = (count - 1) * commonValue;
    var progressEndValue = count * commonValue;
    let speed = 10;
    let progress = setInterval(() => {
        progressStartValue++;
        psvalue.textContent = `${progressStartValue}%`
        qsProgress.style.background = `conic-gradient(#8950FC ${progressStartValue *3.6}deg,white 0deg)`
        if (progressStartValue == progressEndValue) {
            clearInterval(progress);
        }
    }, speed);
}

function timeout() {
    var minute = Math.floor(timeLeft / 60);
    var second = timeLeft % 60;
    var sec = checktime(second);
    var min = checkmin(minute);
    if (timeLeft == 0) {
        clearTimeout(tm);
        document.getElementById("form").submit();
    } 
    if(timeLeft > 0) {
        window.removeEventListener('beforeunload',()=>{
            event.preventDefault();
            event.returnValue = "";
        })
        document.getElementById("qTimer").innerHTML = min + " : " + sec;
    }
    timeLeft--;
    if(timeLeft > 0) {
        
    }   
    console.log(timeLeft);
    var tm = setTimeout(function() {
        timeout()
    }, 1000);
}

function checktime(sec) {
    if (sec < 10) {
        sec = "0" + sec;

    }
    return sec;
}

function checkmin(minute) {
    if (minute < 10) {
        minute = "0" + minute;
    }
    return minute
}
</script>