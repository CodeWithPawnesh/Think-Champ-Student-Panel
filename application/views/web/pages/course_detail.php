<section class="about-us-first-section" style=" background-image: url(assets/images/home/first-section-bg.jpg);">
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
            <hr style="border-top:4px solid blue;width:80%;">
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
            <button class="tablinks" onclick="openCity(event, 'instructor')">Instructor</button>
            <button class="tablinks" onclick="openCity(event, 'benefits')">Benefits</button>
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
            <div class="overview-tab">
                <div class="overview-tab-left-col">
                    <img src="assets/images/course-detail/instructor.jpg" alt="">
                </div>
                <div class="overview-tab-right-col">
                    <h5>PAWNESH PANCHAL</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, dolor perspiciatis eius
                        adipisci in harum.</p>
                    <ul class="instructor-list">
                        <li><i class="fa fa-file-text-o" aria-hidden="true"></i> 4 Courses</li>
                        <li><i class="fa fa-users" aria-hidden="true"></i> 2500 Students</li>
                    </ul>
                    <a href="#">
                        <div class="social-logo-instructor"> <img src="assets/images/home/facebook.png" alt="social"
                                class="social-icon-instructor"> </div>
                    </a>
                    <a href="#">
                        <div class="social-logo-instructor"><img src="assets/images/home/twitter.png" alt="social"
                                class="social-icon-instructor"> </div>
                    </a>
                    <a href="#">
                        <div class="social-logo-instructor "><img src="assets/images/home/instagram.png" alt="social"
                                class="social-icon-instructor"> </div>
                    </a>
                    <a href="#">
                        <div class="social-logo-instructor "><img src="assets/images/home/linkedin.png" alt="social"
                                class="social-icon-instructor"> </div>
                    </a>

                </div>
            </div>
        </div>

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
            <h2>Rs.9999/-</h2>
            <a href="#" class="buy-now-btn">BUY NOW</a><br>
            <h4>Course Information</h4>
            <hr style="border-top:2px solid #ccc;width:80%;margin:0 auto;">
            <ul class="course-detail-card-list">
                <li><b><i class="fa fa-user" aria-hidden="true"></i> Instructor:</b> Pawnesh Panchal</li>
                <li><b><i class="fa fa-file-o" aria-hidden="true"></i> Lessons:</b> 4</li>
                <li><b><i class="fa fa-clock-o" aria-hidden="true"></i> Duration:</b> 4h 55m</li>
                <li><b><i class="fa fa-level-up" aria-hidden="true"></i> Course Level:</b> Beginner</li>
                <li><b><i class="fa fa-globe" aria-hidden="true"></i> Language:</b> English</li>
                <li><b><i class="fa fa-hourglass-end" aria-hidden="true"></i> Slots Left:</b> 45</li>
                <li><b><i class="fa fa-clock-o" aria-hidden="true"></i> Batch Time:</b> 11:00 A.M - 01:00 P.M</li>
            </ul>
        </div>
    </div>
</section>

<section class="course-third-section" style="background-image:url(assets/images/courses/section-2bg.jpg);">
    <div class="course-form-container">
    <?php 
if(!empty($error_mess)){
  foreach($error_mess as $e_m){
  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><center><?= $e_m; ?></center></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } } if(!empty($batch_detail)) { ?>
        <h1>Enroll Now In <?= $course_detail['course_name'] ?></h1>
        <h1>Price: ₹  <?= $course_detail['price']; ?></h1>
        <form action="<?= base_url("Subscription") ?>" method="post" class="course-form">
            <div class="course-form-left-col">
                <input type="hidden" name="price" value="<?= $course_detail['price'] ?>">
                <h4>Full Name</h4>
                <input name="name" type="text" placeholder="Enter Your Full Name" class="course-form-input"
                    required /><br><br>
                <h4>Phone Number</h4>
                <input name="number" type="number" placeholder="Enter Your Phone Number" class="course-form-input"
                    required /><br><br>
                <h4>Who You Are?</h4>
                <select name="student_ty" id="student" required>
                    <option value="forth-slot">Select Any One Option</option>
                    <option value="forth-slot">Student</option>
                    <option value="first-slot">Professional</option>
                    <option value="second-slot">Others</option>
                </select>
                <br><br><br>
                <h4>Enter Your Password</h4>
                <input name="pass" type="password" placeholder="Enter Your Password" class="course-form-input"
                    required /><br><br>

            </div>
            <div class="course-form-right-col">
                <h4>E-mail</h4>
                <input name="email" type="email" placeholder="Enter Your E-mail Address" class="course-form-input"
                    required /><br><br>

                <h4>Gender</h4>
                <select name="gender" id="student" required>
                    <option value="forth-slot">Male</option>
                    <option value="first-slot">Female</option>
                    <option value="second-slot">Other</option>
                </select><br><br><br><br>
                <input type="text" name="student_ab" placeholder="Enter Your College/Company Name and Designation"
                    class="course-form-input" required /><br><br>
                <h4>Confirm Password</h4>
                <input name="c_pass" type="password" placeholder="Confirm Your Password" class="course-form-input"
                    required /><br><br>
                <input type="hidden" name="course_id" value="<?= $course_detail['course_id'] ?>">
            </div>
            <div class="batch-div">
                <h4 class="text-center display-1">Choose Any One Batch</h4>
                <div class="radio-toolbar text-center">
                    <?php foreach($batch_detail as $b_d){ ?>
                    <input type="radio" id="<?= $b_d['batch_id'] ?>" onclick="check(<?= $b_d['batch_id'] ?>)"
                        name="batch_id" value="<?= $b_d['batch_id'] ?>">
                    <label for="<?= $b_d['batch_id'] ?>"><?= $b_d['batch_name'] ?> Class Timing
                        <?= date('h:i A',$b_d['class_ts']) ?> </label>
                    <?php } ?>
                </div>
            </div>
            <button type="submit" name="submit" class="course-submit-btn">Submit</button>
        </form>
        <?php } ?>
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