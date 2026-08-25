<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link of CSS files -->
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/remixicon.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/odometer.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/fancybox.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/aos.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/responsive.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/dark-theme.css">
    <title>Teli - Digital Healthcare & Medical Services HTML Template</title>
    <link rel="icon" type="image/png" href="{{asset('/')}}frontend/assets/img/favicon.png">
</head>

<body>

<!--Preloader starts-->
<div class="loader js-preloader">
    <div class="absCenter">
        <div class="loaderPill">
            <div class="loaderPill-anim">
                <div class="loaderPill-anim-bounce">
                    <div class="loaderPill-anim-flop">
                        <div class="loaderPill-pill"></div>
                    </div>
                </div>
            </div>
            <div class="loaderPill-floor">
                <div class="loaderPill-floor-shadow"></div>
            </div>
        </div>
    </div>
</div>
<!--Preloader ends-->

<!-- Theme Switcher Start -->
<div class="switch-theme-mode">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div>
<!-- Theme Switcher End -->

<!-- Page Wrapper End -->
<div class="page-wrapper">

    <!-- Header Section Start -->
    <header class="header-wrap style2">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="header-top-left">
                            <ul class="contact-info list-style">
                                <li>
                                    <span><i class="ri-customer-service-fill"></i></span>
                                    <p>Your Trusted Service Provider</p>
                                </li>
                                <li>
                                    <span><i class="ri-phone-fill"></i></span>
                                    <a href="tel:2455921125">(+245) 592 1125</a>
                                </li>
                                <li>
                                    <span><i class="ri-map-pin-fill"></i></span>
                                    <p>2767 Sunrise Street, NY 1002, USA</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="header-top-right">

                            <ul class="social-profile list-style style1">
                                <li>
                                    <a href="https://facebook.com/">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://linkedin.com/">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://pinterest.com/">
                                        <i class="ri-pinterest-line"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img class="logo-light" src="{{asset('/')}}frontend/assets/img/logo.png" alt="logo">
                        <img class="logo-dark" src="{{asset('/')}}frontend/assets/img/logo-white.png" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                        <div class="menu-close d-lg-none">
                            <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                        </div>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    Home
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="index.html" class="nav-link">Home One</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-2.html" class="nav-link active">Home Two</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-3.html" class="nav-link">Home Three</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-4.html" class="nav-link">Home Four</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-5.html" class="nav-link">Home Five</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-6.html" class="nav-link">Home Six</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-7.html" class="nav-link">Home Seven</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="about.html" class="nav-link">
                                    About
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="portfolio.html" class="nav-link">Our Portfolio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="portfolio-details.html" class="nav-link">Single Portfolio</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Services
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="service-one.html" class="nav-link">Service One</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="service-two.html" class="nav-link">Service Two</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="service-details.html" class="nav-link">Single Service</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Pages
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="team.html" class="nav-link">Our Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="appointment.html" class="nav-link">Book Appointment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pricing-plan.html" class="nav-link">Pricing Plan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="testimonials.html" class="nav-link">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            User Pages
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="login.html" class="nav-link">Login</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="register.html" class="nav-link">Register</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="recover-password.html" class="nav-link">Recover Password</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="terms-of-service.html" class="nav-link">Terms of Service</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="error-404.html" class="nav-link">404 Error Page</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Blog
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Blog Layout
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="blog-no-sidebar.html" class="nav-link">Blog Grid</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="blog-left-sidebar.html" class="nav-link">Blog Left Sidebar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="blog-right-sidebar.html" class="nav-link">Blog Right Sidebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Single Blog
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="blog-details-no-sidebar.html" class="nav-link">Blog Details No Sidebar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="blog-details-left-sidebar.html" class="nav-link">Blog Details Left Sidebar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="blog-details-right-sidebar.html" class="nav-link">Blog Details Right Sidebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">Contact Us</a>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a href="appointment.html" class="nav-link btn style1">Book Appointment</a>
                            </li>
                        </ul>
                        <div class="other-options md-none">
{{--                            <div class="option-item">--}}
{{--                                <button class="searchbtn"><i class="ri-search-line"></i></button>--}}
{{--                            </div>--}}
                            <div class="option-item">
                                <a href="appointment.html" class="btn style1">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </nav>
{{--                <div class="search-area">--}}
{{--                    <input type="search" placeholder="Search Here..">--}}
{{--                    <button type="submit"><i class="ri-search-line"></i></button>--}}
{{--                </div>--}}
                <div class="mobile-bar-wrap">
                    <button class="searchbtn d-lg-none"><i class="ri-search-line"></i></button>
                    <div class="mobile-menu d-lg-none">
                        <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Start -->
    <section class="hero-wrap style2">
        <img src="{{asset('/')}}frontend/assets/img/hero/hero-shape-3.png" alt="Image" class="hero-shape-one bounce">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6">
                    <div class="hero-content" data-speed="0.10" data-revert="true">
                        <h1 data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">Leading Patient Engagement Platform For Clinics</h1>
                        <p data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">Ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from making it over years around the world.</p>
                        <div class="hero-btn" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                            <a href="about.html" class="btn style1">Find Out More</a>
                            <a class="play-video" data-fancybox="" href="https://www.youtube.com/watch?v=UNSSuTSQI9I">
                                        <span class="video-icon">
                                            <i class="ri-play-fill"></i>
                                        </span>
                                <span> Watch Video</span>
                            </a>
                        </div>
                        <div class="counter-card-wrap" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                            <div class="counter-card style1">
                                        <span class="counter-icon">
                                            <i class="flaticon-emergency-kit"></i>
                                        </span>
                                <div class="counter-text">
                                    <h2 class="counter-num">
                                        <span class="odometer" data-count="60"></span>
                                        <span class="target">+</span>
                                    </h2>
                                    <p>Project Completed</p>
                                </div>
                            </div>
                            <div class="counter-card style1">
                                        <span class="counter-icon">
                                            <i class="flaticon-headache"></i>
                                        </span>
                                <div class="counter-text">
                                    <h2 class="counter-num">
                                        <span class="odometer" data-count="99"></span>
                                        <span class="target">%</span>
                                    </h2>
                                    <p>Patients Satisfied</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-appointment" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <img src="{{asset('/')}}frontend/assets/img/hero/hero-shape-4.png" alt="Image" class="hero-shape-two rotate">
                        <div class="hero-appointment-img bg-f" ></div>
                        <div class="hero-appointment-form">
                            <div class="row fg-opt-wrap">
                                <div class="col-sm-5">
                                    <div class="fg-opt">
                                        <span>Date</span>
                                        <p>13 Jul, 20222</p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="fg-opt">
                                        <span>Time</span>
                                        <p>9:30 PM</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="fg-opt">
                                        <button type="button" class="btn style1">Edit Time</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row  fg-opt-wrap">
                                <div class="col-sm-5">
                                    <div class="fg-opt">
                                        <span>Doctor</span>
                                        <p>Dr. Kate Winslate</p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="fg-opt">
                                        <span>Branch</span>
                                        <p>Radiology</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="fg-opt">
                                        <button type="button" class="btn style2">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-doctor" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                        <div class="about-doctor-box">
                            <div class="doctor-img">
                                <img src="{{asset('/')}}frontend/assets/img/about/doctor-1.jpg" alt="Image">
                            </div>
                            <div class="doctor-info">
                                <h5>Dr. Kate Winslet</h5>
                                <span>Radiology</span>
                            </div>
                            <button type="button" class="btn style1">Select</button>
                        </div>
                        <div class="hero-doctor-bg bg-f"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- About Section Start -->
    <section class="about-wrap style2 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="section-title style1 text-center mb-40">
                        <span>About Us</span>
                        <h2>Our Best Services &amp; Poplular Treatment Here</h2>
                    </div>
                </div>
            </div>
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                    <div class="about-img-wrap">
                        <img src="{{asset('/')}}frontend/assets/img/about/about-img-4.jpg" alt="Image" class="about-img-one">
                        <img src="{{asset('/')}}frontend/assets/img/about/about-img-5.jpg" alt="Image" class="about-img-two">
                        <div class="about-promo-box">
                            <span class="promo-icon"><i class="flaticon-medical-operation"></i></span>
                            <h2>700+ <span>Labratory Experts</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                    <div class="about-content">
                        <div class="content-title style1">
                            <p>There are many variations of passages of Lorem Ipsum amets avoilble but majority have suffered alteration in some form, by injected humour or randomise words which don't sure amet consec tetur adicing.</p>
                        </div>
                        <div class="feature-item-wrap">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="ri-check-line"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Mental health Solutions</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque injected humour.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="ri-check-line"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Rapid Patient Improvement</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque injected humour.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="ri-check-line"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>World Class Treatment</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque injected humour.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Service Section Start -->
    <section class="service-wrap style2 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title style2 text-center mb-40">
                        <span>Our Services</span>
                        <h2>Think Hard &amp; Focus On The Patient's Well-Being</h2>
                    </div>
                </div>
            </div>
            <!-- Service Section Start -->
            <section class="service-wrap ptb-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="{{asset('/')}}frontend/assets/img/services/service-2.jpg" alt="Image">
                                    <span class="service-icon"><i class="flaticon-hospital-ward"></i></span>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Patient Onboarding</a></h3>
                                    <p>It is a long established fact that reader will content of page when looks layout.</p>
                                    <a href="service-details.html" class="link style2">Explore More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="{{asset('/')}}frontend/assets/img/services/service-6.jpg" alt="Image">
                                    <span class="service-icon"><i class="flaticon-nurse"></i></span>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Specialist Advise</a></h3>
                                    <p>It is a long established fact that reader will content of page when looks layout.</p>
                                    <a href="service-details.html" class="link style2">Explore More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="{{asset('/')}}frontend/assets/img/services/service-3.jpg" alt="Image">
                                    <span class="service-icon"><i class="flaticon-health-care"></i></span>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Heart Checkup</a></h3>
                                    <p>It is a long established fact that reader will content of page when looks layout.</p>
                                    <a href="service-details.html" class="link style2">Explore More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="{{asset('/')}}frontend/assets/img/services/service-4.jpg" alt="Image">
                                    <span class="service-icon"><i class="flaticon-traumatology"></i></span>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Orthopedic Solution</a></h3>
                                    <p>It is a long established fact that reader will content of page when looks layout.</p>
                                    <a href="service-details.html" class="link style2">Explore More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="{{asset('/')}}frontend/assets/img/services/service-5.jpg" alt="Image">
                                    <span class="service-icon"><i class="flaticon-bandage"></i></span>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Pathology test</a></h3>
                                    <p>It is a long established fact that reader will content of page when looks layout.</p>
                                    <a href="service-details.html" class="link style2">Explore More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="{{asset('/')}}frontend/assets/img/services/service-8.jpg" alt="Image">
                                    <span class="service-icon"><i class="flaticon-ophthalmology"></i></span>
                                </div>
                                <div class="service-info">
                                    <h3><a href="service-details.html">Complete Eye Care</a></h3>
                                    <p>It is a long established fact that reader will content of page when looks layout.</p>
                                    <a href="service-details.html" class="link style2">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Service Section End -->
        </div>
    </section>
    <!-- Service Section End -->
    <!-- Why Choose Us Section Start -->
    <section class="wh-wrap style2 pb-100">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                    <div class="wh-content">
                        <div class="content-title style1">
                            <span>Appointment</span>
                            <h2>Protect Your Health With Our Health Package</h2>
                            <p>There are many variations of passages of Lorem Ipsum amets avoilble but majority have suffered alteration in some form, by injected humour or randomise words which don't sure amet consec tetur adicing.</p>
                        </div>
                        <div class="feature-item-wrap">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-pulse"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Good People Work</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque .</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-pills"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Live Healthy Life</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque.</p>
                                </div>
                            </div>
                        </div>
                        <a href="about.html" class="btn style7">Get More info</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                        <form action="#" class="book-appointment-form mt-5">
                            <div class="content-title">
                                <h4>Your Information</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="select_service" id="select_service">
                                            <option value="0" data-display="Select Service">Department</option>
                                            <option value="1">Orthopedic</option>
                                            <option value="2">Neurology</option>
                                            <option value="3">Dentristy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="select_service" id="select_service">
                                            <option value="0" data-display="Select Service">Select Doctor</option>
                                            <option value="1">Orthopedic</option>
                                            <option value="2">Neurology</option>
                                            <option value="3">Dentristy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="select_time" id="select_time">
                                            <option value="0" data-display="Select Doctor">Select Time</option>
                                            <option value="1" >10:00 AM</option>
                                            <option value="2" >11:00 AM</option>
                                            <option value="3" >12:00 PM</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn style1 d-block w-100">Book Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Why Choose Us Section End -->
    <!-- Pricing Section Start -->
    <section class="pricing-wrap pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2  col-md-10 offset-md-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="section-title style1 text-center mb-40">
                        <span>Medical Packages</span>
                        <h2>Our Great Psychitrist Services Provided For You</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <div class="pricing-header-left">
                                <h5>Basic Plan</h5>
                                <h2>$79<span>/Month</span></h2>
                            </div>
                            <div class="pricing-header-right">
                                <i class="flaticon-home"></i>
                            </div>
                        </div>
                        <ul class="pricing-features list-style">
                            <li class="checked">New Patient Consultation <i class="ri-check-line"></i></li>
                            <li class="checked">Regular health Checkup<i class="ri-check-line"></i></li>
                            <li class="checked">Ocupational Therapy<i class="ri-check-line"></i></li>
                            <li class="checked">Phusical Therapy<i class="ri-check-line"></i></li>
                            <li class="unchecked">X-rays<i class="ri-close-fill"></i></li>
                            <li class="unchecked">Cancer Treatment<i class="ri-close-fill"></i></li>
                        </ul>
                        <a href="login.html" class="btn style2">Get Started Now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <div class="pricing-header-left">
                                <h5>Standard Plan</h5>
                                <h2>$89<span>/Month</span></h2>
                            </div>
                            <div class="pricing-header-right">
                                <i class="flaticon-user-2"></i>
                            </div>
                        </div>
                        <ul class="pricing-features list-style">
                            <li class="checked">New Patient Consultation <i class="ri-check-line"></i></li>
                            <li class="checked">Regular health Checkup<i class="ri-check-line"></i></li>
                            <li class="checked">Ocupational Therapy<i class="ri-check-line"></i></li>
                            <li class="checked">Phusical Therapy<i class="ri-check-line"></i></li>
                            <li class="checked">X-rays<i class="ri-check-line"></i></li>
                            <li class="unchecked">Cancer Treatment<i class="ri-close-fill"></i></li>
                        </ul>
                        <a href="login.html" class="btn style2">Get Started Now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <div class="pricing-header-left">
                                <h5>Premium Plan</h5>
                                <h2>$99<span>/Month</span></h2>
                            </div>
                            <div class="pricing-header-right">
                                <i class="flaticon-clipboard"></i>
                            </div>
                        </div>
                        <ul class="pricing-features list-style">
                            <li class="checked">New Patient Consultation <i class="ri-check-line"></i></li>
                            <li class="checked">Regular health Checkup<i class="ri-check-line"></i></li>
                            <li class="checked">Ocupational Therapy<i class="ri-check-line"></i></li>
                            <li class="checked">Phusical Therapy<i class="ri-check-line"></i></li>
                            <li class="checked">X-rays<i class="ri-check-line"></i></li>
                            <li class="checked">Cancer Treatment<i class="ri-check-line"></i></li>
                        </ul>
                        <a href="login.html" class="btn style2">Get Started Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Team Section Start -->
    <section class="team-wrap ptb-100 bg-chathamas">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2  col-md-10 offset-md-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="section-title style2 text-center mb-40">
                        <span>Our Doctors</span>
                        <h2>Meet Our Expert &amp; Experienced Team Members</h2>
                    </div>
                </div>
            </div>
            <div class="team-slider-one owl-carousel">
                <div class="team-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <img src="{{asset('/')}}frontend/assets/img/team/team-1.jpg" alt="Image">
                    <div class="team-info">
                        <a href="https://templates.hibotheme.com/cdn-cgi/l/email-protection#07616263756e646c4773626b6e2964686a" class="team-mail"><i class="ri-mail-send-line"></i></a>
                        <h3>Dr. Fedrick Bonita</h3>
                        <span>Othopedic Surgeon</span>
                        <ul class="social-profile style2 list-style">
                            <li>
                                <a target="_blank" href="https://facebook.com/">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://instagram.com/">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="team-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                    <img src="{{asset('/')}}frontend/assets/img/team/team-2.jpg" alt="Image">
                    <div class="team-info">
                        <a href="https://templates.hibotheme.com/cdn-cgi/l/email-protection#690f0c0d1b000a02291d0c0500470a0604" class="team-mail"><i class="ri-mail-send-line"></i></a>
                        <h3>Dr. Ken Moris</h3>
                        <span>Urology Efficient</span>
                        <ul class="social-profile style2 list-style">
                            <li>
                                <a target="_blank" href="https://facebook.com/">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://instagram.com/">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="team-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                    <img src="{{asset('/')}}frontend/assets/img/team/team-3.jpg" alt="Image">
                    <div class="team-info">
                        <a href="https://templates.hibotheme.com/cdn-cgi/l/email-protection#16707372647f757d5662737a7f3875797b" class="team-mail"><i class="ri-mail-send-line"></i></a>
                        <h3>Dr. Luiz Frank</h3>
                        <span>Neurosurgery Efficient</span>
                        <ul class="social-profile style2 list-style">
                            <li>
                                <a target="_blank" href="https://facebook.com/">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://instagram.com/">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="team-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                    <img src="{{asset('/')}}frontend/assets/img/team/team-4.jpg" alt="Image">
                    <div class="team-info">
                        <a href="https://templates.hibotheme.com/cdn-cgi/l/email-protection#55333031273c363e152130393c7b363a38" class="team-mail"><i class="ri-mail-send-line"></i></a>
                        <h3>Dr. Selina Gomez</h3>
                        <span>Surgery Efficient </span>
                        <ul class="social-profile style2 list-style">
                            <li>
                                <a target="_blank" href="https://facebook.com/">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://instagram.com/">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="team-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                    <img src="{{asset('/')}}frontend/assets/img/team/team-5.jpg" alt="Image">
                    <div class="team-info">
                        <a href="https://templates.hibotheme.com/cdn-cgi/l/email-protection#8debe8e9ffe4eee6cdf9e8e1e4a3eee2e0" class="team-mail"><i class="ri-mail-send-line"></i></a>
                        <h3>Dr. Sarai Conn</h3>
                        <span>Senior Dentist</span>
                        <ul class="social-profile style2 list-style">
                            <li>
                                <a target="_blank" href="https://facebook.com/">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://instagram.com/">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="team-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="700">
                    <img src="{{asset('/')}}frontend/assets/img/team/team-6.jpg" alt="Image">
                    <div class="team-info">
                        <a href="https://templates.hibotheme.com/cdn-cgi/l/email-protection#c4a2a1a0b6ada7af84b0a1a8adeaa7aba9" class="team-mail"><i class="ri-mail-send-line"></i></a>
                        <h3>Dr. Maureen Klein</h3>
                        <span>Othopedic Surgeon</span>
                        <ul class="social-profile style2 list-style">
                            <li>
                                <a target="_blank" href="https://facebook.com/">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://instagram.com/">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Testimonial Section Start -->
    <section class="testimonial-wrap style2 ptb-100 bg-athens">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2  col-md-10 offset-md-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="section-title style1 text-center mb-40">
                        <span>Testimonial</span>
                        <h2>Our Great Psychitrist Services Provided For You</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-two owl-carousel">
                <div class="testimonial-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}frontend/assets/img/testimonials/client-1.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Jim Morison</h3>
                                <span>Director, BAT</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-straight-quotes"></i>
                        </div>
                    </div>
                    <ul class="ratings list-style">
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                    </ul>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                </div>
                <div class="testimonial-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="300">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}frontend/assets/img/testimonials/client-2.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Alex Cruis</h3>
                                <span>CEO, IBAC</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-straight-quotes"></i>
                        </div>
                    </div>
                    <ul class="ratings list-style">
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                    </ul>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                </div>
                <div class="testimonial-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}frontend/assets/img/testimonials/client-3.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Tom Haris</h3>
                                <span>Engineer, Olleo</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-straight-quotes"></i>
                        </div>
                    </div>
                    <ul class="ratings list-style">
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                    </ul>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                </div>
                <div class="testimonial-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="500">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}frontend/assets/img/testimonials/client-4.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Harry Jackson</h3>
                                <span>Enterpreneur</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-straight-quotes"></i>
                        </div>
                    </div>
                    <ul class="ratings list-style">
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                    </ul>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                </div>
                <div class="testimonial-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="600">
                    <div class="client-info-area">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="{{asset('/')}}frontend/assets/img/testimonials/client-5.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h3>Chris Haris</h3>
                                <span>MD, ITec</span>
                            </div>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-straight-quotes"></i>
                        </div>
                    </div>
                    <ul class="ratings list-style">
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                        <li><i class="ri-star-fill"></i></li>
                    </ul>
                    <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8">
                    <p class="mb-0 md-center">Are you impressed?Do you want to take our service here? <a href="appointment.html" class="link style1">Book An Appointment</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

{{--    find doctor section start--}}
    <section class="team-wrap ptb-100 bg-chathamas">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2  col-md-10 offset-md-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="section-title style2 text-center mb-40">
                        <span>Find Doctors</span>
                        <h2>Meet Our Expert &amp; Experienced Team Members</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, beatae blanditiis commodi consequatur consequuntur, ea eaque est ex iste nam neque nostrum omnis ratione repellat reprehenderit saepe sit, unde veritatis!</p>

                        <form action="">
                        <div class="sidebar-widget mt-5 d-flex justify-content-center">

                            <div class="form-group">
                                <select name="select_service" id="select_service" style="height: 54px;padding: 10px 40px 10px 20px;border-radius: 5px 0px 0px 5px;border: 1px solid rgba(0, 0, 0, 0.1);" >
                                    <option value="0" data-display="Select Service">Select Department</option>
                                    <option value="1">Orthopedic</option>
                                    <option value="2">Neurology</option>
                                    <option value="3">Dentristy</option>
                                </select>
                            </div>
                            <div class="search-box">
                                <div class="form-group">
                                    <input type="search" placeholder="Search">
                                    <button type="submit">
                                        <i class="flaticon-search"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
{{--    find doctor section end--}}

    <!-- Blog Section Start -->
    <section class="blog-wrap pt-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3  col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title style1 text-center mb-40">
                        <span>Our Blog</span>
                        <h2>Our Latest &amp; Most Popular Tips &amp; Tricks For You</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                    <div class="blog-card style2">
                        <div class="blog-img">
                            <img src="{{asset('/')}}frontend/assets/img/blog/blog-5.jpg" alt="Image">
                            <a href="posts-by-date.html" class="blog-date"><span>22</span> Jun</a>
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a></li>
                                <li><i class="ri-wechat-line"></i>No Comment</li>
                            </ul>
                            <h3><a href="blog-details-right-sidebar.html">Telehealth Services Are Ready To Help Your Family </a></h3>
                            <p>Lorem Ipsum is simply dummy text the and standard dummy text ever since.</p>
                            <a href="blog-details-right-sidebar.html" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300">
                    <div class="blog-card style2">
                        <div class="blog-img">
                            <img src="{{asset('/')}}frontend/assets/img/blog/blog-6.jpg" alt="Image">
                            <a href="posts-by-date.html" class="blog-date"><span>17</span>Jun</a>
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a></li>
                                <li><i class="ri-wechat-line"></i>No Comment</li>
                            </ul>
                            <h3><a href="blog-details-right-sidebar.html">10 Tips To Lead A Healthy And Happy Life</a></h3>
                            <p>Lorem Ipsum is simply dummy text the and standard dummy text ever since.</p>
                            <a href="blog-details-right-sidebar.html" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="400">
                    <div class="blog-card style2">
                        <div class="blog-img">
                            <img src="{{asset('/')}}frontend/assets/img/blog/blog-4.jpg" alt="Image">
                            <a href="posts-by-date.html" class="blog-date"><span>25</span> May</a>
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a></li>
                                <li><i class="ri-wechat-line"></i>No Comment</li>
                            </ul>
                            <h3><a href="blog-details-right-sidebar.html">The Day I'd Spent At Square Medical Center</a></h3>
                            <p>Lorem Ipsum is simply dummy text the and standard dummy text ever since.</p>
                            <a href="blog-details-right-sidebar.html" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Start -->
    <footer class="footer-wrap">
        <div class="container">
            <div class="row pt-100 pb-75">
                <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12">
                    <div class="footer-widget">
                        <a href="index.html" class="footer-logo">
                            <img src="{{asset('/')}}frontend/assets/img/logo-white.png" alt="Image">
                        </a>
                        <p class="comp-desc">
                            Lorem ipsum dolor sit amet consc tetur adicing elit. Dolor emque dicta molest enim beatae ame consequ atur tempo pretium auctor nam.
                        </p>
                        <ul class="social-profile style1 list-style">
                            <li>
                                <a href="https://facebook.com/">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com/">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Company</h3>
                        <ul class="footer-menu list-style">
                            <li>
                                <a href="index.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="about.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="service-one.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Our Services
                                </a>
                            </li>
                            <li>
                                <a href="team.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Our Team
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Important</h3>
                        <ul class="footer-menu list-style">
                            <li>
                                <a href="portfolio.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="appointment.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Appointment
                                </a>
                            </li>
                            <li>
                                <a href="faq.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    FAQ
                                </a>
                            </li>
                            <li>
                                <a href="privacy-policy.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="terms-of-service.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Terms &amp; Conditions
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-5 col-md-6 col-sm-6 pe-xl-4">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Quick Link</h3>
                        <ul class="footer-menu list-style">
                            <li>
                                <a href="about.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Why Choose Us
                                </a>
                            </li>
                            <li>
                                <a href="pricing-plan.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Pricing Plan
                                </a>
                            </li>
                            <li>
                                <a href="blog-left-sidebar.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    News &amp; Articles
                                </a>
                            </li>
                            <li>
                                <a href="login.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Subscribe
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-7 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Official Info</h3>
                        <ul class="contact-info list-style">
                            <li>
                                <i class="flaticon-map"></i>
                                <h6>Location</h6>
                                <p>2767 Sunrise Street, NY 1002, USA</p>
                            </li>
                            <li>
                                <i class="flaticon-email-1"></i>
                                <h6>Email</h6>
                                <a href="https://templates.hibotheme.com/cdn-cgi/l/email-protection#82eae7eeeeedc2f6e7eeebace1edef"><span class="__cf_email__" data-cfemail="d5bdb0b9b9ba95a1b0b9bcfbb6bab8">[email&#160;protected]</span></a>
                            </li>
                            <li>
                                <i class="flaticon-phone-call-1"></i>
                                <h6>Phone</h6>
                                <a href="tel:13454567877">+1-3454-5678-77</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <p class="copyright-text"><i class="ri-copyright-line"></i> <span>Teli</span>. All Rights Reserved By <a href="https://hibotheme.com/">HiboTheme</a></p>
    </footer>
    <!-- Footer Section End -->

</div>
<!-- Page Wrapper End -->

<!-- Back-to-top button Start -->
<a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>
<!-- Back-to-top button End -->

<!-- Link of JS files -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('/')}}frontend/assets/js/jquery.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/form-validator.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/contact-form-script.js"></script>
<script src="{{asset('/')}}frontend/assets/js/aos.js"></script>
<script src="{{asset('/')}}frontend/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/odometer.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/fancybox.js"></script>
<script src="{{asset('/')}}frontend/assets/js/jquery.appear.js"></script>
<script src="{{asset('/')}}frontend/assets/js/tweenmax.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/main.js"></script>
</body>

</html>
