<!--Product Page Design-->
<?php 

       include "../DB_connection.php";
       include('../req/AllFunction.php');
       
       $transport_special_campus = getAllTransportSpecialCampus($conn);
       
 ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HSTU TMS</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 5 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/responsive-style.css">
</head>

<body class="product">
    <!-- Navbar Section -->
    <header id="full_nav">
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="../index.php">
                        <img decoding="async" src="./images/logo.png" alt="image not found"><h2 class="abul">HSTU TMS</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                        aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon"></span> -->
                        <i class="fas fa-stream navbar-toggler-icon"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="./about.php">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="./bus_schedule.php">Bus Schedule</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="./gallery.php">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#con">Contact</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="./sing_up.php">New Here</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="../login.php">Login</a>
                            </li>
                        </ul>

                        <div class="header_right">
                            <div class="text-lg-end">
                                <span>Call Us!</span>
                                <span class="phone_no">+880-531-61355</span>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Navbar Section end -->

    <!-- banner Section start -->
    <section class="banner_section">
        <div class="container">
            <div class="banner-content">
                <h1>Services</h1>
            </div>
        </div>
    </section>
    <!-- banner section exit -->

    <!--Bus Schedule Add  -->
    <section id="only_table">
   
              
    


 



    <?php if ( $transport_special_campus  !=0) {
        ?>


    <h2 class="text-center"><b> Transport Schedule</b>
        </h2>             

         
        <form action="bus_schedule_search.php" 
                 class="mt-3 n-table"
                 id="search"
                 method="get">
             <div class="input-group mb-3 w-50">
                <input type="text" 
                       class="form-control"
                       name="searchKey"
                       placeholder="Search...">
                <button class="btn btn-primary">
                       Search
                      </button>
             </div>
           </form>
        <!-- <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger mt-3 n-table" role="alert">
            <?= $_GET['error'] ?>
          </div>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-info mt-3 n-table" role="alert">
            <?= $_GET['success'] ?>
          </div>
        <?php } ?> -->

        <div class="table-responsive"  >
          <table class="table table-bordered mt-4 table-striped table-hover">
            <thead>
              <tr>

                <th scope="col">No</th>
                <th scope="col">Trip Name</th>
                <th scope="col">Day</th>
                <th scope="col">Departure Time</th>
                <th scope="col">Place Of Departure</th>
                <th scope="col">To Destination</th>
                <th scope="col">Transport Number</th>
                <th scope="col">Route </th>

              </tr>
            </thead>
            <tbody>
              <?php $i = 0;
              foreach ($transport_special_campus as $t3) {
                $i++; ?>
                <tr>
                  <th scope="row">
                    <?= $i ?>
                  </th>
                  <td>
                    <?= $t3['t_name'] ?>
                  </td>
                  <td>
                    <?= $t3['day'] ?>
                  </td>
                  <td>
                    <?= $t3['time'] ?>
                  </td>
                  <td>
                    <?= $t3['from_d'] ?>
                  </td>
                  <td>
                    <?= $t3['to_d'] ?>
                  </td>
                  <td>
                    <?= $t3['t_no'] ?>
                  </td>
                  <td> <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#campus_to_town_special">
                      Details
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="campus_to_town_special" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel"><b>Bus Route </b>
                            </h2>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                          </div>
                            <div class="modal-body"><b>For Student Bus Route</b>
                            <p class="text-left"><b>From Campus : </b>Campus -> College Mor -> Terminal -> Bot Toli -> Sahi Mosque -> BaluBari -> Hospital -> Boromath </p>
                          <p class="text-Left"><b>From Town : </b>Boromathe -> Hospital Mor -> Balu Bari  -> Sahi Mosque -> Bot Toli -> Terminal -> College Mor -> Campus </p>
                           </div>
                            <div class="modal-body"><b>For Teacher and staff Bus Route</b>
                          <p class="text-left"><b>From Campus : </b>Campus -> College Mor -> Churungi -> Kali tola -> Modern Mor -> Lili Mor -> Pahar Pur -> Boromath </p>
                          <p class="text-Left"><b>From Town : </b>Boromathe -> Pahar pur -> Lili Mor  -> Modern Mor -> Kali Tola -> Courungi -> College Mor -> Campus </p>
                           </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          
                          </div>
                        </div>
                      </div>
                    </div>



                  </td>
                  
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div> 

        <?php } else { ?>
        <div class="alert alert-info .w-450 m-5" role="alert">
          Empty!
        </div>
      <?php } ?>
      </div>
 <!-- campus to town special schedule end-->
    </section>
    <!--Product Section Exit -->

    <!-- Footer section -->
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
                        <li><a href="../driver _info.php">  Driver Information</a></li>

                        
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

    <!-- Bootstrap 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>

</html>