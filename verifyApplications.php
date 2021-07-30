<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}
if ($_SESSION['isAdmin'] == 0) {
  header("location: user.php");
  exit;
}
include '_dbconnect.php';
if (isset($_GET['updateA'])) {
  $id = $_GET['updateA'];
  $sql = "UPDATE loanforms SET verification = 'Approved' WHERE formno='$id'";
  $result = mysqli_query($conn, $sql);
  header('location: verifyApplications.php');
}
if (isset($_GET['updateR'])) {
  $id = $_GET['updateR'];
  $sql = "UPDATE loanforms SET verification = 'Rejected' WHERE formno='$id'";
  $result = mysqli_query($conn, $sql);
  header('location: verifyApplications.php');
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


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>



  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
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
          <li><a class="active" href="admin.php">Home</a></li>

          <li><a class="login" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <?php
  $branchname = $_SESSION['fname'];
  $sql = "SELECT fname,phoneno,email,type,doc,DATE_FORMAT(date, '%D %b, %Y') as date,formno FROM auth JOIN loanforms ON auth.username = loanforms.username WHERE branch = '$branchname' AND verification= 'Processing'";
  $result = mysqli_query($conn, $sql);
  $num_rows = mysqli_num_rows($result);
  if ($num_rows == 0) {
    echo "
          <div class='container my-auto'>
          <div class='h1 text-center' style='padding-top: 250px'>No Applications Available!</div>
          </div>
          ";
  } else {
    echo '
        <div class="container my-4 p-3">
        <h2 class="text-center mb-3" style="color: #5995fd">Loan Applications</h2>
        <table class="table table-bordered" id="myTable">
        <thead>
        <tr>
        <th scope="col">S.No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone No.</th>
        <th scope="col">Loan Type</th>
        <th scope="col">Date</th>
        <th scope="col" style="text-align: center">Download</th>
        <th colspan="2" style="text-align: center">Actions</th>
        </tr>
        </thead>
        <tbody>
        ';
    $sno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $sno = $sno + 1;
      echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['fname'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['phoneno'] . "</td>
            <td>" . $row['type'] . "</td>
            <td>" . $row['date'] . "</td>
            
            <td style= 'text-align: center'> <a href='downloadApplications.php?file=" . $row['doc'] . "' class='btn btn-primary btn-sm' type='button'>Download</a></td>
            
            <td style= 'text-align: center'> 
            <a href='verifyApplications.php?updateA=" . $row['formno'] . "' role='button' class='btn btn-success btn-sm mr-2'>Approve</a>

            <a href='verifyApplications.php?updateR=" . $row['formno'] . "' role='button' class='btn btn-danger btn-sm'>Reject</a></td>
          </tr>";
    }
  }
  ?>
  </tbody>
  </table>
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