<?php
include '_dbconnect.php';
$login = false;
$showError = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM `auth` WHERE `username` = '$username' AND `password`='$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if($num>0){
    $arr = mysqli_fetch_assoc($result);
    $fname = $arr['fname'];
    $loggedin = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['fname'] = $fname;
    $_SESSION['isAdmin'] = $arr['isAdmin'];
    if($arr['isAdmin']==1){
      header("location: admin.php");
    }
    else{
      header("location: user.php");
    }
  }
  else{
    $showError = "Incorrect Username or Password.";
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
  if($showError){
    echo '<div class="alert alert-warning alert-dismissible fade show" style="margin: 0px"; role="alert">
    <strong>Error!</strong> '.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
  <div class="signup-form" style="margin-top: 150px">
  <form action="#" method="post">
            <h2>Sign In</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>"></div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg w-100">Login</button>
            </div>
            <div class="text-center">Don't have an account? <a href="register.php" style="text-decoration: none;">Sign Up</a></div>
        </form>
    </div>
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