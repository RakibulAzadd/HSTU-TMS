<?php 
include "DB_connection.php";
include "data/setting.php";
$setting = getSetting($conn);
  $upcoming_bus = getUpcomingBus($conn);

if ($upcoming_bus != 0) {
    //<?=$upcoming_bus['campus_s_bus']?>
 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSTU TMS </title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Lightbox Pupup -->
    <link rel="stylesheet" href="./frontpage/css/lightbox.css">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 5 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="./frontpage/css/style.css">
    <link rel="stylesheet" href="./frontpage/css/responsive-style.css">
</head>

<body>
    <!-- Navbar Section Start -->
    <header id="full_nav">
        <div class="header ">
            <div class="container fixed-top">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="./index.php">
                        <img  src="./frontpage/images/logo.png" class="rounded img-fluid" alt="kk"><h2 class="abul">HSTU TMS</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                        aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon"></span> -->
                        <i class="fas fa-stream navbar-toggler-icon"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="main-nav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="./frontpage/about.php">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="./frontpage/bus_schedule.php">Bus Schedule</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="./frontpage/gallery.php">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#con">Contact</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="./frontpage/sing_up.php">New Here</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="./login.php">Login</a>
                            </li>
                             
                        </ul>

                        <div class="header_right">
                            <div class="text-lg-end">
                                <span>Call Us!</span>
                                <span class="phone_no">+8801706877533</span>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Navbar Section Exit -->

    <!-- banner Section start -->
    <section class="banner_section">
        <div class="container">
            <div id="banner-carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption">
                            <div class="banner-content">
                                <h1>Students Upcoming Bus</h1>
                                <h3>Maintain Bus Schedule </h3>
                                <p>From Campus Bus No : <?=$upcoming_bus['campus_s_bus']?>  and   Time : <?=$upcoming_bus['campus_s_time']?> </p>
                                <p>From Town Bus No : <?=$upcoming_bus['town_s_bus']?>  and  Time : <?=$upcoming_bus['town_s_time']?> </p>
                                <a href="./login.php" class="btn main-btn">Details Here</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <div class="banner-content">
                                <h1>Teacher Upcoming Bus</h1>
                                <h3>Maintain Bus Schedule</h3>
                                <p>From Campus Bus No : <?=$upcoming_bus['campus_t_bus']?>  and   Time : <?=$upcoming_bus['campus_t_time']?> </p>
                                <p>From Town Bus No : <?=$upcoming_bus['town_t_bus']?>  and  Time : <?=$upcoming_bus['town_t_time']?> </p>
                                <a href="./login.php" class="btn main-btn">Details Here</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <div class="banner-content">
                                <h1>Staff Upcoming Bus</h1>
                                <h3>Maintain Bus Schedule</h3>
                                <p>From Campus Bus No : <?=$upcoming_bus['campus_st_bus']?>  and   Time : <?=$upcoming_bus['campus_st_time']?> </p>
                                <p>From Town Bus No : <?=$upcoming_bus['town_st_bus']?>  and  Time : <?=$upcoming_bus['town_st_time']?> </p>
                                <a href="./login.php" class="btn main-btn">Details Here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section exit -->


    <!--About Section start -->
    <section class="landing_about_section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6 col-sm-8">
                    <div class="about-content">
                        <h2>Introduction of HSTU Transport</h2>
                        <div class="about-details">
                            <p class="fw-bold">Transportation is a major issue to both students and parents.
                                 Most of the university students are matured enough to travel their campuses by themselves. 
                                 In these cases, students use public transport from different places. 
                                 HSTU is always concerned about their students and for this purpose now, 
                                 We have around 30+ buses which are exclusively used for our students/faculty/admin personnel and staff. 
                                 A parents Car and an ambulance is also available for the students and their parents. 
                                 Total transportation system is managed from our HSTU campus. All the transports are moving for the students 
                                 on different routes and campuses from HSTU Campus. Students just need to present their ID card for getting this 
                                 facility. According to the distance they pay a small amount for the transport facility. Every month HSTU authorizes 
                                 to pay some subsidy considering the benefits of the Students/Faculty and Admin people. It is time consuming and also 
                                 saves money. Particulerly this service is very helpful for our female students. They can easily avoid the unavoidable 
                                 circumstances or any types of unpleasant situations</p>
                          

                            <a href="./frontpage/about.php" class="btn main-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Section Exit -->

    <!--Product Section start -->
    <!-- <section class="landing_product_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center pb-5">
                    <h2 class="section-title">Our Best Services</h2>
                    <p class="section-subtitle">      </p>
                </div>
            </div>

            <div class="row mx-0">
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="card product-card">
                        <div class="services">
                            <img decoding="async" src="./frontpage/images/services/b-3.jpg" class="img-fluid" />
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h3>HSTU Bus</h3>
                        </div>
                        <div class="services">
                            <a href="services.html" class="btn main-btn">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="card product-card">
                        <div class="services">
                            <img decoding="async" src="./frontpage/images/services/b-4.jpg" class="img-fluid" />
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h3>HSTU Bus</h3>
                        </div>
                        <div class="services">
                            <a href="services.html" class="btn main-btn">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="card product-card">
                        <div class="services">
                            <img decoding="async" src="./frontpage/images/services/b-5.jpg" class="img-fluid" />
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h3>HSTU Bus</h3>
                            
                        </div>
                        <div class="services">
                            <a href="services.html" class="btn main-btn">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="card product-card">
                        <div class="services">
                            <img decoding="async" src="./frontpage/images/services/b-5.jpg" class="img-fluid" />
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h3>HSTU Bus</h3>
                            
                        </div>
                        <div class="services">
                            <a href="./frontpage/services.php" class="btn main-btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section> -->
    <!--Product Section Exit -->

    <!-- testimonial Section start -->
    <section class="testimonial_section">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">HSTU TMS Notice</h2>
                    <p class="section-subtitle">            </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-10">
                    <div id="testimonial-slider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button data-bs-target="#testimonial-slider" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button data-bs-target="#testimonial-slider" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button data-bs-target="#testimonial-slider" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="d-sm-flex row">
                                    <div class="profile-box col-sm-5">
                                        <img decoding="async" src="./frontpage/images/testimonial/testimonial-1.png" class="img-fluid">
                                    </div>
                                    <div class="card  col-sm-7">
                                        <div class="desc-box">
                                            <p class="fst-italic"><?=$setting['notice1']?></p>
                                            <div class="my-4">
                                                <h4>Prof. Dr. Md. Khaled Hossain</h4>
                                                <p class="m-0 text-white">Director (Transport), HSTU</p>
                                            </div>
                                            <img decoding="async" src="./frontpage/images/testimonial/qoutes.svg" class="float-end">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-sm-flex row">
                                    <div class="profile-box col-sm-5">
                                        <img decoding="async" src="./frontpage/images/testimonial/testimonial-1.png" class="img-fluid">
                                    </div>
                                    <div class="card  col-sm-7">
                                        <div class="desc-box">
                                            <p class="fst-italic"><?=$setting['notice2']?></p>
                                            <div class="my-4">
                                                <h4>Prof. Dr. Md. Khaled Hossain</h4>
                                                <p class="m-0 text-white">Director (Transport), HSTU</p>
                                            </div>
                                            <img decoding="async" src="./frontpage/images/testimonial/qoutes.svg" class="float-end">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-sm-flex row">
                                    <div class="profile-box col-sm-5">
                                        <img decoding="async" src="./frontpage/images/testimonial/testimonial-1.png" class="img-fluid">
                                    </div>
                                    <div class="card  col-sm-7">
                                        <div class="desc-box">
                                            <p class="fst-italic"><?=$setting['notice3']?></p>
                                            <div class="my-4">
                                                <h4>Prof. Dr. Md. Khaled Hossain</h4>
                                                <p class="m-0 text-white">Director (Transport), HSTU</p>
                                            </div>
                                            <img decoding="async" src="./frontpage/images/testimonial/qoutes.svg" class="float-end">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
    </section>
    <!--testimonial Section Exit -->

    <!-- Gallery Section Start-->
    <section class="gallery_section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pb-5">
                    <h2 class="section-title">Our Gallery</h2>
                    <p class="section-subtitle"></p>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <a href="./frontpage/gallery.php" data-lightbox="image" data-title="Lemon">
                        <img decoding="async" src="./frontpage/images/gallery/g-1.jpg" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <a href="./frontpage/gallery.php" data-lightbox="image" data-title="Lemon">
                        <img decoding="async" src="./frontpage/images/gallery/g-2.jpg" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <a href="./frontpage/gallery.php" data-lightbox="image" data-title="Lemon">
                        <img decoding="async" src="./frontpage/images/gallery/g-3.jpg" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <a href="./frontpage/gallery.php" data-lightbox="image" data-title="Lemon">
                        <img decoding="async" src="./frontpage/images/gallery/g-4.jpg" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <a href="./frontpage/gallery.php" data-lightbox="image" data-title="Lemon">
                        <img decoding="async" src="./frontpage/images/gallery/g-5.jpg" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <a href="./frontpage/gallery.php" data-lightbox="image" data-title="Lemon">
                        <img decoding="async" src="./frontpage/images/gallery/g-6.jpg" class="img-fluid rounded-3">
                    </a>
                </div>

                <div class="col-sm-12 text-center mt-4">
                    <a href="./frontpage/gallery.php" class="btn main-btn">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section Exit -->

    <!-- Footer section Start-->
    <section class="footer_wrapper mt-3 mt-md-0" id="con">
        <div class="container px-5 px-lg-0">
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Contact</h5>
                    <p class="mb-4 ps-0 company_details">Hajee Mohammad Danesh Science and Technology University (HSTU)</p>
                    <div class="contact-info">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fa fa-home me-3"></i> Dinajpur-5200, Bangladesh</a></li>
                            <li><a href="#"><i class="fa fa-phone me-3"></i>+1 222 3333</a></li>
                            <li><a href="#"><i class="fa fa-envelope me-3"></i>transport@hstu.ac.bd</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Campus</h5>
                    <ul class="link-widget p-0">
                        <li><a href="https://hstu.ac.bd/page/news_events">News and Events</a></li>
                        <li><a href="https://hstu.ac.bd/page/medical">Medical</a></li>
                        <li><a href="https://library.hstu.ac.bd/">Library</a></li>
                        <li><a href="https://hstu.ac.bd/page/Download">Download</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>International Affairs<br> Section</h5>
                    <ul class="link-widget p-0">
                        <li><a href="https://hstu.ac.bd/ias/home/degree_offered">Degree Offered</a></li>
                        <li><a href="https://hstu.ac.bd/ias/home/ac_requirements">Academic Requirments</a></li>
                        <li><a href="https://hstu.ac.bd/ias/home/apply">How to Apply</a></li>
                        <li><a href="https://hstu.ac.bd/ias/home/gallery">Gallery</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Academic</h5>
                    <ul class="link-widget p-0">
                        <li><a href="https://hstu.ac.bd/page/faculties_and_departments">Faculties & Departments </a></li>
                        <li><a href="https://hstu.ac.bd/page/undergraduate_programme">Undegraduate Programme</a></li>
                        <li><a href="https://hstu.ac.bd/page/postgraduate_programme">Postgraduate Programme</a></li>
                        <li><a href="https://hstu.ac.bd/page/academic_council">Academic Council</a></li>
                        <li><a href="https://hstu.ac.bd/page/academic_calender"> Academic Calendar</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>The University</h5>
                    <ul class="link-widget p-0">
                        <li><a href="https://hstu.ac.bd/about_us/overview">About HSTU</a></li>
                        <li><a href="https://hstu.ac.bd/page/exam_result"> Exam Results</a></li>
                        <li><a href="https://bn.wikipedia.org/wiki/%E0%A6%B9%E0%A6%BE%E0%A6%9C%E0%A7%80_%E0%A6%AE%E0%A7%8B%E0%A6%B9%E0%A6%BE%E0%A6%AE%E0%A7%8D%E0%A6%AE%E0%A6%A6_%E0%A6%A6%E0%A6%BE%E0%A6%A8%E0%A7%87%E0%A6%B6_%E0%A6%AC%E0%A6%BF%E0%A6%9C%E0%A7%8D%E0%A6%9E%E0%A6%BE%E0%A6%A8_%E0%A6%93_%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%AF%E0%A7%81%E0%A6%95%E0%A7%8D%E0%A6%A4%E0%A6%BF_%E0%A6%AC%E0%A6%BF%E0%A6%B6%E0%A7%8D%E0%A6%AC%E0%A6%AC%E0%A6%BF%E0%A6%A6%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%B2%E0%A6%AF%E0%A6%BC"> HSTU Wikipedia</a></li>
                        <li><a href="https://hstu.ac.bd/page/admin_bodies"> Admin Bodies</a></li>
                        <li><a href="https://hstu.ac.bd/page/regent_board">Regent Board</a></li>
                        <li><a href="https://hstu.ac.bd/page/office_section"> Office & Section</a></li>
                        <li><a href="./driver _info.php">  Driver Information</a></li>

                        
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <!-- <h5>Newsletter</h5>
                    <div class="form-group mb-4">
                        <input type="email" class="form-control bg-transparent" placeholder="Enter Your Email Here">
                        <button type="submit" class="btn main-btn">Subscribe</button>
                    </div> -->
                    <h5>Stay Connected</h5>
                    <ul class="social-network d-flex align-items-center p-0">
                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/i/flow/login"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright-section">
            <p>© 2024 Copyright Hajee Mohammad Danesh Science and Technology University</p>
        </div>
    </section>
    <!-- Footer Section Exit  -->

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Lightbox Pupup -->
    <script src="js/lightbox.js"></script>

    <!-- Bootstrap 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>

</html>
<?php }else {
	header("Location: login.php");
	exit;
}  ?>








        