<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Think Champ Student Panel</title>
</head>

<body>


  <header>
    <div class="header-logo">
      <img src="assets/images/home/Tc_logo2.png" alt="logo" width="160" height="80">
    </div>
    <button class="wp-btn"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>
    </button>
    <p class="wp-text"><span class="wp-chat">Phone</span><br>
      +91 999999999 </p>
    <nav>
      <ul class="menu">
        <li class="nav-item"><a href="<?= base_url('Home') ?>" class="menu-links active-menu">HOME</a></li>
        <li class="nav-item"><a href="#about" class="menu-links ">ABOUT US</a></li>
        <li class="nav-item"><a href="#course" class="menu-links">COURSES</a></li>
        <li class="nav-item"><a href="#contact" class="menu-links">CONTACT</a></li>
        <li class="nav-item"><a href="<?= base_url('Workshop') ?>" class="menu-links">WORKSHOP</a></li>
        <li class="nav-item"><a href="#faq" class="menu-links">FAQ</a></li>
      </ul>
    </nav>
    <button class="login-btn"><a href="<?= base_url('Login') ?>">LOGIN</a></button>
  </header>
