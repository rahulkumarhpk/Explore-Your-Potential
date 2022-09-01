<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Life Coach - Free Bootstrap 4 Template by Colorlib</title>
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

    <script type="text/javascript">

      //this function manages which part of the UI to show/hide as needed
      function fixUI() {
      var role = "<?php if (isset($_SESSION['role'])) {echo $_SESSION['role'];}?>";
      var first_name = "<?php if (isset($_SESSION['first_name'])) {echo $_SESSION['first_name'];}?>";
      var user_id = "<?php if (isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];}?>";

      //making div parts visible as per role's value
      if (role == "") {
        // alert("in condition 1");
        document.getElementById("notSignedIn0").style.display = "block";
        document.getElementById("notSignedIn1").style.display = "block";
        document.getElementById("notSignedIn2").style.display = "block";

        document.getElementById("signedIn1").style.display = "block";
        document.getElementById("signedIn2").style.display = "block";
      }
      else if (role == "1") {
        // alert("in condition 2");
        document.getElementById("signedIn0").style.display = "block";
        document.getElementById("signedIn1").style.display = "block";
        document.getElementById("signedIn2").style.display = "block";
        document.getElementById("signedIn3").style.display = "block";
        document.getElementById("signedIn4").style.display = "block";
        document.getElementById("firstName").innerHTML = first_name+" ";
        document.getElementById("acc_role").innerHTML = "Student";
      }
      else if (role == "2") {
        // alert("in condition 2");
        document.getElementById("signedIn0").style.display = "block";
        document.getElementById("signedIn3").style.display = "block";
        document.getElementById("signedIn4").style.display = "block";
        document.getElementById("firstName").innerHTML = first_name+" ";
        document.getElementById("acc_role").innerHTML = "Parent";
      }

      else if (role == "3") {
        // alert("in condition 2");
        document.getElementById("signedIn2").style.display = "block";
        document.getElementById("signedIn3").style.display = "block";
        document.getElementById("signedIn4").style.display = "block";
        document.getElementById("signedIn5").style.display = "block";
        document.getElementById("acc_role").innerHTML = "Expert";
        document.getElementById("deleteExpert").name = "deleteExpert";
        document.getElementById("firstName").innerHTML = first_name+" ";

        var profession = "<?php if (isset($_SESSION['profession'])) {echo $_SESSION['profession'];}?>";
        var experience = "<?php if (isset($_SESSION['experience'])) {echo $_SESSION['experience'];}?>";

        document.getElementById("acc_experience").innerHTML = " "+experience;
        document.getElementById("acc_profession").innerHTML = " "+profession;
      }

      var last_name = "<?php if (isset($_SESSION['last_name'])) {echo $_SESSION['last_name'];}?>";
      var dob = "<?php if (isset($_SESSION['dob'])) {echo $_SESSION['dob'];}?>";
      var email_address = "<?php if (isset($_SESSION['email_address'])) {echo $_SESSION['email_address'];}?>";
      var phone_number = "<?php if (isset($_SESSION['phone_number'])) {echo $_SESSION['phone_number'];}?>";

      document.getElementById("acc_name").innerHTML = " "+first_name+" "+last_name;
      document.getElementById("acc_userid").innerHTML = " "+user_id;
      document.getElementById("acc_age").innerHTML = " "+dob;
      document.getElementById("acc_email").innerHTML = " "+email_address;
      document.getElementById("acc_phone").innerHTML = " "+phone_number;

    }

    </script>
  </head>
  
  <body onload="fixUI();">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="dashboard.php" style="font-size: 28px; margin-left: -5%; color: #195CA4; padding-right: 5%;">
          EXP<span style="color: #ccc;">LORE<span style="color: #ccc; font-size: 16px">YOUR</span>POTENTIAL</span>
              <!-- <img src="images/exp-logo3.png" height="100px" width="300px" style=" margin-left: -20%"> -->
         </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav m-auto">
            <li id="notSignedIn0" class="nav-item" style="display: none;"><a href="index.php" class="nav-link">Home</a></li>
            <li id="signedIn0" class="nav-item" style="display: none;"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
            <!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> -->          
            <li id="signedIn1" class="nav-item" style="display: none;"><a href="assessment.php" class="nav-link">Assessment Test</a></li>
              <li id="signedIn2" class="nav-item" style="display: none;"><a href="counselling.php" class="nav-link">Counselling</a></li>
            
            <!-- <div id="notSignedIn" style="display: block;"> -->
              <li id="notSignedIn1" class="nav-item" style="display: none;"><a href="signin.html" class="nav-link">Sign-In</a></li>
              <li id="notSignedIn2" class="nav-item" style="display: none;"><a href="register.html" class="nav-link">Register</a></li>
            <!-- </div> -->
            
            <!-- <div id="signedIn"  style="display: block;"> -->
              <li id="signedIn3" class="nav-item active" style="display: none; padding-right: 2%;"><a href="account.php" class="nav-link">Account</a></li>
              <li id="signedIn4" class="nav-item" style="display: none; padding-top: 4%;"><a href="logout.php"><span id="firstName">User</span>(logout)</a></li>
            <!-- </div> -->
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <div>
      <div style="background: rgba(117, 157, 200, 0.8); background-size: cover;">
        
        <section class="form-26">
          <div class="form-26-mian2">
            <div class="layer">
              <div class="wrapper">
                <div class="form-inner-cont">
                  <div class="forms-26-info">
                     <h2><u>Account Details</u></h2>
                  </div>
                  <div class="form-right-inf"> 
                    <div class="signin-form forms-gds" style="width: 50%">
                      <form action="registration.php" method="post">
                      <div style="background: rgba(22, 32, 42, 0.8); padding: 2%; overflow: hidden; white-space: nowrap; box-shadow: 10px 10px 5px #000; border-radius: 10px">
                        <h4>Name: &nbsp;<span id="acc_name"></span></h4>
                        <h4>D.O.B.: &nbsp;<span id="acc_age"></span></h4>
                        <h4>User ID: &nbsp;<span id="acc_userid"></span></h4>
                        <h4>Email Address: &nbsp;<span id="acc_email"></span></h4>
                        <h4>Phone Number: &nbsp;<span id="acc_phone"></span></h4>
                        <h4>Role: &nbsp;<span id="acc_role"></span></h4>

                        <div id="signedIn5" style="display: none;">
                          <h4>Profession: &nbsp;<span id="acc_profession"></span></h4>
                          <h4>Experience: &nbsp;<span id="acc_experience"></span></h4>
                        </div>
                      </div>
                      <div class="form-input" style="padding: 75px"><button class="btn2" id="deleteExpert" name="deleteAcc" onclick="if(confirm('Are you sure you want to delete this account?')){}else{return false;};">Delete Account</button></div>
                      </form>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>


    <footer class="footer" style="text-align: center; padding-bottom: 1%">
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