<?php
session_start();
if(isset($_SESSION['loggedin'])){
  if($_SESSION['loggedin']==true)
  {
    $loggedin = true;
  }
}
else{
  $loggedin = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LoanDB</title>

  <!-- Favicons -->
  <link href="assets/images/iconlogo.png" rel="icon" type="image/ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo d-flex navbar-brand">
        <img src="assets/images/iconlogo.png" alt="">
        <h1 class="mt-3 px-2"><a href="index.php">LoanDB</a></h1>

        <!-- <a href="index.php"><img src="assets/images/profile.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php
          if($loggedin){
            if($_SESSION['isAdmin']==1){
            echo '
            <li><a href="admin.php">Profile</a></li>
            <li><a class="login" href="logout.php">Logout</a></li>
            ';
            }
            else{
              echo '
            <li><a href="user.php">Profile</a></li>
            <li><a class="login" href="logout.php">Logout</a></li>
            ';
            }
          }
          else{
            echo '
            <li><a class="login" href="login.php">Login</a></li>
            ';
          }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>Welcome to LoanDB</h1>
      <h2>Now get a loan from the comfort of your home</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row py-5">

          <div class="col-lg-6 text-center m-auto">
            <img src="assets/images/Loan.jpg" class="img-fluid" style="max-height: 400px;" alt="">
          </div>

          <div class="col-lg-6 pt-5 pt-lg-0 content">
            <h3 style="padding-bottom:10px" class="text-center">WHAT WE DO</h3>
            <p>
            Getting a loan is a very tiring and complicated process in India. It may take weeks,
            even months for loans to get approved and people have to visit the loan once again
            and again for documents and verification.
            </p>
            <ul>
              <li><i class="bx bxs-bank"></i> Bank.</li>
              <li><i class="bx bx-money"></i> Easy Loans.</li>
              <li><i class="bx bx-lock"></i> Safe and Secure.</li>
            </ul>
            <p>
            The Loan Management System in banks is an application for maintaining a person's loan
            details in a bank. Our proposed project automates the loan process for both, banker's
            as well as customer's side.
            </p>
          </div>

        </div>

      </div>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services ">
      <div class="container">

        <div class="section-title pt-5" data-aos="fade-up">
          <h2>Our Services</h2>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
              <h4 class="title" style="padding-bottom:20px"><a href="">Apply for Loans</a></h4>
              <p class="description" style="height:100px">The customer will be able to apply for a loan while sitting at home.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
              <h4 class="title" style="padding-bottom:20px"><a href="">Check Status</a></h4>
              <p class="description" style="height:100px">The Customer can check the status of his loans (Approved / Rejected).</p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-globe" style="color: #d6ff22;"></i></div>
              <h4 class="title" ><a href="">Hassle free loan System.</a></h4>
              <p class="description" style="height:117px;" >The bank
              authorities can view / approve / reject the loan. It enables banks to improve the agility,
              transparency and eficiency of their lending solutions.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>LoanDB</h3>
            <p>Apply for a loan while sitting at home. Hassle Free Fast.
            The Loan Management System in banks is an application for maintaining a person's loan details in a bank. Our proposed project automates the loan process for both, banker's as well as customer's side.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              JSSSTU Mysore <br>
              Mysore - 570006<br>
              India <br>
              <strong>Phone:</strong> +91 9838272829<br>
              <strong>Email:</strong> loandb@sbi.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Get latest updates of various bank schemes at your mail.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>LoanDB</span></strong>. All Rights Reserved
      </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 
<!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "6103b10f7b55290007766e05";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->


</body>

</html>