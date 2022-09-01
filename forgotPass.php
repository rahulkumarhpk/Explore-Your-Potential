<?php 
  session_start();
  include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign In Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body onload="fixUI();">


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php" style="font-size: 28px; margin-left: -5%; color: #195CA4; padding-right: 5%;">
          EXP<span style="color: #ccc;">LORE<span style="color: #ccc; font-size: 16px">YOUR</span>POTENTIAL</span>
              <!-- <img src="images/exp-logo3.png" height="100px" width="300px" style=" margin-left: -20%"> -->
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav m-auto">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
<!--            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
 -->            <li class="nav-item"><a href="assessment.php" class="nav-link">Assessment Test</a></li>
            <li class="nav-item"><a href="counselling.php" class="nav-link">Counselling</a></li>
            <li class="nav-item active"><a href="signin.html" class="nav-link">Sign In</a></li>
            <li class="nav-item"><a href="register.html" class="nav-link">Register</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->


    <section class="form-26">
         <div class="form-26-mian">
        <div class="layer">
      <div class="wrapper">
      <div class="form-inner-cont">
          <div class="forms-26-info">
             <h2>Recover Password</h2>
          </div>
          <div class="form-right-inf"> 

            <!-- otp form starts -->
            
              <div class="forms-gds" id="otpVerification" style="display: block">
              <form action="recover.php" method="post" class="signin-form"> 
                <div  class="form-input" style="overflow: hidden; white-space: nowrap;">
                  <span style="font-size: 20px; color: white">Enter assocated phone number: &nbsp;</span>
                  <input type="text" name="phone" placeholder="Phone Number" style="width: 30%" required />
                  <button class="btn" name="getOTP" style="width: 20%; margin: 5px">Get OTP</button>
                </div><br>
              </form>
              <form action="recover.php" method="post" class="signin-form"> 
                <div  class="form-input" style="overflow: hidden; white-space: nowrap;">
                  <span style="font-size: 20px; color: white">Enter the OTP you just recieved: &nbsp;</span>
                  <input type="text" name="otp" placeholder="OTP" style="width: 30%; margin-left: 10px" required />
                  <button class="btn" name="submitOTP" style="width: 20%; margin: 5px; margin-left: 5px">Submit</button>
                </div><br>
                <!-- <p style="color: lightblue; font-size: 16px"><a href="forgot.php"><span>Forgot Password?<span></span></span></a></p> -->
              </form>
              </div>
            
            <!-- otp form ends -->

            
          </div>
      </div>
      
      </div>
    </div>
        </div>
    </section>


    <footer class="footer" style="text-align: center; padding-bottom: 2%; margin-top: -2%">
      <div class="container-fluid px-lg-5">
            <div class="row mt-md-5">
              <div class="col-md-12">
                <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


    
  </body>
</html>