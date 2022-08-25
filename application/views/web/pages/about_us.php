<section class="about-us-first-section">
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

<section class="abt-second-section">
    <div class="abt-second-col col1">
        <div class="circle"><span class="num" data-val="89%">00</span><span class="percent">%</span></div>
        <h2>Prosperity</h2>
    </div>
    <div class="abt-second-col">
        <div class="circle"><span class="num" data-val="91%">00</span><span class="percent">%</span></div>
        <h2>Security</h2>
    </div>
    <div class="abt-second-col col1">
        <div class="circle"><span class="num" data-val="75%">00</span><span class="percent">%</span></div>
        <h2>Surity</h2>
    </div>
    <div class="abt-second-col">
        <div class="circle"><span class="num" data-val="82%">00</span><span class="percent">%</span></div>
        <h2>Assurance</h2>
    </div>
</section>

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