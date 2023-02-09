<section class="about-us-first-section" style="background-image: linear-gradient(orange,brown);">
    <h1 class="first-heading">Course Details</h1>
</section>
<section class="course-first-section"
    style="background-image: url(assets/images/courses/abstract-flowing-light-ombre-gradient-background-free-video.jpg);">
    <div class="course-first-section-left-col">
        <h2 class="course-heading"><?= $course_detail['sec_1_heading'] ?></h2>
        <p class="course-heading-text"><?= $course_detail['sec_1_desc'] ?> </p>
        <span class="note">Note: Limited Seats Available</span><br><br><br>
        <a href="#" class="enroll-btn2">Enroll Now</a>
        <a href="#" class="demo-btn">Watch Demo</a>
    </div>
    <div class="course-first-section-right-col">
        <img src="http://localhost/Employee-Portal/assets/images/course/<?= $course_detail['sec_1_img'] ?>" alt="">
    </div>
</section>

<section class="course-details-second-section">
    <div class="course-details-second-section-left-col">
        <div class="python-course-help">
            <img src="assets/images/course-detail/pythonhelpbg.jpg" alt="">
            <h4><?= $course_detail['sec_2_heading'] ?></h4>
            <hr style="border-top:4px solid blue;width:100%;">
            <h5><?= $course_detail['sec_2_sub_heading'] ?></h5>
            <?php $sec_2_desc_data = json_decode($course_detail['sec_2_desc']);
        for($i=0;$i<sizeof($sec_2_desc_data->heading);$i++){
        ?>
            <h6><i class="fa fa-check-square-o" aria-hidden="true"></i> <?=  $sec_2_desc_data->heading[$i]; ?></h6>
            <p> <?=  $sec_2_desc_data->desc[$i]; ?></p><br>
            <?php } ?>
        </div>
        <div class="tab">
            <button id="first_link" class="tablinks" onclick="openCity(event, 'overview')">Overview</button>
            <button class="tablinks" onclick="openCity(event, 'keyoutcomes')">Key Outcome</button>
            <button class="tablinks" onclick="openCity(event, 'instructor')">Trainer</button>
            <button class="tablinks" onclick="openCity(event, 'benefits')">Benefits</button>
            <button class="tablinks" onclick="openCity(event, 'curriculum')">Curriculum</button>
            <button class="tablinks" onclick="openCity(event, 'project')">Project</button>
        </div>

        <div id="overview" class="tabcontent">
            <div class="overview-tab">
                <div class="overview-tab-left-col">
                    <img src="http://localhost/Employee-Portal/assets/images/course/<?= $course_detail['overview_img'] ?>"
                        alt="">
                </div>
                <div class="overview-tab-right-col">
                    <h4><?= $course_detail['overview_heading'] ?></h4>
                    <hr style="border-top:2px solid blue;">
                    <h6><?= $course_detail['overview_desc'] ?> </h6>
                    <ul class="overview-list">
                        <?php
        $overview_points = json_decode($course_detail['overview_points']);
        foreach($overview_points as $op){
        ?>
                        <li><i class="fa fa-check" style="color:green;" aria-hidden="true"></i> <?= $op ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div id="keyoutcomes" class="tabcontent">
            <div class="overview-tab">
                <div class="overview-tab-left-col">
                    <img src="http://localhost/Employee-Portal/assets/images/course/<?= $course_detail['keyoutcome_img'] ?>"
                        alt="">
                </div>
                <div class="overview-tab-right-col">
                    <h4><?= $course_detail['keyoutcome_heading'] ?></h4>
                    <hr style="border-top:2px solid blue;">
                    <h6><?= $course_detail['keyoutcome_desc'] ?> </h6>
                    <ul class="overview-list">
                        <?php
        $keyoutcome_points = json_decode($course_detail['keyoutcome_points']);
        foreach($keyoutcome_points as $kp){
        ?>
                        <li><i class="fa fa-check" style="color:green;" aria-hidden="true"></i> <?= $kp ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div id="instructor" class="tabcontent">
        <?php foreach($trainer_data AS $td){ ?>
            <div class="overview-tab">
                <div class="overview-tab-left-col">
                    <?php if(!empty($td['profile'])){ ?>
                    <img src="assets/images/course-detail/<?= $td['profile'] ?>" alt="">
                    <?php }else{ ?>
                    <img src="assets/images/user_profile/avatar.jpg" alt="">
                  <?php  } ?>
                </div>
               
                <div class="overview-tab-right-col">
                    <h5><?= $td['emp_name'] ?></h5>
                    <p><?= $td['about_you'] ?></p>
                    <ul class="instructor-list">
                        <li><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php $c_count = explode(",",$td['course_id']); echo count($c_count) ?> Courses</li>
                        <li><i class="fa fa-users" aria-hidden="true"></i> <?= $td['student_teached'] ?> Students</li>
                    </ul>
                    <a href="<?= $td['fb_link'] ?>" target = "_blank">
                        <div class="social-logo-instructor"> <img src="assets/images/home/facebook.png" alt="social"
                                class="social-icon-instructor"> </div>
                    </a>
                    <a href="<?= $td['twiter_link'] ?>"target = "_blank">
                        <div class="social-logo-instructor"><img src="assets/images/home/twitter.png" alt="social"
                                class="social-icon-instructor"> </div>
                    </a>
                    <a href="<?= $td['insta_link'] ?>"target = "_blank">
                        <div class="social-logo-instructor "><img src="assets/images/home/instagram.png" alt="social"
                                class="social-icon-instructor"> </div>
                    </a>
                    <a href="<?= $td['linkdin_link'] ?>" target = "_blank">
                        <div class="social-logo-instructor "><img src="assets/images/home/linkedin.png" alt="social"
                                class="social-icon-instructor"> </div>
                    </a>

                </div>
            </div>
            <?php } ?>
        </div>

        <div id="curriculum" class="tabcontent">
            <div class="overview-tab">
                <div class="overview-tab-left-col">
                    <img src="http://localhost/Employee-Portal/assets/images/course/<?= stripcslashes($course_detail['cericullum_img']) ?>"
                        alt="">
                </div>
                <div class="overview-tab-right-col">
                    <h4><?= $course_detail['cericullum_heading'] ?></h4>
                    <hr style="border-top:2px solid blue;">
                    <?= $course_detail['cericullum_desc'] ?>
                </div>
            </div>
        </div>
        <!--  -->
        <div id="project" class="tabcontent">
            <div class="overview-tab">
                <div class="overview-tab-left-col">
                    <img src="http://localhost/Employee-Portal/assets/images/course/<?= stripcslashes($course_detail['project_img']) ?>"
                        alt="">
                </div>
                <div class="overview-tab-right-col">
                    <h4><?= $course_detail['project_heading'] ?></h4>
                    <hr style="border-top:2px solid blue;">
                    <?= $course_detail['project_desc'] ?>
                </div>
            </div>
        </div>
        <!--  -->
        <div id="benefits" class="tabcontent">
            <div class="overview-tab">
                <div class="overview-tab-left-col">
                    <img src="http://localhost/Employee-Portal/assets/images/course/<?= $course_detail['benifits_img'] ?>"
                        alt="">
                </div>
                <div class="overview-tab-right-col">
                    <h4><?= $course_detail['benifits_heading'] ?></h4>
                    <hr style="border-top:2px solid blue;">
                    <h6><?= $course_detail['benifits_desc'] ?> </h6>
                    <ul class="overview-list">
                        <?php
        $benifits_points = json_decode($course_detail['benifits_points']);
        foreach($benifits_points as $bp){
        ?>
                        <li><i class="fa fa-check" style="color:green;" aria-hidden="true"></i> <?= $bp ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="course-details-second-section-right-col">
        <div class="course-detail-card">
            <center><img src="assets/images/courses/react-js.jpg" alt=""></center>
            <h2>Rs.<?= $course_detail['price'] ?>/-</h2>
            <?php if($remmaning_slot > 0 ){ ?>
            <a href="<?= base_url("Course-Enrollment?id=".base64_encode($course_detail['course_id'])) ?>"
                class="buy-now-btn">BUY NOW</a><br>
            <?php } ?>
            <h4>Course Information</h4>
            <hr style="border-top:2px solid #ccc;width:80%;margin:0 auto;">
            <ul class="course-detail-card-list">
                <li><b><i class="fa fa-user" aria-hidden="true"></i> Instructor:</b> Pawnesh Panchal</li>
                <li><b><i class="fa fa-file-o" aria-hidden="true"></i> Lessons:</b>
                    <?= $course_detail['no_of_lessons'] ?></li>
                <li><b><i class="fa fa-level-up" aria-hidden="true"></i> Course Level:</b>
                    <?php if($course_detail['course_level']==1){ ?>Beginner<?php } ?>
                    <?php if($course_detail['course_level']==2){ ?>Intermediate <?php } ?>
                    <?php if($course_detail['course_level']==3){ ?>Advance <?php } ?>
                </li>
                <li><b><i class="fa fa-globe" aria-hidden="true"></i> Language:</b> <?= $course_detail['language'] ?>
                </li>
                <li><b><i class="fa fa-hourglass-end" aria-hidden="true"></i> Slots Left:</b>
                    <?php if($remmaning_slot > 0 ){ echo $remmaning_slot; }else{ echo "<span class='text-danger'>No Slots Left</span>"; } ?>
                </li>
                <li><b><i class="fa fa-clock-o" aria-hidden="true"></i> Batch Detail:</b>
                    <table class="table table-bordered">
                        <tr>
                            <th>
                                Batch Name
                            </th>
                            <th>
                                Batch Time
                            </th>
                        </tr>
                        <tbody>
                            <?php foreach($batch_detail as $b_d){ ?>
                            <tr>
                                <td>
                                    <?= $b_d['batch_name'] ?>
                                </td>
                                <td>
                                    <?= date("h:i A",$b_d['class_ts']) ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </div>
</section>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
window.addEventListener('load', (event) => {
    document.getElementById('overview').style.display = "block";
    document.getElementById('first_link').className += " active";
});
</script>