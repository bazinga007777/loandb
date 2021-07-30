<?php
include '_dbconnect.php';
$showError = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $email = $_POST['email']; 
    $phone = $_POST['phoneno']; 
    $fname = $_POST['fname']; 
    $password = $_POST['password']; 
    $cpassword = $_POST['cpassword'];
    $usernameExists = "SELECT * FROM `AUTH` WHERE `username` = '$username'";
    $emailExists = "SELECT * FROM `AUTH` WHERE `email` = '$email'";
    $resultUsername = mysqli_query($conn, $usernameExists);
    $usernameExistRows = mysqli_num_rows($resultUsername);
    $resultEmail = mysqli_query($conn, $emailExists);
    $emailExistRows = mysqli_num_rows($resultEmail);
    if($usernameExistRows>0){
      $showError = "Username already exists.";
    }
    else if($emailExistRows>0){
      $showError = "Email already exists.";
    }
    if(($password==$cpassword)){
        $sql = "INSERT INTO `auth` (`username`, `fname`, `email`, `password`, `phoneno`) VALUES ('$username', '$fname', '$email', '$password', '$phone')";
        $result = mysqli_query($conn, $sql);
        if($result){
          header("location: login.php");
        }
    }
    else{
      $showError = "Passwords do not match.";
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/form.css">

    <!-- JS Files -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</head>

<body>
    <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo d-flex navbar-brand">
        <img src="assets/images/iconlogo.png" alt="">
        <h1 class="mt-3 px-2"><a href="index.php">LoanDB</a></h1>

        <!-- <a href="index.html"><img src="assets/images/profile.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>

          <li><a class="login" href="/loandb/login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <?php
  // if($showAlert){
  //   echo '<div class="alert alert-success alert-dismissible fade show" style="margin: 0px"; role="alert">
  //   <strong>Success!</strong> Your account has been created successfully. You can login now.
  //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  // </div>';
  // }
  if($showError){
    echo '<div class="alert alert-warning alert-dismissible fade show" style="margin: 0px"; role="alert">
    <strong>Error!</strong> '. $showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
  <div class="signup-form" style="margin-top: 25px">
  <form action="#" method="post">
            <h2>Register</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="fname" placeholder="Full Name" required="required"
                value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];?>"></div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>"></div>
            <div class="form-group">
                <input type="tel" class="form-control" name="phoneno" placeholder="Phone Number" required="required" maxlength="10" value="<?php if(isset($_POST['phoneno'])) echo $_POST['phoneno'];?>"></div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required" title="Please enter a valid email id"
                value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required="required">
            </div>
            <!-- <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div> -->
            <div class="form-group">
                <button id="form-submit" type="submit" class="btn btn-lg w-100">Register Now</button>
            </div>
            <div class="text-center">Already have an account? <a href="login.php" style="text-decoration: none;">Sign in</a></div>
        </form>
    </div>

    <script>
      
    </script>
   
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