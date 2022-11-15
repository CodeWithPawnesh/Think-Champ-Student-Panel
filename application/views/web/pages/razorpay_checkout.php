<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Think Champ Student Panel</title>
</head>

<body style="background-color:blue">


    <header class="header-1">
        <div class="header-logo">
            <img src="assets/images/home/Tc_logo2.png" alt="logo" width="160" height="80">
        </div>
        <button class="wp-btn display-none"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>
        </button>
        <p class="wp-text display-none"><span class="wp-chat display-none">Phone</span><br>
            +91 999999999 </p>
        <nav class="display-none nav-1">
            <ul class="menu">
                <li class="nav-item"><a href="<?= base_url('Home') ?>" class="menu-links active-menu">HOME</a></li>
                <li class="nav-item"><a href="About-Us" class="menu-links ">ABOUT US</a></li>
                <li class="nav-item"><a href="Courses" class="menu-links">COURSES</a></li>
                <li class="nav-item"><a href="Contact" class="menu-links">CONTACT</a></li>
                <li class="nav-item"><a href="<?= base_url('Workshop') ?>" class="menu-links">WORKSHOP</a></li>
                <li class="nav-item"><a href="FAQ" class="menu-links">FAQ</a></li>
            </ul>
        </nav>
        <?php if (!$this->session->userdata('login_status')) { ?>
        <button class="login-btn"><a href="<?= base_url('Login') ?>">LOGIN</a></button>
        <?php }else{ ?>
        <button class="login-btn"><a href="<?= base_url('StudentPanel') ?>">DashBoard</a></button>
        <?php } ?>

    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-white nav-2">
        <a class="navbar-brand" href="#">
            <div class="header-logo">
                <img src="assets/images/home/Tc_logo2.png" alt="logo" width="100" height="40">
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item"><a href="<?= base_url('Home') ?>"
                        class="menu-links active-menu nav-item nav-link active">HOME  <span
                            class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a href="#about" class="menu-links nav-item nav-link ">ABOUT US</a></li>
                <li class="nav-item"><a href="#course" class="menu-links nav-item nav-link">COURSES</a></li>
                <li class="nav-item"><a href="#contact" class="menu-links nav-item nav-link">CONTACT</a></li>
                <li class="nav-item"><a href="<?= base_url('Workshop') ?>"
                        class="menu-links nav-item nav-link">WORKSHOP</a></li>
                <li class="nav-item"><a href="#faq" class="menu-links nav-item nav-link">FAQ</a></li>
                <?php if (!$this->session->userdata('login_status')) { ?>
                <button class="login-btn"><a href="<?= base_url('Login') ?>">LOGIN</a></button>
                <?php }else{ ?>
                <button class="login-btn"><a href="<?= base_url('StudentPanel') ?>">DashBoard</a></button>
                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- Start of First-section  -->

    <button style="display:none" id="rzp-button1">Pay</button>
</body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?= $key_id ?>", // Enter the Key ID generated from the Dashboard
    "amount": <?= $order['amount']; ?>, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Think Champ pvt lmt.",
    "description": "Test Transaction",
    "image": "<?= base_url("assets/images/home/Tc_logo2.png") ?>",
    "order_id": "<?= $order['id']; ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "<?= base_url("Subscription/payment_status") ?>",
    "prefill": {
        "name": "<?= $student_data['student_name']; ?>",
        "email": "<?= $student_data['email']; ?>",
        "contact": "<?= $student_data['phone']; ?>"
    },
    "notes": {
        "address": "Andrapardesh"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e) {
    rzp1.open();
    e.preventDefault();
}
document.getElementById('rzp-button1').click();
</script>