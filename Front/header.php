<?php
$conn=mysqli_connect("localhost","root","","db_ktg");
session_start();
if(isset($_POST["signIn"])){
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $query="SELECT * FROM users where email='$email'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)){
        $row=mysqli_fetch_assoc($res);
        if(password_verify($pass,$row["password"])){
            if($row["status"]!="4"){
                    session_start();
                    $_SESSION["auth_user"]=$row;                    
            } else{
                echo "<script>alert('Account Disabled please contact admin.')</script>";
            };
        } else{
            echo "<script>alert('Wrong password')</script>";
        };
    } else{
        echo "<script>alert('No user registered with $email')</script>";
    };
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KernalTravelGuide</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!---- jQuery CDN ---->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Kernal Travel Guide</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="dropdown"><a href="Information.php"><span>Information</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="hotels.php">Hotels</a></li>
              <li><a href="#">Resorts</a></li>
              <li><a href="#">Restaurants</a></li>
              <li><a href="#">Traveling</a></li>
              <li><a href="#">Tourist Spots</a></li>
            </ul>
          </li>

          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        
<?php
if(isset($_SESSION["auth_user"])){
  $name=$_SESSION["auth_user"]["name"];
  echo ' <button class="btn dropdown-toggle" type="button" id="loggedIn  " data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-person-circle"></span> '.$name.'</button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<li><a class="dropdown-item mx-2" href="#" data-bs-toggle="modal" data-bs-target="#LogoutModal">Log-Out</a></li>
</ul>';
} else{
  echo '<a class="mx-2" data-bs-toggle="modal" data-bs-target="#signInModal"><span class="bi bi-person-circle"></span></a>';
}
?>
        
        <i class="bi bi-list mobile-nav-toggle"></i>     

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

        <!-- Button trigger modal -->



      </div>

    </div>

  </header><!-- End Header -->

  <!-- Login Modal -->
          <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="exampleModalLabel"     aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="post">
                    <input type="email" name="email" placeholder="Email" class="form-control mt-2">
                    <input type="password" name="password" placeholder="Password" class="form-control mt-2">
                    <div class="modal-footer">
                    <input type="submit" value="Sign-In" class="mx-auto btn btn-outline-dark mt-2" data-bs-dismiss="modal" name="signIn">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <a href="register.php"p class="fs-5">Create an account!</a>
                </div>
              </div>
            </div>
          </div>

        <!-- Log-Out Modal -->
        <div class="modal fade" id="LogoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.                  
                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
              </div>
            </div>
          </div>