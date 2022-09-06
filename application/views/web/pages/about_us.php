<section class="about-us-first-section" style=" background-image: url(assets/images/home/first-section-bg.jpg);">
    <h1 class="first-heading">ABOUT US</h1>
</section>
<section class="abt-first-section">
    <div class="abt-left-col">
        <img src="assets/images/about/about-us.png" alt="">
    </div>
    <div class="abt-right-col">
        <p class="abt-company">/ ABOUT COMPANY /</p>
        <h2>The way to trounce future.</h2><br>
        <p class="abt-text">Improve your skills, explore and upgrade. The main intention of our program to provide skilled learning for every student anywhere in the world. we feel that online-based learning is an easy way for better outcomes. THINK-CHAMP training sessions make you feel confident in online learning. You will never face any negative experience while enjoying your classes virtually by sitting in your comfort zone. This will help you to learn better and quicker than the traditional ways of learning.
        </p>
    </div>
</section>

<!-- Start of Abt Sixth Section  -->

<section class="abt-sixth-section">
    <div class="abt-sixth-section-col">
        <div class="small-circle">
            <p>01</p>
        </div>
        <div class="bigger-circle">
            <img src="assets/images/about/1.svg" alt="image">
        </div>
        <h2>Browse courses from our expert contributors.</h2>
    </div>
    <img src="assets/images/about/arrow2.svg" alt="" class="arrow">
    <div class="abt-sixth-section-col">
        <div class="small-circle">
            <p>02</p>
        </div>
        <div class="bigger-circle">
            <img src="assets/images/about/2.svg" alt="image">
        </div>
        <h2>Purchase quickly and securely</h2>
    </div>
    <img src="assets/images/about/arrow1.svg" alt="" class="arrow2">
    <div class="abt-sixth-section-col">
        <div class="small-circle">
            <p>03</p>
        </div>
        <div class="bigger-circle">
            <img src="assets/images/about/3.svg" alt="image">
        </div>
        <h2>That's it! Start learning right away.</h2>
    </div>
</section>

<!-- End of Abt Sixth Section  -->


<!-- Start of Abt-second-section  -->

<section class="abt-second-section">
    <div class="abt-second-col col1">
        <div class="circle"><span class="num" data-val="1998">00</span><span class="percent">+</span></div>
        <h2>Students</h2>
    </div>
    <div class="abt-second-col">
        <div class="circle"><span class="num" data-val="10">00</span><span class="percent">+</span></div>
        <h2>Course</h2>
    </div>
    <div class="abt-second-col col1">
        <div class="circle"><span class="num" data-val="14">00</span><span class="percent">+</span></div>
        <h2>Professional Trainers</h2>
    </div>
    <div class="abt-second-col">
        <div class="circle"><span class="num" data-val="100">00</span><span class="percent">+</span></div>
        <h2>Internships</h2>
    </div>
    <div class="abt-second-col col1">
        <div class="circle"><span class="num" data-val="8">00</span><span class="percent">+</span></div>
        <h2>Workshops</h2>
    </div>
</section>

<!-- End of Abt Second Section  -->

<!-- Start of ABt Third Section  -->

<section class="abt-third-section">
    <h1>START YOUR LEARNING JOURNEY TODAY!</h1>
    <p>Lorem ipsum dolor sit amet.</p>
</section>

<!-- End Of Abt Third Section  -->

<!-- Start of Abt Forth Section  -->

<section class="abt-forth-section">
    <div class="abt-forth-section-card">
        <img src="assets/images/about/rating.png" alt="rating" class="service-img">
        <h3>Learn with Experts</h3>
        <p>Our experts provide insights into the nature of thinking and problem-solving.</p>
    </div>
    <div class="abt-forth-section-card">
        <img src="assets/images/about/online-lesson.png" alt="rating" class="service-img">
        <h3>Learn Anything</h3>
        <p>Our platform for knowledge discovery helps you understand any topic through the most efficient paths</p>
    </div>
    <div class="abt-forth-section-card">
        <img src="assets/images/about/time.png" alt="rating" class="service-img">
        <h3>Flexible learning</h3>
        <p>learn new skills when and where you like</p>
    </div>
    <div class="abt-forth-section-card">
        <img src="assets/images/about/monitoring.png" alt="rating" class="service-img">
        <h3>Industry Standards</h3>
        <p>Our service makes it easier and simpler to understand the new technologies</p>
    </div>
</section>

<!-- End Of Abt Forth Section  -->

<!-- Start of Abt Fifth Section  -->

<section class="abt-fifth-section">
    <div class="abt-fifth-section-left-col">
        <div class="abt-fifth-section-img">
            <img src="assets/images/about/instructor.jpg" alt="" width="250" height="200">
        </div>
        <div class="abt-fifth-section-content">
            <h2>Become an Instructor</h2>
            <p>Have a passion to train the students to meet the industry level</p>
            <button><a href="#">START TEACHING</a></button>
        </div>
    </div>
    <div class="abt-fifth-section-right-col">
        <div class="abt-fifth-section-img">
            <img src="assets/images/about/doing-business.jpg" alt="" width="250" height="200">

        </div>
        <div class="abt-fifth-section-content">
            <h2>Access for Business</h2>
            <p>wants to become our edtech partner or any other related business</p>
            <h4>COLLABORATE WITH US</h4>
            <button><a href="#">DOING BUSINESS</a></button>
        </div>
    </div>
</section>

<!-- End of Abt Fifth Section  -->



<!-- start of Abt Seventh Section  -->

<section class="abt-seventh-section">
    <p class="abt-company">/ LEARN TOGETHER /</p>
    <h4>If you want to know more info about training and career guidance</h4>
    <p class="abt-seventh-text">why are you waiting to set your career
        we will guide you,<br> train you, groom you, assist you in all the ways
    </p>
    <button><a href="#"><img src="assets/images/about/whatsapp.png" alt="whatsapp-icon" width="25" height="25"> TALK TO OUR EXPERTS</a></button>
</section>

<!-- End of Abt Seventh Section  -->


<script>
    let valueDisplays = document.querySelectorAll(".num");
    let interval = 4000;

    valueDisplays.forEach((valueDisplay) => {
        let startValue = 0;
        let endvalue = parseInt(valueDisplay.getAttribute("data-val"));
        let duration = Math.floor(interval / endvalue);
        let counter = setInterval(function() {
            startValue += 1;
            valueDisplay.textContent = startValue;
            if (startValue == endvalue) {
                clearInterval(counter);
            }
        }, duration);
    });
</script>