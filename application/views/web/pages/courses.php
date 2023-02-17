<section class="about-us-first-section" style="background-image: linear-gradient(orange,brown);">
    <h1 class="first-heading">OUR COURSES</h1>
</section>

<section class="course-first-section" style="background-image: url(assets/images/courses/abstract-flowing-light-ombre-gradient-background-free-video.jpg);">
    <div class="course-first-section-left-col">
        <h2 class="course-heading">Programming with Python</h2>
        <p class="course-heading-text">This online program is designed for anyone who is interested in acquiring programming skills in Python.
No prior programming knowledge is required. </p>
        <span class="note">Note: Limited Seats Available</span><br><br><br>
        <a href="#" class="enroll-btn2">Enroll Now</a>
        <a href="#" class="demo-btn">Watch Demo</a>
    </div>
    <div class="course-first-section-right-col">
    <img src="assets/images/courses/10798281_19362653.jpg" alt="">
    </div>
</section>

<section class="course-second-section">
    <?php foreach($course_data as $c_d){ ?>
        <a href="<?= base_url('Course-Detail').'?id='. base64_encode($c_d['course_id']) ?>">
    <div class="card course-card">
        <div class="wrapper">
            <div class="parent" onclick="">
                <div class="child bg-one" style="background-image:url(https://erp-panel.think-champ.com/assets/images/course/<?= $c_d['sec_1_img'] ?>);">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="course-teacher">
                <img src="assets/images/home/test-img.jpg" alt="" class="course-teacher-img">
                <p class="course-teacher-name"><?php $teacher_name = explode(" ",$c_d['emp_name']); echo $teacher_name['0']?></p>
            </div>
            <div class="course-star-rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <p class="total-rating">(10)</p>
            </div>
        </div>
        <h5 class="card-title"><?= $c_d['course_title'] ?></h5>
        <hr style="border-top: dotted 1px;" />
        <ul class="course-item">
            <li><i class="fa fa-file-text-o" aria-hidden="true"></i> Lessons <?= $c_d['no_of_lessons'] ?></li>
            <li><i class="fa fa-user-o" aria-hidden="true"></i> Lenguage <?= $c_d['language'] ?></li>
        </ul>
    </div>
    </a>
    <?php } ?>

</section>
